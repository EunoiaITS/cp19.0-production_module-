<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Model\Entity\Wip;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;

/**
 * SerialNumber Controller
 *
 * @property \App\Model\Table\SerialNumberTable $SerialNumber
 *
 * @method \App\Model\Entity\SerialNumber[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SerialNumberController extends AppController
{
    public function initialize(){
        parent::initialize();
        $this->viewBuilder()->setLayout('mainframe');
    }
    public function dashboard(){

    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        if($this->Auth->user('role') == 'requester'){
            $serialNumber = $this->SerialNumber->find('all')
                ->where(['status' => 'requested'])
                ->orWhere(['status' => 'rejected']);
        }

        if($this->Auth->user('role') == 'verifier'){
            $serialNumber = $this->SerialNumber->find('all')
                ->where(['status' => 'requested']);
        }

        if($this->Auth->user('role') == 'approve-1'){
            $serialNumber = $this->SerialNumber->find('all')
                ->where(['status' => 'verified']);
        }
        if($this->Auth->user('role') == 'approve-2' || $this->Auth->user('role') == 'approve-3' || $this->Auth->user('role') == 'approve-4'){
            $this->redirect(array("controller" => "SerialNumber", "action" => "dashboard"));
        }

        $this->set(compact('serialNumber'));
    }

    /**
     * View method
     *
     * @param string|null $id Serial Number id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $serialNumber = $this->SerialNumber->get($id, [
            'contain' => []
        ]);

        $this->set('serialNumber', $serialNumber);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $urlToSales = 'http://salesmodule.acumenits.com/sales-order/all-po';

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
        $so_no = null;
        foreach($dataFromSales as $pm){
            foreach($pm->soi as $item){
                $version = $item->version;
                $quantity = $item->quantity;
            }
            $so_no .= '{label:"'.$pm->salesorder_no.'",idx:"'.$pm->model.'",idv:"'.$version.'",idq:"'.$quantity.'"},';
        }
        $so_no = rtrim($so_no, ',');
        $this->loadModel('SerialNumberChild');
        $serialNumber = $this->SerialNumber->newEntity();
        if ($this->request->is('post')) {
            $serialNumber = $this->SerialNumber->patchEntity($serialNumber, $this->request->getData());
            if ($this->SerialNumber->save($serialNumber)) {
                $serial_no = $this->SerialNumber->find('all', ['fields' => 'id'])->last();
                if($this->request->getData('quantity') != null){
                    $serialChild = TableRegistry::get('SerialNumberChild');
                    $serialData = array();
                    for($i = 0; $i < $this->request->getData('quantity'); $i++){
                        $serialData[$i]['serial_number_id'] = $serial_no['id'];
                        $serialData[$i]['year'] = $this->request->getData('year'.$i);
                        $serialData[$i]['month'] = $this->request->getData('month'.$i);
                    }
                    $serials = $serialChild->newEntities($serialData);
                    foreach($serials as $serial){
                        $serialChild->save($serial);
                    }
                }
                $this->Flash->success(__('The serial number has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The serial number could not be saved. Please, try again.'));
        }
        $this->set(compact('serialNumber'));
        $this->set('sequence', $this->SerialNumberChild->find('all')->count());
        $this->set('so_no', $so_no);
        $this->set('pic', $this->Auth->user('username'));
        $this->set('pic_name', $this->Auth->user('name'));
        $this->set('pic_dept', $this->Auth->user('dept'));
        $this->set('pic_section', $this->Auth->user('section'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Serial Number id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $serialNumber = $this->SerialNumber->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $serialNumber = $this->SerialNumber->patchEntity($serialNumber, $this->request->getData());
            if ($this->SerialNumber->save($serialNumber)) {
                $this->Flash->success(__('The serial number has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The serial number could not be saved. Please, try again.'));
        }
        $this->set(compact('serialNumber'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Serial Number id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $serialNumber = $this->SerialNumber->get($id);
        if ($this->SerialNumber->delete($serialNumber)) {
            $this->Flash->success(__('The serial number has been deleted.'));
        } else {
            $this->Flash->error(__('The serial number could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function verify($id = null){
        $sn = $this->SerialNumber->get($id, [
            'contain' => []
        ]);
        $this->loadModel('SerialNumberChild');
        $sn_items = $this->SerialNumberChild->find('all')
            ->where(['serial_number_id' => $sn->id]);
        $this->set('sn', $sn);
        $this->set('items', $sn_items);
        $this->set('pic', $this->Auth->user('username'));
    }

    public function approve($id = null){
        $sn = $this->SerialNumber->get($id, [
            'contain' => []
        ]);
        $this->loadModel('SerialNumberChild');
        $sn_items = $this->SerialNumberChild->find('all')
            ->where(['serial_number_id' => $sn->id]);
        $this->set('sn', $sn);
        $this->set('items', $sn_items);
        $this->set('pic', $this->Auth->user('username'));
    }

    public function report(){
        $this->loadModel('Wip');
        $this->loadModel('WipSection');
        $this->loadModel('SerialNumberChild');
        $sn = $this->SerialNumber->find('all')
            ->where(['status' => 'approved']);
        foreach($sn as $s){
            $items = $this->SerialNumberChild->find('all')
                ->where(['serial_number_id' => $s->id]);
            $s->items = $items;
                $wip = $this->Wip->find('all')
                    ->Where(['serial_no'=>$s->id]);
                foreach ($wip as $w){
                    $wips = $this->WipSection->find('all')
                        ->Where(['wip_id'=>$w->id]);
                    foreach ($wips as $wp){
                        $s->wips = $wp;
                    }
                    $s->wip = $w;
                }
        }
        $this->set('sn', $sn);
    }

    public function monthlyReport(){
        $sn = $this->SerialNumber->find('all')
            ->where(['status' => 'approved']);
        $this->set('sn', $sn);
    }

    public function statusReport(){
        $this->loadModel('SerialNumberChild');
        $sn = $this->SerialNumber->find('all');
        foreach($sn as $s){
            $items = $this->SerialNumberChild->find('all')
                ->where(['serial_number_id' => $s->id]);
            $s->items = $items;
        }
        $this->set('sn', $sn);
    }

    public function isAuthorized($user){
        // All registered users can add articles
        if ($this->request->getParam('action') === 'index' || $this->request->getParam('action') === 'monthlyReport' || $this->request->getParam('action') === 'report' || $this->request->getParam('action') === 'statusReport' || $this->request->getParam('action') === 'dashboard') {
            return true;
        }

        if(isset($user['role']) && $user['role'] === 'requester'){
            if(in_array($this->request->action, ['add'])){
                return true;
            }
        }

        if(isset($user['role']) && $user['role'] === 'verifier'){
            if(in_array($this->request->action, ['verify', 'edit'])){
                return true;
            }
        }

        if(isset($user['role']) && $user['role'] === 'approve-1'){
            if(in_array($this->request->action, ['approve', 'edit'])){
                return true;
            }
        }

        return parent::isAuthorized($user);

    }

}
