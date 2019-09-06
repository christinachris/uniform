<!-- Breadcrumb Area Start -->
<section class="breadcrumb-area  section-padding-80">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb-content">
                    <h2>Organisation</h2>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Area End -->

<section class="akame-service-area  section-padding-50-0">
    <div class="container">
        <div class="row">
            <!-- Single Organisation Area 1-->
            <?php foreach ($organisation as $organisations):?>
                <div class="col-12 col-sm-6 col-lg-3" >

                    <div class="single-service-area mb-80 wow fadeInUp" data-wow-delay="200ms">
                        <?php echo $this->Html->image($organisations->logopath,['id' => 'orgImage','url' =>['controller'=>'Uniforms', 'action' => 'showuniform', $organisations->_id]]);?>
                        <h5><?php echo $this->Html->link($organisations->organisationname,['controller'=>'Uniforms', 'action' => 'showuniform', $organisations->_id]);?></h5>


                    </div>

                </div>

            <?php endforeach ?>

        </div>
    </div>
</section>
<!-- Our Service Area End -->
