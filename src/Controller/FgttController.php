<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Fgtt Controller
 *
 * @property \App\Model\Table\FgttTable $Fgtt
 *
 * @method \App\Model\Entity\Fgtt[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FgttController extends AppController
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
        $fgtt = $this->paginate($this->Fgtt);

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

        $this->set('fgtt', $fgtt);
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
        $sos = $this->SerialNumber->find('all');
        $so_nos = null;
        foreach($sos as $ss){
            $csn_items = $this->SerialNumberChild->find('all')
                ->where(['serial_number_id' => $ss->id]);
            $so_nos .= '{label:"'.$ss->so_no.'",idx:"'.$ss->quantity.'",model:"'.$ss->model.'",version:"'.$ss->version.'",type_1:"'.$ss->type1.'",type_2:"'.$ss->type2.'"';
            $count = 0;
            $so_items = null;
            foreach($csn_items as $item){
                $so_items .= '"'.$item->id.'",';
                $count++;
            }
            $so_items = rtrim($so_items, ',');
            $so_nos .= ',items:['.$so_items.']},';
        }
        $so_nos = rtrim($so_nos, ',');
        $count = $this->Fgtt->find('all')->last();
        $fgtt = $this->Fgtt->newEntity();
        if ($this->request->is('post')) {
            $fgtt = $this->Fgtt->patchEntity($fgtt, $this->request->getData());
            if ($this->Fgtt->save($fgtt)) {
                $this->Flash->success(__('The fgtt has been saved.'));

                return $this->redirect(['action' => 'add']);
            }
            $this->Flash->error(__('The fgtt could not be saved. Please, try again.'));
        }
        $this->set(compact('fgtt'));
        $this->set('so_nos', $so_nos);
        $this->set('fgtt_no', (isset($count->id) ? ($count->id + 1) : 1));
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
        $fgtt_details = $this->SerialNumber->find('all')
            ->where(['so_no' => $fgtt->so_no]);
        foreach($fgtt_details as $f){
            $fgtt->quantity = $f->quantity;
            $fgtt->model = $f->model;
            $fgtt->version = $f->version;
            $fgtt->type1 = $f->type1;
            $fgtt->type2 = $f->type2;
            $allItems = $this->SerialNumberChild->find('all')
                ->where(['serial_number_id' => $f->id]);
        }
        $this->set('fgtt', $fgtt);
        $this->set('items', $allItems);
    }

    public function approve($id = null){
        $fgtt = $this->Fgtt->get($id, [
            'contain' => []
        ]);
        $this->loadModel('SerialNumber');
        $this->loadModel('SerialNumberChild');
        $fgtt_details = $this->SerialNumber->find('all')
            ->where(['so_no' => $fgtt->so_no]);
        foreach($fgtt_details as $f){
            $fgtt->quantity = $f->quantity;
            $fgtt->model = $f->model;
            $fgtt->version = $f->version;
            $fgtt->type1 = $f->type1;
            $fgtt->type2 = $f->type2;
            $allItems = $this->SerialNumberChild->find('all')
                ->where(['serial_number_id' => $f->id]);
        }
        $this->set('fgtt', $fgtt);
        $this->set('items', $allItems);
    }

    public function report(){
        $fgtt = $this->Fgtt->find('all');
        $this->set('fgtt', $fgtt);
    }

}
