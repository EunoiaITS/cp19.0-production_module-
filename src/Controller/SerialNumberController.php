<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * SerialNumber Controller
 *
 * @property \App\Model\Table\SerialNumberTable $SerialNumber
 *
 * @method \App\Model\Entity\SerialNumber[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SerialNumberController extends AppController
{
    public function initialize(){
        parent::initialize();
        $this->viewBuilder()->setLayout('mainframe');
    }
    public function dashboard(){
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
        $this->set('data', $dataFromEng);
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $serialNumber = $this->paginate($this->SerialNumber);

        $this->set(compact('serialNumber'));
    }

    /**
     * View method
     *
     * @param string|null $id Serial Number id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $serialNumber = $this->SerialNumber->get($id, [
            'contain' => []
        ]);

        $this->set('serialNumber', $serialNumber);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->loadModel('SerialNumberChild');
        $serialNumber = $this->SerialNumber->newEntity();
        if ($this->request->is('post')) {
            $serialNumber = $this->SerialNumber->patchEntity($serialNumber, $this->request->getData());
            if ($this->SerialNumber->save($serialNumber)) {
                $serial_no = $this->SerialNumber->find('all', ['fields' => 'id'])->last();
                if($this->request->getData('quantity') != null){
                    $serialChild = TableRegistry::get('SerialNumberChild');
                    $serialData = array();
                    for($i = 0; $i < $this->request->getData('quantity'); $i++){
                        $serialData[$i]['serial_number_id'] = $serial_no['id'];
                        $serialData[$i]['year'] = $this->request->getData('year'.$i);
                        $serialData[$i]['month'] = $this->request->getData('month'.$i);
                    }
                    $serials = $serialChild->newEntities($serialData);
                    foreach($serials as $serial){
                        $serialChild->save($serial);
                    }
                }
                $this->Flash->success(__('The serial number has been saved.'));

                return $this->redirect(['action' => 'add']);
            }
            $this->Flash->error(__('The serial number could not be saved. Please, try again.'));
        }
        $this->set(compact('serialNumber'));
        $this->set('sequence', $this->SerialNumberChild->find('all')->count());
    }

    /**
     * Edit method
     *
     * @param string|null $id Serial Number id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $serialNumber = $this->SerialNumber->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $serialNumber = $this->SerialNumber->patchEntity($serialNumber, $this->request->getData());
            if ($this->SerialNumber->save($serialNumber)) {
                $this->Flash->success(__('The serial number has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The serial number could not be saved. Please, try again.'));
        }
        $this->set(compact('serialNumber'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Serial Number id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $serialNumber = $this->SerialNumber->get($id);
        if ($this->SerialNumber->delete($serialNumber)) {
            $this->Flash->success(__('The serial number has been deleted.'));
        } else {
            $this->Flash->error(__('The serial number could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function verify($id = null){
        $sn = $this->SerialNumber->get($id, [
            'contain' => []
        ]);
        $this->loadModel('SerialNumberChild');
        $sn_items = $this->SerialNumberChild->find('all')
            ->where(['serial_number_id' => $sn->id]);
        $this->set('sn', $sn);
        $this->set('items', $sn_items);
    }

    public function approve($id = null){
        $sn = $this->SerialNumber->get($id, [
            'contain' => []
        ]);
        $this->loadModel('SerialNumberChild');
        $sn_items = $this->SerialNumberChild->find('all')
            ->where(['serial_number_id' => $sn->id]);
        $this->set('sn', $sn);
        $this->set('items', $sn_items);
    }

    public function report(){
        $sn = $this->SerialNumber->find('all');
        $this->set('sn', $sn);
    }

    public function monthlyReport(){
        $sn = $this->SerialNumber->find('all')
            ->where(['status' => 'approved']);
        $this->set('sn', $sn);
    }

}
