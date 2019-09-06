<!-- Welcome Area Start -->
    <section class="welcome-area">
        <div class="welcome-slides owl-carousel">

            <!-- Single Welcome Slide: Uniforms and Workwear -->
            <!-- This one is generated using UrlHelper -->
            <div class="single-welcome-slide bg-img " style="background-position: top center; background-image: url(<?= $this->Url->image('Homepage2.jpg', array('class'=>'homeimage', 'style'=>'vertical-align:top')) ?>);">
                <!-- Welcome Content -->
                <div class="welcome-content h-100">
                    <div class="container h-100">
                        <div class="row h-100 align-items-center">
                            <!-- Welcome Text -->
                            <div class="col-12 col-md-9 col-lg-6">
                                <div class="welcome-text">
                                    <h2 data-animation="fadeInUp" data-delay="100ms"><?= nl2br($homemaintitle) ?></h2>
                                    <p data-animation="fadeInUp" data-delay="400ms"><?= nl2br($homefirstslidetext) ?></p>

                                    <?= $this->Html->link( $aboutpagetitle, '/pages/Aboutus', ['class' => 'btn akame-btn active', 'data-animation' => 'fadeInUp',
                                        'data-delay' => '700ms'] );?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Single Welcome Slide: CORPORATE WEAR -->

            <div class="single-welcome-slide bg-img" style=" background-image: url(<?= $this->Url->image('businessSuit.jpg') ?>);">
                <!-- Welcome Content -->
                <div class="welcome-content h-100">
                    <div class="container h-100">
                        <div class="row h-100 align-items-center">
                            <!-- Welcome Text -->
                            <div class="col-12 col-md-9 col-lg-6">
                                <div class="welcome-text">
                                    <h2 data-animation="fadeInUp" style="color: #FFFFFF" data-delay="100ms"><?= nl2br($hhomeslidetwotitle) ?></h2>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

             <!-- Single Welcome Slide: WORKWEAR -->
            <div class="single-welcome-slide bg-img" style="background-position: top center; background-image: url(<?= $this->Url->image('Hospitality.jpg') ?>);">
                 <!-- Welcome Content -->
                 <div class="welcome-content h-100">
                     <div class="container h-100">
                         <div class="row h-100 align-items-center">
                             <!-- Welcome Text -->
                             <div class="col-12 col-md-9 col-lg-6">
                                  <div class="welcome-text">
                                       <h2 data-animation="fadeInUp" data-delay="100ms"><?= nl2br($hhomeslidethreetitle) ?></h2>

                                  </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>

             <!-- Single Welcome Slide: BUSINESS CASUAL -->
            <div class="single-welcome-slide bg-img" style="background-position: top center; background-image: url(<?= $this->Url->image('Homepage.jpg') ?>);">
                 <!-- Welcome Content -->
                 <div class="welcome-content h-100">
                      <div class="container h-100">
                             <div class="row h-100 align-items-center">
                                    <!-- Welcome Text -->
                                    <div class="col-12 col-md-9 col-lg-6">
                                         <div class="welcome-text">
                                              <h2 data-animation="fadeInUp" data-delay="100ms"><?= nl2br($hhomeslidefourtitle) ?></h2>

                                         </div>
                                    </div>
                             </div>
                      </div>
                 </div>
             </div>


            <!-- Single Welcome Slide: SCHOOL UNIFORMS -->
            <div class="single-welcome-slide bg-img" style="background-image: url(<?= $this->Url->image('schoolUniforms.jpg') ?>);">
                <!-- Welcome Content -->
                <div class="welcome-content h-100">
                    <div class="container h-100">
                        <div class="row h-100 align-items-center">
                            <!-- Welcome Text -->
                            <div class="col-12 col-md-9 col-lg-6">
                                <div class="welcome-text">
                                    <h2 data-animation="fadeInUp" data-delay="100ms"><?= nl2br($hhomeslidefivetitle) ?></h2>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Welcome Area End -->

    <!-- Business Statement Start-->
        <section class="akame-service-area section-padding-80-0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- Section Heading -->
                        <div class="section-heading text-center">
                            <h4><?= nl2br($vision) ?> </h4>
                            <br>
                            <p><?= nl2br($goal) ?></p>
                        </div>
                    </div>
                </div>
                </div>
        </section>
    <!-- Business Statement End -->

    <!-- About Area Start -->
    <section class="akame-about-area bg-gray section-padding-80-0">
        <div class="container">
            <div class="row align-items-center">
                <!-- Section Heading -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="section-heading mb-80">
                        <h2>Uniforms and workwear</h2>
                        <p>and anything in between!</p>
                        <span><?php echo $aboutpagetitle ?></span>
                    </div>
                </div>

                <!-- About Us Thumbnail -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="about-us-thumbnail mb-80">
                        <?php echo $this->Html->image('about2.jpg', ['alt' => 'CakePHP']);?>

                    </div>
                </div>

                <!-- About Us Content -->
                <div class="col-12 col-lg-4">
                    <div class="about-us-content mb-80 pl-4">
                        <h3><?= nl2br($haboutheading) ?></h3>
                        <p><?= nl2br($habouttext) ?></p>
                        <?= $this->Html->link( $aboutpagetitle, '/pages/Aboutus', ['class' => 'btn akame-btn'] );?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!-- About Area End -->

<!-- Our Services Start-->
    <section class="why-choose-us-area section-padding-80-0">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-lg-6">
                     <?php echo $this->Html->image('services.jpg', ['alt' => 'CakePHP']);?>
                </div>
                <div class="col-12 col-lg-6">
                    <!-- Section Heading -->
                    <div class="section-heading">
                        <h2><?= nl2br($hhomeservicestitle) ?></h2>

                        <p><?= nl2br($hservicestext) ?></p>
                        <?= $this->Html->link( $whatwedotitle, '/pages/Whatwedo', ['class' => 'btn akame-btn'] );?>
                    </div>
                    <!-- Services offered -->
                    <div class="choose-us-content mt-30 mb-80">
                        <ul>
                            <li><i class="fa fa-check-square-o" aria-hidden="true"></i> Design and creative</li>
                            <li><i class="fa fa-check-square-o" aria-hidden="true"></i> Product development</li>
                            <li><i class="fa fa-check-square-o" aria-hidden="true"></i> Manufacturing</li>
                            <li><i class="fa fa-check-square-o" aria-hidden="true"></i> Sourcing</li>
                            <li><i class="fa fa-check-square-o" aria-hidden="true"></i> Pattern making</li>
                            <li><i class="fa fa-check-square-o" aria-hidden="true"></i> Sampling</li>
                            <li><i class="fa fa-check-square-o" aria-hidden="true"></i> Printing</li>
                            <li><i class="fa fa-check-square-o" aria-hidden="true"></i> Embroidery</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Our Services-->

<!-- Call To Action Area Start -->
    <section class="akame-cta-area bg-gray section-padding-80">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-10 col-xl-5">
                    <div class="cta-content">

                        <h2><?= nl2br($hhomecontacttitle) ?></h2>

                        <p><?= nl2br($hhomecontacttext) ?> </p>

                        <div class="akame-btn-group mt-30">
                            <?= $this->Html->link( 'Get In Touch', '/pages/Getintouch', ['class' => 'btn akame-btn'] );?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- CTA Thumbnail -->
        <?php echo $this->Html->image("design.jpg", ['class' => 'cta-thumbnail bg-img'])?>
        <!-- <div class="cta-thumbnail bg-img" style="background-image: url(../img/girl.jpg);"></div> -->


    </section>
    <!-- Call To Action Area End -->
