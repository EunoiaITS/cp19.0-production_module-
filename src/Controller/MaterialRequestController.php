<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;

/**
 * MaterialRequest Controller
 *
 * @property \App\Model\Table\MaterialRequestTable $MaterialRequest
 *
 * @method \App\Model\Entity\MaterialRequest[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MaterialRequestController extends AppController
{

    public $paginate = [
        // Other keys here.
        'maxLimit' => 10
    ];

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
        if($this->Auth->user('role') == 'requester'){
            $materialRequest = $this->paginate($this->MaterialRequest->find('all')
                ->where(['status' => 'requested']));
            $this->loadModel('MrItems');
            foreach ($materialRequest as $mr){
                $mr_items = $this->MrItems->find('all')
                    ->where(['mr_id' => $mr->id]);
                $mr->items = $mr_items;
            }
        }
        if($this->Auth->user('role') == 'verifier'){
            $materialRequest = $this->paginate($this->MaterialRequest->find('all')
                ->where(['status' => 'requested']));
            $this->loadModel('MrItems');
            foreach ($materialRequest as $mr){
                $mr_items = $this->MrItems->find('all')
                    ->where(['mr_id' => $mr->id]);
                $mr->items = $mr_items;
            }
        }

        if($this->Auth->user('role') == 'approve-1'){
            $materialRequest = $this->paginate($this->MaterialRequest->find('all')
                ->where(['status' => 'verified']));
            $this->loadModel('MrItems');
            foreach ($materialRequest as $mr){
                $mr_items = $this->MrItems->find('all')
                    ->where(['mr_id' => $mr->id]);
                $mr->items = $mr_items;
            }
        }
        if($this->Auth->user('role') == 'approve-2' || $this->Auth->user('role') == 'approve-3' || $this->Auth->user('role') == 'approve-4'){
            $this->redirect(array("controller" => "Dashboard", "action" => "index"));
        }

        $this->set(compact('materialRequest'));
    }

    /**
     * View method
     *
     * @param string|null $id Material Request id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $materialRequest = $this->MaterialRequest->get($id, [
            'contain' => []
        ]);

        $this->set('materialRequest', $materialRequest);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $urlToEng = 'http://engmodule.acumenits.com/api/all-parts';

        $optionsForEng = [
            'http' => [
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'GET'
            ]
        ];
        $contextForEng  = stream_context_create($optionsForEng);
        $resultFromEng = file_get_contents($urlToEng, false, $contextForEng);
        if ($resultFromEng === FALSE) {
            echo 'ERROR!!';
        }
        $dataFromEng = json_decode($resultFromEng);
        $part_no = $part_name = null;
        foreach($dataFromEng as $pm){
            $part_no .= '{label:"'.$pm->partNo.'",idx:"'.$pm->partName.'"},';
            $part_name .= '{label:"'.$pm->partName.'",idx:"'.$pm->partNo.'"},';
        }
        $part_no = rtrim($part_no, ',');
        $part_name = rtrim($part_name, ',');


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

        $so_no  = null;
        foreach ($dataFromSales as $d){
            $parts = '';
            foreach($d->soi as $item){
                $urlToEng = 'http://engmodule.acumenits.com/api/bom-parts';
                $sendToEng = [
                    'model' => $item->model,
                    'version' => $item->version
                ];
                $optionsForEng = [
                    'http' => [
                        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                        'method'  => 'POST',
                        'content' => http_build_query($sendToEng)
                    ]
                ];
                $contextForEng  = stream_context_create($optionsForEng);
                $resultFromEng = file_get_contents($urlToEng, false, $contextForEng);
                if ($resultFromEng !== FALSE) {
                    $dataFromEng = json_decode($resultFromEng);
                    foreach($dataFromEng as $eng){
                        $parts .= '{partNo:"'.$eng->partNo.'",partName:"'.$eng->partName.'"},';
                    }
                }
            }
            $so_no .= '{label:"'.$d->salesorder_no.'",parts:['.$parts.']},';
        }
        $so_no = rtrim($so_no, ',');
        $count = $this->MaterialRequest->find('all')->last();
        $materialRequest = $this->MaterialRequest->newEntity();
        if ($this->request->is('post')) {
            $materialRequest = $this->MaterialRequest->patchEntity($materialRequest, $this->request->getData());
            if ($this->MaterialRequest->save($materialRequest)) {
                $mr_no = $this->MaterialRequest->find('all', ['fields' => 'id'])->last();
                if($this->request->getData('total') != null){
                    $mrItem = TableRegistry::get('MrItems');
                    $itemData = array();
                    for($i = 0; $i < $this->request->getData('total'); $i++) {
                        if ($this->request->getData('select-'.$i) != '') {
                            $itemData[$i]['mr_id'] = $mr_no['id'];
                            $itemData[$i]['part_no'] = $this->request->getData('part_no' . $i);
                            $itemData[$i]['part_desc'] = $this->request->getData('part_desc' . $i);
                            $itemData[$i]['quantity'] = $this->request->getData('quantity' . $i);
                        }
                    }
                    $items = $mrItem->newEntities($itemData);
                    foreach($items as $item){
                        $mrItem->save($item);
                    }
                }

                $this->Flash->success(__('The material request has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The material request could not be saved. Please, try again.'));
        }
        $this->set(compact('materialRequest'));
        $this->set('sn_no', (isset($count->id) ? ($count->id + 1) : 1));
        $this->set('so_no',$so_no);
        $this->set('part_no', $part_no);
        $this->set('part_name', $part_name);
        $this->set('pic', $this->Auth->user('username'));
        $this->set('pic_name', $this->Auth->user('name'));
        $this->set('pic_dept', $this->Auth->user('dept'));
        $this->set('pic_section', $this->Auth->user('section'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Material Request id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $materialRequest = $this->MaterialRequest->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $materialRequest = $this->MaterialRequest->patchEntity($materialRequest, $this->request->getData());
            if ($this->MaterialRequest->save($materialRequest)) {
                $this->Flash->success(__('The material request has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The material request could not be saved. Please, try again.'));
        }
        $this->set(compact('materialRequest'));
    }
    public function reqEdit($id = null)
    {
        $urlToEng = 'http://engmodule.acumenits.com/api/all-parts';

        $optionsForEng = [
            'http' => [
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'GET'
            ]
        ];
        $contextForEng  = stream_context_create($optionsForEng);
        $resultFromEng = file_get_contents($urlToEng, false, $contextForEng);
        if ($resultFromEng === FALSE) {
            echo 'ERROR!!';
        }
        $dataFromEng = json_decode($resultFromEng);
        $part_no = $part_name = null;
        foreach($dataFromEng as $pm){
            $part_no .= '{label:"'.$pm->partNo.'",idx:"'.$pm->partName.'"},';
            $part_name .= '{label:"'.$pm->partName.'",idx:"'.$pm->partNo.'"},';
        }
        $part_no = rtrim($part_no, ',');
        $part_name = rtrim($part_name, ',');


        $materialRequest = $this->MaterialRequest->get($id, [
            'contain' => []
        ]);
        $this->loadModel('MrItems');
        $mr_items = $this->MrItems->find('all')
            ->where(['mr_id' => $materialRequest->id]);
        $materialRequest->items = $mr_items;
        if ($this->request->is(['post'])) {

            $materialRequest = $this->MaterialRequest->patchEntity($materialRequest, $this->request->getData());
            if ($this->MaterialRequest->save($materialRequest)) {
                $this->loadModel('MrItems');
                if($this->request->getData('total') != null){
                    $mrItem = TableRegistry::get('MrItems');
                    $itemData = array();
                    for($i = 0; $i <= $this->request->getData('total'); $i++) {
                        if ($this->request->getData('action' . $i) == 'edit') {
                            $mr_child = $this->MrItems->get($this->request->getData('item_id' . $i), [
                                'contain' => []
                            ]);
                            if ($this->request->getData('select-' . $i) != '') {
                                $mr_child->part_no = $this->request->getData('part_no' . $i);
                                $mr_child->part_desc = $this->request->getData('part_desc' . $i);
                                $mr_child->quantity = $this->request->getData('quantity' . $i);
                                $this->MrItems->save($mr_child);
                            }
                        }elseif ($this->request->getData('action' . $i) == 'add'){
                            if ($this->request->getData('select-' . $i) != '') {
                                $itemData[$i]['mr_id'] = $id;
                                $itemData[$i]['part_no'] = $this->request->getData('part_no' . $i);
                                $itemData[$i]['part_desc'] = $this->request->getData('part_desc' . $i);
                                $itemData[$i]['quantity'] = $this->request->getData('quantity' . $i);
                            }
                        }
                    }
                    $items = $mrItem->newEntities($itemData);
                    foreach($items as $item){
                        $mrItem->save($item);
                    }
                }
                $this->Flash->success(__('The material request has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The material request could not be saved. Please, try again.'));
        }
        $this->set('mr', $materialRequest);
        $this->set('part_no', $part_no);
        $this->set('part_name', $part_name);
        $this->set('pic', $this->Auth->user('username'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Material Request id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $materialRequest = $this->MaterialRequest->get($id);
        if ($this->MaterialRequest->delete($materialRequest)) {
            $this->Flash->success(__('The material request has been deleted.'));
        } else {
            $this->Flash->error(__('The material request could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function verify($id = null){
        $mr = $this->MaterialRequest->get($id, [
            'contain' => []
        ]);
        $this->loadModel('MrItems');
        $mr_items = $this->MrItems->find('all')
            ->where(['mr_id' => $mr->id]);
        $this->set('mr', $mr);
        $this->set('items', $mr_items);
        $this->set('pic', $this->Auth->user('username'));
    }

    public function approve($id = null){
        $mr = $this->MaterialRequest->get($id, [
            'contain' => []
        ]);
        $this->loadModel('MrItems');
        $mr_items = $this->MrItems->find('all')
            ->where(['mr_id' => $mr->id]);
        $this->set('mr', $mr);
        $this->set('items', $mr_items);
        $this->set('pic', $this->Auth->user('username'));
    }

    public function report(){
        $this->loadModel('MrItems');
        $mr = $this->paginate($this->MaterialRequest->find('all')
            ->where(['status' => 'approved']));
        foreach($mr as $m){
            $items = $this->MrItems->find('all')
                ->where(['mr_id' => $m->id]);
            $m->items = $items;
        }
        $this->set('mr', $mr);
    }

    public function statusReport(){
        $this->loadModel('MrItems');
        $mr = $this->paginate($this->MaterialRequest->find('all'));
        foreach($mr as $m){
            $items = $this->MrItems->find('all')
                ->where(['mr_id' => $m->id]);
            $m->items = $items;
        }
        $this->set('mr', $mr);
    }

    public function isAuthorized($user){
        if ($this->request->getParam('action') === 'index' || $this->request->getParam('action') === 'statusReport' || $this->request->getParam('action') === 'report' || $this->request->getParam('action') === 'reqEdit') {
            return true;
        }

        if(isset($user['role']) && $user['role'] === 'requester'){
            if(in_array($this->request->action, ['add','reqEdit'])){
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

        return parent::isAuthorized($user);

    }

}
