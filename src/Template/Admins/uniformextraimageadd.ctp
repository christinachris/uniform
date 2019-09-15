<div>
    <?= $this->Flash->render() ?>
</div>

<div class="card">
<?= $this->Form->create($picture,['type' =>'file']); ?>
<h3 class="card-header">Add <?php echo $uniform->uniformname?>'s Extra Picture </h3>
<div class="card-body">


    <div class="form-group">
        <label>Extra Photo</label><?php echo $this->Form->control('extraphotopath', ['type'=>'file', 'required']) ?>
    </div>

</div>
<div class="col-lg-4">
    <?php echo $this->Form->submit('Save', ['class'=>'btn btn-outline-success btn-block']); ?>
    <?php echo $this->Form->end(); ?>
    <br>
    <?php echo $this->Html->link('<span class="m-menu__link-text">' . h('Cancel') . '</span>',
            ['controller'=>'admins', 'action'=>'uniformextraimagelist',$uniform->_id],
            ['escape' => false, 'class' => 'btn btn-outline-danger btn-block']); ?>
</div>
</div>

