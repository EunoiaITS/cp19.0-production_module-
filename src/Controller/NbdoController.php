<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Nbdo Controller
 *
 * @property \App\Model\Table\NbdoTable $Nbdo
 *
 * @method \App\Model\Entity\Nbdo[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class NbdoController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $nbdo = $this->paginate($this->Nbdo);

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
        $nbdo = $this->Nbdo->newEntity();
        if ($this->request->is('post')) {
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
}
