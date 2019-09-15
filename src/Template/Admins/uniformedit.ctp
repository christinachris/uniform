<div>
    <?= $this->Flash->render() ?>
</div>

<div class="card">
    <?= $this->Form->create($uniform,['url' => ['controller' => 'admins', 'action' => 'uniformedit']]); ?>
    <div class="card-header">
        <div class="row">
            <div class="col-lg-8 col-md-6 col-sm-4">
                <h3>Edit uniform item <?php echo $uniform->uniformname ?></h3>
            </div>
            <div class="col-lg-4">
                <?php echo $this->Html->link('Edit Pictures',
                    ['controller'=>'Admins', 'action'=>'uniformimageedit',$uniform->_id],
                    ['escape' => false, 'class' => 'btn btn-primary']); ?>
            </div>
            <div class="col-lg-8 col-md-6 col-sm-4">
            <p> <?php echo $orgname ?></p>
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="form-group">
            <label style="padding-right: 10px">Uniform Status</label><?php echo $this->Form->select('status', $statusSelect, array('default' => $activeStatus));?>
        </div>
        <div class="form-group">
            <label>Uniform Name</label><?php echo $this->Form->name('uniformname', ['class'=>'form-control', 'required']) ?>
        </div>
        <div class="form-group">
            <label>Type</label><?php echo $this->Form->uniformType('uniformType', ['class'=>'form-control', 'required']) ?>
        </div>
        <div class="form-group">
            <label>Gender</label><?php echo $this->Form->gender('gender', ['class'=>'form-control', 'required']) ?>
        </div>
        <div class="form-group">
            <label>Description</label><?php echo $this->Form->textarea('uniformdescription', ['class'=>'form-control', 'required']) ?>
        </div>


    </div>

    <div class="col-lg-4">
        <?php echo $this->Form->submit('Save', ['class'=>'btn btn-outline-success btn-block']); ?>
        <br/>
        <?php echo $this->Form->end(); ?>
        <?php echo $this->Html->link('<span class="m-menu__link-text">' . h('Cancel') . '</span>',
        ['controller'=>'admins', 'action'=>'uniformdetails',$uniform->_id],
        ['escape' => false, 'class' => 'btn btn-outline-danger btn-block']); ?>
    </div>
</div>
