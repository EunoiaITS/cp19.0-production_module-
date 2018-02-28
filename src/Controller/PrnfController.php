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
        $prnf = $this->paginate($this->Prnf);

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
        $prnf = $this->Prnf->newEntity();
        if ($this->request->is('post')) {
//            $this->autoRender =false;
//            echo "<pre>";
//            print_r($this->request)->getData();
//            echo "</pre>";
            $prnf = $this->Prnf->patchEntity($prnf, $this->request->getData());
            if ($this->Prnf->save($prnf)) {
                $prnf_no = $this->Prnf->find('all', ['fields' => 'id'])->last();
                if ($this->request->getData('upload_file') != '') {
                    $fileName = $this->request->getData('upload_file');
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
                        $prnf->document = 'uploads/Prnf/'.$prnf_no['id'].'/'.$imageFileName;
                        $this->Prnf->save($prnf);
                    }
                }
                $this->Flash->success(__('The prnf has been saved.'));

                return $this->redirect(['action' => 'add']);
            }
            $this->Flash->error(__('The prnf could not be saved. Please, try again.'));
        }
        $this->set(compact('prnf'));
        $this->set('pic', $this->Auth->user('username'));
        $this->set('pic_name', $this->Auth->user('name'));
        $this->set('pic_dept', $this->Auth->user('dept'));
        $this->set('pic_section', $this->Auth->user('section'));
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
//        $this->autoRender = false;
//        echo "<pre>";
//        print_r($this->request)->getAll();
//        echo "</pre>";
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

        $this->set('prnf', $prnf);
    }
    public function approval1($id = null)
    {
        $prnf = $this->Prnf->get($id, [
            'contain' => []
        ]);

        $this->set('prnf', $prnf);
    }
    public function approval2($id = null)
    {
        $prnf = $this->Prnf->get($id, [
            'contain' => []
        ]);
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

    }
    public function approval3($id = null)
    {
        $prnf = $this->Prnf->get($id, [
            'contain' => []
        ]);
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
    }
    public function approval4($id = null)
    {
        $prnf = $this->Prnf->get($id, [
            'contain' => []
        ]);
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

    }
    public function report(){
        if($this->Auth->user('role') == 'requester'){
            $prnf = $this->Prnf->find('all')
                ->where(['status' => 'requested'])
                ->orWhere(['status' => 'rejected']);
        }
        if($this->Auth->user('role') == 'verifier'){
            $prnf = $this->Prnf->find('all')
                ->where(['status' => 'requested']);
        }

        if($this->Auth->user('role') == 'approve_1'){
            $prnf = $this->Prnf->find('all')
                ->where(['status' => 'verified']);
        }
        if($this->Auth->user('role') == 'approve_2'){
            $prnf = $this->Prnf->find('all')
                ->where(['status' => 'approved']);
        }
        if($this->Auth->user('role') == 'approve_3'){
            $prnf = $this->Prnf->find('all')
                ->where(['status' => 'approved1']);
        }
        if($this->Auth->user('role') == 'approve_4'){
            $prnf = $this->Prnf->find('all')
                ->where(['status' => 'approved2']);
        }

        $this->set(compact('prnf'));
    }

    public function isAuthorized($user){
        if ($this->request->getParam('action') === 'index' || $this->request->getParam('action') === 'report' || $this->request->getParam('action') === 'view') {
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
