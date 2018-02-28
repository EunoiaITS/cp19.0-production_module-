<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;
/**
 * Inventory Controller
 *
 * @property \App\Model\Table\InventoryTable $Inventory
 *
 * @method \App\Model\Entity\Inventory[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class InventoryController extends AppController
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
        $inventory = $this->paginate($this->Inventory);

        $this->set(compact('inventory'));
    }

    /**
     * View method
     *
     * @param string|null $id Inventory id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view()
    {
        $inventory = $this->Inventory->find('all');
        $this->set('inventory', $inventory);
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
        $part_no = $part_name = $drawing_no =null;
        foreach($dataFromEng as $pm){
            $part_no .= '{label:"'.$pm->partNo.'",idx:"'.$pm->partName.'",idw:"'.$pm->drawingNo.'"},';
            $part_name .= '{label:"'.$pm->partName.'",idx:"'.$pm->partNo.'",idw:"'.$pm->drawingNo.'"},';
            $drawing_no .= '{label:"'.$pm->drawingNo.'",idx:"'.$pm->partNo.'",idw:"'.$pm->partName.'"},';
        }
        $part_no = rtrim($part_no, ',');
        $part_name = rtrim($part_name, ',');
        $drawing_no = rtrim($drawing_no, ',');

        $inventory = $this->Inventory->newEntity();
        if ($this->request->is('post')) {
                if($this->request->getData('total') != null){
                    $invItem = TableRegistry::get('inventory');
                    $invData = array();
                    for($i=0;$i<$this->request->getData('total');$i++){
                        $invData[$i]['part_no'] = $this->request->getData('part_no'.$i);
                        $invData[$i]['part_name'] = $this->request->getData('part_name'.$i);
                        $invData[$i]['drawing_no'] = $this->request->getData('drawing_no'.$i);
                        $invData[$i]['section'] = $this->request->getData('section'.$i);
                        $invData[$i]['uom'] = $this->request->getData('uom'.$i);
                        $invData[$i]['current_quantity'] = $this->request->getData('current_quantity'.$i);
                        $invData[$i]['zon'] = $this->request->getData('zon'.$i);
                        $invData[$i]['rack_no'] = $this->request->getData('rack_no'.$i);
                        $invData[$i]['bin_no'] = $this->request->getData('bin_no'.$i);
                        $invData[$i]['level'] = $this->request->getData('level'.$i);
                        $invData[$i]['min_stock'] = $this->request->getData('min_stock'.$i);
                        $invData[$i]['max_stock'] = $this->request->getData('max_stock'.$i);
                    }
                    $items = $invItem->newEntities($invData);
                    foreach($items as $item){
                        $invItem->save($item);
                    }
                    $this->Flash->success(__('The inventory has been saved.'));

                    return $this->redirect(['action' => 'view']);
                }
            $this->Flash->error(__('The inventory could not be saved. Please, try again.'));
        }
        $this->set(compact('inventory'));
        $this->set('part_no', $part_no);
        $this->set('part_name', $part_name);
        $this->set('drawing_no', $drawing_no);
        $this->set('pic', $this->Auth->user('username'));
        $this->set('pic_name', $this->Auth->user('name'));
        $this->set('pic_dept', $this->Auth->user('dept'));
        $this->set('pic_section', $this->Auth->user('section'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Inventory id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit()
    {
        if ($this->request->is('post')) {
            $inv_id = $this->Inventory->get($this->request->getData('inv_name'), [
                'contain' => []
            ]);
            $inv_id = $this->Inventory->patchEntity($inv_id, $this->request->getData());
            if ($this->Inventory->save($inv_id)) {
                $this->Flash->success(__('The inventory has been saved.'));

                return $this->redirect(['action' => 'view']);
            }
            $this->Flash->error(__('The inventory could not be saved. Please, try again.'));
    }
    }

    /**
     * Delete method
     *
     * @param string|null $id Inventory id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $inventory = $this->Inventory->get($id);
        if ($this->Inventory->delete($inventory)) {
            $this->Flash->success(__('The inventory has been deleted.'));
        } else {
            $this->Flash->error(__('The inventory could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function isAuthorized($user){
        if ($this->request->getParam('action') === 'index' || $this->request->getParam('action') === 'add' || $this->request->getParam('action') === 'view' ) {
            return true;
        }

        return parent::isAuthorized($user);

    }

}
