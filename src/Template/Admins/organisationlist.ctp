<div>
    <?= $this->Flash->render() ?>
</div>
<div class="section-heading text-center"></div>
<div class="row">
    <div class="customers form large-9 medium-8 columns content col-md-6 offset-md-3">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-8 col-md-6 col-sm-4">
                        <h3>Organisations</h3>
                    </div>
                    <div class="col-lg-4">
                        <?php echo $this->Html->link('< Admin Dashboard',
                            ['controller'=>'Admins', 'action'=>'admindashboard'],
                            ['escape' => false, 'class' => 'btn btn-outline-secondary']); ?>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-6">
                        <?php echo $this->Html->link('<span class="m-menu__link-text">' . h('+ Add New Organisation') . '</span>',
                            ['controller'=>'Admins', 'action'=>'organisationadd'],
                            ['escape' => false, 'class' => 'btn btn-success']); ?>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="basket" style="width: 100%; padding: 0;">

                    <?php foreach($organisations as $organisation){ ?>
                    <div class="basket-product">
                        <div class="item">
                            <?php echo $this->Html->link($organisation['organisationname'],['controller'=>'admins', 'action' => 'organisationdetails', $organisation->_id], ['class'=>'btn btn-outline-primary']);?>
                        </div>


                    </div>
                    <?php } ?>
                </div>

            </div>
        </div>
    </div>
</div>


