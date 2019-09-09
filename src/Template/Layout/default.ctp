<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.0.min.js"></script>
    <!-- Title of browser tab-->
    <title>SHOREDITCH CORPORATE | Uniforms and Workwear</title>

    <!-- Favicon: this needs to change from the scissors icon so it shows the 'SC' in browser tab -->
    <?php echo $this->Html->meta( 'SCicon.ico', 'img/SCicon.ico', array('type' => 'icon') ); ?>

    <!-- Stylesheet and JS-->
    <?php echo $this->Html->css('../css/style.css');?>
    <!--<?php echo $this->Html->css('../css/aos.css');?> -->
    <?php echo $this->Html->script('jquery.min');?>
    <?php echo $this->Html->script('main');?>

</head>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- /Preloader -->

    <!-- Header Area Start -->
    <header class="header-area">
        <!-- Top Header Area Start: **if Rebecca doesnt like it remove this section -->
        <div class="top-header-area">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-5">
                        <div class="top-header-content">
                            <!--<p>Welcome to Shoreditch Corporate</p>-->
                        </div>
                    </div>

                    <div class="col-7">
                        <div class="top-header-content text-right">
                            <p>
                            <span class="mx-2"></span> <i class="fa fa-phone" aria-hidden="true"></i> Call us: <?php echo $phone ?></p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- Top Header Area End -->

        <!-- Main Header Start -->
        <div class="main-header-area">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Classy Menu -->
                    <nav class="classy-navbar justify-content-between" id="akameNav">

                        <!-- Logo: have used cake php echo to ensure it always finds file-->
                        <?= $this->Html->image("SClogo.png", [  'class'=> 'nav-brand', "alt" => "CakePHP",  'url' => ['controller' => 'Pages', 'action' => 'home'] ]); ?>


                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">
                            <!-- Menu Close Button -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>
                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul id="nav">
                                    <li><?= $this->Html->link( $aboutpagetitle, '/pages/aboutus' );?></li>
                                    <li><?= $this->Html->link( $whatwedotitle, '/pages/whatwedo' );?></li>
                                    <!--<li><?= $this->Html->link('Shop',['controller' => 'organisations','action' => 'showorganisation']); ?></li>-->
                                    <li><?= $this->Html->link( $text,$url );?></li>
                                    <li><?= $this->Html->link( $getintouch   , '/pages/getintouch' );?></li>
                                    <!-- only show my account drop down with options if customer is logged in-->
                                    <li> <?php if($this->request->getSession()->read('Auth')){
                                            echo  $this->Html->link( 'My Account', ['controller'=>'customers', 'action'=>'viewaccount'] );
                                        } ?>
                                        <ul class="dropdown">
                                            <li>  <?php if($this->request->getSession()->read('Auth')){
                                                    echo  $this->Html->link( 'My Account', ['controller'=>'customers', 'action'=>'viewaccount'] );
                                                } ?>
                                            </li>
                                            <li>  <?php if($this->request->getSession()->read('Auth')){
                                                    echo  $this->Html->link( 'My Orders', ['controller'=>'customers', 'action'=>'orderhistory'] );
                                                    } ?>
                                            </li>
                                            <li>  <?php if($this->request->getSession()->read('Auth')){
                                                    echo  $this->Html->link( 'Logout', ['controller' => 'customers','action' => 'logout'] );
                                                } ?>
                                            </li>
                                        </ul>
                                    </li>
                                    <!--  Only show cart icon if user is logged in   -->
                                    <li class="cart-icon">
                                        <?php if($this->request->getSession()->read('Auth')){
                                            echo $this->Html->link(
                                                '<i class="icon_cart"></i><span class="m-menu__link-text">' . h(' Cart') . '</span>',
                                                ['controller'=>'Carts', 'action'=>'cart'],
                                                ['escape' => false, 'class' => '']
                                            );
                                        } ?>

                                    </li>
                                </ul>

                            </div>
                            <!-- Nav End -->
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Header Area End -->








    <!--view grabbing code to place pages in between nav and footer on every page
     **will need to code a controller to handle this??-->

    <div>
    <?php echo $this->fetch('content')?>
    </div>





    <!-- Footer Area Start -->
    <footer class="footer-area section-padding-80-0">
        <div class="container">
            <div class="row justify-content-between">

                <!-- Single Footer Widget -->
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="single-footer-widget mb-60">
                        <!-- Footer Logo - have used cake php way of directing so always can find file-->
                        <?= $this->Html->image("SClogo.png", [  'class'=> 'footer-logo', "alt" => "CakePHP",  'url' => ['controller' => 'Pages', 'action' => 'home'] ]); ?>

                        <!--<img src="img/SClogo.png" alt="">-->
                        <!-- <p class="mb-30">We would love to serve you and let you enjoy your culinary experience. </p> -->

                        <!-- Copywrite Text -->
                        <div class="copywrite-text">
                            <p> <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> Shoreditch Corporate. <br><br>All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                        </div>
                    </div>
                </div>

                <!-- Single Footer Widget -->
                <div class="col-12 col-sm-6 col-md-4 ">
                    <div class="single-footer-widget mb-80">
                        <!-- Widget Title -->
                        <h4 class="widget-title">Contact us</h4>

                        <!-- Contact Address -->
                        <div class="contact-address">
                            <p><?php echo $operatingtime ?></p>
                            <p>Tel: <?php echo $phone ?></p>
                            <p>E-mail: <?php echo $emailfull ?></p>
                            <p>Address: <?php echo $address ?> </p>
                        </div>
                    </div>
                </div>

                <!-- Single Footer Widget -->
                <div class="col-12 col-md-4 col-xl-3">
                    <div class="single-footer-widget mb-80">

                        <!-- Widget Title -->
                        <h4 class="widget-title">Follow Us</h4>

                        <!-- Social Info -->
                        <div class="social-info">
                            <a href="<?php echo $facebook ?>" class="facebook" target="_blank"><i class="fa fa-facebook"></i></a>
                            <a href="<?php echo $linkedin ?>" class="social_linkedin" target="_blank"><i class="fa fa-linked-in"></i></a>
                            <a href="<?php echo $pinterest ?>" class="social_pinterest" target="_blank"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </footer>
    <!-- Footer Area End -->

    <!-- All JS Files -->
    <!-- Popper
    <script src="js/popper.min.js"></script>-->
    <?php echo $this->Html->script('../js/popper.min');?>

    <!-- Bootstrap: new php reference
    <script src="js/bootstrap.min.js"></script>-->
    <?php echo $this->Html->script('../js/bootstrap.min');?>


    <!-- All Plugins
    <script src="js/akame.bundle.js"></script>-->
    <?php echo $this->Html->script('../js/akame.bundle');?>


    <!-- Active
    <script src="js/default-assets/active.js"></script>-->
    <?php echo $this->Html->script('../js/default-assets/active');?>

    <!-- new scripts from new template-->
    <!--<script src="js/main.js"></script>

    <?php echo $this->Html->script('../js/jquery-3.3.1.min');?>
    <?php echo $this->Html->script('../js/jquery-ui');?>
    <?php echo $this->Html->script('../js/slick.min');?>
    <?php echo $this->Html->script('../js/aos');?>
    -->


</body>
</html>
