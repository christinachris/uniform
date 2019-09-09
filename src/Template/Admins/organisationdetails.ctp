<div>
    <?= $this->Flash->render() ?>
</div>
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-lg-8 col-md-6 col-sm-4">
                <h3><?php echo $organisation->organisationname ?></h3>
            </div>
            <div class="col-lg-4">
                <?php echo $this->Html->link('<span class="m-menu__link-text">' . h('< Back to Organisation List') . '</span>',
                    ['controller'=>'Admins', 'action'=>'organisationlist'],
                    ['escape' => false, 'class' => 'btn btn-outline-secondary']); ?>
            </div>
        </div>
    </div>

    <div class="card-body">
        <div>
            <?php echo $this->Html->link('Edit Organisation',
                ['controller'=>'Admins', 'action'=>'organisationedit',$organisation->_id],
                ['escape' => false, 'class' => 'btn btn-primary']); ?>


            <?php echo $this->Html->link('<span class="m-menu__link-text">' . h('See Uniforms') . '</span>',
                ['controller'=>'admins', 'action'=>'uniformlist',$organisation->_id],
                ['escape' => false, 'class' => 'btn btn-dark']); ?>
        </div>
        <br>
        <div class="form-group">
            <b style="color: #262261;">Organisation Status</b>
            <p><?= ($activeStatus) ?></p>
        </div>
        <div class="form-group">
            <b style="color: #262261;">Logo</b>
            <div class="product-image" style="float: none">
                <?php echo $this->Html->image($organisation->logopath, ['alt' => 'CakePHP']);?>
            </div>
        </div>
        <br>
        <div class="form-group">
            <b style="color: #262261;">Accesscode</b>
            <p><?= ($organisation->accesscode) ?></p>
        </div>
        <div class="form-group">
            <b style="color: #262261;">Bypasscode</b>
            <p><?= ($organisation->bypasscode) ?></p>
        </div>

    </div>
</div>