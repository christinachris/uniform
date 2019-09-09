<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Utility\Security;
use Cake\ORM\TableRegistry;
use App\Model\Entity\Role;

/**
 * Admins Controller
 *
 * @property \App\Model\Table\AdminsTable $Admins
 *
 * @method \App\Model\Entity\Admin[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AdminsController extends AppController
{
//    public $helpers = ['Paginator'=> ['templates'=>'paginator-templates']
//    ];

    public function initialize()
    {
        parent::initialize();
//        $this->loadComponent('Paginator');
        $this->loadComponent('Paginator');
    }

    public function isAuthorized($user = null) {
        $this->loadModel('Organisations');
        if ($this->request->action === 'admindashboard'||$this->request->action === 'websitecontents'||$this->request->action === 'contentsave'
            ||$this->request->action === 'headerfooter'||$this->request->action === 'headerfooteredit'||$this->request->action === 'servicescontents'
            || $this->request->action === 'othercontent'||$this->request->action === 'othercontentedit'|| $this->request->action === 'servicescontentedit'||$this->request->action === 'contactuscontents'||$this->request->action === 'contactuscontentedit'
            ||$this->request->action === 'aboutuscontents'||$this->request->action === 'aboutuscontentedit'||$this->request->action === 'homepagecontents'
            ||$this->request->action === 'homepagecontentedit'||$this->request->action === 'organisationlist'||$this->request->action === 'organisationdetails'
            ||$this->request->action === 'organisationedit'||$this->request->action === 'organisationadd'||$this->request->action === 'organisationdelete'
            ||$this->request->action === 'uniformlist'||$this->request->action === 'uniformdetails'||$this->request->action === 'uniformedit'
            ||$this->request->action === 'uniformadd'||$this->request->action === 'uniformdelete'||$this->request->action === 'variantlist'
            ||$this->request->action === 'variantedit'||$this->request->action === 'variantadd'||$this->request->action === 'variantdelete'||$this->request->action === 'variantsave' || $this->request->action === 'orderlist'|| $this->request->action === 'orderdetails'|| $this->request->action === 'orderedit' ) {

            $oid=$user['organisation_id'];

            $getOrganization=$this->Organisations->get($oid);

            //var_dump($getOrganization);

            if ($getOrganization['organisationname']=='Shoreditch Corporate Admin') {

                return true;

            }
            else{
                return false;
            }

        }

        else{
            return false;
        }


    }

    public function admindashboard(){

    }

    public function websitecontents(){

    }

    public function headerfooter(){
        $this->loadModel('websitecontents');

        //set logo
        $SClogo = $this->Websitecontents->findByContentname('logo')->first();
        $logo  = $SClogo->contentvalue;
        $this->set('logo', $logo);

        //set phone number
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

    public function headerfooteredit(){
        $this->loadModel('websitecontents');

        $condi_arr = [
            'OR' => [
                ['id' => 1],
                ['id' => 2],
                ['id' => 3],
                ['id' => 3],
                ['id' => 8],
                ['id' => 6],
                ['id' => 11],
                ['id' => 12],
                ['id' => 13]
            ]
        ];/*  condition array for select id*/

        $headerfootercontents = $this->websitecontents->find('all')->where($condi_arr);

        $this->set('headerfootercontents', $headerfootercontents);

    }

    public function homepagecontents(){

        $this->loadModel('websitecontents');

        //homepage 1st main slide title
        $homemainslidetitle = $this->Websitecontents->findByContentname('homemainslidetitle')->first();
        $homemaintitle = $homemainslidetitle->contentvalue;
        $this->set('homemaintitle', $homemaintitle);

        //home main slide subtext
        $homemainslidetext = $this->Websitecontents->findByContentname('homemainslidetext')->first();
        $homefirstslidetext = $homemainslidetext->contentvalue;
        $this->set('homefirstslidetext', $homefirstslidetext);

        //homepage slide 2 title
        $homeslidetwotitle = $this->Websitecontents->findByContentname('homeslidetwotitle')->first();
        $hhomeslidetwotitle = $homeslidetwotitle->contentvalue;
        $this->set('hhomeslidetwotitle', $hhomeslidetwotitle);

        //homepage slide 3 title
        $homeslidethreetitle = $this->Websitecontents->findByContentname('homeslidethreetitle')->first();
        $hhomeslidethreetitle = $homeslidethreetitle->contentvalue;
        $this->set('hhomeslidethreetitle', $hhomeslidethreetitle);

        //homepage slide 4 title
        $homeslidefourtitle = $this->Websitecontents->findByContentname('homeslidefourtitle')->first();
        $hhomeslidefourtitle = $homeslidefourtitle->contentvalue;
        $this->set('hhomeslidefourtitle', $hhomeslidefourtitle);

        //homepage slide 5 title
        $homeslidefivetitle = $this->Websitecontents->findByContentname('homeslidefivetitle')->first();
        $hhomeslidefivetitle = $homeslidefivetitle->contentvalue;
        $this->set('hhomeslidefivetitle', $hhomeslidefivetitle);

        //company vision statement after main homepage carousel
        $homevision = $this->Websitecontents->findByContentname('homevision')->first();
        $vision = $homevision->contentvalue;
        $this->set('vision', $vision);

        //goal statement under vision and main home page carousel
        $homegoal = $this->Websitecontents->findByContentname('homegoal')->first();
        $goal = $homegoal->contentvalue;
        $this->set('goal', $goal);

        //about us section on home page: title of the RHS of section
        $homeaboutheading = $this->Websitecontents->findByContentname('homeaboutheading')->first();
        $haboutheading = $homeaboutheading->contentvalue;
        $this->set('haboutheading', $haboutheading);

        //about us section on home page: text under title
        $homeabouttext = $this->Websitecontents->findByContentname('homeabouttext')->first();
        $habouttext = $homeabouttext->contentvalue;
        $this->set('habouttext', $habouttext);

        //what we do section on home page: title of Services/What we do section
        $homeservicestitle = $this->Websitecontents->findByContentname('homeservicestitle')->first();
        $hhomeservicestitle = $homeservicestitle->contentvalue;
        $this->set('hhomeservicestitle', $hhomeservicestitle);

        //what we do section on home page: text of services/what we do section
        $homeservicetext = $this->Websitecontents->findByContentname('homeservicetext')->first();
        $hservicestext = $homeservicetext->contentvalue;
        $this->set('hservicestext', $hservicestext);

        //get in touch section on homepage: title of section
        $homecontacttitle = $this->Websitecontents->findByContentname('homecontacttitle')->first();
        $hhomecontacttitle = $homecontacttitle->contentvalue;
        $this->set('hhomecontacttitle', $hhomecontacttitle);

        //get in touch section on homepage: text of section
        $homecontacttext = $this->Websitecontents->findByContentname('homecontacttext')->first();
        $hhomecontacttext = $homecontacttext->contentvalue;
        $this->set('hhomecontacttext', $hhomecontacttext);

    }

    public function homepagecontentedit(){

        $this->loadModel('websitecontents');

        $condi_arr = [
            'OR' => [
                ['id' => 29],
                ['id' => 30],
                ['id' => 32],
                ['id' => 34],
                ['id' => 36],
                ['id' => 38],
                ['id' => 40],
                ['id' => 41],
                ['id' => 42],
                ['id' => 43],
                ['id' => 45],
                ['id' => 46],
                ['id' => 47],
                ['id' => 48]
            ]
        ];/*  condition array for select id*/

        $homepagecontents = $this->websitecontents->find('all')->where($condi_arr);

        $this->set('homepagecontents', $homepagecontents);



    }

    public function aboutuscontents(){
        $this->loadModel('websitecontents');

        //page title - Aboutus page
        $aboutpagetitle = $this->Websitecontents->findByContentname('aboutpagetitle')->first();
        $aboutpagetitle = $aboutpagetitle->contentvalue;
        $this->set('aboutpagetitle', $aboutpagetitle);

        //subheading on about us page
        $aboutsubheading = $this->Websitecontents->findByContentname('aboutsubheading')->first();
        $aboutpagesubheading = $aboutsubheading->contentvalue;
        $this->set('aboutpagesubheading', $aboutpagesubheading);

        //main content on about us page
        $aboutcontent = $this->Websitecontents->findByContentname('aboutcontent')->first();
        $content = $aboutcontent->contentvalue;
        $this->set('content', $content);
    }

    public function aboutuscontentedit(){

        $this->loadModel('websitecontents');

        $condi_arr = [
            'OR' => [
                ['id' => 14],
                ['id' => 15],
                ['id' => 16]
            ]
        ];/*  condition array for select id*/

        $aboutpagecontents = $this->websitecontents->find('all')->where($condi_arr);

        $this->set('aboutpagecontents', $aboutpagecontents);


    }


    public function contentsave($id){

        $this->loadModel('websitecontents');

        $content = $this->websitecontents->get($id);

        /* update function */
        if ($this->request->is(['patch', 'post', 'put'])) {


            $content = $this->websitecontents->patchEntity($content, $this->request->getData());

            if ($this->websitecontents->save($content)) {

                $this->Flash->success(__('The data has been saved.'));

//                return $this->redirect(['action' => 'websitecontents']);
                return $this->redirect($this->referer());
            }
            $this->Flash->error(__('The data could not be saved. Please, try again.'));
        }
    }

    public function servicescontents(){

        $this->loadModel('websitecontents');

        //What we do page title
        $servicespagetitle = $this->Websitecontents->findByContentname('servicespagetitle')->first();
        $whatwedotitle = $servicespagetitle->contentvalue;
        $this->set('whatwedotitle', $whatwedotitle);

        //section one title: Design Service Title (What we do page)
        $servicessectiononetitle = $this->Websitecontents->findByContentname('servicessectiononetitle')->first();
        $sectiononetitle = $servicessectiononetitle->contentvalue;
        $this->set('sectiononetitle', $sectiononetitle);

        //section one content: Design service text content (What we do page)
        $servicessectiononecontent = $this->Websitecontents->findByContentname('servicessectiononecontent')->first();
        $sectiononecontent = $servicessectiononecontent->contentvalue;
        $this->set('sectiononecontent', $sectiononecontent);

        //section two content: Stock Services title (What we do page)
        $servicessectiontwotitle = $this->Websitecontents->findByContentname('servicessectiontwotitle')->first();
        $sectiontwotitle = $servicessectiontwotitle->contentvalue;
        $this->set('sectiontwotitle', $sectiontwotitle);

        //section two content: Stock Services content (What we do page)
        $servicessectiontwocontent = $this->Websitecontents->findByContentname('servicessectiontwocontent')->first();
        $sectiontwocontent = $servicessectiontwocontent->contentvalue;
        $this->set('sectiontwocontent', $sectiontwocontent);

        //supplier description
        $servicessupplierdescription = $this->Websitecontents->findByContentname('servicessupplierdescription')->first();
        $supplierdescription = $servicessupplierdescription->contentvalue;
        $this->set('supplierdescription', $supplierdescription);

        //section three title: Recycling (What we do page)
        $servicessectionthreetitle = $this->Websitecontents->findByContentname('servicessectionthreetitle')->first();
        $sectionthreetitle = $servicessectionthreetitle->contentvalue;
        $this->set('sectionthreetitle', $sectionthreetitle);

        //section three content: Recycling (What we do page)
        $servicessectionthreecontent = $this->Websitecontents->findByContentname('servicessectionthreecontent')->first();
        $sectionthreecontent = $servicessectionthreecontent->contentvalue;
        $this->set('sectionthreecontent', $sectionthreecontent);


    }

    public function servicescontentedit(){
        $this->loadModel('websitecontents');

        $condi_arr = [
            'OR' => [
                ['id' => 17],
                ['id' => 18],
                ['id' => 19],
                ['id' => 21],
                ['id' => 22],
                ['id' => 24],
                ['id' => 25],
                ['id' => 26]
            ]
        ];/*  condition array for select id*/

        $servicescontents = $this->websitecontents->find('all')->where($condi_arr);

        $this->set('servicescontents', $servicescontents);

    }

    public function contactuscontents(){

        $this->loadModel('websitecontents');
        //map code
        $mapcode = $this->Websitecontents->findByContentname('googlemapcode')->first();
        $googlemap = $mapcode->contentvalue;
        $this->set('googlemap', $googlemap);

        //get in touch page name
        $contacttitle = $this->Websitecontents->findByContentname('contactpagetitle')->first();
        $contactpagetitle = $contacttitle->contentvalue;
        $this->set('contactpagetitle', $contactpagetitle);

        //setting phone number - get in touch page
        $phonecontent = $this->Websitecontents->findByContentname('phone')->first();
        $phone = $phonecontent->contentvalue;
        $this->set('phone', $phone);

        //setting address - get in touch page
        $addresscontent = $this->Websitecontents->findByContentname('address')->first();
        $address = $addresscontent->contentvalue;
        $this->set('address', $address);

        //setting business days - get in touch page
        $businesscontent = $this->Websitecontents->findByContentname('businessdays')->first();
        $businessdays = $businesscontent->contentvalue;
        $this->set('businessdays', $businessdays);

        //setting business hours - get in touch page
        $businesscontent2 = $this->Websitecontents->findByContentname('businesshours')->first();
        $businesshours = $businesscontent2->contentvalue;
        $this->set('businesshours', $businesshours);

        //setting email account - get in touch page
        $emailcontent = $this->Websitecontents->findByContentname('emailaccount')->first();
        $emailaccount = $emailcontent->contentvalue;
        $this->set('emailaccount', $emailaccount);

        //setting email account domain - get in touch page
        $emailcontent2 = $this->Websitecontents->findByContentname('emaildomain')->first();
        $emaildomain = $emailcontent2->contentvalue;
        $this->set('emaildomain', $emaildomain);

    }

    public function contactuscontentedit(){

        $this->loadModel('websitecontents');

        $condi_arr = [
            'OR' => [
                ['id' => 28],
                ['id' => 2],
                ['id' => 6],
                ['id' => 4],
                ['id' => 5],
                ['id' => 9],
                ['id' => 10],
                ['id' => 7]
            ]
        ];/*  condition array for select id*/

        $contactuscontents = $this->websitecontents->find('all')->where($condi_arr);

        $this->set('contactuscontents', $contactuscontents);

    }

    public function othercontent(){
        $this->loadModel('websitecontents');
        $shipping = $this->Websitecontents->findByContentname('shipping')->first();
        $shippingprice = $shipping->contentvalue;
        $shippingnumber = (float)$shippingprice;
        $this->set('shippingprice', $shippingprice);

    }

    public function othercontentedit(){
        $this->loadModel('websitecontents');

        $condi_arr = [
            'OR' => [
                ['id' => 50]
            ]
        ];/*  condition array for select id*/

        $othercontents = $this->websitecontents->find('all')->where($condi_arr);

        $this->set('othercontents', $othercontents);


    }



    public function organisationlist(){

        $this->loadModel('organisations');
        //set condition so that it finds all organisations except for the admin one
        $conditions = ['organisationname !='=> 'Shoreditch Corporate Admin'];
        //save all organisations found in variable
        $organisations =  $this->organisations->find('all')->where($conditions);
        //set list/array variable to be shown in view
        $this->set('organisations',$organisations);
    }

    public function organisationdetails($id=0){

        $this->loadModel('organisations');
        $organisation = $this->organisations->get($id);
        $activeCodition = $organisation->active;

        if ($activeCodition == 0){
            $activeStatus = "Inactive";
        }
        else{
            $activeStatus ="Active";
        }

        $this->set('activeStatus',$activeStatus);

        $this->set('organisation', $organisation);

    }

    public function organisationadd(){

        $statusSelect = array('1' => 'Active','0'=> 'Inactive');
        $this->set('statusSelect', $statusSelect);

        $this->loadModel('organisations');

        if($this->request->is(['patch', 'post', 'put'])) {
            $newOrg = $this->organisations->newEntity();

            $name = $this->request->getData('organisationname');
            $accesscode = $this->request->getData('accesscode');
            $bypasscode = $this->request->getData('bypasscode');
            $logo = $this->request->getData('logopath');
            $status = $this->request->getData('active');


            $newOrg->organisationname = $name;
            $newOrg->accesscode = $accesscode;
            $newOrg->bypasscode = $bypasscode;
            $newOrg->logopath = $logo;
            $newOrg->active = $status;
            if ($this->organisations->save($newOrg)) {

                $this->Flash->set('The data has been added', ['element' => 'success']);

                return $this->redirect(['controller' => 'Admins', 'action' => 'organisationlist']);

            } else {

                $this->Flash->error(__('Sorry, we could not save the data. Please try again.'));
                return $this->redirect(['action' => 'organisationadd']);

            }
        }
    }

    public function organisationedit($id=0){
        $this->loadModel('organisations');

        $organisation = $this->organisations->get($id);
        $this->set('organisation', $organisation);

        $statusSelect = array('1' => 'Active','0'=> 'Inactive');
        $this->set('statusSelect', $statusSelect);

        $activeCondition = $organisation->active;

        if ($activeCondition == 0){
            $activeStatus = "Inactive";
        }
        else{
            $activeStatus ="Active";
        }

        $this->set('activeStatus',$activeStatus);

        if ($this->request->is(['patch', 'post', 'put'])) {


            $organisation = $this->organisations->patchEntity($organisation, $this->request->getData());

            if ($this->organisations->save($organisation)) {

                $this->Flash->success(__('The data has been saved.'));

                return $this->redirect(['action' => 'organisationdetails', $id]);
            }
            $this->Flash->error(__('The data could not be saved. Please, try again.'));
        }

    }

    public function organisationdelete($id=0){

        $this->loadModel('organisations');
        $this->loadModel('variants');
        $this->loadModel('uniforms');

        $organisation = $this->organisations->get($id);

        $uniforms = $this->uniforms->find('all')->where(['organisation_id'=>$id]);

        foreach ($uniforms as $uniform){

            $uniformID = $uniform->id;
            $variants = $this->variants->find('all')->where(['uniform_id'=>$uniformID]);

            foreach ($variants as $variant){
                $this->variants->delete($variant);
            }

            $this->uniforms->delete($uniform);
        }

        if ($this->organisations->delete($organisation)) {
            $this->Flash->success(__('The data has been deleted.'));
        } else {
            $this->Flash->error(__('The data could not be deleted. Please, try again.'));
        }


        return $this->redirect(['action' => 'organisationlist']);

    }

    public function uniformlist($id=0){

        $this->loadModel('uniforms');
        $this->loadModel('organisations');

        $uniforms = $this->uniforms->find('all')->where(['organisation_id'=>$id]);
        $organisation = $this->organisations->get($id);
        $orgname = $organisation->organisationname;
        $iid=$id;

        $this->set('orgname',$orgname);
        $this->set('oid', $id);
        $this->set('uniforms', $uniforms);
        $this->set('iid', $iid);



    }

    public function uniformdetails($id=0){

        $this->loadModel('uniforms');
        $this->loadModel('pictures');

        $uniform = $this->uniforms->get($id);

        $pictures = $this->pictures->findByUniform_id($id)->toList();

        $this->set('uniform', $uniform);

        $orgid = $uniform->organisation_id;
        $this->set('orgid', $orgid);

        $this->loadModel('Organisations');
        $organisation = $this->Organisations->findBy_Id($orgid)->first();
        $orgname = $organisation->organisationname;
        $this->set('orgname', $orgname);
        $this->set('pictures', $pictures);

        $activeCodition = $uniform->status;

        if ($activeCodition == 0){
            $activeStatus = "Inactive";
        }
        else{
            $activeStatus ="Active";
        }

        $this->set('activeStatus',$activeStatus);




    }

    public function uniformedit($id=0){
        $this->loadModel('uniforms');

        $uniform = $this->uniforms->get($id);

        $orgid = $uniform->organisation_id;
        $this->set('orgid', $orgid);

        $this->loadModel('Organisations');
        $organisation = $this->Organisations->findBy_Id($orgid)->first();
        $orgname = $organisation->organisationname;
        $this->set('orgname', $orgname);

        $statusSelect = array('1' => 'Active','0'=> 'Inactive');
        $this->set('statusSelect', $statusSelect);

        $activeCondition = $uniform->status;

        if ($activeCondition == 0){
            $activeStatus = "Inactive";
        }
        else{
            $activeStatus ="Active";
        }

        $this->set('activeStatus',$activeStatus);

        if ($this->request->is(['patch', 'post', 'put'])) {


            $uniform = $this->uniforms->patchEntity($uniform, $this->request->getData());

            if ($this->uniforms->save($uniform)) {

                $this->Flash->success(__('The data has been saved.'));

                return $this->redirect(['action' => 'uniformdetails', $id]);
            }
            $this->Flash->error(__('The data could not be saved. Please, try again.'));
        }

        $this->set('uniform',$uniform);


    }

    public function uniformadd($oid){

        $statusSelect = array('1' => 'Active','0'=> 'Inactive');
        $this->set('statusSelect', $statusSelect);

        $this->loadModel('Organisations');
        $this->loadModel('Uniforms');
        $organisation = $this->Organisations->get($oid);
        $this->set('organisation',$organisation);



        $uniform = $this->Uniforms->newEntity();

        if ($this->request->is(['patch', 'post', 'put'])) {

            $uniform = $this->Uniforms->patchEntity($uniform, $this->request->getData());
            $uniform->organisation_id = $oid;



            if ($this->Uniforms->save($uniform)){
                $this->Flash->success(__('The data has been added.'));
                return $this->redirect(['controller' => 'admins', 'action' => 'uniformlist',$oid]);
            }
            else {

                $this->Flash->error(__('Sorry, we could not save your data. Please try again.'));

            }


        }

        $this->set('uniform', $uniform);

    }

    public function uniformdelete($id=0){
        $this->loadModel('variants');
        $this->loadModel('uniforms');

        $variants = $this->variants->find('all')->where(['uniform_id'=>$id]);
        $uniform = $this->uniforms->get($id);
        $oid = $uniform->organisation_id;

        foreach($variants as $variant){
            $this->variants->delete($variant);
        }


        if ($this->uniforms->delete($uniform)) {
            $this->Flash->success(__('The data has been deleted.'));
        } else {
            $this->Flash->error(__('The data could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'uniformlist',$oid]);

    }

    public function variantlist($id=0){
        $this->loadModel('variants');
        $this->loadModel('uniforms');

        $variants = $this->variants->find('all')->where(['uniform_id'=>$id]);
        $uniform = $this->uniforms->get($id);

        $uniformname = $uniform->uniformname;

        $this->set('variants', $variants);
        $this->set('uniformname', $uniformname);
        $this->set('uniformid',$id);

        $orgid = $uniform->organisation_id;
        $this->set('orgid', $orgid);

        $this->loadModel('Organisations');
        $organisation = $this->Organisations->findBy_Id($orgid)->first();
        $orgname = $organisation->organisationname;
        $this->set('orgname', $orgname);

    }

    public function variantedit($id=0){

        $this->loadModel('variants');


        $variant = $this->variants->get($id);
        $uniformid = $variant->uniform_id;

        if ($this->request->is(['patch', 'post', 'put'])) {


            $variant = $this->variants->patchEntity($variant, $this->request->getData());

            if ($this->variants->save($variant)) {

                $this->Flash->success(__('The data has been saved.'));

                return $this->redirect(['action' => 'variantlist', $uniformid]);
            }
            $this->Flash->error(__('The data could not be saved. Please, try again.'));
        }

        $this->set('variant',$variant);

    }

    public function variantdelete($id=0){

        $this->loadModel('variants');

        $variant = $this->variants->get($id);
        $uniformid = $variant->uniform_id;

        if ($this->variants->delete($variant)) {
            $this->Flash->success(__('The data has been deleted.'));
        } else {
            $this->Flash->error(__('The data could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'variantlist',$uniformid]);

    }

    public function variantadd($id = null){

        $this->loadModel('Variants');
        $this->set('uniform_id',$id); // uniform id set in view

        $this->loadModel('Uniforms');
        $uniform = $this->Uniforms->get($id);

        $uniformname = $uniform->uniformname;
        $this->set('uniformname', $uniformname);

        $orgid = $uniform->organisation_id;
        $this->set('orgid', $orgid);

        $this->loadModel('Organisations');
        $organisation = $this->Organisations->findBy_Id($orgid)->first();
        $orgname = $organisation->organisationname;
        $this->set('orgname', $orgname);




        $variant = $this->Variants->newEntity();

        if ($this->request->is(['patch', 'post', 'put'])) {

            $variant = $this->Variants->patchEntity($variant, $this->request->getData());
            $variant->uniform_id = $id;

            if ($this->Variants->save($variant)){
                $this->Flash->success(__('The data has been added.'));
                return $this->redirect(['controller' => 'admins', 'action' => 'variantlist',$id]);
            }
            else {
                //if cannot save item to cart, return error message
                $this->Flash->error(__('Sorry, we could not save your data. Please try again.'));
                //return $this->redirect(['action' => 'variantadd',$id]);
            }


        }

        $this->set('variant', $variant);


    }



    public function orderlist(){
        $this->loadModel('Orders');
        $this->loadModel('customers');
        $this->loadModel('organisations');

        $this->paginate = [
            'contain' =>['Customers'=>'Organisations'],
            'maxLimit' => 10,
            'order' => [
                'Orders.id' => 'DESC'
            ],
            'Paginator'=>['templates'=>'paginator-templates']
        ];

        $orders = $this->paginate($this->Orders->find('all', array('order' => 'Orders.id DESC')));

        //var_dump($orders);
        $this->set('orders', $orders);


        if ($this->request->is('post')) {

            $id = $this->request->getData('Order_ID');

            if ($id!=null ) {

                if (is_numeric($id)){

                    $orders = $this->paginate($this->Orders->find('all', array('order' => 'Orders.id DESC'))->where(['Orders.id' => $id]));

                    //var_dump($orders);
                    $this->set('orders', $orders);

                }
                else{
                    $this->Flash->error(__('Please input integer'));
                    $orders = $this->paginate($this->Orders->find('all', array('order'=>'Orders.id DESC')));

                    //var_dump($orders);
                    $this->set('orders', $orders);

                }


            }

            else{
                $orders = $this->paginate($this->Orders->find('all', array('order'=>'Orders.id DESC')));

                //var_dump($orders);
                $this->set('orders', $orders);
            }
        }



    }


    public function orderdetails($orderID){

        $this->loadModel('Orders');
        $this->loadModel('Orderitems');

        $order = $this->Orders->find('all', array('conditions' => array('Orders.id' =>$orderID ,),))->first();
        $orderitems = $this->Orderitems->find('all',array('conditions' => array('Orderitems.order_id' =>$orderID,),));


        $this->set('order',$order);
        $this->set('orderitems',$orderitems);



    }

    public function orderedit($oid){

        $this->loadModel('Orders');
        $order = $this->Orders->get($oid);

        $this->set('order',$order);

        if ($this->request->is(['patch', 'post', 'put'])) {


            $order = $this->Orders->patchEntity($order, $this->request->getData());

            if ($this->Orders->save($order)) {

                $this->Flash->success(__('The data has been saved.'));

                return $this->redirect(['action' => 'orderdetails', $oid]);
            }
            $this->Flash->error(__('The data could not be saved. Please, try again.'));
        }

    }


}
