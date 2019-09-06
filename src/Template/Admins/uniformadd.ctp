<div>
    <?= $this->Flash->render() ?>
</div>
<div class="card">
    <?= $this->Form->create($uniform,['type' => 'file']); ?>
    <div class="card-header">
        <div class="row">
            <div class="col-lg-8 col-md-6 col-sm-4">
                <h3>New Uniform</h3>
                <div>
                    <b> <?php echo $organisation->organisationname ?> </b>
                </div>
            </div>
            <div class="col-lg-4">
                <?php echo $this->Html->link('< Back to uniform list',
                    ['controller'=>'Admins', 'action'=>'uniformlist', $organisation->_id],
                    ['escape' => false, 'class' => 'btn btn-outline-secondary']); ?>
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="form-group">

        </div>
        <div class="form-group">
            <label>Name</label><?php echo $this->Form->uniformname('uniformname', ['class'=>'form-control', 'required']) ?>
        </div>
        <div class="form-group">
            <label>Type</label><?php echo $this->Form->type('type', ['class'=>'form-control', 'required']) ?>
        </div>
        <div class="form-group">
            <label>Gender</label><?php echo $this->Form->gender('gender', ['class'=>'form-control', 'required']) ?>
        </div>
        <div class="form-group">
            <label>Description</label><?php echo $this->Form->uniformdescription('uniformdescription', ['class'=>'form-control', 'required']) ?>
        </div>
        <div class="form-group">
            <label>Image</label><?php echo $this->Form->control('heroimagepath', ['type' => 'file']); ?>
        </div>
    </div>
    <div>
        <?php echo $this->Form->submit('Save', ['class'=>'btn akame-btn active','style'=>'margin-left:35%']); ?>
    </div>
    <br/>
</div>
<?php echo $this->Form->end(); ?>
