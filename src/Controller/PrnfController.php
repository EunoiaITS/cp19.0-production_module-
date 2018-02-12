<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Prnf Controller
 *
 * @property \App\Model\Table\PrnfTable $Prnf
 *
 * @method \App\Model\Entity\Prnf[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PrnfController extends AppController
{

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
}
