<div>
    <?= $this->Flash->render() ?>
</div>

<div class="card">
    <?= $this->Form->create($uniform,['url' => ['controller' => 'admins', 'action' => 'uniformheroimageedit'],'type' =>'file']); ?>
    <h3 class="card-header">Edit <?php echo $uniform->uniformname?> Hero Picture</h3>
    <div class="card-body">


        <div class="form-group">
            <label>Hero Image</label>
            <div class="product-image" style="float: none;">
                <?php echo $this->Html->image("/files/Uniforms/heroimagepath/{$uniform->heroimagepath}");?>
            </div>
            <br>
            <?php echo $this->Form->control('heroimagepath', ['type'=>'file', 'required']) ?>
        </div>

    </div>
    <div class="col-lg-4">
        <?php echo $this->Form->submit('Save', ['class'=>'btn btn-outline-success btn-block']); ?>
        <?php echo $this->Form->end(); ?>
        <br>
        <?php echo $this->Html->link('<span class="m-menu__link-text">' . h('Cancel') . '</span>',
            ['controller'=>'admins', 'action'=>'uniformimageedit',$uniform->_id],
            ['escape' => false, 'class' => 'btn btn-outline-danger btn-block']); ?>
    </div>
</div>

