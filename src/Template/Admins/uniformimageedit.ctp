<div>
    <?= $this->Flash->render() ?>
</div>

<div class="card">
<div class="card-header">
    <h3> Edit <?php echo $uniform->uniformname ?> Pictures </h3>
    <div class="col-lg-4">
        <?php echo $this->Html->link('<span class="m-menu__link-text">' . h('< Back') . '</span>',
                ['controller'=>'Admins', 'action'=>'uniformdetails',$uniform->_id],
                ['escape' => false, 'class' => 'btn btn-outline-secondary']); ?>

    </div>
</div>

<div class="card-body">
    <div class="form-group">
        <?php echo $this->Html->link('<span class="m-menu__link-text">' . h('Edit hero image') . '</span>',
            ['controller'=>'Admins', 'action'=>'uniformheroimageedit',$uniform->_id],
            ['escape' => false, 'class' => 'btn btn-primary']); ?>
        <div class="product-image" style="float: none;">
            <?php echo $this->Html->image("/files/Uniforms/heroimagepath/{$uniform->heroimagepath}");?>
        </div>

    </div>
    <div class="form-group">
        <?php echo $this->Html->link('<span class="m-menu__link-text">' . h('Edit size chart image') . '</span>',
            ['controller'=>'Admins', 'action'=>'uniformsizeimageedit',$uniform->_id],
            ['escape' => false, 'class' => 'btn btn-primary']); ?>
        <div class="product-image" style="float: none;">
        <?php echo $this->Html->image("/files/Uniforms/sizechartpath/{$uniform->sizechartpath}");?>
        </div>

    </div>
    <div class="form-group">
        <?php echo $this->Html->link('<span class="m-menu__link-text">' . h('Edit extra image') . '</span>',
                ['controller'=>'Admins', 'action'=>'uniformextraimagelist',$uniform->_id],
                ['escape' => false, 'class' => 'btn btn-primary']); ?>
    </div>

</div>


</div>
