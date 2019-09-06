<div>
    <?= $this->Flash->render() ?>
</div>

<div class="card">
    <?= $this->Form->create($uniform,['url' => ['controller' => 'admins', 'action' => 'uniformedit']]); ?>
    <div class="card-header">
        <h3> Edit Uniform </h3>
        <p> <?php echo $orgname ?></p>
    </div>

    <div class="card-body">
        <div class="form-group">
            <label>Uniform Name</label><?php echo $this->Form->name('uniformname', ['class'=>'form-control', 'required']) ?>
        </div>
        <div class="form-group">
            <label>Type</label><?php echo $this->Form->type('type', ['class'=>'form-control', 'required']) ?>
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
