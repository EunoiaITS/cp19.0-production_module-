<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Ps Controller
 *
 * @property \App\Model\Table\PsTable $Ps
 *
 * @method \App\Model\Entity\P[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $ps = $this->paginate($this->Ps);

        $this->set(compact('ps'));
    }

    /**
     * View method
     *
     * @param string|null $id P id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $p = $this->Ps->get($id, [
            'contain' => []
        ]);

        $this->set('p', $p);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $p = $this->Ps->newEntity();
        if ($this->request->is('post')) {
            $p = $this->Ps->patchEntity($p, $this->request->getData());
            if ($this->Ps->save($p)) {
                $this->Flash->success(__('The p has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The p could not be saved. Please, try again.'));
        }
        $this->set(compact('p'));
    }

    /**
     * Edit method
     *
     * @param string|null $id P id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $p = $this->Ps->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $p = $this->Ps->patchEntity($p, $this->request->getData());
            if ($this->Ps->save($p)) {
                $this->Flash->success(__('The p has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The p could not be saved. Please, try again.'));
        }
        $this->set(compact('p'));
    }

    /**
     * Delete method
     *
     * @param string|null $id P id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $p = $this->Ps->get($id);
        if ($this->Ps->delete($p)) {
            $this->Flash->success(__('The p has been deleted.'));
        } else {
            $this->Flash->error(__('The p could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
