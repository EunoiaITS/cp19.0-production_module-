<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Wip Controller
 *
 * @property \App\Model\Table\WipTable $Wip
 *
 * @method \App\Model\Entity\Wip[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class WipController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $wip = $this->paginate($this->Wip);

        $this->set(compact('wip'));
    }

    /**
     * View method
     *
     * @param string|null $id Wip id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $wip = $this->Wip->get($id, [
            'contain' => ['WipSection']
        ]);

        $this->set('wip', $wip);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $wip = $this->Wip->newEntity();
        if ($this->request->is('post')) {
            $wip = $this->Wip->patchEntity($wip, $this->request->getData());
            if ($this->Wip->save($wip)) {
                $this->Flash->success(__('The wip has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The wip could not be saved. Please, try again.'));
        }
        $this->set(compact('wip'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Wip id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $wip = $this->Wip->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $wip = $this->Wip->patchEntity($wip, $this->request->getData());
            if ($this->Wip->save($wip)) {
                $this->Flash->success(__('The wip has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The wip could not be saved. Please, try again.'));
        }
        $this->set(compact('wip'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Wip id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $wip = $this->Wip->get($id);
        if ($this->Wip->delete($wip)) {
            $this->Flash->success(__('The wip has been deleted.'));
        } else {
            $this->Flash->error(__('The wip could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
