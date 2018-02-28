<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Mit Controller
 *
 * @property \App\Model\Table\MitTable $Mit
 *
 * @method \App\Model\Entity\Mit[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MitController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->viewBuilder()->setLayout('mainframe');// TODO: Change the autogenerated stub
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $urlToSales = 'http://salesmodule.acumenits.com/api/all-data';

        $optionsForSales = [
            'http' => [
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'GET'
            ]
        ];
        $contextForSales  = stream_context_create($optionsForSales);
        $resultFromSales = file_get_contents($urlToSales, false, $contextForSales);
        if ($resultFromSales === FALSE) {
            echo 'ERROR!!';
        }
        $dataFromSales = json_decode($resultFromSales);
        $this->set('sales',$dataFromSales);
    }

    /**
     * View method
     *
     * @param string|null $id Mit id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view()
    {
        $urlToSales = 'http://salesmodule.acumenits.com/api/all-data';

        $optionsForSales = [
            'http' => [
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'GET'
            ]
        ];
        $contextForSales  = stream_context_create($optionsForSales);
        $resultFromSales = file_get_contents($urlToSales, false, $contextForSales);
        if ($resultFromSales === FALSE) {
            echo 'ERROR!!';
        }
        $dataFromSales = json_decode($resultFromSales);
        $this->set('sales',$dataFromSales);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($id = null)
    {
        $urlToSales = 'http://salesmodule.acumenits.com/api/item-details/'.$id;

        $optionsForSales = [
            'http' => [
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'GET'
            ]
        ];
        $contextForSales  = stream_context_create($optionsForSales);
        $resultFromSales = file_get_contents($urlToSales, false, $contextForSales);
        if ($resultFromSales === FALSE) {
            echo 'ERROR!!';
        }
        $dataFromSales = json_decode($resultFromSales);

        $urlToEng = 'http://engmodule.acumenits.com/api/bom-parts';
        $sendToEng['model']=$dataFromSales->model;
        $sendToEng['version']=$dataFromSales->version;
        $optionsForEng = [
            'http' => [
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($sendToEng)
            ]
        ];
        $contextForEng  = stream_context_create($optionsForEng);
        $resultFromEng = file_get_contents($urlToEng, false, $contextForEng);
        if ($resultFromEng === FALSE) {
            echo 'ERROR!!';
        }
        $dataFromEng = json_decode($resultFromEng);
        $this->loadModel('Inventory');
        foreach ($dataFromEng as $data){
            $inv = $this->Inventory->find('all')
                ->Where(['part_no'=> $data->partNo])
                ->Where(['part_name'=> $data->partName]);
        }
        $mit = $this->Mit->newEntity();
        if ($this->request->is('post')) {
            $mit = $this->Mit->patchEntity($mit, $this->request->getData());
            if ($this->Mit->save($mit)) {
                $this->Flash->success(__('The mit has been saved.'));

                return $this->redirect(['action' => 'add',$id]);
            }
            $this->Flash->error(__('The mit could not be saved. Please, try again.'));
        }
        $this->set(compact('mit'));
        $this->set('eng',$dataFromEng);
        $this->set('sales',$dataFromSales);
        $this->set('inv',$inv);
        $this->set('pic', $this->Auth->user('username'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Mit id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $mit = $this->Mit->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $mit = $this->Mit->patchEntity($mit, $this->request->getData());
            if ($this->Mit->save($mit)) {
                $this->Flash->success(__('The mit has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The mit could not be saved. Please, try again.'));
        }
        $this->set(compact('mit'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Mit id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $mit = $this->Mit->get($id);
        if ($this->Mit->delete($mit)) {
            $this->Flash->success(__('The mit has been deleted.'));
        } else {
            $this->Flash->error(__('The mit could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function verify($id = null){
        $urlToSales = 'http://salesmodule.acumenits.com/api/item-details/'.$id;

        $optionsForSales = [
            'http' => [
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'GET'
            ]
        ];
        $contextForSales  = stream_context_create($optionsForSales);
        $resultFromSales = file_get_contents($urlToSales, false, $contextForSales);
        if ($resultFromSales === FALSE) {
            echo 'ERROR!!';
        }
        $dataFromSales = json_decode($resultFromSales);

        $urlToEng = 'http://engmodule.acumenits.com/api/bom-parts';
        $sendToEng['model']=$dataFromSales->model;
        $sendToEng['version']=$dataFromSales->version;
        $optionsForEng = [
            'http' => [
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($sendToEng)
            ]
        ];
        $contextForEng  = stream_context_create($optionsForEng);
        $resultFromEng = file_get_contents($urlToEng, false, $contextForEng);
        if ($resultFromEng === FALSE) {
            echo 'ERROR!!';
        }
        $dataFromEng = json_decode($resultFromEng);
        $mit = $this->Mit->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $mit = $this->Mit->patchEntity($mit, $this->request->getData());
            if ($this->Mit->save($mit)) {
                $this->Flash->success(__('The mit has been saved.'));

                return $this->redirect(['action' => 'verify',$id]);
            }
            $this->Flash->error(__('The mit could not be saved. Please, try again.'));
        }
        $this->set(compact('mit'));
        $this->set('eng',$dataFromEng);
        $this->set('sales',$dataFromSales);
        $this->set('pic', $this->Auth->user('username'));
    }

    public function approval($id = null){
        $urlToSales = 'http://salesmodule.acumenits.com/api/item-details/'.$id;

        $optionsForSales = [
            'http' => [
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'GET'
            ]
        ];
        $contextForSales  = stream_context_create($optionsForSales);
        $resultFromSales = file_get_contents($urlToSales, false, $contextForSales);
        if ($resultFromSales === FALSE) {
            echo 'ERROR!!';
        }
        $dataFromSales = json_decode($resultFromSales);

        $urlToEng = 'http://engmodule.acumenits.com/api/bom-parts';
        $sendToEng['model']=$dataFromSales->model;
        $sendToEng['version']=$dataFromSales->version;
        $optionsForEng = [
            'http' => [
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($sendToEng)
            ]
        ];
        $contextForEng  = stream_context_create($optionsForEng);
        $resultFromEng = file_get_contents($urlToEng, false, $contextForEng);
        if ($resultFromEng === FALSE) {
            echo 'ERROR!!';
        }
        $dataFromEng = json_decode($resultFromEng);
        $mit = $this->Mit->newEntity();
        if ($this->request->is('post')) {
            $mit = $this->Mit->patchEntity($mit, $this->request->getData());
            if ($this->Mit->save($mit)) {
                $this->Flash->success(__('The mit has been saved.'));

                return $this->redirect(['action' => 'add',$id]);
            }
            $this->Flash->error(__('The mit could not be saved. Please, try again.'));
        }
        $this->set(compact('mit'));
        $this->set('eng',$dataFromEng);
        $this->set('sales',$dataFromSales);
        $this->set('pic', $this->Auth->user('username'));
    }

    public function acknowledge($id = null){
        $this->loadModel('Mit');
        $urlToSales = 'http://salesmodule.acumenits.com/api/all-data';

        $optionsForSales = [
            'http' => [
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'GET'
            ]
        ];
        $contextForSales  = stream_context_create($optionsForSales);
        $resultFromSales = file_get_contents($urlToSales, false, $contextForSales);
        if ($resultFromSales === FALSE) {
            echo 'ERROR!!';
        }
        $dataFromSales = json_decode($resultFromSales);
        $status = $this->Mit->find('all')
            ->Where(['so_item_id' => $id]);
        $this->set('sales',$dataFromSales);
        $this->set('status',$status);
        $this->set('pic', $this->Auth->user('username'));
    }

    public function acknowledgeVerify($id=null){
        $urlToSales = 'http://salesmodule.acumenits.com/api/item-details/'.$id;

        $optionsForSales = [
            'http' => [
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'GET'
            ]
        ];
        $contextForSales  = stream_context_create($optionsForSales);
        $resultFromSales = file_get_contents($urlToSales, false, $contextForSales);
        if ($resultFromSales === FALSE) {
            echo 'ERROR!!';
        }
        $dataFromSales = json_decode($resultFromSales);

        $urlToEng = 'http://engmodule.acumenits.com/api/bom-parts';
        $sendToEng['model']=$dataFromSales->model;
        $sendToEng['version']=$dataFromSales->version;
        $optionsForEng = [
            'http' => [
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($sendToEng)
            ]
        ];
        $contextForEng  = stream_context_create($optionsForEng);
        $resultFromEng = file_get_contents($urlToEng, false, $contextForEng);
        if ($resultFromEng === FALSE) {
            echo 'ERROR!!';
        }
        $dataFromEng = json_decode($resultFromEng);
        $mit = $this->Mit->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $mit = $this->Mit->patchEntity($mit, $this->request->getData());
            if ($this->Mit->save($mit)) {
                $this->Flash->success(__('The mit has been saved.'));

                return $this->redirect(['action' => 'acknowledge',$id]);
            }
            $this->Flash->error(__('The mit could not be saved. Please, try again.'));
        }
        $this->set(compact('mit'));
        $this->set('eng',$dataFromEng);
        $this->set('sales',$dataFromSales);
        $this->set('pic', $this->Auth->user('username'));
    }
    public function report(){
        $urlToSales = 'http://salesmodule.acumenits.com/api/all-data';

        $optionsForSales = [
            'http' => [
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'GET'
            ]
        ];
        $contextForSales  = stream_context_create($optionsForSales);
        $resultFromSales = file_get_contents($urlToSales, false, $contextForSales);
        if ($resultFromSales === FALSE) {
            echo 'ERROR!!';
        }
        $dataFromSales = json_decode($resultFromSales);
        $this->set('sales',$dataFromSales);
    }
    public function request(){
        if($this->Auth->user('role') == 'requester'){
            $mit = $this->Mit->find('all')
                ->where(['status' => 'requested']);
        }
        if($this->Auth->user('role') == 'verifier'){
            $mit = $this->Mit->find('all')
                ->where(['status' => 'requested']);
        }

        if($this->Auth->user('role') == 'approve_1'){
            $mit = $this->Mit->find('all')
                ->where(['status' => 'verified']);
        }
        if($this->Auth->user('role') == 'approve_2'){
            $mit = $this->Mit->find('all')
                ->where(['status' => 'approved']);
        }
        if($this->Auth->user('role') == 'approve_3'){
            $mit = $this->Mit->find('all')
                ->where(['status' => 'acknowledged']);
        }
        $this->set(compact('mit'));
    }

    public function isAuthorized($user){
        if ($this->request->getParam('action') === 'index' || $this->request->getParam('action') === 'report' || $this->request->getParam('action') === 'request' || $this->request->getParam('action') === 'view') {
            return true;
        }
        if(isset($user['role']) && $user['role'] === 'requester'){
            if(in_array($this->request->action, ['add'])){
                return true;
            }
        }
        if(isset($user['role']) && $user['role'] === 'verifier'){
            if(in_array($this->request->action, ['verify', 'edit'])){
                return true;
            }
        }
        if(isset($user['role']) && $user['role'] === 'approve-1'){
            if(in_array($this->request->action, ['approve', 'edit'])){
                return true;
            }
        }
        if(isset($user['role']) && $user['role'] === 'approve-2'){
            if(in_array($this->request->action, ['acknowledge', 'edit'])){
                return true;
            }
        }
        if(isset($user['role']) && $user['role'] === 'approve-3'){
            if(in_array($this->request->action, ['acknowledgeVerify', 'edit'])){
                return true;
            }
        }
        return parent::isAuthorized($user);
    }
}
