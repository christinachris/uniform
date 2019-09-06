<div>
    <?= $this->Flash->render() ?>
</div>
<div class="card">
    <?= $this->Form->create($variant); ?>
    <div class="card-header">
        <div class="row">
            <div class="col-lg-8 col-md-6 col-sm-4">
                <h3>New Variant</h3>
                <div>
                    <b> <?php echo $orgname ?> </b>
                    <p><?php echo $uniformname ?></p>
                </div>
            </div>
            <div class="col-lg-4">
                <?php echo $this->Html->link('< Back to variant list',
                    ['controller'=>'Admins', 'action'=>'variantlist', $uniform_id],
                    ['escape' => false, 'class' => 'btn btn-outline-secondary']); ?>
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="form-group">

        </div>
        <div class="form-group">
            <label>Colour</label><?php echo $this->Form->colour('colour', ['class'=>'form-control', 'required']) ?>
        </div>
        <div class="form-group">
            <label>Size</label><?php echo $this->Form->size('size', ['class'=>'form-control', 'required']) ?>
        </div>
        <div class="form-group">
            <label>Price</label><?php echo $this->Form->price('price', ['class'=>'form-control', 'required']) ?>
        </div>
    </div>
    <div>
        <?php echo $this->Form->submit('Save', ['class'=>'btn akame-btn active','style'=>'margin-left:35%']); ?>
    </div>
    <br/>
</div>
<?php echo $this->Form->end(); ?>
