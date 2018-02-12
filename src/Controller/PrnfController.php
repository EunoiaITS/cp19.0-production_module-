<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

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
                if ($this->request->getData('approved2_document') != '') {
                    $fileName = $this->request->getData('approved2_document');
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
                if ($this->request->getData('approved3_document') != '') {
                    $fileName = $this->request->getData('approved3_document');
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
                if ($this->request->getData('approved4_document') != '') {
                    $fileName = $this->request->getData('approved4_document');
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
                $this->Flash->success(__('Approval has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Approval could not be saved. Please, try again.'));
        }
        $this->set(compact('prnf'));

    }
    public function report(){
        $prnf = $this->Prnf->find('all');
        $this->set('prnf', $prnf);
    }

}
