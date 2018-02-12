<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * MaterialRequest Controller
 *
 * @property \App\Model\Table\MaterialRequestTable $MaterialRequest
 *
 * @method \App\Model\Entity\MaterialRequest[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MaterialRequestController extends AppController
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
        $materialRequest = $this->paginate($this->MaterialRequest);

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
        $count = $this->MaterialRequest->find('all')->last();
        $materialRequest = $this->MaterialRequest->newEntity();
        if ($this->request->is('post')) {
            $materialRequest = $this->MaterialRequest->patchEntity($materialRequest, $this->request->getData());
            if ($this->MaterialRequest->save($materialRequest)) {
                $mr_no = $this->MaterialRequest->find('all', ['fields' => 'id'])->last();
                if($this->request->getData('total') != null){
                    $mrItem = TableRegistry::get('MrItems');
                    $itemData = array();
                    for($i = 0; $i < $this->request->getData('total'); $i++){
                        $itemData[$i]['mr_id'] = $mr_no['id'];
                        $itemData[$i]['part_no'] = $this->request->getData('part_no'.$i);
                        $itemData[$i]['part_desc'] = $this->request->getData('part_desc'.$i);
                        $itemData[$i]['quantity'] = $this->request->getData('quantity'.$i);
                    }
                    $items = $mrItem->newEntities($itemData);
                    foreach($items as $item){
                        $mrItem->save($item);
                    }
                }

                $this->Flash->success(__('The material request has been saved.'));

                return $this->redirect(['action' => 'add']);
            }
            $this->Flash->error(__('The material request could not be saved. Please, try again.'));
        }
        $this->set(compact('materialRequest'));
        $this->set('sn_no', (isset($count->id) ? ($count->id + 1) : 1));
        $this->set('part_no', $part_no);
        $this->set('part_name', $part_name);
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
    }

    public function report(){
        $mr = $this->MaterialRequest->find('all');
        $this->set('mr', $mr);
    }

}
