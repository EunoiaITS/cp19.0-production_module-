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
    public function allData(){
        $this->autoRender = false;
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
        $this->loadModel('SerialNumber');
        $this->loadModel('Fgtt');
        $this->loadModel('PsScheduler');
        foreach($dataFromSales as $sn_match){
            $matches = $this->SerialNumber->find('all')
                ->where(['so_no' => $sn_match->salesorder_no]);
            foreach($matches as $match){
                $sn_match->production_sn = $match;
            }
            foreach($sn_match->soi as $item){
                $schedulerCheck = $this->PsScheduler->find('all')
                    ->where(['so_item_id' => $item->id]);
                $count = 0;
                foreach($schedulerCheck as $checker){
                    $count++;
                    $obName = 'actual'.($count-1);
                    $item->{$obName} = $checker->actual_plan;
                }
                if($count > 0){
                    $item->action = 'edit';
                }else{
                    $item->action = 'add';
                }
            }
            $fgtts = $this->Fgtt->find('all')
                ->where(['so_no' => $sn_match->salesorder_no]);
            foreach($fgtts as $fgtt){
                $sn_match->fgtt = $fgtt;
            }
            $start    = (new \DateTime($sn_match->date))->modify('first day of this month');
            $end      = (new \DateTime($sn_match->delivery_date))->modify('first day of next month');
            $interval = \DateInterval::createFromDateString('1 month');
            $period   = new \DatePeriod($start, $interval, $end);

            $months = array();
            foreach ($period as $dt) {
                $months[] = $dt->format("Y-M");
            }
            $sn_match->months = $months;
        }
        echo json_encode($dataFromSales,JSON_PRETTY_PRINT);
        die();
    }

    public function mitReport(){
        $this->autoRender = false;
        $this->loadModel('Mit');
        $mit = $this->Mit->find('all')
            ->Where(['status'=>'acknowledged']);
        $urlToSales = 'http://salesmodule.acumenits.com/api/all-data';

        $optionsForSales = [
            'http' => [
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'GET'
            ]
        ];
        $contextForSales  = stream_context_create($optionsForSales);
        $resultFromSales = file_get_contents($urlToSales, false, $contextForSales);
        if ($resultFromSales !== FALSE) {
            $dataFromSales = json_decode($resultFromSales);
            foreach ($mit as $m){
                foreach ($dataFromSales as $sales){
                    $m->sales = $sales;
                    foreach ($sales->soi as $items){
                        if($items->id == $m->so_item_id){
                            $m->items = $items;
                        }
                    }
                    foreach ($sales->cus as $cus){
                        $m->cus = $cus;
                    }
                }
            }
        }
        echo json_encode($mit, JSON_PRETTY_PRINT);
        die();
    }

    public function mrReport(){
        $this->autoRender = false;
        $this->loadModel('MaterialRequest');
        $this->loadModel('MrItems');
        $mr = $this->MaterialRequest->find('all')
            ->where(['status' => 'approved']);
        foreach($mr as $m){
            $items = $this->MrItems->find('all')
                ->where(['mr_id' => $m->id]);
            $m->items = $items;
        }
        echo json_encode($mr, JSON_PRETTY_PRINT);
        die();
    }
    public function mit(){
        $this->loadModel('Mit');
        $mit = $this->Mit->find('all')
            ->Where(['status'=>'approved']);
        echo json_encode($mit, JSON_PRETTY_PRINT);
        die();
    }

    public function prn(){
        $this->loadModel('Prnf');
        $mit = $this->Prnf->find('all')
            ->Where(['status'=>'approved3']);
        echo json_encode($mit, JSON_PRETTY_PRINT);
        die();
    }

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['allData', 'mitReport', 'mrReport','mit','prn']);
    }

}
