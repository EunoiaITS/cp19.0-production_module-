<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Wp Controller
 *
 * @property \App\Model\Table\WpTable $Wp
 *
 * @method \App\Model\Entity\Wp[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class WpController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $wp = $this->paginate($this->Wp);

        $this->set(compact('wp'));
    }

    /**
     * View method
     *
     * @param string|null $id Wp id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $wp = $this->Wp->get($id, [
            'contain' => []
        ]);

        $this->set('wp', $wp);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $wp = $this->Wp->newEntity();
        if ($this->request->is('post')) {
            $wp = $this->Wp->patchEntity($wp, $this->request->getData());
            if ($this->Wp->save($wp)) {
                $this->Flash->success(__('The wp has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The wp could not be saved. Please, try again.'));
        }
        $this->set(compact('wp'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Wp id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $wp = $this->Wp->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $wp = $this->Wp->patchEntity($wp, $this->request->getData());
            if ($this->Wp->save($wp)) {
                $this->Flash->success(__('The wp has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The wp could not be saved. Please, try again.'));
        }
        $this->set(compact('wp'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Wp id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $wp = $this->Wp->get($id);
        if ($this->Wp->delete($wp)) {
            $this->Flash->success(__('The wp has been deleted.'));
        } else {
            $this->Flash->error(__('The wp could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
