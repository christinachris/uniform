<!-- Title Area Start -->
<section class="breadcrumb-area  section-padding-60">
    <div class="container">
        <div class="row">
            <div class="col-12">
            </div>
        </div>
    </div>
</section>
<!-- Title Area End -->

<div class="site-wrap">
    <div class="site-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-9 order-2">

                    <!--Uniform items -->
                    <div class="row mb-5">
                        <!--uniform item 1-->
                        <?php foreach($uniform as $uniforms){ ?>
                            <div class="col-sm-6 col-lg-4 mb-4 wow fadeInUp"  >
                                <div class="text-center border" id="uniformItems">

                                    <figure>
                                        
                                        <?php echo $this->Html->image("../files/uniforms/heroimagepath/{$uniforms->heroimagepath}", ['id' => 'unifomPic','url' =>['controller'=>'Uniforms', 'action' => 'showuniformdetail', $uniforms->_id]]);?>
                                    </figure>

                                    <div class="p-4">

                                        <h4><?php echo $this->Html->link($uniforms['uniformname'],['controller'=>'Uniforms', 'action' => 'showuniformdetail', $uniforms->_id]);?></h4>
                                        <?php
                                           $min=100000;
                                             $max=0;
                                        foreach($variant as $variants){

                                            if($uniforms['_id']==$variants['uniform_id']){
                                                    if($variants['price']<$min){
                                                                $min=$variants['price'];
                                                    }
                                                     if($variants['price']>$max){
                                                                $max=$variants['price'];
                                                    }
                                                } ?>
                                        <?php } ?>

                                        <?php if($min==$max){ ?>
                                        <p class="font-weight-bold" style="color: #262261"><?= $this->Number->currency($max, '', ['places' => 2]) ?></p>
                                        <?php }
                                             else if($min==100000&& $max==0){ ?>
                                        <p>price unavailable</p>
                                        <?php }

                                         else{ ?>
                                        <p class="font-weight-bold" style="color: #262261"><?= $this->Number->currency($min, '', ['places' => 2]) ?> - <?= $this->Number->currency($max, '', ['places' => 2]) ?></p>
                                        <?php } ?>

                                    </div>

                                </div>
                            </div>
                        <?php } ?>

                    </div>
                </div>

                <div class="col-md-3 order-1 mb-5 mb-md-0">
                    <div class="akame-cta-area">
                        <div class="mb-4">
                            <!--Org name and logo -->
                            <div>
                                <?php echo $this->Html->image("../files/organisations/logopath/{$organisation->logopath}"); ?>
                            </div>
                            <br>
                                <h5><?php echo $organisation->organisationname;?></h5>

                            <br>
                            <br>

                            <!--category filter-->
                            <h5>Category</h5>
                            <?= $this->Form->create('') ?>
                            <?php foreach($UniformType as $key => $UniformTypes){ ?>
                                <label for="s_sm" class="d-flex">
                                  <?= $this->Form->control('Types.'.$key,['label'=>$UniformTypes->uniformType,"value"=>$UniformTypes->uniformType,"type" => "checkbox", "class" => "checkbox1"]);?>
                                </label>
                            <?php } ?>

                            <!--gender filter-->
                            <h5>Gender</h5>
                            <?php $genderType=['Men','Women','Unisex']; ?>
                            <?php foreach($gender as $key2 => $genders){ ?>
                                <label for="s_sm" class="d-flex">
                                    <?= $this->Form->control('Genders.'.$key2,['label'=>$genders->gender,"value"=>$genders->gender,"type" => "checkbox", "class" => "checkbox1"]);?>
                                </label>
                            <?php } ?>

                            <br>

                            <!-- apply filter button-->
                            <?= $this->Form->button('Apply Filter',['class' => 'btn akame-btn active']) ?>
                            <?= $this->Form->end() ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>