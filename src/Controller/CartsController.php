<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\Table;
use Cake\ORM\Query;
use Cake\I18n\Time;
use Cake\Mailer\Email;
use Cake\Datasource\ConnectionManager;
use Cake\Log\Log;
/**
 * Carts Controller
 *
 * @property \App\Model\Table\CartsTable $Carts
 *
 * @method \App\Model\Entity\Cart[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CartsController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['cart', 'cartinfo']);
        $this->viewBuilder()->setLayout('default');
    }

    public function isAuthorized($user = null) {

        if ($this->request->action === 'orderconfirmed') {
            $postId=$this->request->params['pass'][0];
            $this->loadModel('Orders');
            $this->loadModel('Orderitems');
            $this->loadModel('Customers');




            if(is_numeric($postId)){
                $order = $this->Orders->find('all', array('conditions' => array('Orders.id' => $postId)))->first();

                if ($order->customer_id==$user['id']) {
                    return true;
                }
                else{
                    return false;
                }
            }
            else{
                $order = $this->Orders->find('all', array('conditions' => array('Orders.paypal' => $postId)))->first();
                //var_dump($order);
                if ($order->customer_id==$user['id']) {
                    return true;
                }
                else{
                    return false;
                }


            }





            //var_dump($order);


        }
        else{
            return true;
        }


    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Variants', 'Customers']
        ];
        $carts = $this->paginate($this->Carts);

        $this->set(compact('carts'));
    }

    /**
     * View method
     *
     * @param string|null $id Cart id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cart = $this->Carts->get($id, [
            'contain' => ['Variants', 'Customers', 'OrdersVariants']
        ]);

        $this->set('cart', $cart);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $cart = $this->Carts->newEntity();
        if ($this->request->is('post')) {
            $cart = $this->Carts->patchEntity($cart, $this->request->getData());
            if ($this->Carts->save($cart)) {
                $this->Flash->success(__('The cart has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cart could not be saved. Please, try again.'));
        }
        $variants = $this->Carts->Variants->find('list', ['limit' => 200]);
        $customers = $this->Carts->Customers->find('list', ['limit' => 200]);
        $this->set(compact('cart', 'variants', 'customers'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Cart id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cart = $this->Carts->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cart = $this->Carts->patchEntity($cart, $this->request->getData());
            if ($this->Carts->save($cart)) {
                $this->Flash->success(__('The cart has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cart could not be saved. Please, try again.'));
        }
        $variants = $this->Carts->Variants->find('list', ['limit' => 200]);
        $customers = $this->Carts->Customers->find('list', ['limit' => 200]);
        $this->set(compact('cart', 'variants', 'customers'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Cart id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cart = $this->Carts->get($id);
        if ($this->Carts->delete($cart)) {
            $this->Flash->success(__('The cart has been deleted.'));
        } else {
            $this->Flash->error(__('The cart could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }


    public function cart(){
        $this->loadModel('Variants');
        $this->loadModel('Customers');
        $this->loadModel('Uniforms');
        $this->loadModel('Organisations');

        $products = $this->Carts->find('all', array(
            'conditions' => array(
                'Carts.customer_id' => $this->Auth->user('id'),
            ),

        ))->contain(['Variants'=>['Uniforms'],'Customers'])->toList();

        $this->set('products',$products);

        $this->loadModel('websitecontents');
        $shipping = $this->Websitecontents->findByContentname('shipping')->first();
        $shippingprice = $shipping->contentvalue;
        $shippingnumber = (float)$shippingprice;
        $this->set('shippingnumber', $shippingnumber);

    }

    //ADD ITEM TO CART FUNCTION:

    //ADD ITEM TO CART FUNCTION:
    public function addCartItem(){
        $this->loadModel('Customers');
        $this->loadModel('Uniforms');
        $this->loadModel('Organisations');
        $this->loadModel('Uniforms');
        $customerID = $this->Auth->user('id');

        //check if organisation is currently inactive
        $customer = $this->Customers->findById($customerID)->first();
        $organisationId = $customer->organisation_id;
        $userorganisation = $this->Organisations->findBy_Id($organisationId)->first();
        $orgStatus = $userorganisation->active;
        if ($orgStatus == 0){
            $this->Flash->error(__('This organisation is now currently inactive. No items can be purchased at the moment.
                Please contact us if you have any questions.'));
            return $this->redirect(['controller' => 'Carts', 'action' => 'cart']);
        } else {

            //check if the uniform is archived
            $uniformID = $this->request->getData('uniform_id');
            $uniformitem = $this->Uniforms->findBy_Id($uniformID)->first();
            $uniformStatus = $uniformitem->status;

            //if uniform is archived do not add item to cart
            if ($uniformStatus == 0){
                $this->Flash->error(__('This item is currently archived and cannot be purchased.'));
                return $this->redirect($this->referer());
            } else {

                //else if uniform and organisation are not archived add item to cart
                $cartitem = $this->Carts->newEntity();

                if ($this->request->is('post')) {
                    //save values submitted in form - uniform id, colour and size
                    $uniform_id = $this->request->getData('uniform_id');
                    $colour = $this->request->getData('colour');
                    $size = $this->request->getData('size');

                    $this->loadModel('Variants'); //load variant model
                    //find variant record that matches uniform ID, size and colour submitted in form.
                    $variant_record = $this->Variants->findByUniform_idAndSizeAndColour($uniform_id, $size, $colour)->first();
                    //save variant ID into cart by using the record found matching criteria


                    $getItems = $this->Carts->find('all', ['conditions' => ['customer_id' => $this->Auth->user('id'), 'variant_id' => $variant_record->_id]])->toList();


                    if (sizeof($getItems) == 0) {
                        $cartitem->variant_id = $variant_record->_id;

                        //save all other fields into cart
                        $cartitem->customer_id = $this->Auth->user('id');
                        $cartitem->quantity = $this->request->getData('quantity');
                        //save item to cart
                        if ($this->request->getData('quantity') <= 0) {
                            $this->Flash->error(__('You cannot add 0 quantity or less of this item to cart. Please try again.'));
                            return $this->redirect(['controller' => 'Carts', 'action' => 'cart']);
                        } elseif ($this->Carts->save($cartitem)) {
                            $this->Flash->set('Item(s) successfully added to cart', ['element' => 'success']);
                            return $this->redirect(['controller' => 'Carts', 'action' => 'cart']);

                        } else {
                            //if cannot save item to cart, return error message
                            $this->Flash->error(__('Sorry, we could not save item(s) to your cart. Please try again.'));
                        }

                    } else {
                        $cartitem2 = $this->Carts->find('all', ['conditions' => ['variant_id' => $variant_record->_id]])->toList()[0];
                        $cartitem2->quantity = $cartitem2['quantity'] + $this->request->getData('quantity');
                        if ($this->Carts->save($cartitem2)) {
                            $this->Flash->set('Item(s) successfully added to cart', ['element' => 'success']);
                            return $this->redirect(['controller' => 'Carts', 'action' => 'cart']);

                        } else {
                            //if cannot save item to cart, return error message
                            $this->Flash->error(__('Sorry, we could not save item(s) to your cart. Please try again.'));
                        }
                    }

                }
            }
        }

    }

    public function remove($id = null){

        $uniform = $this->Carts->get($id);
        $result = $this->Carts->delete($uniform);

        return $this->redirect(['action' => 'cart']);

    }

    public function update($id = null){
        $uniform = $this->Carts->get($id);
        $quantity = $this->request->getData('quantity');

        //if item quantity in cart is updated to 0, remove the item from the cart
        if ($quantity <= 0){
            $result = $this->Carts->delete($uniform);
            return $this->redirect(['action' => 'cart']);
        } else {
            //update quantity and cart numbers
            $result = $this->Carts->updateAll(['quantity' => $quantity], ['id' => $id]);
            return $this->redirect(['action' => 'cart']);
        }
    }

    public function checkout(){
        $this->loadModel('Variants');
        $this->loadModel('Customers');
        $this->loadModel('Uniforms');
        $this->loadModel('Organisations');

        $this->loadModel('websitecontents');
        $shipping = $this->Websitecontents->findByContentname('shipping')->first();
        $shippingprice = $shipping->contentvalue;
        $shippingnumber = (float)$shippingprice;
        $this->set('shippingnumber', $shippingnumber);

        $customerID = $this->Auth->user('id');
        //check there is something in cart before proceed to checkout
        $cart = $this->Carts->find('all', array('conditions' => array('Carts.customer_id' =>$customerID ,),));
        $count = $cart->count();

        //check if organisation is currently inactive
        $customer = $this->Customers->findById($customerID)->first();
        $organisationId = $customer->organisation_id;
        $userorganisation = $this->Organisations->findBy_Id($organisationId)->first();
        $orgStatus = $userorganisation->active;


        if( $count==0) {
            $this->Flash->error(__('Please add an item to your cart first.'));
            return $this->redirect(['controller' => 'carts','action' => 'cart']);
        }
        else {

            if ($orgStatus==0){
                $this->Flash->error(__('This organisation is now currently inactive. No items can be purchased at the moment.
                Please contact us if you have any questions.'));
                return $this->redirect(['controller' => 'carts','action' => 'cart']);
            } else {

                $products = $this->Carts->find('all', array(
                    'conditions' => array(
                        'Carts.customer_id' => $this->Auth->user('id'),
                    ),

                ))->contain(['Variants' => ['Uniforms'], 'Customers'])->toList();

                $this->set('products', $products);
            }
        }

    }

    public function bypasscheckoutreview(){

        $this->loadModel('Variants');
        $this->loadModel('Customers');
        $this->loadModel('Uniforms');



        $products = $this->Carts->find('all', array(
            'conditions' => array(
                'Carts.customer_id' => $this->Auth->user('id'),
            ),

        ))->contain(['Variants'=>['Uniforms'],'Customers'])->toList();

        $this->set('products',$products);

        $this->loadModel('websitecontents');
        $shipping = $this->Websitecontents->findByContentname('shipping')->first();
        $shippingprice = $shipping->contentvalue;
        $shippingnumber = (float)$shippingprice;
        $this->set('shippingnumber', $shippingnumber);

    }


    public function placeByPassOrder(){

        $this->loadModel('Orders');

        $this->loadModel('Variants');
        $this->loadModel('Customers');
        $this->loadModel('Uniforms');
        $orders = $this->Orders->newEntity();

        if ($this->request->is(['patch', 'post', 'put'])){
            //var_dump($this->request->getData());
            //save values submitted in form - uniform id, colour and size
            $phone = $this->request->getData('phone');

            $a= ((int) $phone) ;


            $int_array  = array_map('intval', str_split($phone));
            //get the lenght of the array
            $int_lenght = count($int_array);

            $c=is_int($a);

            if( $c  &&  $int_lenght==10  ){

                $name = $this->request->getData('name');
                $email = $this->request->getData('email');
                $phone = $this->request->getData('phone');

                $address = $this->request->getData('address');
                $suburb = $this->request->getData('suburb');
                $postcode = $this->request->getData('postcode');

                $state = $this->request->getData('state');
                $comments = $this->request->getData('comments');
                date_default_timezone_set('Australia/Melbourne');
                $date = Time::now();
                $customer_id = $this->Auth->user('id');
                $paidstatus = 'bypassed online payment - requires invoice';


                $orders->customer_id =$customer_id;
                $orders->recipientname =$name;
                $orders->orderdate =$date;
                $orders->address =$address;
                $orders->suburb =$suburb;
                $orders->state =$state;
                $orders->paidstatus =$paidstatus;
                $orders->comments =$comments;
                $orders->email =$email;
                $orders->postcode =$postcode;
                $orders->phone =$phone;

                $products = $this->Carts->find('all', array(
                    'conditions' => array(
                        'Carts.customer_id' => $this->Auth->user('id'),
                    ),

                ))->contain(['Variants'=>['Uniforms'],'Customers'])->toList();

                $sum=0;
                foreach($products as $product){

                    $sum+= $product->quantity * $product['variant']->price;
                }

                $orders->totalprice=$sum;


                if ($this->Orders->save($orders)){

                    $products2 = $this->Carts->find('all', array(
                        'conditions' => array(
                            'Carts.customer_id' => $this->Auth->user('id'),
                        ),

                    ))->contain(['Variants'=>['Uniforms'],'Customers'])->toList();
                    $this->loadModel('Orderitems');
                    foreach($products2 as $product2){
                        $orderitems = $this->Orderitems->newEntity();
                        $orderitems->order_id=$orders->id;
                        $orderitems->orderuniformname=$product2['variant']['uniform']['uniformname'];
                        $orderitems->orderprice=$product2['variant']['price'];
                        $orderitems->ordercolour=$product2['variant']['colour'];
                        $orderitems->ordersize=$product2['variant']['size'];
                        $orderitems->orderquantity=$product2['quantity'];
                        $this->Orderitems->save($orderitems);



                    }

                    $orderID = $orders->id;
                    $customerID = $orders->customer_id;

                    $this->sendOrderEmail($orderID);
                    $this->deleteCart($customerID);


                    $this->Flash->set('Thank you. Your order has been successfully submitted', ['element'=>'success']);

                    return $this->redirect(['controller' => 'Carts', 'action' => 'orderconfirmed', $orderID]);
                }
                else {
                    //if cannot save item to cart, return error message
                    $this->Flash->error(__('Sorry, we could not submit your order. Please try again.'));
                    return $this->redirect(['action' => 'bypasscheckoutreview']);
                }

            }

            else {

                $this->Flash->error(__('Please enter a valid Australia phone number.'));
                return $this->redirect(['action' => 'bypasscheckoutreview']);




            }



        }

    }

    public function sendOrderEmail($orderID){

        $this->loadModel('Orders');
        $this->loadModel('Orderitems');
        $this->loadModel('Customers');


        $order = $this->Orders->find('all', array('conditions' => array('Orders.id' =>$orderID ,),))->first();
        $orderitems = $this->Orderitems->find('all',array('conditions' => array('Orderitems.order_id' =>$orderID,),));


        $customerid = $order->customer_id;

        $customer = $this->Customers->find('all', array('conditions' => array('Customers.id' =>$customerid ,),))->first();

        $orderdate = $order->orderdate;
        $comments = $order->comments;
        $name = $order->recipientname;
        $phone = $order->phone;
        $address = $order->address;
        $suburb = $order->suburb;
        $state = $order->state;
        $postcode = $order->postcode;
        $paymentstatus = $order->paidstatus;
        $orderemail = $order->email;

        $customername = $customer->firstname;
        $customerlname = $customer->lastname;
        $customeremail = $customer->email;

        $this->loadModel('websitecontents');
        $shipping = $this->Websitecontents->findByContentname('shipping')->first();
        $shippingprice = $shipping->contentvalue;
        $shippingnumber = (float)$shippingprice;


        //customer copy email
        $email = new Email('default');
        $email->setattachments([
            'SClogo.png' => [
                'file' => WWW_ROOT . 'img' . DS . 'SClogo.png',
                'mimetype' => 'image/png',
                'contentId' => 'SClogo'
            ]
        ]);
        $email->setEmailFormat('html');
        $email->setFrom('orderconfirmation@shoreditchcorporate.com.au', 'Shoreditch Corporate');
        $email->setSubject('Thanks for your order');
        $email->setTo($orderemail);
        $email->setTemplate('order');
        $email->setViewVars([
            'orderID' => $orderID,
            'orderdate' => $orderdate,
            'comments' => $comments,
            'name' => $name,
            'phone' => $phone,
            'address' => $address,
            'suburb' => $suburb,
            'state' => $state,
            'postcode' => $postcode,
            'orderitems' => $orderitems,
            'customername' =>$customername,
            'paymentstatus' => $paymentstatus,
            'shippingnumber' =>$shippingnumber
        ]);
        $email->send();


        //SC copy of email sent to Rebecca: configured to test gmail account
        $SCemail = new Email('default');
        $SCemail->setattachments([
            'SClogo.png' => [
                'file' => WWW_ROOT . 'img' . DS . 'SClogo.png',
                'mimetype' => 'image/png',
                'contentId' => 'SClogo'
            ]
        ]);
        $SCemail->setEmailFormat('html');
        $SCemail->setFrom('neworder@shoreditchcorporate.com.au', 'Shoreditch Corporate');
        $SCemail->setSubject('New Order Received Online');
        $SCemail->setTo('team26ie2019s1@gmail.com');
        $SCemail->setTemplate('shoreditchorder');
        $SCemail->setViewVars([
            'orderID' => $orderID,
            'orderdate' => $orderdate,
            'comments' => $comments,
            'name' => $name,
            'phone' => $phone,
            'address' => $address,
            'suburb' => $suburb,
            'state' => $state,
            'postcode' => $postcode,
            'orderitems' => $orderitems,
            'customername' =>$customername,
            'customerlname' => $customerlname,
            'customeremail' => $customeremail,
            'paymentstatus' => $paymentstatus,
            'shippingnumber' => $shippingnumber
        ]);
        $SCemail->send();


    }



    public function deleteCart(){

        $this->loadModel('Carts');


        $cartItems = $this->Carts->find('all',array('conditions' => array('Carts.customer_id' =>$this->Auth->user('id'))));


        foreach (
            $cartItems as $cartItem
        )
            $this->Carts->delete($cartItem);

    }

    public function orderconfirmed($orderID){
        $this->loadModel('Orders');
        $this->loadModel('Orderitems');


        if(is_numeric($orderID)){

            $order = $this->Orders->find('all', array('conditions' => array('Orders.id' =>$orderID)))->first();
            $query = $this->Orderitems->find('all',array('conditions' => array('Orderitems.order_id' => $order->id)));

            $orderitems = $query->toList();

            //  var_dump($orderitems);

            $this->set('order',$order);
            $this->set('orderitems',$orderitems);
            $this->deleteCart();

            $this->loadModel('websitecontents');
            $shipping = $this->Websitecontents->findByContentname('shipping')->first();
            $shippingprice = $shipping->contentvalue;
            $shippingnumber = (float)$shippingprice;
            $this->set('shippingnumber', $shippingnumber);


        }
        else{

            $order = $this->Orders->find('all', array('conditions' => array('Orders.paypal' =>$orderID)))->first();
            $orderitems = $this->Orderitems->find('all',array('conditions' => array('Orderitems.order_id' => $order->id)))->toList();


            // var_dump($order->id);

            $this->set('order',$order);
            $this->set('orderitems',$orderitems);
            $this->deleteCart();

            $this->loadModel('websitecontents');
            $shipping = $this->Websitecontents->findByContentname('shipping')->first();
            $shippingprice = $shipping->contentvalue;
            $shippingnumber = (float)$shippingprice;
            $this->set('shippingnumber', $shippingnumber);

        }



    }

    public function saveorder(){
        $conn = ConnectionManager::get('default');
        $this->loadModel('Orders');

        $this->loadModel('Variants');
        $this->loadModel('Customers');
        $this->loadModel('Uniforms');

        $this->loadModel('websitecontents');
        $shipping = $this->Websitecontents->findByContentname('shipping')->first();
        $shippingprice = $shipping->contentvalue;
        $shippingnumber = (float)$shippingprice;

        $orders = $this->Orders->newEntity();

        $session = $this->getRequest()->getSession();

        $name = $session->read('name');
        $email = $session->read('email');
        $phone = $session->read('phone');

        $address = $session->read('address');
        $suburb = $session->read('suburb');
        $postcode = $session->read('postcode');

        $state = $session->read('state');
        $comments = $session->read('comments');
        date_default_timezone_set('Australia/Melbourne');
        $date = Time::now();
        $customer_id = $this->Auth->user('id');

        $paidstatus = $this->request->getData('status');
        $paypal_id = $this->request->getData('orderID');

        $orders->customer_id = $customer_id;
        $orders->recipientname = $name;
        $orders->orderdate = $date;
        $orders->address = $address;
        $orders->suburb = $suburb;
        $orders->state = $state;
        $orders->paidstatus = $paidstatus;
        $orders->comments = $comments;
        $orders->email = $email;
        $orders->postcode = $postcode;
        $orders->phone = $phone;
        $orders->paypal = $paypal_id;

        $products = $this->Carts->find('all', array(
            'conditions' => array(
                'Carts.customer_id' => $this->Auth->user('id'),
            ),

        ))->contain(['Variants'=>['Uniforms'],'Customers'])->toList();

        $sum=0;
        foreach($products as $product){
            $sum+= $product->quantity * $product['variant']->price;
        }
        $orders->totalprice=$sum+$shippingnumber;
        if($this->Orders->save($orders)){

            $this->loadModel('Orders');
            $this->loadModel('Carts');
            $this->loadModel('Orderitems');
            $this->loadModel('Variants');
            $this->loadModel('Uniforms');
            $this->loadModel('Customers');


            $customerID = $this->Auth->user('id');
            $order = $this->Orders->find('all',array('conditoins' => array('Orders.customer_id' =>$customerID, 'Orders.paidstatus' => 'COMPLETED'),'order' => ['Orders.id' => 'DESC']))->first();
            $orderID = $order->id;

            $products2 = $this->Carts->find('all', array(
                'conditions' => array(
                    'Carts.customer_id' => $customerID,
                ),
            ))->contain(['Variants'=>['Uniforms'],'Customers'])->toList();

            foreach($products2 as $product2){
                $orderitems = $this->Orderitems->newEntity();
                $orderitems->order_id=$orderID;
                $orderitems->orderuniformname=$product2['variant']['uniform']['uniformname'];
                $orderitems->orderprice=$product2['variant']['price'];
                $orderitems->ordercolour=$product2['variant']['colour'];
                $orderitems->ordersize=$product2['variant']['size'];
                $orderitems->orderquantity=$product2['quantity'];
                $this->Orderitems->save($orderitems);

            }


            $paidstatus = 'paid with PayPal';
            $order->paidstatus =$paidstatus;
            $this->Orders->save($order);



            $this->sendOrderEmail($orderID);
            $this->deleteCart($customerID);


            $this->Flash->set('Thank you. Your order has been successfully submitted', ['element'=>'success']);

            return $this->redirect(['controller' => 'Carts', 'action' => 'orderconfirmed', $orderID]);





            $query = $conn->newQuery();
            $query->update('orders')
                ->set(['paypal' => $paypal_id])
                ->where(['id' => $orders->id]);
            $stmt = $query->execute();

            echo "Success!";exit;



        } else {
            print_r($orders->errors());exit;
        }


    }

    public function shippinginfo(){
        $this->loadModel('Variants');
        $this->loadModel('Customers');
        $this->loadModel('Uniforms');
        $this->loadModel('Organisations');

        $customerID = $this->Auth->user('id');
        $cart = $this->Carts->find('all', array('conditions' => array('Carts.customer_id' =>$customerID ,),));
        $count = $cart->count();

        //check if organisation is currently inactive
        $customer = $this->Customers->findById($customerID)->first();
        $organisationId = $customer->organisation_id;
        $userorganisation = $this->Organisations->findBy_Id($organisationId)->first();
        $orgStatus = $userorganisation->active;

        if( $count==0) {
            $this->Flash->error(__('Please add an item to your cart first.'));
            return $this->redirect(['controller' => 'carts','action' => 'cart']);
        }
        else {

            if ($orgStatus==0){
                $this->Flash->error(__('This organisation is now currently inactive. No items can be purchased at the moment.
                Please contact us if you have any questions.'));
                return $this->redirect(['controller' => 'carts','action' => 'cart']);
            } else {

                $products = $this->Carts->find('all', array(
                    'conditions' => array(
                        'Carts.customer_id' => $this->Auth->user('id'),
                    ),

                ))->contain(['Variants' => ['Uniforms'], 'Customers'])->toList();

                $this->set('products', $products);
            }
        }

    }

    public function placeorder()
    {

        //validate phone number submitted in shippinginfo.ctp first
        $phone = $this->request->getData('phone');
        $a = ((int)$phone);
        $int_array = array_map('intval', str_split($phone));
        //get the length of the array
        $int_lenght = count($int_array);
        $c = is_int($a);

        //if phone number is valid (10 digits) then process to paypal function
        if ($c && $int_lenght == 10) {

            $this->loadModel('Variants');
            $this->loadModel('Customers');
            $this->loadModel('Uniforms');

            $session = $this->getRequest()->getSession();
            $session->write('name', $this->request->getData('name'));
            $session->write('email', $this->request->getData('email'));
            $session->write('phone', $this->request->getData('phone'));

            $session->write('address', $this->request->getData('address'));
            $session->write('suburb', $this->request->getData('suburb'));
            $session->write('postcode', $this->request->getData('postcode'));

            $session->write('state', $this->request->getData('state'));
            $session->write('comments', $this->request->getData('comments'));

            $products = $this->Carts->find('all', array(
                'conditions' => array(
                    'Carts.customer_id' => $this->Auth->user('id'),
                ),

            ))->contain(['Variants' => ['Uniforms'], 'Customers'])->toList();

            $this->set('products', $products);

            $this->loadModel('websitecontents');
            $shipping = $this->Websitecontents->findByContentname('shipping')->first();
            $shippingprice = $shipping->contentvalue;
            $shippingnumber = (float)$shippingprice;
            $this->set('shippingnumber', $shippingnumber);

        } else {
            $this->Flash->error(__('Please enter a valid Australian phone number.'));
            return $this->redirect($this->referer());
        }
    }

//    public function saveorderitems(){
//
//        $this->loadModel('Orders');
//        $this->loadModel('Carts');
//        $this->loadModel('Orderitems');
//        $this->loadModel('Variants');
//        $this->loadModel('Uniforms');
//        $this->loadModel('Customers');
//
//
//        $customerID = $this->Auth->user('id');
//        $order = $this->Orders->find('all',array('conditoins' => array('Orders.customer_id' =>$customerID, 'Orders.paidstatus' => 'COMPLETED'),'order' => ['Orders.id' => 'DESC']))->first();
//        $orderID = $order->id;
//var_dump($orderID);
//        $products2 = $this->Carts->find('all', array(
//            'conditions' => array(
//                'Carts.customer_id' => $customerID,
//            ),
//        ))->contain(['Variants'=>['Uniforms'],'Customers'])->toList();
//
//        foreach($products2 as $product2){
//            $orderitems = $this->Orderitems->newEntity();
//            $orderitems->order_id=$orderID;
//            $orderitems->orderuniformname=$product2['variant']['uniform']['uniformname'];
//            $orderitems->orderprice=$product2['variant']['price'];
//            $orderitems->ordercolour=$product2['variant']['colour'];
//            $orderitems->ordersize=$product2['variant']['size'];
//            $orderitems->orderquantity=$product2['quantity'];
//            $this->Orderitems->save();
//
//        }
//
//
//        $paidstatus = 'paid with PayPal';
//        $order->paidstatus =$paidstatus;
//        $this->Orders->save();
//
//
//
//        $this->sendOrderEmail($orderID);
//        $this->deleteCart($customerID);
//
//
//        $this->Flash->set('Thank you. Your order has been successfully submitted', ['element'=>'success']);
//
//        return $this->redirect(['controller' => 'Carts', 'action' => 'orderconfirmed', $orderID]);
//
//
//
//    }

}
