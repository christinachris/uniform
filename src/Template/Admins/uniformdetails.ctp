<div>
    <?= $this->Flash->render() ?>
</div>


<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-lg-8 col-md-6 col-sm-4">
                <h3><?php echo $uniform->uniformname ?></h3>
                <p><?php echo $orgname ?></p>
                <?php echo $this->Html->link('Admin Dashboard', ['controller'=>'Admins', 'action'=>'admindashboard'],
                    ['class' => 'btn btn-link']); ?>
            </div>
            <div class="col-lg-4">
                <?php echo $this->Html->link('<span class="m-menu__link-text">' . h('< Back to '.$orgname .' details') . '</span>',
                    ['controller'=>'Admins', 'action'=>'organisationdetails',$orgid],
                    ['escape' => false, 'class' => 'btn btn-outline-dark']); ?>

                <?php echo $this->Html->link( '< Back to '.$orgname.' uniform list',
                    ['controller'=>'Admins', 'action'=>'uniformlist',$orgid],
                    ['escape' => false, 'class' => 'btn btn-outline-info']); ?>
            </div>
        </div>
    </div>

    <div class="card-body">
        <div>
            <?php echo $this->Html->link('<span class="m-menu__link-text">' . h('Edit') . '</span>',
                ['controller'=>'Admins', 'action'=>'uniformedit',$uniform->_id],
                ['escape' => false, 'class' => 'btn btn-primary']); ?>

            <?php echo $this->Html->link('Delete Uniform',
                ['controller'=>'Admins', 'action'=>'uniformdelete',$uniform->_id],
                ['confirm'=>'Are you sure you want to delete this uniform? It will delete all related uniform variants',
                    'escape' => false, 'class' => 'btn btn-danger']); ?>

            <?php echo $this->Html->link('<span class="m-menu__link-text">' . h('See Variants') . '</span>',
                ['controller'=>'admins', 'action'=>'variantlist',$uniform->_id],
                ['escape' => false, 'class' => 'btn btn-dark']); ?>
        </div>
        <br>


        <div class="form-group">
            <b style="color: #262261;">Type</b>
            <p><?= h($uniform->type) ?></p>
        </div>
        <div class="form-group">
            <b style="color: #262261;">Gender</b>
            <p><?= h($uniform->gender) ?></p>
        </div>
        <div class="form-group">
            <b style="color: #262261;">Description</b>
            <p><?= h($uniform->uniformdescription) ?></p>
        </div>
        <div class="form-group">
            <b style="color: #262261;">Main Image</b>
            <br>
            <div class="product-image" style="float: none;">
                <?php echo $this->Html->image($uniform->heroimagepath, ['alt' => 'CakePHP']);?>
            </div>
        </div>
        <div class="form-group">
            <b style="color: #262261;">Other Image</b>
            <br>
            <div class="product-image" style="float: none;">
            <?php foreach($pictures as $picture){ ?>

                <?php echo $this->Html->image($picture->extraphotopath, ['alt' => 'CakePHP']);?>


            </div>
            <?php } ?>
        </div>

    </div>

</div>