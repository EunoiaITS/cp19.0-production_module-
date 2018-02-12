<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * Scn Controller
 *
 * @property \App\Model\Table\ScnTable $Scn
 *
 * @method \App\Model\Entity\Scn[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ScnController extends AppController
{
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
        $scn = $this->Scn->newEntity();
        if ($this->request->is('post')) {
//            $this->autoRender=false;
//            echo "<pre>";
//            print_r($this->request);
//            echo "</pre>";
            $scn = $this->Scn->patchEntity($scn, $this->request->getData());
            if ($this->Scn->save($scn)) {
                $scn_no = $this->Scn->find('all', ['fields' => 'id'])->last();
                if($this->request->getData('count') != null){
                    $scnChild = TableRegistry::get('ScnItems');
                    $scnData = array();
                    for($i = 1; $i <= $this->request->getData('count'); $i++){
                        $scnData[$i]['scn_id'] = $scn_no['id'];
                        $scnData[$i]['part_no'] = $this->request->getData('scnPartNo'.$i);
                        $scnData[$i]['part_desc'] = $this->request->getData('scnPartName'.$i);
                        $scnData[$i]['reason'] = $this->request->getData('scnReasonCode'.$i);
                        $scnData[$i]['quantity'] = $this->request->getData('scnQty'.$i);
                        $scnData[$i]['remark'] = $this->request->getData('scnRemark'.$i);
                    }
                    $scns = $scnChild->newEntities($scnData);
                    foreach($scns as $scnc){
                        $scnChild->save($scnc);
                    }
                }
                $this->Flash->success(__('The scn has been saved.'));

                return $this->redirect(['action' => 'add']);
            }
            $this->Flash->error(__('The scn could not be saved. Please, try again.'));
        }
        $this->set(compact('scn'));
        $this->set('part_no', $part_no);
        $this->set('part_name', $part_name);
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
    public function verify($id = Null){
        $scn = $this->Scn->get($id, [
            'contain' => []
        ]);
        $this->loadModel('ScnItems');
        $scn_items = $this->ScnItems->find('all')
            ->where(['scn_id' => $scn->id]);
        $this->set('scn', $scn);
        $this->set('items', $scn_items);
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

    public function report(){
        $scn = $this->Scn->find('all');
        $this->set('scn', $scn);
    }
}
