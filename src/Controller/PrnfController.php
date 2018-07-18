<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;

/**
 * Prnf Controller
 *
 * @property \App\Model\Table\PrnfTable $Prnf
 *
 * @method \App\Model\Entity\Prnf[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PrnfController extends AppController
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
            $prnf = $this->paginate($this->Prnf->find('all')
                ->where(['status' => 'requested']));
            foreach ($prnf as $pr){
                $this->loadModel('PrnfItems');
                $items = $this->PrnfItems->find('all')
                    ->where(['prnf_id'=> $pr->id]);
                $pr->items = $items;
            }
        }
        if($this->Auth->user('role') == 'verifier'){
            $prnf = $this->paginate($this->Prnf->find('all')
                ->where(['status' => 'requested']));
            foreach ($prnf as $pr){
                $this->loadModel('PrnfItems');
                $items = $this->PrnfItems->find('all')
                    ->where(['prnf_id'=> $pr->id]);
                $pr->items = $items;
            }
        }
        if($this->Auth->user('role') == 'approve-1'){
            $prnf = $this->paginate($this->Prnf->find('all')
                ->where(['status' => 'verified']));
            foreach ($prnf as $pr){
                $this->loadModel('PrnfItems');
                $items = $this->PrnfItems->find('all')
                    ->where(['prnf_id'=> $pr->id]);
                $pr->items = $items;
            }
        }
        if($this->Auth->user('role') == 'approve-2'){
            $prnf = $this->paginate($this->Prnf->find('all')
                ->where(['status' => 'approved']));
            foreach ($prnf as $pr){
                $this->loadModel('PrnfItems');
                $items = $this->PrnfItems->find('all')
                    ->where(['prnf_id'=> $pr->id]);
                $pr->items = $items;
            }
        }
        if($this->Auth->user('role') == 'approve-3'){
            $prnf = $this->paginate($this->Prnf->find('all')
                ->where(['status' => 'approved1']));
            foreach ($prnf as $pr){
                $this->loadModel('PrnfItems');
                $items = $this->PrnfItems->find('all')
                    ->where(['prnf_id'=> $pr->id]);
                $pr->items = $items;
            }
        }
        if($this->Auth->user('role') == 'approve-4'){
            $prnf = $this->paginate($this->Prnf->find('all')
                ->where(['status' => 'approved2']));
            foreach ($prnf as $pr){
                $this->loadModel('PrnfItems');
                $items = $this->PrnfItems->find('all')
                    ->where(['prnf_id'=> $pr->id]);
                $pr->items = $items;
            }
    }

        $this->set(compact('prnf'));
    }

    /**
     * View method
     *
     * @param string|null $id Prnf id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $prnf = $this->Prnf->get($id, [
            'contain' => []
        ]);

        $this->set('prnf', $prnf);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
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

        $so_no  = null;
        foreach ($dataFromSales as $d){
            $parts = '';
            foreach($d->soi as $item){
                $urlToEng = 'http://engmodule.acumenits.com/api/bom-parts';
                $sendToEng = [
                    'model' => $item->model,
                    'version' => $item->version
                ];
                $optionsForEng = [
                    'http' => [
                        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                        'method'  => 'POST',
                        'content' => http_build_query($sendToEng)
                    ]
                ];
                $contextForEng  = stream_context_create($optionsForEng);
                $resultFromEng = file_get_contents($urlToEng, false, $contextForEng);
                if ($resultFromEng !== FALSE) {
                    $dataFromEng = json_decode($resultFromEng);
                    foreach($dataFromEng as $eng){
                        $parts .= '{partNo:"'.$eng->partNo.'",partName:"'.$eng->partName.'",quantity:"'.$eng->quality.'"},';
                    }
                }
            }
            $so_no .= '{label:"'.$d->salesorder_no.'",parts:['.$parts.']},';
        }
        $so_no = rtrim($so_no, ',');
        $this->loadModel('PrnfItems');
        $count = $this->Prnf->find('all')->last();
        $prnf = $this->Prnf->newEntity();
        if ($this->request->is('post')) {
            $prnf = $this->Prnf->patchEntity($prnf, $this->request->getData());
            if ($this->Prnf->save($prnf)) {
                $prnf_no = $this->Prnf->find('all', ['fields' => 'id'])->last();
                if($this->request->getData('total') != null){
                    $prnfItem = TableRegistry::get('PrnfItems');
                    $itemData = array();
                    for($i = 0; $i < $this->request->getData('total'); $i++) {
                        if ($this->request->getData('select-'.$i) != '') {
                            $itemData[$i]['prnf_id'] = $prnf_no['id'];
                            $itemData[$i]['part_no'] = $this->request->getData('part_no' . $i);
                            $itemData[$i]['part_name'] = $this->request->getData('part_name' . $i);
                            $itemData[$i]['quantity'] = $this->request->getData('quantity' . $i);
                            $itemData[$i]['description'] = $this->request->getData('description' . $i);
                            $itemData[$i]['reason'] = $this->request->getData('reason' . $i);
                            $itemData[$i]['remark'] = $this->request->getData('remark' . $i);
                            if ($this->request->getData('upload_file'.$i) != '') {
                                $fileName = $this->request->getData('upload_file'.$i);
                                $ext = substr(strtolower(strrchr($fileName['name'], '.')), 1);
                                $arr_ext = array('jpg', 'jpeg', 'gif', 'png');
                                $setNewFileName = 'uploadedFile';
                                $imageFileName = $setNewFileName . '.' . $ext;
                                $uploadPath = WWW_ROOT . 'uploads/Prnf/' . $prnf_no['id'] . '/';
                                if (!file_exists($uploadPath)) {
                                    mkdir($uploadPath);
                                }
                                $uploadFile = $uploadPath.$imageFileName;
                                if (move_uploaded_file($fileName['tmp_name'], $uploadFile)) {
                                    $itemData[$i]['document'] = 'uploads/Prnf/'.$prnf_no['id'].'/'.$imageFileName;
                                }
                            }
                        }
                    }
                    $items = $prnfItem->newEntities($itemData);
                    foreach($items as $item){
                        $prnfItem->save($item);
                    }
                }
                $this->Flash->success(__('The prnf has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The prnf could not be saved. Please, try again.'));
        }
        $this->set(compact('prnf'));
        $this->set('so_no',$so_no);
        $this->set('pic', $this->Auth->user('username'));
        $this->set('pic_name', $this->Auth->user('name'));
        $this->set('pic_dept', $this->Auth->user('dept'));
        $this->set('pic_section', $this->Auth->user('section'));
        $this->set('sn_no', (isset($count->id) ? ($count->id + 1) : 1));
    }

    /**
     * Edit method
     *
     * @param string|null $id Prnf id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $prnf = $this->Prnf->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $prnf = $this->Prnf->patchEntity($prnf, $this->request->getData());
            if ($this->Prnf->save($prnf)) {
                $this->Flash->success(__('The prnf has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The prnf could not be saved. Please, try again.'));
        }
        $this->set(compact('prnf'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Prnf id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $prnf = $this->Prnf->get($id);
        if ($this->Prnf->delete($prnf)) {
            $this->Flash->success(__('The prnf has been deleted.'));
        } else {
            $this->Flash->error(__('The prnf could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    public function verify($id = null)
    {
        $prnf = $this->Prnf->get($id, [
            'contain' => []
        ]);
        $this->loadModel('PrnfItems');
        $items = $this->PrnfItems->find('all')
            ->where(['prnf_id'=> $id]);
        $this->set('pic', $this->Auth->user('username'));
        $this->set('prnf', $prnf);
        $this->set('items', $items);
    }
    public function approval1($id = null)
    {
        $prnf = $this->Prnf->get($id, [
            'contain' => []
        ]);
        $this->loadModel('PrnfItems');
        $items = $this->PrnfItems->find('all')
            ->where(['prnf_id'=> $id]);

        $this->set('items', $items);
        $this->set('pic', $this->Auth->user('username'));
        $this->set('prnf', $prnf);
    }
    public function approval2($id = null)
    {
        $prnf = $this->Prnf->get($id, [
            'contain' => []
        ]);
        $this->loadModel('PrnfItems');
        $items = $this->PrnfItems->find('all')
            ->where(['prnf_id'=> $id]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $prnf = $this->Prnf->patchEntity($prnf, $this->request->getData());
            if ($this->Prnf->save($prnf)) {
                $prnf_no = $this->Prnf->find('all', ['fields' => 'id'])->last();
                if ($this->request->getData('approved2_doc') != '') {
                    $fileName = $this->request->getData('approved2_doc');
                    $ext = substr(strtolower(strrchr($fileName['name'], '.')), 1);
                    $arr_ext = array('jpg', 'jpeg', 'gif', 'png');
                    $setNewFileName = 'uploadedFile';
                    $imageFileName = $setNewFileName . '.' . $ext;
                    $uploadPath = WWW_ROOT . 'uploads/Prnf/' . $prnf_no['id'] . '/';
                    if (!file_exists($uploadPath)) {
                        mkdir($uploadPath);
                    }
                    $uploadFile = $uploadPath.$imageFileName;
                    if (move_uploaded_file($fileName['tmp_name'], $uploadFile)) {
                        $prnf->approved2_document = 'uploads/Prnf/'.$prnf_no['id'].'/'.$imageFileName;
                        $this->Prnf->save($prnf);
                    }
                }
                $this->Flash->success(__('Approval has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Approval could not be saved. Please, try again.'));
        }
        $this->set(compact('prnf'));
        $this->set('items', $items);
        $this->set('pic', $this->Auth->user('username'));

    }
    public function approval3($id = null)
    {
        $prnf = $this->Prnf->get($id, [
            'contain' => []
        ]);
        $this->loadModel('PrnfItems');
        $items = $this->PrnfItems->find('all')
            ->where(['prnf_id'=> $id]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $prnf = $this->Prnf->patchEntity($prnf, $this->request->getData());
            if ($this->Prnf->save($prnf)) {
                $prnf_no = $this->Prnf->find('all', ['fields' => 'id'])->last();
                if ($this->request->getData('approved3_doc') != '') {
                    $fileName = $this->request->getData('approved3_doc');
                    $ext = substr(strtolower(strrchr($fileName['name'], '.')), 1);
                    $arr_ext = array('jpg', 'jpeg', 'gif', 'png');
                    $setNewFileName = 'uploadedFile';
                    $imageFileName = $setNewFileName . '.' . $ext;
                    $uploadPath = WWW_ROOT . 'uploads/Prnf/' . $prnf_no['id'] . '/';
                    if (!file_exists($uploadPath)) {
                        mkdir($uploadPath);
                    }
                    $uploadFile = $uploadPath.$imageFileName;
                    if (move_uploaded_file($fileName['tmp_name'], $uploadFile)) {
                        $prnf->approved3_document = 'uploads/Prnf/'.$prnf_no['id'].'/'.$imageFileName;
                        $this->Prnf->save($prnf);
                    }
                }
                $this->Flash->success(__('Approval has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Approval could not be saved. Please, try again.'));
        }
        $this->set(compact('prnf'));
        $this->set('items', $items);
        $this->set('pic', $this->Auth->user('username'));
    }
    public function approval4($id = null)
    {
        $prnf = $this->Prnf->get($id, [
            'contain' => []
        ]);
        $this->loadModel('PrnfItems');
        $items = $this->PrnfItems->find('all')
            ->where(['prnf_id'=> $id]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $prnf = $this->Prnf->patchEntity($prnf, $this->request->getData());
            if ($this->Prnf->save($prnf)) {
                $prnf_no = $this->Prnf->find('all', ['fields' => 'id'])->last();
                if ($this->request->getData('approved4_doc') != '') {
                    $fileName = $this->request->getData('approved4_doc');
                    $ext = substr(strtolower(strrchr($fileName['name'], '.')), 1);
                    $arr_ext = array('jpg', 'jpeg', 'gif', 'png');
                    $setNewFileName = 'uploadedFile';
                    $imageFileName = $setNewFileName . '.' . $ext;
                    $uploadPath = WWW_ROOT . 'uploads/Prnf/' . $prnf_no['id'] . '/';
                    if (!file_exists($uploadPath)) {
                        mkdir($uploadPath);
                    }
                    $uploadFile = $uploadPath.$imageFileName;
                    if (move_uploaded_file($fileName['tmp_name'], $uploadFile)) {
                        $prnf->approved4_document = 'uploads/Prnf/'.$prnf_no['id'].'/'.$imageFileName;
                        $this->Prnf->save($prnf);
                    }
                }
                $this->Flash->success(__('Approval has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Approval could not be saved. Please, try again.'));
        }
        $this->set(compact('prnf'));
        $this->set('items', $items);
        $this->set('pic', $this->Auth->user('username'));

    }
    public function statusReport(){
        $prnf = $this->Prnf->find('all');
        $this->set('prnf',$prnf);
    }
    public function report(){
        $prnf = $this->Prnf->find('all')
            ->Where(['status'=>'approved3']);
        $this->set('prnf',$prnf);
    }

    public function isAuthorized($user){
        if ($this->request->getParam('action') === 'index' || $this->request->getParam('action') === 'statusReport' || $this->request->getParam('action') === 'view' || $this->request->getParam('action') === 'report') {
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
            if(in_array($this->request->action, ['approval1', 'edit'])){
                return true;
            }
        }
        if(isset($user['role']) && $user['role'] === 'approve-2'){
            if(in_array($this->request->action, ['approval2', 'edit'])){
                return true;
            }
        }
        if(isset($user['role']) && $user['role'] === 'approve-3'){
            if(in_array($this->request->action, ['approval3', 'edit'])){
                return true;
            }
        }
        if(isset($user['role']) && $user['role'] === 'approve-4'){
            if(in_array($this->request->action, ['approval4', 'edit'])){
                return true;
            }
        }
        return parent::isAuthorized($user);
    }

}
