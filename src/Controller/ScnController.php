<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;
/**
 * Scn Controller
 *
 * @property \App\Model\Table\ScnTable $Scn
 *
 * @method \App\Model\Entity\Scn[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ScnController extends AppController
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
            $scn = $this->paginate($this->Scn->find('all')
                ->where(['status' => 'requested']));
            $this->loadModel('ScnItems');
            foreach ($scn as $s){
                $scn_items = $this->ScnItems->find('all')
                    ->where(['scn_id' => $s->id]);
                $s->items = $scn_items;
            }
        }

        if($this->Auth->user('role') == 'verifier'){
            $scn = $this->paginate($this->Scn->find('all')
                ->where(['status' => 'requested']));
            $this->loadModel('ScnItems');
            foreach ($scn as $s){
                $scn_items = $this->ScnItems->find('all')
                    ->where(['scn_id' => $s->id]);
                $s->items = $scn_items;
            }
        }

        if($this->Auth->user('role') == 'approve-1'){
            $scn = $this->paginate($this->Scn->find('all')
                ->where(['status' => 'verified']));
            $this->loadModel('ScnItems');
            foreach ($scn as $s){
                $scn_items = $this->ScnItems->find('all')
                    ->where(['scn_id' => $s->id]);
                $s->items = $scn_items;
            }
        }
        if($this->Auth->user('role') == 'approve-2'){
            $scn = $this->paginate($this->Scn->find('all')
                ->where(['status' => 'approved-1']));
            $this->loadModel('ScnItems');
            foreach ($scn as $s){
                $scn_items = $this->ScnItems->find('all')
                    ->where(['scn_id' => $s->id]);
                $s->items = $scn_items;
            }
        }
        if($this->Auth->user('role') == 'approve-3' || $this->Auth->user('role') == 'approve-4'){
            $this->redirect(array("controller" => "Dashboard", "action" => "index"));
        }

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
                        $parts .= '{partNo:"'.$eng->partNo.'",partName:"'.$eng->partName.'",quantity:"'.$eng->quality.'"},';
                    }
                }
            }
            $so_no .= '{label:"'.$d->salesorder_no.'",parts:['.$parts.']},';
        }
        $so_no = rtrim($so_no, ',');
        $scn = $this->Scn->newEntity();
        if ($this->request->is('post')) {
            $scn = $this->Scn->patchEntity($scn, $this->request->getData());
            if ($this->Scn->save($scn)) {
                $scn_no = $this->Scn->find('all', ['fields' => 'id'])->last();
                if($this->request->getData('count') != null){
                    $scnChild = TableRegistry::get('ScnItems');
                    $scnData = array();
                    for($i = 1; $i < $this->request->getData('count'); $i++){
                        $scnData[$i]['scn_id'] = $scn_no['id'];
                        $scnData[$i]['part_no'] = $this->request->getData('part_no'.$i);
                        $scnData[$i]['part_desc'] = $this->request->getData('part_name'.$i);
                        $scnData[$i]['reason'] = $this->request->getData('reason'.$i);
                        $scnData[$i]['quantity'] = $this->request->getData('quantity'.$i);
                        $scnData[$i]['remark'] = $this->request->getData('remark'.$i);
                    }
                    $scns = $scnChild->newEntities($scnData);
                    foreach($scns as $scnc){
                        $scnChild->save($scnc);
                    }
                }
                $this->Flash->success(__('The scn has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The scn could not be saved. Please, try again.'));
        }
        $count = $this->Scn->find('all')->last();
        $this->set(compact('scn'));
        $this->set('part_no', $part_no);
        $this->set('part_name', $part_name);
        $this->set('so_no',$so_no);
        $this->set('pic', $this->Auth->user('username'));
        $this->set('pic_name', $this->Auth->user('name'));
        $this->set('pic_dept', $this->Auth->user('dept'));
        $this->set('pic_section', $this->Auth->user('section'));
        $this->set('sn_no', (isset($count->id) ? ($count->id + 1) : 1));
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
    public function reqEdit($id = null)
    {
        $scn = $this->Scn->get($id, [
            'contain' => []
        ]);
        $this->loadModel('ScnItems');
        $items = $this->ScnItems->find('all')
                ->where(['scn_id'=> $id]);
        $scn->items = $items;

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


        if ($this->request->is(['post'])) {
            $scn = $this->Scn->patchEntity($scn, $this->request->getData());
            if ($this->Scn->save($scn)) {
                $this->loadModel('ScnItems');
                if($this->request->getData('count') != null){
                    $scnChild = TableRegistry::get('ScnItems');
                    $scnData = array();
                    for($i = 1; $i <= $this->request->getData('count'); $i++){
                        if($this->request->getData('action'.$i) == 'edit'){
                            $scn_child = $this->ScnItems->get($this->request->getData('item_id'.$i), [
                                'contain' => []
                            ]);
                            $scn_child->part_no = $this->request->getData('part_no'.$i);
                            $scn_child->part_desc = $this->request->getData('part_name'.$i);
                            $scn_child->quantity = $this->request->getData('quantity'.$i);
                            $scn_child->reason = $this->request->getData('reason'.$i);
                            $scn_child->remark = $this->request->getData('remark'.$i);
                            $this->ScnItems->save($scn_child);
                        }
                        elseif($this->request->getData('action'.$i) == 'add'){
                            $scnData[$i]['scn_id'] = $id;
                            $scnData[$i]['part_no'] = $this->request->getData('part_no' . $i);
                            $scnData[$i]['part_desc'] = $this->request->getData('part_name' . $i);
                            $scnData[$i]['reason'] = $this->request->getData('reason' . $i);
                            $scnData[$i]['quantity'] = $this->request->getData('quantity' . $i);
                            $scnData[$i]['remark'] = $this->request->getData('remark' . $i);
                        }
                    }
                    $scns = $scnChild->newEntities($scnData);
                        foreach($scns as $scnc){
                            $scnChild->save($scnc);
                        }
                    }
                $this->Flash->success(__('The scn has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The scn could not be saved. Please, try again.'));
        }
        $this->set(compact('scn'));
        $this->set('part_no', $part_no);
        $this->set('part_name', $part_name);
        $this->set('pic', $this->Auth->user('username'));
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
    public function verify($id = Null){
        $scn = $this->Scn->get($id, [
            'contain' => []
        ]);
        $this->loadModel('ScnItems');
        $scn_items = $this->ScnItems->find('all')
            ->where(['scn_id' => $scn->id]);
        $this->set('scn', $scn);
        $this->set('items', $scn_items);
        $this->set('pic', $this->Auth->user('username'));
    }
    public function approve($id = null){
        $scn = $this->Scn->get($id, [
            'contain' => []
        ]);
        $this->loadModel('ScnItems');
        $scn_items = $this->ScnItems->find('all')
            ->where(['scn_id' => $scn->id]);
        $this->set('scn', $scn);
        $this->set('items', $scn_items);
        $this->set('pic', $this->Auth->user('username'));
    }
    public function approval($id = null){
        $scn = $this->Scn->get($id, [
            'contain' => []
        ]);
        $this->loadModel('ScnItems');
        $scn_items = $this->ScnItems->find('all')
            ->where(['scn_id' => $scn->id]);
        $this->set('scn', $scn);
        $this->set('items', $scn_items);
    }
    public function approval1($id = null){
        $scn = $this->Scn->get($id, [
            'contain' => []
        ]);
        $this->loadModel('ScnItems');
        $scn_items = $this->ScnItems->find('all')
            ->where(['scn_id' => $scn->id]);
        $this->set('scn', $scn);
        $this->set('items', $scn_items);
        $this->set('pic', $this->Auth->user('username'));
    }

    public function report(){
        $this->loadModel('ScnItems');
        $scn = $this->paginate($this->Scn->find('all')
            ->where(['status' => 'approved']));
        foreach($scn as $s){
            $items = $this->ScnItems->find('all')
                ->where(['scn_id' => $s->id]);
            $s->items = $items;
        }
        $this->set('scn', $scn);
    }

    public function statusReport(){
        $this->loadModel('ScnItems');
        $scn = $this->paginate($this->Scn->find('all'));
        foreach($scn as $s){
            $items = $this->ScnItems->find('all')
                ->where(['scn_id' => $s->id]);
            $s->items = $items;
        }
        $this->set('scn', $scn);
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
        if(isset($user['role']) && $user['role'] === 'approve-2'){
            if(in_array($this->request->action, ['approval1', 'edit'])){
                return true;
            }
        }

        return parent::isAuthorized($user);

    }

}
