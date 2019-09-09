<!-- Title of What We Do Page -->
<section class="breadcrumb-area section-padding-80 bg-img">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb-content">
                    <h2><?= nl2br($whatwedotitle) ?></h2>
                    <div class="section-heading text-center"></div>
                </div>
            </div>
        </div>
    </div>
<!-- Title End -->

<!-- Service Area Start -->
<section class="akame-service-area">
    <!-- Single Service Item -->
    <div class="single--service--item d-flex flex-wrap align-items-center bg-gray">
        <!-- Service Content -->
        <div class="service-content">
            <div class="service-text">
                <h2><?= nl2br($sectiononetitle) ?></h2>
                <p><?= nl2br($sectiononecontent) ?></p>
            </div>
        </div>
        <!-- Service Thumbnail -->
        <div class="service-thumbnail bg-img jarallax" style="background-image: url(<?= $this->Url->image('design.jpg') ?>);"></div>
    </div>


    <!-- Single Service Item -->
    <div class="single--service--item odd-item d-flex flex-wrap align-items-center bg-gray">
        <!-- Service Thumbnail -->
        <div class="service-thumbnail bg-img jarallax" style="background-image: url(<?= $this->Url->image('StockService.jpg') ?>);"></div>

        <!-- Service Content -->
        <div class="service-content">
            <div class="service-text">
                <h2><?= nl2br($sectiontwotitle) ?></h2>
                <p><?= nl2br($sectiontwocontent) ?> </p>
            </div>
        </div>
    </div>

    <!-- Supplier Links -->
    <div class="single-service-item-desc-area">
        <p class="single-service-item-desc"><?= nl2br($supplierdescription) ?> </p>
        <br><br>

        <!-- Wide Screen Icons -->
        <!-- Row 1 of Supplier Icons -->
        <div class="section-responsive-row row" style="margin-bottom: 32px; min-height: 180px;">
            <!-- Single Supplier Area 1: Akubra-->
            <div class="col-12 col-sm-6 col-lg-2" >
                <a href="https://akubra.com.au/pages/catalogues" target="_blank">
                    <div  style="position: absolute; top: 50%; transform: translateY(-50%)">
                        <?php echo "<p style='max-width: 90% !important; height: auto; width: auto;'>".$this->Html->image('../img/suppliers/Akubra.jpg', ['alt' => 'CakePHP'])."</p>";?>
                    </div>
                </a>
            </div>

            <!-- Single Supplier Area 2: Gloweave -->
            <div class="col-12 col-sm-6 col-lg-2" >
              <!-- possibly need to change to this reference:  https://www.gloweavecareer.com/catalogue -->
                <a href="https://www.dropbox.com/sh/fqy8q4agita9lxo/AAATh3qqKrJvIswN6zjg8uI_a?dl=0" target="_blank">
                    <div  style="position: absolute; top: 50%; transform: translateY(-50%)">
                        <?php echo "<p style='max-width: 90% !important; height: auto; width: auto;'>".$this->Html->image('../img/suppliers/Gloweave.png', ['alt' => 'CakePHP'])."</p>";?>
                    </div>
                </a>
            </div>

            <!-- Single Supplier Area 3 : Bocini-->
            <div class="col-12 col-sm-6 col-lg-2" >
                <a href="http://www.bocini.com.au/" target="_blank">
                    <div  style="position: absolute; top: 50%; transform: translateY(-50%)">
                        <?php echo "<p style='max-width: 90% !important; height: auto; width: auto;'>".$this->Html->image('../img/suppliers/Bocini.png', ['alt' => 'CakePHP'])."</p>";?>
                    </div>
                </a>
            </div>


            <!-- Single Supplier Area 4: Stencil-->
            <div class="col-12 col-sm-6 col-lg-2" style="position: relative;">
                <a href="http://www.stencil.net.au/catalogue.pdf" target="_blank">
                    <div  style="position: absolute; top: 50%; transform: translateY(-50%)">
                        <?php echo "<p style='max-width: 90% !important; height: auto; width: auto;'>".$this->Html->image('../img/suppliers/Stencil.png', ['alt' => 'CakePHP'])."</p>";?>
                    </div>
            </div>

            <!--Single supplier Area 5: John Kevin-->
            <!-- NEED TO CHANGE LINK -->
            <div class="col-12 col-sm-6 col-lg-2" style="position: relative;">
                <a href="https://johnkevin.com/catalogue/" target="_blank">
                    <div  style="position: absolute; top: 50%; transform: translateY(-50%)">
                        <?php echo "<p style='max-width: 90% !important; height: auto; width: auto;'>".$this->Html->image('../img/suppliers/JKevin.PNG', ['alt' => 'CakePHP'])."</p>";?>
                    </div>
            </div>

            <!--Single supplier Area 6: MtF by Woolmark-->
            <!-- NEED TO CHANGE LINK -->
            <div class="col-12 col-sm-6 col-lg-2" style="position: relative;">
                <a href="" target="_blank">
                    <div  style="position: absolute; top: 50%; transform: translateY(-50%)">
                        <?php echo "<p style='max-width: 90% !important; height: auto; width: auto;'>".$this->Html->image('../img/suppliers/MtF.PNG', ['alt' => 'CakePHP'])."</p>";?>
                    </div>
            </div>
        </div>

        <!-- Row 2 of Supplier Icons -->
        <div class="section-responsive-row row" style="margin-bottom: 32px; min-height: 180px;">
            <!-- Single Supplier Area 7: LSJ-->
            <div class="col-12 col-sm-6 col-lg-2" style="position: relative;">
                <a href="https://gallery.mailchimp.com/a7c6f4f55add32321fad03429/files/3e6ed937-cb66-422d-8a62-8a8ba735b20f/LSJ_e_catalogue_v21.pdf" target="_blank">
                    <div style="position: absolute; top: 50%; transform: translateY(-50%)">
                        <?php echo "<p style='max-width: 90% !important; height: auto; width: auto;'>".$this->Html->image('../img/suppliers/LSJ.png', ['alt' => 'CakePHP'])."</p>";?>
                    </div>
            </div>

            <!-- Single Supplier Area 8: CB Aussie Pacific -->
            <div class="col-12 col-sm-6 col-lg-2" style="position: relative;">
                <a href="https://www.aussiepacific.com.au/" target="_blank">
                    <div  style="position: absolute; top: 50%; transform: translateY(-50%)">
                        <?php echo "<p style='max-width: 90% !important; height: auto; width: auto;'>".$this->Html->image('../img/suppliers/aussiepacific.jpg', ['alt' => 'CakePHP'])."</p>";?>
                    </div>
            </div>

            <!-- Single Supplier Area 9 : City Collection-->
            <div class="col-12 col-sm-6 col-lg-2" style="position: relative;">
                <a href="http://www.citycollection.com.au/" target="_blank">
                    <div style="position: absolute; top: 50%; transform: translateY(-50%)">
                        <?php echo "<p style='max-width: 90% !important; height: auto; width: auto;'>".$this->Html->image('../img/suppliers/Citycollection.jpg', ['alt' => 'CakePHP'])."</p>";?>
                    </div>
            </div>

            <!-- Single Supplier Area 10: Corporate Reflection-->
            <div class="col-12 col-sm-6 col-lg-2" style="position: relative;">
                <a href="https://www.corporatereflection.com/download-catalogue/" target="_blank">
                    <div  style="position: absolute; top: 50%; transform: translateY(-50%)">
                        <?php echo "<p style='max-width: 90% !important; height: auto; width: auto;'>".$this->Html->image('../img/suppliers/CorporateReflection.jpg', ['alt' => 'CakePHP'])."</p>";?>
                    </div>
            </div>

            <!--Single supplier Area 11: Bisley-->
            <!-- NEED TO CHANGE LINK -->
            <div class="col-12 col-sm-6 col-lg-2" style="position: relative;">
                <a href="https://www.bisleyworkwear.com.au/" target="_blank">
                    <div  style="position: absolute; top: 50%; transform: translateY(-50%)">
                        <?php echo "<p style='max-width: 90% !important; height: auto; width: auto;'>".$this->Html->image('../img/suppliers/Bisley.png', ['alt' => 'CakePHP'])."</p>";?>
                    </div>
            </div>
            <!--Single supplier Area 12: JBs-->
            <!-- NEED TO CHANGE LINK -->
            <div class="col-12 col-sm-6 col-lg-2" style="position: relative;">
                <a href="https://www.jbswear.com.au/" target="_blank">
                    <div  style="position: absolute; top: 50%; transform: translateY(-50%)">
                        <?php echo "<p style='max-width: 90% !important; height: auto; width: auto;'>".$this->Html->image('../img/suppliers/JBs.png', ['alt' => 'CakePHP'])."</p>";?>
                    </div>
            </div>
        </div>

        <!-- Row 3 of Supplier Icons -->
        <div class="section-responsive-row row" style="margin-bottom: 32px; min-height: 180px;">
            <!-- Single Supplier Area 13: Black Kanvas-->
            <div class="col-12 col-sm-6 col-lg-2" >
                <a href="https://www.beseenclothing.com/" target="_blank">
                    <div  style="position: absolute; top: 50%; transform: translateY(-50%)">
                        <?php echo "<p style='max-width: 90% !important; height: auto; width: auto;'>".$this->Html->image('../img/suppliers/blackKanvas.png', ['alt' => 'CakePHP'])."</p>";?>
                    </div>
                </a>
            </div>

            <!-- Single Supplier Area 14: Portwest-->
            <div class="col-12 col-sm-6 col-lg-2" >
                <!-- possibly need to change to this reference:  https://www.gloweavecareer.com/catalogue -->
                <a href="https://www.portwest.com/" target="_blank">
                    <div  style="position: absolute; top: 50%; transform: translateY(-50%)">
                        <?php echo "<p style='max-width: 90% !important; height: auto; width: auto;'>".$this->Html->image('../img/suppliers/PortWest.png', ['alt' => 'CakePHP'])."</p>";?>
                    </div>
                </a>
            </div>

            <!-- Single Supplier Area 15 : Be Seen-->
            <div class="col-12 col-sm-6 col-lg-2" style="position: relative;">
                <a href="https://www.beseenclothing.com/" target="_blank">
                    <div style="position: absolute; top: 50%; transform: translateY(-50%)">
                        <?php echo "<p style='max-width: 90% !important; height: auto; width: auto;'>".$this->Html->image('../img/suppliers/BeSeen.jpg', ['alt' => 'CakePHP'])."</p>";?>
                    </div>
            </div>

            <!-- Single Supplier Area 16: CB Clothing -->
            <div class="col-12 col-sm-6 col-lg-2" >
                <!-- possibly need to change to this reference:  https://www.gloweavecareer.com/catalogue -->
                <a href="https://www.cbclothing.com.au/" target="_blank">
                    <div  style="position: absolute; top: 50%; transform: translateY(-50%)">
                        <?php echo "<p style='max-width: 90% !important; height: auto; width: auto;'>".$this->Html->image('../img/suppliers/CBclothingCo.png', ['alt' => 'CakePHP'])."</p>";?>
                    </div>
                </a>
            </div>
        </div>

        <!-- Narrow Screen Icons -->
        <!-- Row 1 of Supplier Icons -->
        <div class="section-narrow-row row" style="margin-bottom: 32px; height: auto;">
            <!-- Single Supplier Area 1: Akubra-->
            <div class="section-narrow-column">
                <a href="https://akubra.com.au/pages/catalogues" target="_blank">
                    <div  style="position: relative; top: 50%;">
                        <?php echo "<p style='height: auto; width: auto;'>".$this->Html->image('../img/suppliers/Akubra.jpg', ['alt' => 'CakePHP'])."</p>";?>
                    </div>
                </a>
            </div>

            <!-- Single Supplier Area 2: Gloweave -->
            <div class="section-narrow-column">
                <!-- possibly need to change to this reference:  https://www.gloweavecareer.com/catalogue -->
                <a href="https://www.dropbox.com/sh/fqy8q4agita9lxo/AAATh3qqKrJvIswN6zjg8uI_a?dl=0" target="_blank">
                    <div  style="position: relative; top: 50%;">
                        <?php echo "<p style='height: auto; width: auto;'>".$this->Html->image('../img/suppliers/Gloweave.png', ['alt' => 'CakePHP'])."</p>";?>
                    </div>
                </a>
            </div>

            <!-- Single Supplier Area 3 : Bocini-->
            <div class="section-narrow-column">
                <a href="http://www.bocini.com.au/" target="_blank">
                    <div  style="position: relative; top: 50%;">
                        <?php echo "<p style='height: auto; width;'>".$this->Html->image('../img/suppliers/Bocini.png', ['alt' => 'CakePHP'])."</p>";?>
                    </div>
                </a>
            </div>
        </div>

        <!-- Row 2 of Supplier Icons -->
        <div class="section-narrow-row row" style="margin-bottom: 32px; height: auto;">
            <!-- Single Supplier Area 4: Stencil-->
            <div class="section-narrow-column">
                <a href="http://www.stencil.net.au/catalogue.pdf" target="_blank">
                    <div  style="position: relative; top: 50%;">
                        <?php echo "<p style='height: auto; width: auto;'>".$this->Html->image('../img/suppliers/Stencil.png', ['alt' => 'CakePHP'])."</p>";?>
                    </div>
            </div>

            <!--Single supplier Area 5: John Kevin-->
            <!-- NEED TO CHANGE LINK -->
            <div class="section-narrow-column">
                <a href="https://johnkevin.com/catalogue/" target="_blank">
                    <div  style="position: relative; top: 50%;">
                        <?php echo "<p style='height: auto; width: auto;'>".$this->Html->image('../img/suppliers/JKevin.PNG', ['alt' => 'CakePHP'])."</p>";?>
                    </div>
            </div>

            <!--Single supplier Area 6: MtF by Woolmark-->
            <!-- NEED TO CHANGE LINK -->
            <div class="section-narrow-column">
                <a href="" target="_blank">
                    <div  style="position: relative; top: 50%;">
                        <?php echo "<p style='height: auto; width: auto;'>".$this->Html->image('../img/suppliers/MtF.PNG', ['alt' => 'CakePHP'])."</p>";?>
                    </div>
            </div>
        </div>

        <!-- Row 3 of Supplier Icons -->
        <div class="section-narrow-row row" style="margin-bottom: 32px; height: auto;">
            <!-- Single Supplier Area 7: LSJ-->
            <div class="section-narrow-column">
                <a href="https://gallery.mailchimp.com/a7c6f4f55add32321fad03429/files/3e6ed937-cb66-422d-8a62-8a8ba735b20f/LSJ_e_catalogue_v21.pdf" target="_blank">
                    <div  style="position: relative; top: 50%;">
                        <?php echo "<p style='height: auto; width: auto;'>".$this->Html->image('../img/suppliers/LSJ.png', ['alt' => 'CakePHP'])."</p>";?>
                    </div>
            </div>

            <!-- Single Supplier Area 8: Aussie Pacific -->
            <div class="section-narrow-column">
                <a href="https://www.aussiepacific.com.au/" target="_blank">
                    <div  style="position: relative; top: 50%;">
                        <?php echo "<p style='height: auto; width: auto;'>".$this->Html->image('../img/suppliers/aussiepacific.jpg', ['alt' => 'CakePHP'])."</p>";?>
                    </div>
            </div>

            <!-- Single Supplier Area 9 : City Collection-->
            <div class="section-narrow-column">
                <a href="http://www.citycollection.com.au/" target="_blank">
                    <div  style="position: relative; top: 50%;">
                        <?php echo "<p style='height: auto; width: auto;'>".$this->Html->image('../img/suppliers/Citycollection.jpg', ['alt' => 'CakePHP'])."</p>";?>
                    </div>
            </div>
        </div>

        <!-- Row 4 of Supplier Icons -->
        <div class="section-narrow-row row" style="margin-bottom: 32px; height: auto;">
            <!-- Single Supplier Area 10: Corporate Reflection-->
            <div class="section-narrow-column">
                <a href="https://www.corporatereflection.com/download-catalogue/" target="_blank">
                    <div  style="position: relative; top: 50%;">
                        <?php echo "<p style='height: auto; width: auto;'>".$this->Html->image('../img/suppliers/CorporateReflection.jpg', ['alt' => 'CakePHP'])."</p>";?>
                    </div>
            </div>

            <!--Single supplier Area 11: Bisley-->
            <!-- NEED TO CHANGE LINK -->
            <div class="section-narrow-column">
                <a href="https://www.bisleyworkwear.com.au/" target="_blank">
                    <div  style="position: relative; top: 50%;">
                        <?php echo "<p style='height: auto; width: auto;'>".$this->Html->image('../img/suppliers/Bisley.png', ['alt' => 'CakePHP'])."</p>";?>
                    </div>
            </div>
            <!--Single supplier Area 12: JBs-->
            <!-- NEED TO CHANGE LINK -->
            <div class="section-narrow-column">
                <a href="https://www.jbswear.com.au/" target="_blank">
                    <div  style="position: relative; top: 50%;">
                        <?php echo "<p style='height: auto; width: auto;'>".$this->Html->image('../img/suppliers/JBs.png', ['alt' => 'CakePHP'])."</p>";?>
                    </div>
            </div>
        </div>

        <!-- Row 5 of Supplier Icons -->
        <div class="section-narrow-row row" style="margin-bottom: 32px; height: auto;">
            <!-- Single Supplier Area 13: Black Kanvas-->
            <div class="section-narrow-column">
                <a href="https://www.beseenclothing.com/" target="_blank">
                    <div  style="position: relative; top: 50%;">
                        <?php echo "<p style='height: auto; width: auto;'>".$this->Html->image('../img/suppliers/blackKanvas.png', ['alt' => 'CakePHP'])."</p>";?>
                    </div>
                </a>
            </div>

            <!-- Single Supplier Area 14: Portwest-->
            <div class="section-narrow-column">
                <!-- possibly need to change to this reference:  https://www.gloweavecareer.com/catalogue -->
                <a href="https://www.portwest.com/" target="_blank">
                    <div  style="position: relative; top: 50%;">
                        <?php echo "<p style='height: auto; width: auto;'>".$this->Html->image('../img/suppliers/PortWest.png', ['alt' => 'CakePHP'])."</p>";?>
                    </div>
                </a>
            </div>

            <!-- Single Supplier Area 15 : Be Seen-->
            <div class="section-narrow-column">
                <a href="https://www.beseenclothing.com/" target="_blank">
                    <div  style="position: relative; top: 50%;">
                        <?php echo "<p style='height: auto; width: auto;'>".$this->Html->image('../img/suppliers/BeSeen.jpg', ['alt' => 'CakePHP'])."</p>";?>
                    </div>
            </div>
        </div>

        <!-- Row 6 of Supplier Icons: CB clothing -->
        <div class="section-narrow-row row" style="margin-bottom: 32px; height: auto;">
            <div class="section-narrow-column">
                <!-- possibly need to change to this reference:  https://www.gloweavecareer.com/catalogue -->
                <a href="https://www.cbclothing.com.au/" target="_blank">
                    <div  style="position: relative; top: 50%;">
                        <?php echo "<p style='height: auto; width: auto;'>".$this->Html->image('../img/suppliers/CBclothingCo.png', ['alt' => 'CakePHP'])."</p>";?>
                    </div>
                </a>
            </div>
        </div>


        </div>
    </div>

    <!-- Recycling Service Area -->
    <div class="single--service--item d-flex flex-wrap align-items-center bg-gray">
        <div class="service-content">
            <div class="service-text">

                <h2><?= nl2br($sectionthreetitle) ?> </h2>
                <p><?= nl2br($sectionthreecontent) ?></p>

                <div class="akame-btn-group mt-30">
                    <a href="../pages/Getintouch" class="btn akame-btn"><?= nl2br($whatwedotitle) ?> </a>
                </div>

            </div>
        </div>
        <!-- Service Thumbnail -->
        <div class="service-thumbnail bg-img jarallax" style="background-image: url(<?= $this->Url->image('Recycling.jpg') ?>);"></div>
    </div>


</section>
<!-- Service Area End -->

