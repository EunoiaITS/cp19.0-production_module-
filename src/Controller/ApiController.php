<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Api Controller
 *
 * @property \App\Model\Table\ApiTable $Api
 *
 * @method \App\Model\Entity\Api[] paginate($object = null, array $settings = [])
 */
class ApiController extends AppController
{
    public function fgttData(){
        if ($this->request->is('post')) {
            $this->autoRender = false;
            $this->loadModel('Fgtt');
            $so_no = $this->Fgtt->find('all')
                ->Where(['so_no'=>$this->request->getData('salesorder_no')]);
        echo json_encode($so_no,JSON_PRETTY_PRINT);
        die();
        }
    }
    

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['fgttData']);
    }

}
