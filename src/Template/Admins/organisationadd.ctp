<div>
    <?= $this->Flash->render() ?>
</div>
<div class="card">
<?= $this->Form->create('',['url' => ['controller' => 'admins', 'action' => 'organisationadd']]); ?>
<div class="card-header">
    <div class="row">
        <div class="col-lg-8 col-md-6 col-sm-4">
            <h3>New Organisation</h3>
        </div>
        <div class="col-lg-4">
            <?php echo $this->Html->link('< Back to organisation list',
                    ['controller'=>'Admins', 'action'=>'variantlist'],
                    ['escape' => false, 'class' => 'btn btn-outline-secondary']); ?>
        </div>
    </div>
</div>

<div class="card-body">
    <div class="form-group">

    </div>
    <div class="form-group">
        <label>Name</label><?php echo $this->Form->organisationname('organisationname', ['class'=>'form-control', 'required']) ?>
    </div>
    <div class="form-group">
        <label>Access code</label><?php echo $this->Form->accesscode('accesscode', ['class'=>'form-control', 'required']) ?>
    </div>
    <div class="form-group">
        <label>Bypass code</label><?php echo $this->Form->bypasscode('bypasscode', ['class'=>'form-control', 'required']) ?>
    </div>
    <div class="form-group">
        <label>Logo</label><?php echo $this->Form->logopath('logopath', ['class'=>'form-control', 'required']) ?>
    </div>
</div>
<div>
    <?php echo $this->Form->submit('Save', ['class'=>'btn akame-btn active','style'=>'margin-left:35%']); ?>
</div>
<br/>
</div>
        <?php echo $this->Form->end(); ?>
