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

use Cake\Auth\DefaultPasswordHasher;
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

        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);
        $this->loadComponent('Flash');



        $this->loadComponent('Auth', [
            'authenticate' => [
                'Form' => [
                    'fields' => [
                        'username' => 'email',
                        'password' => 'password'
                    ],
                    'userModel' => 'Customers'
                ]
            ],
            'authorize' => ['Controller'],
            'loginAction' => [
                'controller' => 'Customers',
                'action' => 'login'
            ],
            'logoutAction' => [
                'controller' => 'Customers',
                'action' => 'logout'
            ],

            'logoutAction' => [
                'controller' => 'Customers',
                'action' => 'logout'
            ],


            // If unauthorized, return them to page they were just on
            'unauthorizedRedirect' =>[
                'controller' => 'Customers',
                'action' => 'login'
            ],
            'authError' => 'Please login to continue'
        ]);

        /*
         * Enable the following component for recommended CakePHP security settings.
         * see https://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');

        //websitecontents fetch data and assign to variables to be called in view (CMS)
        $this->loadModel('Websitecontents');

        //Who we are page title
        $aboutustitle = $this->Websitecontents->findByContentname('aboutpagetitle')->first();
        $aboutpagetitle = $aboutustitle->contentvalue;
        $this->set('aboutpagetitle', $aboutpagetitle);

        //What we do page title
        $servicespagetitle = $this->Websitecontents->findByContentname('servicespagetitle')->first();
        $whatwedotitle = $servicespagetitle->contentvalue;
        $this->set('whatwedotitle', $whatwedotitle);

        //Get in touch page title
        $contacttitle = $this->Websitecontents->findByContentname('contactpagetitle')->first();
        $getintouch = $contacttitle->contentvalue;
        $this->set('getintouch', $getintouch);

        //phone number
        $phonecontent = $this->Websitecontents->findByContentname('phone')->first();
        $phone = $phonecontent->contentvalue;
        $this->set('phone', $phone);

        //business days and hours
        $businesshourscontent = $this->Websitecontents->findByContentname('businessdayshours')->first();
        $operatingtime = $businesshourscontent->contentvalue;
        $this->set('operatingtime', $operatingtime);

        //email - footer
        $emailcontent = $this->Websitecontents->findByContentname('emailfull')->first();
        $emailfull = $emailcontent->contentvalue;
        $this->set('emailfull', $emailfull);

        //setting address - footer
        $addresscontent = $this->Websitecontents->findByContentname('address')->first();
        $address = $addresscontent->contentvalue;
        $this->set('address', $address);

        //setting facebook link - footer
        $facebookcontent = $this->Websitecontents->findByContentname('facebooklink')->first();
        $facebook = $facebookcontent->contentvalue;
        $this->set('facebook', $facebook);

        //setting linkedin link - footer
        $linkedincontent = $this->Websitecontents->findByContentname('linkedinlink')->first();
        $linkedin = $linkedincontent->contentvalue;
        $this->set('linkedin', $linkedin);

        //setting pinterest link - footer
        $pinterestcontent = $this->Websitecontents->findByContentname('pinterestlink')->first();
        $pinterest = $pinterestcontent->contentvalue;
        $this->set('pinterest', $pinterest);



    }

    public function beforeFilter(Event $event)
    {

        $this->loadModel('organisations');
        $org = $this->organisations->findByOrganisationname('Shoreditch Corporate Admin')->first();
        $orgid  = $org->_id;

        if($this->Auth->user()  && $this->Auth->user('organisation_id')==$orgid) {
            $this->viewBuilder()->setLayout('default2');
        }
        elseif ($this->Auth->user()){

            $this->set('text','shop');

            $oid = $this->Auth->user('organisation_id');
            $this->set('url',['controller' => 'Uniforms', 'action' => 'showuniform', $oid]);


        }
        else{
            $this->set('text','log in');
            $this->set('url',['controller' => 'customers', 'action' => 'login']);
        }
        return parent::beforeFilter($event);
    }


}
