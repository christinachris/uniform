<div>
    <?= $this->Flash->render() ?>
</div>

<div class="section-heading text-center"></div>


<div class="row">
<div class="customers form large-9 medium-8 columns content col-md-8 offset-md-2">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-lg-8 col-md-6 col-sm-4">
                    <h3><?= $uniformname ?></h3>
                    <p><?php echo $orgname ?> </p>
                </div>
                <div class="col-lg-4">
                    <?php echo $this->Html->link('<span class="m-menu__link-text">' . h('+ Add New Variant') . '</span>',
                        ['controller'=>'Admins', 'action'=>'variantadd',$uniformid],
                        ['escape' => false, 'class' => 'btn btn-success']); ?>

                </div>
                <div class="col-lg-6">
                    <?php echo $this->Html->link('< Back to '. $uniformname.' uniform details',
                        ['controller'=>'Admins', 'action'=>'uniformdetails',$uniformid],
                        ['escape' => false, 'class' => 'btn btn-outline-dark']); ?>

                    <?php echo $this->Html->link( '< Back to '.$orgname.' uniform list',
                        ['controller'=>'Admins', 'action'=>'uniformlist',$orgid],
                        ['escape' => false, 'class' => 'btn btn-outline-info']); ?>

                </div>
            </div>
        </div>

        <div class="card-body">
            <table style="width: 100%;" class="cartlabel">
                <thead>
                <tr>
                    <th align="right">Colour</th>
                    <th align="right">Size</th>
                    <th align="right">Price</th>
                    <th align="rigtiiu]h]]]'t"></th>
                    <th align="right"></th>
                </tr>
                </thead>
                <?php $sum=0; ?>
                <?php foreach($variants as $variant){ ?>
                <tbody>
                <tr>
                    <?= $this->Form->create($variant, ['url' => ['controller' => 'admins', 'action' => 'variantedit' , $variant->id]]);?>
                    <th align="right"> <p> <?php echo $this->Form->colour('colour', ['class'=>'form-control', 'required']) ?> </p></th>
                    <th align="right"> <p> <?php echo $this->Form->size('size', ['class'=>'form-control', 'required']) ?> </p></th>
                    <th align="right"> <p> <?php echo $this->Form->price('price', ['class'=>'form-control', 'required']) ?> </p></th>
                    <th align="right"><p> <?php echo  $this->Form->submit(__('Update'),['class' => 'btn-sm btn-info']) ?> </p></th>
                    <?= $this->Form->end(); ?>
                    <th align="right"><p> <?php echo $this->Html->link(
                            'Delete',
                            ['controller'=>'Admins', 'action'=>'variantdelete',$variant->_id],
                            ['confirm'=>'Are you sure you want to delete this record?','class' => 'btn-sm btn-danger']
                            ); ?> </p></th>

                </tr>
                </tbody>
                <?php } ?>
            </table>
        </div>
    </div>
</div>
</div>

