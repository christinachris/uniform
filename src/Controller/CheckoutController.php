<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Mailer\Email;
use Cake\Mailer\TransportFactory;
use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Table;
use Cake\Utility\Security;
use Cake\ORM\TableRegistry;
use App\Model\Entity\Role;

use PayPal\Api\Payer;
use PayPal\Api\Item;
use PayPal\Api\ItemList;

/**
 * Checkout Controller
 *
 * @property Nothing yet
 *
 * @method Nothing yet
 */
class CheckoutController extends AppController
{

    // Initial
    public function details(){

    }

    public function configuration() {
        $apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                'AVjXzMtV5nZcy-jFuMojzuETOIXZCpA5nQX0H79GYBDRrvotASDAU26Utl7H1VBIMRDnQycEpKRruXpo',  // you will get information about client id and secret once you have created test account in paypal sandbox
                'ECscDh1qpYI7DEThQonwbsO4CT3ShNp2uqoMkOf_6YSoqt9XKlyS9IafYOUn1CU98W1n6TM6L4okqjLL'
            )
        );
    }

    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['bypasscheckout']);
        $this->viewBuilder()->setLayout('default');
    }

    //check pass code to bypass checkout
    public function bypasscheckout(){

        $this->loadModel('Carts');
        $customerID = $this->Auth->user('id');
        $cart = $this->Carts->find('all', array('conditions' => array('Carts.customer_id' =>$customerID ,),));

        $count = $cart->count();

        if( $count==0) {
            $this->Flash->error(__('Please add an item to your cart first.'));
            return $this->redirect(['controller' => 'carts','action' => 'cart']);
        }
        else {

        if ($this->request->is('post')) {

                $userbypass = $this->request->getData('bypasscode'); //save user's submitted code to variable
                $oid = $this->Auth->user('organisation_id'); //find user's organisation ID

                $this->loadModel('Organisations'); //load model
                $organisation = $this->Organisations->findBy_Id($oid)->first(); //find organisation record matching user's ID
                $orgbypasscode = $organisation->bypasscode; //save organisation bypass code into variable

                //if user input matches user's org bypass code
                if ($userbypass == $orgbypasscode) {
                    $this->Flash->success(__('The bypass code you entered is correct. Please fill in your shipping details, review your order and submit.'));
                    $this->redirect(['controller' => 'carts', 'action' => 'bypasscheckoutreview']);
                } else {
                    //return error message
                    $this->redirect(['controller' => 'checkout', 'action' => 'bypasscheckout']);
                    $this->Flash->error(__('Sorry, the bypass code you entered was incorrect. Try again, or return to cart to progress to payment.'));
                }
            }
        }
    }






}