<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Ps Controller
 *
 * @property \App\Model\Table\PsTable $Ps
 *
 * @method \App\Model\Entity\Ps[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PsController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->viewBuilder()->setLayout('mainframe');// TODO: Change the autogenerated stub
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->loadModel('PsMonthly');
        if($this->Auth->user('role') == 'verifier'){
            $ps = $this->PsMonthly->find('all')
                ->where(['status' => 'requested']);
        }elseif($this->Auth->user('role') == 'approve-1'){
            $ps = $this->PsMonthly->find('all')
                ->where(['status' => 'approval_1']);
        }elseif($this->Auth->user('role') == 'approve-2'){
            $ps = $this->PsMonthly->find('all')
                ->where(['status' => 'approval_2']);
        }else{
            $ps = $this->PsMonthly->find('all')
                ->where(['status' => 'requested', 'status' => 'rejected']);
        }

        $this->set('ps', $ps);
    }

    /**
     * View method
     *
     * @param string|null $id P id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->loadModel('PsMonthly');
        $ps = $this->PsMonthly->get($id, [
            'contain' => []
        ]);

        $reqData = [
            'month' => $ps->month,
            'year' => $ps->year
        ];
        $urlToSales = 'http://salesmodule.acumenits.com/api/month-data';

        $optionsForSales = [
            'http' => [
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => $reqData
            ]
        ];
        $contextForSales  = stream_context_create($optionsForSales);
        $resultFromSales = file_get_contents($urlToSales, false, $contextForSales);
        if ($resultFromSales === FALSE) {
            $this->Flash->error(__('No data found for the selected month. Please try again!'));
        }
        $dataFromSales = json_decode($resultFromSales);
        $this->loadModel('Fgtt');
        foreach($dataFromSales as $sn_match){
            $fgtts = $this->Fgtt->find('all')
                ->where(['so_no' => $sn_match->salesorder_no]);
            foreach($fgtts as $fgtt){
                $sn_match->fgtt = $fgtt;
            }
        }

        $this->set('ps', $ps);
        $this->set('sales', $dataFromSales);
        $this->set('pic', $this->Auth->user('username'));
        $this->set('pic_name', $this->Auth->user('name'));
        $this->set('pic_dept', $this->Auth->user('dept'));
        $this->set('pic_section', $this->Auth->user('section'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ps = $this->Ps->newEntity();
        if ($this->request->is('post')) {
            $ps = $this->Ps->patchEntity($ps, $this->request->getData());
            if ($this->Ps->save($ps)) {
                $this->Flash->success(__('The p has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The p could not be saved. Please, try again.'));
        }
        $this->set(compact('ps'));
    }

    /**
     * Edit method
     *
     * @param string|null $id P id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->loadModel('PsMonthly');
        $ps = $this->PsMonthly->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ps = $this->PsMonthly->patchEntity($ps, $this->request->getData());
            if ($this->PsMonthly->save($ps)) {
                $this->Flash->success(__('The ps has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ps could not be saved. Please, try again.'));
        }
        $this->set(compact('ps'));
    }

    /**
     * Delete method
     *
     * @param string|null $id P id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ps = $this->Ps->get($id);
        if ($this->Ps->delete($ps)) {
            $this->Flash->success(__('The p has been deleted.'));
        } else {
            $this->Flash->error(__('The p could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function main(){
        $urlToSales = 'http://salesmodule.acumenits.com/api/all-data';

        $optionsForSales = [
            'http' => [
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'GET'
            ]
        ];
        $contextForSales  = stream_context_create($optionsForSales);
        $resultFromSales = file_get_contents($urlToSales, false, $contextForSales);
        if ($resultFromSales === FALSE) {
            echo 'ERROR!!';
        }
        $dataFromSales = json_decode($resultFromSales);
        $this->loadModel('SerialNumber');
        $this->loadModel('Fgtt');
        foreach($dataFromSales as $sn_match){
            $matches = $this->SerialNumber->find('all')
                ->where(['so_no' => $sn_match->salesorder_no]);
            foreach($matches as $match){
                $sn_match->production_sn = $match;
            }
            $fgtts = $this->Fgtt->find('all')
                ->where(['so_no' => $sn_match->salesorder_no]);
            foreach($fgtts as $fgtt){
                $sn_match->fgtt = $fgtt;
            }
            $start    = (new \DateTime($sn_match->date))->modify('first day of this month');
            $end      = (new \DateTime('2018-09-26'))->modify('first day of next month');
            $interval = \DateInterval::createFromDateString('1 month');
            $period   = new \DatePeriod($start, $interval, $end);

            $months = array();
            foreach ($period as $dt) {
                $months[] = $dt->format("Y-M");
            }
            $sn_match->months = $months;
        }
        $this->set('sales',$dataFromSales);
    }
    public function scheduler(){

    }
    public function dailyReport(){
//        $this->autoRender = false;
//        echo "<pre>";
//        print_r($this->request);
//        echo "</pre>";
        $date = $this->request->getQuery('date');
        $urlToSales = 'http://salesmodule.acumenits.com/api/all-data';
        $optionsForSales = [
        'http' => [
                    'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                    'method'  => 'GET'
            ]
        ];
        $contextForSales  = stream_context_create($optionsForSales);
        $resultFromSales = file_get_contents($urlToSales, false, $contextForSales);
        if ($resultFromSales === FALSE) {
            echo 'ERROR!!';
        }
        $ps = $this->Ps->newEntity();
        if ($this->request->is(['post'])) {
            $ps->date = $this->request->getData('date');
            $ps->total = $this->request->getData('total');
            $ps->created_by = 'requester';
            $ps->status = 'requested';
            if ($this->Ps->save($ps)) {
                $ps_no = $this->Ps->find('all', ['fields' => 'id'])->last();
                if($this->request->getData('count') != null){
                    $dr = TableRegistry::get('dr');
                    $drData = array();
                    for($i = 0; $i <= $this->request->getData('count'); $i++){
                        $drData[$i]['ps_id'] = $ps_no['id'];
                        $drData[$i]['so_no'] = $this->request->getData('so_no'.$i);
                        $drData[$i]['item_no'] = $this->request->getData('item_no'.$i);
                        $drData[$i]['quantity'] = $this->request->getData('quantity'.$i);
                    }
                    $pss = $dr->newEntities($drData);
                    foreach($pss as $ps){
                        $dr->save($ps);
                    }
                }
                $this->Flash->success(__('The scn has been saved.'));

                return $this->redirect(['action' => 'scheduler']);
            }
            $this->Flash->error(__('The ps could not be saved. Please, try again.'));
        }
        $dataFromSales = json_decode($resultFromSales);
        $this->set('sales',$dataFromSales);
        $this->set('date',$date);
        $this->set('pic', $this->Auth->user('username'));
        $this->set('pic_name', $this->Auth->user('name'));
        $this->set('pic_dept', $this->Auth->user('dept'));
        $this->set('pic_section', $this->Auth->user('section'));
    }

    public function monthlyScheduler(){
        $this->loadModel('PsMonthly');
        $count = $this->PsMonthly->find('all')->last();
        $month = $this->request->getQuery('month');
        $year = $this->request->getQuery('year');
        if($month == null){
            $month = date('m');
        }
        if($year == null){
            $year = date('Y');
        }
        $urlToSales = 'http://salesmodule.acumenits.com/api/month-data';

        $optionsForSales = [
            'http' => [
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => $this->request->getData()
            ]
        ];
        $contextForSales  = stream_context_create($optionsForSales);
        $resultFromSales = file_get_contents($urlToSales, false, $contextForSales);
        if ($resultFromSales === FALSE) {
            $this->Flash->error(__('No data found for the selected month. Please try again!'));
        }
        $dataFromSales = json_decode($resultFromSales);
        $this->loadModel('Fgtt');
        foreach($dataFromSales as $sn_match){
            $fgtts = $this->Fgtt->find('all')
                ->where(['so_no' => $sn_match->salesorder_no]);
            foreach($fgtts as $fgtt){
                $sn_match->fgtt = $fgtt;
            }
        }
        if($this->request->is('post')){
            if($this->request->getData('total_items') < 1){
                $this->Flash->error(__('No data found for the selected month. Please try again!'));
                return $this->redirect(['action' => 'monthlyScheduler']);
            }
            $ps = $this->PsMonthly->newEntity();
            $ps = $this->PsMonthly->patchEntity($ps, $this->request->getData());
            if ($this->PsMonthly->save($ps)) {
                $this->Flash->success(__('The ps has been saved.'));

                return $this->redirect(['action' => 'monthlyScheduler']);
            }
            $this->Flash->error(__('The ps could not be saved. Please, try again.'));
        }
        $this->set('sales', $dataFromSales);
        $this->set('month', $month);
        $this->set('year', $year);
        $this->set('pic', $this->Auth->user('username'));
        $this->set('pic_name', $this->Auth->user('name'));
        $this->set('pic_dept', $this->Auth->user('dept'));
        $this->set('pic_section', $this->Auth->user('section'));
        $this->set('sn_no', (isset($count->id) ? ($count->id + 1) : 1));
    }

    public function approvalStatus(){
        $this->loadModel('PsMonthly');
        $ps = $this->paginate($this->PsMonthly);
        $this->set(compact('ps'));
    }

    public function report(){}

    public function progressReport(){}

    public function isAuthorized($user){
        // All registered users can add articles
        if ($this->request->getParam('action') === 'scheduler' || $this->request->getParam('action') === 'dailyReport' || $this->request->getParam('action') === 'monthlyScheduler' || $this->request->getParam('action') === 'index' || $this->request->getParam('action') === 'view' || $this->request->getParam('action') === 'edit' || $this->request->getParam('action') === 'main' || $this->request->getParam('action') === 'report' || $this->request->getParam('action') === 'approvalStatus' || $this->request->getParam('action') === 'progressReport') {
            return true;
        }

        return parent::isAuthorized($user);

    }

}