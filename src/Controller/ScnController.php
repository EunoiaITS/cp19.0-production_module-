<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Scn Controller
 *
 * @property \App\Model\Table\ScnTable $Scn
 *
 * @method \App\Model\Entity\Scn[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ScnController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $scn = $this->paginate($this->Scn);

        $this->set(compact('scn'));
    }

    /**
     * View method
     *
     * @param string|null $id Scn id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $scn = $this->Scn->get($id, [
            'contain' => ['ScnItems']
        ]);

        $this->set('scn', $scn);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $scn = $this->Scn->newEntity();
        if ($this->request->is('post')) {
            $scn = $this->Scn->patchEntity($scn, $this->request->getData());
            if ($this->Scn->save($scn)) {
                $this->Flash->success(__('The scn has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The scn could not be saved. Please, try again.'));
        }
        $this->set(compact('scn'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Scn id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $scn = $this->Scn->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $scn = $this->Scn->patchEntity($scn, $this->request->getData());
            if ($this->Scn->save($scn)) {
                $this->Flash->success(__('The scn has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The scn could not be saved. Please, try again.'));
        }
        $this->set(compact('scn'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Scn id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $scn = $this->Scn->get($id);
        if ($this->Scn->delete($scn)) {
            $this->Flash->success(__('The scn has been deleted.'));
        } else {
            $this->Flash->error(__('The scn could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
