<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Fgtt Controller
 *
 * @property \App\Model\Table\FgttTable $Fgtt
 *
 * @method \App\Model\Entity\Fgtt[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FgttController extends AppController
{

    public $paginate = [
        // Other keys here.
        'maxLimit' => 10
    ];

    public function initialize(){
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
        if($this->Auth->user('role') == 'requester'){
            $fgtt = $this->paginate($this->Fgtt->find('all')
                ->where(['status' => 'requested']));
        }

        if($this->Auth->user('role') == 'verifier'){
            $fgtt = $this->paginate($this->Fgtt->find('all')
                ->where(['status' => 'requested']));
        }

        if($this->Auth->user('role') == 'approve-1'){
            $fgtt = $this->paginate($this->Fgtt->find('all')
                ->where(['status' => 'verified']));
        }
        if($this->Auth->user('role') == 'approve-2' || $this->Auth->user('role') == 'approve-3' || $this->Auth->user('role') == 'approve-4'){
            $this->loadModel('SerialNumber');
            $this->redirect(array("controller" => "Dashboard", "action" => "index"));
        }
        $this->set(compact('fgtt'));
    }

    /**
     * View method
     *
     * @param string|null $id Fgtt id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $fgtt = $this->Fgtt->get($id, [
            'contain' => []
        ]);
        $this->loadModel('SerialNumber');
        $this->loadModel('SerialNumberChild');
        $itemIds = explode(',', $fgtt->item_nos);
        $itemOb = new \stdClass();
        $count = 0;
        foreach ($itemIds as $key => $items){
            if(!empty($items != null)){
                $count++;
                $csnItem = $this->SerialNumberChild->get($items, [
                    'contain' => []
                ]);
                $csnDetails = $this->SerialNumber->get($csnItem->serial_number_id, [
                    'contain' => []
                ]);
                $itemOb->$key = $csnItem;
                $fgtt->csn = $csnDetails;
            }
        }
        $fgtt->items = $itemOb;
        $this->set('qty', $count);
        $this->set('fgtt', $fgtt);
        $this->set('pic', $this->Auth->user('username'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->loadModel('SerialNumber');
        $this->loadModel('SerialNumberChild');
        $this->loadModel('Wip');
        $this->loadModel('WipSection');
        $wip_child = $this->WipSection->find('all')
            ->Where(['section'=>'Wiring','status'=>'acknowledged']);
        $so_nos = null;
        foreach ($wip_child as $wc){
            $wip = $this->Wip->find('all')
                ->Where(['id'=>$wc->wip_id]);
            foreach ($wip as $w){
                $sos = $this->SerialNumber->find('all')
                    ->where(['so_no'=>$w->so_no]);
                foreach($sos as $ss){
                    $csn_items = $this->SerialNumberChild->find('all')
                        ->where(['serial_number_id' => $ss->id]);
                    $exF = $this->Fgtt->find('all')
                        ->where(['so_no' => $ss->so_no]);
                    $fgId = $selected = $action = $added_items = '';
                    $calc = 0;
                    foreach ($exF as $fgCheck){
                        $calc++;
                        if($calc > 0){
                            $fgId = $fgCheck->id;
                            $selected = 'yes';
                            $action = 'edit';
                            $fgItems = explode(',', $fgCheck->item_nos);
                            foreach ($fgItems as $fIt){
                                $added_items .= '"'.$fIt.'",';
                            }
                        }
                    }
                    $added_items = rtrim($added_items, ',');
                    $so_nos .= '{label:"'.$ss->so_no.'",addedItems:['.$added_items.'],action:"'.$action.'",fgId:"'.$fgId.'",exCheck:"'.$selected.'",idx:"'.$ss->quantity.'",model:"'.$ss->model.'",version:"'.$ss->version.'",type_1:"'.$ss->type1.'",type_2:"'.$ss->type2.'"';
                    $count = 0;
                    $so_items = null;
                    foreach($csn_items as $item){
                        $so_items .= '"'.$item->id.'",';
                        $count++;
                    }
                    $so_items = rtrim($so_items, ',');
                    $so_nos .= ',items:['.$so_items.']},';
                }
            }
        }
        $so_nos = rtrim($so_nos, ',');
        $count = $this->Fgtt->find('all')->last();
        $fgtt = $this->Fgtt->newEntity();
        $items = '';
        if ($this->request->is('post')) {
            if($this->request->getData('action') == 'edit'){
                $fgtt = $this->Fgtt->get($this->request->getData('fgId'), [
                    'contain' => []
                ]);
                if(in_array('items', array_keys($this->request->getData()))){
                    foreach ($this->request->getData('items') as $item_ids){
                        $items .= $item_ids.',';
                    }
                }
                $fgtt->item_nos = rtrim($items, ',');
                if ($this->Fgtt->save($fgtt)) {
                    $this->Flash->success(__('The fgtt has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The fgtt could not be saved. Please, try again.'));
            }else{
                $fgtt = $this->Fgtt->patchEntity($fgtt, $this->request->getData());
                if(in_array('items', array_keys($this->request->getData()))){
                    foreach ($this->request->getData('items') as $item_ids){
                        $items .= $item_ids.',';
                    }
                }
                $fgtt->item_nos = rtrim($items, ',');
                if ($result = $this->Fgtt->save($fgtt)) {
                    $this->Flash->success(__('The fgtt has been saved.'));

                    return $this->redirect(['action' => 'add']);
                }
                $this->Flash->error(__('The fgtt could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('fgtt'));
        $this->set('so_nos', $so_nos);
        $this->set('fgtt_no', (isset($count->id) ? ($count->id + 1) : 1));
        $this->set('pic', $this->Auth->user('username'));
        $this->set('pic_name', $this->Auth->user('name'));
        $this->set('pic_dept', $this->Auth->user('dept'));
        $this->set('pic_section', $this->Auth->user('section'));

}

    /**
     * Edit method
     *
     * @param string|null $id Fgtt id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $fgtt = $this->Fgtt->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $fgtt = $this->Fgtt->patchEntity($fgtt, $this->request->getData());
            if ($this->Fgtt->save($fgtt)) {
                $this->Flash->success(__('The fgtt has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The fgtt could not be saved. Please, try again.'));
        }
        $this->set(compact('fgtt'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Fgtt id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $fgtt = $this->Fgtt->get($id);
        if ($this->Fgtt->delete($fgtt)) {
            $this->Flash->success(__('The fgtt has been deleted.'));
        } else {
            $this->Flash->error(__('The fgtt could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function verify($id = null){
        $fgtt = $this->Fgtt->get($id, [
            'contain' => []
        ]);
        $this->loadModel('SerialNumber');
        $this->loadModel('SerialNumberChild');
        $itemIds = explode(',', $fgtt->item_nos);
        $itemOb = new \stdClass();
        $count = 0;
        foreach ($itemIds as $key => $items){
            if(!empty($items != null)){
                $count++;
                $csnItem = $this->SerialNumberChild->get($items, [
                    'contain' => []
                ]);
                $csnDetails = $this->SerialNumber->get($csnItem->serial_number_id, [
                    'contain' => []
                ]);
                $itemOb->$key = $csnItem;
                $fgtt->csn = $csnDetails;
            }
        }
        $fgtt->items = $itemOb;
        $this->set('qty', $count);
        $this->set('fgtt', $fgtt);
        $this->set('pic', $this->Auth->user('username'));
    }

    public function approve($id = null){
        $fgtt = $this->Fgtt->get($id, [
            'contain' => []
        ]);
        $this->loadModel('SerialNumber');
        $this->loadModel('SerialNumberChild');
        $itemIds = explode(',', $fgtt->item_nos);
        $itemOb = new \stdClass();
        $count = 0;
        foreach ($itemIds as $key => $items){
            if(!empty($items != null)){
                $count++;
                $csnItem = $this->SerialNumberChild->get($items, [
                    'contain' => []
                ]);
                $csnDetails = $this->SerialNumber->get($csnItem->serial_number_id, [
                    'contain' => []
                ]);
                $itemOb->$key = $csnItem;
                $fgtt->csn = $csnDetails;
            }
        }
        $fgtt->items = $itemOb;
        $this->set('qty', $count);
        $this->set('fgtt', $fgtt);
        $this->set('pic', $this->Auth->user('username'));
    }

    public function report(){
        $this->loadModel('SerialNumber');
        $this->loadModel('SerialNumberChild');
        $fgtt = $this->paginate($this->Fgtt->find('all')
            ->where(['status' => 'approved']));
        foreach($fgtt as $fg){
            $fgtt_details = $this->SerialNumber->find('all')
                ->where(['so_no' => $fg->so_no]);
            foreach($fgtt_details as $det){
                $fg->details = $det;
            }
        }
        $this->set('fgtt', $fgtt);
    }

    public function statusReport(){
        $this->loadModel('SerialNumber');
        $this->loadModel('SerialNumberChild');
        $fgtt = $this->paginate($this->Fgtt->find('all'));
        foreach($fgtt as $fg){
            $count = 0;
            $itemCount = explode(',', $fg->item_nos);
            foreach ($itemCount as $c){
                if($c != null){
                    $count++;
                }
            }
            $fg->qty = $count;
            $fgtt_details = $this->SerialNumber->find('all')
                ->where(['so_no' => $fg->so_no]);
            foreach($fgtt_details as $det){
                $fg->details = $det;
            }
        }
        $this->set('fgtt', $fgtt);
    }

    public function isAuthorized($user){
        // All registered users can add articles
        if ($this->request->getParam('action') === 'index' || $this->request->getParam('action') === 'statusReport' || $this->request->getParam('action') === 'report' || $this->request->getParam('action') === 'view') {
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
