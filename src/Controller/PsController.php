<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Ps Controller
 *
 * @property \App\Model\Table\PsTable $Ps
 *
 * @method \App\Model\Entity\P[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PsController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->viewBuilder()->setLayout('mainframe');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $ps = $this->paginate($this->Ps);

        $this->set(compact('ps'));
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
        $p = $this->Ps->get($id, [
            'contain' => []
        ]);

        $this->set('p', $p);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $p = $this->Ps->newEntity();
        if ($this->request->is('post')) {
            $p = $this->Ps->patchEntity($p, $this->request->getData());
            if ($this->Ps->save($p)) {
                $this->Flash->success(__('The p has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The p could not be saved. Please, try again.'));
        }
        $this->set(compact('p'));
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
        $p = $this->Ps->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $p = $this->Ps->patchEntity($p, $this->request->getData());
            if ($this->Ps->save($p)) {
                $this->Flash->success(__('The p has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The p could not be saved. Please, try again.'));
        }
        $this->set(compact('p'));
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
        $p = $this->Ps->get($id);
        if ($this->Ps->delete($p)) {
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

    public function isAuthorized($user){
        // All registered users can add articles
        if ($this->request->getParam('action') === 'view' || $this->request->getParam('action') === 'edit' || $this->request->getParam('action') === 'add' || $this->request->getParam('action') === 'index' || $this->request->getParam('action') === 'verify' || $this->request->getParam('action') === 'approve' || $this->request->getParam('action') === 'main' || $this->request->getParam('action') === 'report') {
            return true;
        }

        return parent::isAuthorized($user);

    }

}
