<?php
namespace App\Controller;

use App\Controller\AppController;

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
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $serialNumber = $this->paginate($this->SerialNumber);

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
//        $this->autoRender=false;
//        echo "<pre>";
//        print_r($this->request);
//        echo "</pre>";
        $serialNumber = $this->SerialNumber->newEntity();
        if ($this->request->is('post')) {
            $serialNumber = $this->SerialNumber->patchEntity($serialNumber, $this->request->getData());
            if ($this->SerialNumber->save($serialNumber)) {
                $this->Flash->success(__('The serial number has been saved.'));

                return $this->redirect(['action' => 'add']);
            }
            $this->Flash->error(__('The serial number could not be saved. Please, try again.'));
        }
        $this->set(compact('serialNumber'));
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
}
