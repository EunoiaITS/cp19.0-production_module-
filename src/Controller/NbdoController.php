<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;

/**
 * Nbdo Controller
 *
 * @property \App\Model\Table\NbdoTable $Nbdo
 *
 * @method \App\Model\Entity\Nbdo[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class NbdoController extends AppController
{

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
            $nbdo = $this->Nbdo->find('all')
                ->where(['status' => 'requested']);
        }

        if($this->Auth->user('role') == 'verifier'){
            $nbdo = $this->Nbdo->find('all')
                ->where(['status' => 'requested']);
        }

        if($this->Auth->user('role') == 'approve-1'){
            $nbdo = $this->Nbdo->find('all')
                ->where(['status' => 'verified']);
        }
        if($this->Auth->user('role') == 'approve-2' || $this->Auth->user('role') == 'approve-3' || $this->Auth->user('role') == 'approve-4'){
            $this->loadModel('SerialNumber');
            $this->redirect(array("controller" => "SerialNumber", "action" => "dashboard"));
        }

        $this->set(compact('nbdo'));
    }

    /**
     * View method
     *
     * @param string|null $id Nbdo id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $nbdo = $this->Nbdo->get($id, [
            'contain' => ['NbdoItems']
        ]);

        $this->set('nbdo', $nbdo);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $urlTosSales = 'http://salesmodule.acumenits.com/customer/all-cust';

        $optionsForSales = [
            'http' => [
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'GET'
            ]
        ];
        $contextForSales  = stream_context_create($optionsForSales);
        $resultFromSales = file_get_contents($urlTosSales, false, $contextForSales);
        if ($resultFromSales === FALSE) {
            echo 'ERROR!!';
        }
        $dataFromSales = json_decode($resultFromSales);
        $cust_details = null;
        foreach($dataFromSales as $ss){
            $cust_details .= '{label:"'.$ss->name.'",idx:"'.$ss->address.'",contact:"'.$ss->contactno1.'",conper:"'.$ss->contact_details->name.'"},';
        }
        $cust_details = rtrim($cust_details, ',');

        $urlToEng = 'http://engmodule.acumenits.com/api/all-parts';

        $optionsForEng = [
            'http' => [
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'GET'
            ]
        ];
        $contextForEng  = stream_context_create($optionsForEng);
        $resultFromEng = file_get_contents($urlToEng, false, $contextForEng);
        if ($resultFromEng === FALSE) {
            echo 'ERROR!!';
        }
        $dataFromEng = json_decode($resultFromEng);
        $part_no = $part_name = null;
        foreach($dataFromEng as $pm){
            $part_no .= '{label:"'.$pm->partNo.'",idx:"'.$pm->partName.'"},';
            $part_name .= '{label:"'.$pm->partName.'",idx:"'.$pm->partNo.'"},';
        }
        $part_no = rtrim($part_no, ',');
        $part_name = rtrim($part_name, ',');
        $count = $this->Nbdo->find('all')->last();
        $nbdo = $this->Nbdo->newEntity();
        $this->loadModel('NbdoItems');
        if ($this->request->is('post')) {
            $nbdo = $this->Nbdo->patchEntity($nbdo, $this->request->getData());
            if ($this->Nbdo->save($nbdo)) {
                $nbdo_no = $this->Nbdo->find('all', ['fields' => 'id'])->last();
                if($this->request->getData('total') != null){
                    $nbdoItem = TableRegistry::get('NbdoItems');
                    $itemData = array();
                    for($i = 0; $i < $this->request->getData('total'); $i++){
                        $itemData[$i]['nbdo_id'] = $nbdo_no['id'];
                        $itemData[$i]['part_no'] = $this->request->getData('part_no'.$i);
                        $itemData[$i]['part_desc'] = $this->request->getData('part_desc'.$i);
                        $itemData[$i]['quantity'] = $this->request->getData('quantity'.$i);
                        if ($this->request->getData('document'.$i) != '') {
                            $fileName = $this->request->getData('document'.$i);
                            $ext = substr(strtolower(strrchr($fileName['name'], '.')), 1);
                            $arr_ext = array('jpg', 'jpeg', 'gif', 'png');
                            $setNewFileName = 'uploadedFile'.$i;
                            $imageFileName = $setNewFileName . '.' . $ext;
                            $uploadPath = WWW_ROOT . 'uploads/nbdo/' . $nbdo_no['id'] . '/';
                            if (!file_exists($uploadPath)) {
                                mkdir($uploadPath);
                            }
                            $uploadFile = $uploadPath.$imageFileName;
                            if (move_uploaded_file($fileName['tmp_name'], $uploadFile)) {
                                $itemData[$i]['document'] = 'uploads/nbdo/'.$nbdo_no['id'].'/'.$imageFileName;
                            }
                        }
                    }
                    $items = $nbdoItem->newEntities($itemData);
                    foreach($items as $item){
                        $nbdoItem->save($item);
                    }
                }

                $this->Flash->success(__('The nbdo has been saved.'));

                return $this->redirect(['action' => 'add']);
            }
            $this->Flash->error(__('The nbdo could not be saved. Please, try again.'));
        }
        $this->set(compact('nbdo'));
        $this->set('sn_no', (isset($count->id) ? ($count->id + 1) : 1));
        $this->set('part_no', $part_no);
        $this->set('part_name', $part_name);
        $this->set('cust_details', $cust_details);
        $this->set('pic', $this->Auth->user('username'));
        $this->set('pic_name', $this->Auth->user('name'));
        $this->set('pic_dept', $this->Auth->user('dept'));
        $this->set('pic_section', $this->Auth->user('section'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Nbdo id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $nbdo = $this->Nbdo->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $nbdo = $this->Nbdo->patchEntity($nbdo, $this->request->getData());
            if ($this->Nbdo->save($nbdo)) {
                $this->Flash->success(__('The nbdo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The nbdo could not be saved. Please, try again.'));
        }
        $this->set(compact('nbdo'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Nbdo id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $nbdo = $this->Nbdo->get($id);
        if ($this->Nbdo->delete($nbdo)) {
            $this->Flash->success(__('The nbdo has been deleted.'));
        } else {
            $this->Flash->error(__('The nbdo could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function verify($id = null){
        $nbdo = $this->Nbdo->get($id, [
            'contain' => []
        ]);
        $this->loadModel('NbdoItems');
        $nbdo_items = $this->NbdoItems->find('all')
            ->where(['nbdo_id' => $nbdo->id]);
        $this->set('nbdo', $nbdo);
        $this->set('items', $nbdo_items);
        $this->set('pic', $this->Auth->user('username'));
    }

    public function approve($id = null){
        $nbdo = $this->Nbdo->get($id, [
            'contain' => []
        ]);
        $this->loadModel('NbdoItems');
        $nbdo_items = $this->NbdoItems->find('all')
            ->where(['nbdo_id' => $nbdo->id]);
        $this->set('nbdo', $nbdo);
        $this->set('items', $nbdo_items);
        $this->set('pic', $this->Auth->user('username'));
    }

    public function report(){
        $this->loadModel('NbdoItems');
        $nbdo = $this->Nbdo->find('all')
            ->where(['status' => 'approved']);
        foreach($nbdo as $n){
            $items = $this->NbdoItems->find('all')
                ->where(['nbdo_id' => $n->id]);
            $n->items = $items;
        }
        $this->set('nbdo', $nbdo);
    }

    public function statusReport(){
        $this->loadModel('NbdoItems');
        $nbdo = $this->Nbdo->find('all');
        foreach($nbdo as $n){
            $items = $this->NbdoItems->find('all')
                ->where(['nbdo_id' => $n->id]);
            $n->items = $items;
        }
        $this->set('nbdo', $nbdo);
    }

    public function isAuthorized($user){
        // All registered users can add articles
        if ($this->request->getParam('action') === 'index' || $this->request->getParam('action') === 'edit' || $this->request->getParam('action') === 'add' || $this->request->getParam('action') === 'edit' || $this->request->getParam('action') === 'verify' || $this->request->getParam('action') === 'approve' || $this->request->getParam('action') === 'statusReport' || $this->request->getParam('action') === 'report') {
            return true;
        }

        return parent::isAuthorized($user);

    }

}
