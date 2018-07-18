<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
            'authorize' => ['Controller'],
            'loginRedirect' => [
                'controller' => 'Dashboard',
                'action' => 'index'
            ],
            'logoutRedirect' => [
                'controller' => 'Users',
                'action' => 'login'
            ],
            'unauthorizedRedirect' => [
                'controller' => 'Dashboard',
                'action' => 'index',
                'prefix' => false
            ]
        ]);

        /*
         * Enable the following components for recommended CakePHP security settings.
         * see https://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
        //$this->loadComponent('Csrf');
    }

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return \Cake\Network\Response|null|void
     */
    public function beforeRender(Event $event)
    {
        $this->loadComponent('Auth');
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
        $this->loadModel('SerialNumber');
        $this->loadModel('PsMonthly');
        $this->loadModel('Mit');
        $this->loadModel('MaterialRequest');
        $this->loadModel('Prnf');
        $this->loadModel('Scn');
        $this->loadModel('Fgtt');
        $this->loadModel('Nbdo');
        $sn_v = $this->SerialNumber->find('all')
            ->where(['status'=>'requested'])
            ->count();
        $sn_a1 = $this->SerialNumber->find('all')
            ->where(['status'=>'verified'])
            ->count();
        $ps_v = $this->PsMonthly->find('all')
            ->where(['status'=>'requested'])
            ->count();
        $ps_a1 = $this->PsMonthly->find('all')
            ->where(['status'=>'verified'])
            ->count();
        $ps_a2 = $this->PsMonthly->find('all')
            ->where(['status'=>'approve-1'])
            ->count();
        $mit_v = $this->Mit->find('all')
            ->where(['status'=>'requested'])
            ->count();
        $mit_a1 = $this->Mit->find('all')
            ->where(['status'=>'verified'])
            ->count();
        $mr_v = $this->MaterialRequest->find('all')
            ->where(['status'=>'requested'])
            ->count();
        $mr_a1 = $this->MaterialRequest->find('all')
            ->where(['status'=>'verified'])
            ->count();
        $prn_v = $this->Prnf->find('all')
            ->where(['status'=>'requested'])
            ->count();
        $prn_a1 = $this->Prnf->find('all')
            ->where(['status'=>'verified'])
            ->count();
        $prn_a2 = $this->Prnf->find('all')
            ->where(['status'=>'approved'])
            ->count();
        $prn_a3 = $this->Prnf->find('all')
            ->where(['status'=>'approved1'])
            ->count();
        $prn_a4 = $this->Prnf->find('all')
            ->where(['status'=>'approved2'])
            ->count();

        $scn_v = $this->Scn->find('all')
            ->where(['status'=>'requested'])
            ->count();
        $scn_a1 = $this->Scn->find('all')
            ->where(['status'=>'verified'])
            ->count();
        $scn_a2 = $this->Scn->find('all')
            ->where(['status'=>'approved-1'])
            ->count();

        $fgtt_v = $this->Fgtt->find('all')
            ->where(['status'=>'requested'])
            ->count();
        $fgtt_a1 = $this->Fgtt->find('all')
            ->where(['status'=>'verified'])
            ->count();

        $nbdo_v = $this->Nbdo->find('all')
            ->where(['status'=>'requested'])
            ->count();
        $nbdo_a1 = $this->Nbdo->find('all')
            ->where(['status'=>'verified'])
            ->count();

        $this->set('sn_v',$sn_v);
        $this->set('sn_a1',$sn_a1);
        $this->set('ps_v',$ps_v);
        $this->set('ps_a1',$ps_a1);
        $this->set('ps_a2',$ps_a2);
        $this->set('mit_v',$mit_v);
        $this->set('mit_a1',$mit_a1);
        $this->set('mr_v',$mr_v);
        $this->set('mr_a1',$mr_a1);
        $this->set('prn_v',$prn_v);
        $this->set('prn_a1',$prn_a1);
        $this->set('prn_a2',$prn_a2);
        $this->set('prn_a3',$prn_a3);
        $this->set('prn_a4',$prn_a4);
        $this->set('scn_v',$scn_v);
        $this->set('scn_a1',$scn_a1);
        $this->set('scn_a2',$scn_a2);
        $this->set('fgtt_v',$fgtt_v);
        $this->set('fgtt_a1',$fgtt_a1);
        $this->set('nbdo_v',$nbdo_v);
        $this->set('nbdo_a1',$nbdo_a1);
        $this->set('role', $this->Auth->user('role'));
        $this->set('user_pic', $this->Auth->user('username'));
    }

    public function beforeFilter(Event $event)
    {
        $this->Auth->allow(['logout']);
    }

    public function isAuthorized($user){
        if (isset($user['role']) && $user['role'] === 'admin') {
            return true;
        }
        return false;
    }

}
