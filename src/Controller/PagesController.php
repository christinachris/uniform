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

use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;

/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link https://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['display', 'Aboutus']);

        $this->loadModel('Websitecontents');

//----------------------SETTING VALUES FOR GET IN TOUCH/CONTACT PAGE--------------------------------------------
        //setting googlemap code- get in touch page
        $mapcode = $this->Websitecontents->findByContentname('googlemapcode')->first();
        $googlemap = $mapcode->contentvalue;
        $this->set('googlemap', $googlemap);

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

//----------------------SETTING VALUES FOR ABOUT US/WHO WE ARE PAGE------------------------------------------
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

//----------------------SETTING VALUES FOR WHAT WE DO PAGE-------------------------------------
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


//----------------------SETTING VALUES FOR HOME PAGE-------------------------------------------------------
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

    /**
     * Displays a view
     *
     * @param array ...$path Path segments.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Http\Exception\ForbiddenException When a directory traversal attempt.
     * @throws \Cake\Http\Exception\NotFoundException When the view file could not
     *   be found or \Cake\View\Exception\MissingTemplateException in debug mode.
     */
    public function display(...$path)
    {
        $count = count($path);
        if (!$count) {
            return $this->redirect('/');
        }
        if (in_array('..', $path, true) || in_array('.', $path, true)) {
            throw new ForbiddenException();
        }
        $page = $subpage = null;

        if (!empty($path[0])) {
            $page = $path[0];
        }
        if (!empty($path[1])) {
            $subpage = $path[1];
        }
        $this->set(compact('page', 'subpage'));

        try {
            $this->render(implode('/', $path));
        } catch (MissingTemplateException $exception) {
            if (Configure::read('debug')) {
                throw $exception;
            }
            throw new NotFoundException();
        }
    }

    public function whatwedo()
    {

    }

    public function getintouch()
    {

    }

    public function home()
    {

    }

    public function aboutus()
    {

    }

















}
