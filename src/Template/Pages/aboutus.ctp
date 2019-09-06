<!--About Us page HTML FILE-->
<!-- About us Title Area Start -->
    <section class="breadcrumb-area section-padding-80">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <br><?php echo $this->Html->image(
                                'hanger_icon.png', array('alt'=>'CakePHP', 'id'=>'hanger')); ?>
                        <br><h2><?= h($aboutpagetitle) ?></h2>
                    </div>
                    <div class="section-heading text-center">
                        <div class="about--us--content mb-50">
                            <p><?= nl2br($aboutpagesubheading) ?></p>
                        </div>
                    </div>
                    <div class="akame-service-area" style="width: 100%;">
                        <p align="center">
                            <?= nl2br($content) ?>
                        </p>

                </div>
            </div>
        </div>
    </section>
<!-- About Us Title Area End -->

