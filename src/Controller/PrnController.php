<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Prn Controller
 *
 * @property \App\Model\Table\PrnTable $Prn
 *
 * @method \App\Model\Entity\Prn[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PrnController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $prn = $this->paginate($this->Prn);

        $this->set(compact('prn'));
    }

    /**
     * View method
     *
     * @param string|null $id Prn id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $prn = $this->Prn->get($id, [
            'contain' => []
        ]);

        $this->set('prn', $prn);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $prn = $this->Prn->newEntity();
        if ($this->request->is('post')) {
            $prn = $this->Prn->patchEntity($prn, $this->request->getData());
            if ($this->Prn->save($prn)) {
                $this->Flash->success(__('The prn has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The prn could not be saved. Please, try again.'));
        }
        $this->set(compact('prn'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Prn id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $prn = $this->Prn->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $prn = $this->Prn->patchEntity($prn, $this->request->getData());
            if ($this->Prn->save($prn)) {
                $this->Flash->success(__('The prn has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The prn could not be saved. Please, try again.'));
        }
        $this->set(compact('prn'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Prn id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $prn = $this->Prn->get($id);
        if ($this->Prn->delete($prn)) {
            $this->Flash->success(__('The prn has been deleted.'));
        } else {
            $this->Flash->error(__('The prn could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
