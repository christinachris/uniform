<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Controller\Component\AuthComponent;
use Cake\Mailer\Email;
use Cake\Mailer\TransportFactory;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Auth\AbstractPasswordHasher;

use Cake\ORM\Table;
use Cake\Utility\Security;
use Cake\ORM\TableRegistry;
use App\Model\Entity\Role;

use App\Model\Entity\Customer;
use App\Model\Table\CustomersTable;
use Cake\Event\Event;
use function PHPSTORM_META\elementType;
use Cake\ORM\Entity;

/**
 * Customers Controller
 *
 * @property \App\Model\Table\CustomersTable $Customers
 *
 * @method \App\Model\Entity\Customer[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */


class CustomersController extends AppController
{

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);

    }
    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['login', 'register','logout','verification','forgotpw','resetpw',
            'reverify', 'viewaccount', 'view', 'editaccount', 'changepw', 'orderhistory','orderdetails']);
        $this->viewBuilder()->setLayout('default');
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Organisations']
        ];
        $customers = $this->paginate($this->Customers);

        $this->set(compact('customers'));
    }

    /**
     * View method
     *
     * @param string|null $id Customer id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $customer = $this->Customers->get($id, [
            'contain' => ['Organisations', 'Orders']
        ]);

        $this->set('customer', $customer);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $customer = $this->Customers->newEntity();
        if ($this->request->is('post')) {
            $customer = $this->Customers->patchEntity($customer, $this->request->getData());
            if ($this->Customers->save($customer)) {
                $this->Flash->success(__('The customer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The customer could not be saved. Please, try again.'));
        }
        $organisations = $this->Customers->Organisations->find('list', ['limit' => 200]);
        $this->set(compact('customer', 'organisations'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Customer id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $customer = $this->Customers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $customer = $this->Customers->patchEntity($customer, $this->request->getData());
            if ($this->Customers->save($customer)) {
                $this->Flash->success(__('The customer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The customer could not be saved. Please, try again.'));
        }
        $organisations = $this->Customers->Organisations->find('list', ['limit' => 200]);
        $this->set(compact('customer', 'organisations'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Customer id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $customer = $this->Customers->get($id);
        if ($this->Customers->delete($customer)) {
            $this->Flash->success(__('The customer has been deleted.'));
        } else {
            $this->Flash->error(__('The customer could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }


    //REGISTER FUNCTION
    //1. check if phone no. is correct
    //2. check if organisation access code is correct
    //3. if the org code is correct, check that the organisation is active.
    //4. if org is active check if email has already been used.
    public function  register()
    {
        //create new customer record
        $customer = $this->Customers->newEntity();
        if ($this->request->is('post')) {

            //validate phone number first
            $phone = $this->request->getData('phone');
            $a = ((int)$phone);
            $int_array = array_map('intval', str_split($phone));
            //get the lenght of the array
            $int_lenght = count($int_array);
            $c = is_int($a);
            //if phone number is valid check for other things
            if ($c && $int_lenght == 10) {

                //find correct organisation id based on the access code entered:
                $accesspassword = $this->request->getData('organisationcode'); //retrieve input from the form view
                $this->loadModel('Organisations'); //load model
                $query = $this->Organisations->findByAccesscode($accesspassword)->first(); //find matching organisation access code to input
                //validate access code is correct
                $orgmatch = ['accesscode' => $accesspassword]; //email = user email in form
                $org_exists = $this->Organisations->exists($orgmatch); //check if the email exists in the customers table.
                //if organisation access password is correct check for other things
                if ($org_exists == true) {

                    //validate organisation is active
                    $org_active = $query->active;
                    if ($org_active == 1) {

                        //validate email is unique and not already used
                        $useremail = $this->request->getData('email'); //retrieve the email address from the form
                        $conditions = ['email' => $useremail]; //email = user email in form
                        $email_exists = $this->Customers->exists($conditions); //check if the email exists in the customers table.
                        if ($email_exists == false) {

                            //get all data from form that user fills out
                            $customer = $this->Customers->patchEntity($customer, $this->request->getData());
                            //create random token for verification and insert
                            $customer->token = Security::hash(Security::randomBytes(32));
                            //insert created date into customer record
                            $customer->createddate = date('Y-m-d H:i:s');
                            $customer->organisation_id = $query->_id; //put correct organisation id into the customer record

                            if ($this->Customers->save($customer)) {
                                $this->Flash->set('Registration successful, your confirmation email has been sent to ' . $this->request->getData('email'), ['element' => 'success']);

                                //email details
                                $email = new Email('default');
                                $email->setattachments([
                                    'SClogo.png' => [
                                        'file' => WWW_ROOT . 'img' . DS . 'SClogo.png',
                                        'mimetype' => 'image/png',
                                        'contentId' => 'SClogo'
                                    ]
                                ]);
                                $email->setEmailFormat('html');
                                $email->setFrom('noreply@shoreditchcorporate.com.au', 'Shoreditch Corporate');
                                $email->setSubject('Please confirm your email to activate your account');
                                $email->setTo($this->request->getData('email'));
                                $email->setTemplate('register');
                                $email->setViewVars([
                                    'name' => $this->request->getData('firstname'),
                                    'token' => $customer->token
                                ]);
                                $email->send();
                            }
                        } else {
                            //return error if cannot send email
                            $this->Flash->error(__('Account could not be created. This email address is already in use.'));
                        }
                    } else {
                        $this->Flash->error(__('Account could not be created. The organisation you are trying to create an account for is currently inactive.'));
                    }
                } else {
                    $this->Flash->error(__('Account could not be created. The organisation access code you entered was incorrect'));
                }
            } else {
                $this->Flash->error(__('Please enter a valid Australian phone number.'));
                return $this->redirect(['action' => 'register']);
            }

        }
    }


    //VERIFY ACCOUNT FUNCTION
    public function verification($token){
        $customerTable = TableRegistry::getTableLocator()->get('Customers');
        $verify = $customerTable->find('all')->where(['token'=>$token])->first();
        //mark the account as verified
        $verify->verified = '1';
        $customerTable->save($verify);

    }

    //FORGOT PASSWORD: send email with token for reset
    public function forgotpw(){

        if ($this->request->is('post')) {

            $accountemail = $this->request->getData('email'); //retrieve the email address from the form
            $customername = $query->firstname; //retrieve customer firstname matching the email provided by user
            $query = $this->Customers->findByEmail($accountemail)->first(); //find the customer in the db that matches the email input
            $customertoken = Security::hash(Security::randomBytes(32)); //create new token
            $update = $this->Customers->patchEntity($query, ['token'=> $customertoken], ['validate'=> false]); //update customer record with new token
            $this->Customers->save($update); //save the updated customer record

            $conditions = ['email' => $accountemail]; //email = user email in form
            $email_exists = $this->Customers->exists($conditions); //check if the email exists in the customers table.


            if ($email_exists==true){
                //check the account has been verified before sending reset password email
                if ($query->verified == 1) {
                    //if the email exists then send email
                    $this->redirect('/customers/resetpw'); //redirect to the reset password page
                    $this->Flash->set('An email has been sent to you containing the reset code.', ['element' => 'success']);

                    //email details
                    $email = new Email('default');
                    $email->setattachments([
                        'SClogo.png' => [
                            'file' => WWW_ROOT . 'img' . DS . 'SClogo.png',
                            'mimetype' => 'image/png',
                            'contentId' => 'SClogo'
                        ]
                    ]);
                    $email->setTemplate('reset_password');
                    $email->setEmailFormat('html');
                    $email->setFrom('noreply@shoreditchcorporate.com.au', 'Shoreditch Corporate');
                    $email->setSubject('Your password reset code');
                    $email->setTo($this->request->getData('email'));
                    $email->setViewVars([
                        'customername' => $customername,
                        'customertoken' => $customertoken
                    ]);
                    $email->send();

                } else {
                    //if the account has not been verified return error
                    $this->Flash->error(__('This account has not been verified yet. Please check your email for the verification link, 
                    or ask us to send you another'));
                }

            } else {
                //if the email doesnt exist then return error
                $this->Flash->error(__('We could not find an account with this email address.'));
            }
        }
    }

    //RESET PASSWORD
    public function resetpw(){

        if ($this->request->is('post')) {

            //get user data input from form
            $customeremail = $this->request->getData('email');
            $customertoken = $this->request->getData('token');
            $newpassword = $this->request->getData('password');

            //check if email exists first
            $conditions = ['email' => $customeremail]; //email = user email in form
            $email_exists = $this->Customers->exists($conditions); //check if the email exists in the customers table.

            if ($email_exists == true) {
                //if email does exist do the following:

                //find customer id for reference
                $customer_record = $this->Customers->findByEmail($customeremail)->first(); //find the customer in the db that matches the email input

                //check that email and token match
                if (($customer_record->email == $customeremail) && ($customer_record->token == $customertoken)) {
                    $customer_record->password = $newpassword; //update new password and hash
                    $customer_record->token = Security::hash(Security::randomBytes(32)); //generate new token to be stored against customer

                    //if token and email match then update the record
                    if ($this->Customers->save($customer_record)) {
                        $this->Flash->set('Your password has been reset', ['element' => 'success']); //show success message
                        $this->redirect('/customers/login'); //redirect to the login page
                    }

                } else {
                    //otherwise return error for token and email not matching
                    $this->Flash->error(__('Could not reset password, your email and/or reset code were incorrect'));
                }

            } else {
                //return error where the email is not valid
                $this->Flash->error(__('An account registered to this email does not exist.'));
            }
        }
    }


    //LOGIN FUNCTION
    public function login()
    {
        if ($this->getRequest()->is('post')) {

            $customeremail = $this->request->getData('email');
                $conditions = ['email' => $customeremail]; //email = user email in form
                $email_exists = $this->Customers->exists($conditions); //check if the email exists in the customers table.

                //if email exists:
                if ($email_exists == true) {
                    //check if email is verified yet
                    $customer_record = $this->Customers->findByEmail($customeremail)->first();
                    if ($customer_record->verified == 1) {
                        //if email is verified, then login
                        $user = $this->Auth->identify();

                        $this->Auth->user('email');
                        $this->Auth->setUser($user);
                        //if email and password match login

                        $this->loadModel('organisations');
                        $org = $this->organisations->findByOrganisationname('Shoreditch Corporate Admin')->first();
                        $orgid  = $org->_id;


                        if ($user  && $this->Auth->user('organisation_id')==$orgid) {

                            $this->redirect(['controller' => 'Admins', 'action' => 'admindashboard']);
                        } elseif($user) {
                            $this->Auth->setUser($user);
                            $oid = $this->Auth->user('organisation_id');
                            $this->redirect(['controller' => 'Uniforms', 'action' => 'showuniform', $oid]);

                        }
                        else{

                            //if they do not match, return error for password incorrect
                            $this->Flash->error(__('Your password is incorrect.'));

                        }
                    } else {
                        //if email is not verified return error
                        $this->Flash->error(__('This account has not been verified yet.'));
                    }
                } else {
                    //if cannot find account with this email return error
                    $this->Flash->error(__('An account with this email does not exist.'));
                }
        }
    }


    //LOGOUT FUNCTION
    public function logout()
    {
        $this->Flash->success('You are now logged out');
        $this->Auth->logout();
        return $this->redirect(['controller' => 'Customers', 'action' => 'login']);
    }

    //RESEND VERIFICATION EMAIL
    public function reverify(){
        if ($this->request->is('post')) {

            //check if email exists
            $customeremail = $this->request->getData('email'); //get email from form
            $conditions = ['email' => $customeremail]; //email = user email in form
            $email_exists = $this->Customers->exists($conditions); //check if the email exists in the customers table.



            //if email exists, confirm it is not verified
            if ($email_exists==true) {
                //check if email is not verified
                $customer_record = $this->Customers->findByEmail($customeremail)->first();
                if ($customer_record->verified == 0) {
                    //get token and send email
                    $resendtoken = $customer_record->token;

                    //email details
                    $email = new Email('default');
                    $email->setTemplate('register');
                    $email->setEmailFormat('html');
                    $email->setFrom('noreply@shoreditchcorporate.com.au', 'Shoreditch Corporate');
                    $email->setSubject('Reverification Link: Please confirm your email to activate your account');
                    $email->setTo($this->request->getData('email'));
                    $email->setViewVars([
                        'name' => $customer_record->firstname,
                        'token' =>  $customer_record->token
                    ]);
                    $email->send();

                    $this->Flash->set('We have sent another verification email to '.$this->request->getData('email'), ['element' => 'success']);


                } else {
                    $this->Flash->set('This account has already been verified. Please go to Login.', ['element' => 'success']);
                }

            } else {
                $this->Flash->error(__('ddd'));
            }

            //if not verified
        }



    }

    //VIEW CUSTOMER ACCOUNT DETAILS
    public function viewaccount(){
        $customerid = $this->Auth->user('id');
        $customer = $this->Customers->get($customerid);
        $this->set('customer', $customer);
    }


    //EDIT CUSTOMER ACCOUNT DETAILS
    public function editaccount(){
        $customerid = $this->Auth->user('id');
        $customer = $this->Customers->get($customerid);
        $this->set('customer', $customer);

        if ($this->request->is('post')){
            //update new accounting information

            $this->Customers->id = $customerid;
            $userfirstname=$this->request->getData('firstname'); //retrieve the firstname from the form
            $userlastname=$this->request->getData('lastname'); //retrieve the lastname from the form
            $userphone=$this->request->getData('phone'); //retrieve the phone from the form

            $this->Customers->updateAll(array("firstname"=>$userfirstname,"lastname"=>$userlastname,"phone"=>$userphone),array("id"=>$customerid));

            return $this->redirect(['controller' => 'Customers', 'action' => 'viewaccount']);
            //in second example, first array will update the value in defined field and second array defines the "WHERE" condition




        }

    }

    //CHANGE PASSWORD INSIDE ACCOUNT

    public function changepw(){

        $userid= $this->Auth->user('id');
        $user = $this->Customers->get($userid, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $passwordDetails=$this->request->getData();
            $hash=$user['password'];
            if( password_verify($passwordDetails['old_password'], $hash)){
                if($passwordDetails['New_password']==$passwordDetails['confPassword']){
                    $user['password']=$passwordDetails['New_password'];
                    if ($this->Customers->save($user)) {
                        $this->Flash->success(__('Your password has been updated.'));
                        return $this->redirect(['action' => 'viewaccount']);
                    }
                }
                else{
                    $this->Flash->error('Your confirm password is not same as your new password.');
                }
            }
            else{
                $this->Flash->error('Your current password is incorrect.');
            }
        }
        $this->set(compact('user'));
    }


    public function orderhistory(){

        $this->loadModel('Orders');
        $this->loadModel('Orderitems');

        $customerid = $this->Auth->user('id');

        $orders =  $this->Orders->find('all', array('conditions' => array('Orders.customer_id' =>$customerid ,),));


        $this->set('orders',$orders);

    }

    public function orderdetails($orderID){
        $this->loadModel('Orders');
        $this->loadModel('Orderitems');

        $order = $this->Orders->find('all', array('conditions' => array('Orders.id' =>$orderID ,),))->first();
        $orderitems = $this->Orderitems->find('all',array('conditions' => array('Orderitems.order_id' =>$orderID,),));


        $this->set('order',$order);
        $this->set('orderitems',$orderitems);

        $this->loadModel('websitecontents');
        $shipping = $this->Websitecontents->findByContentname('shipping')->first();
        $shippingprice = $shipping->contentvalue;
        $shippingnumber = (float)$shippingprice;
        $this->set('shippingnumber', $shippingnumber);


    }





}
