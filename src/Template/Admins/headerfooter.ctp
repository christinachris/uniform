<div>
    <?= $this->Flash->render() ?>
</div>
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-lg-8 col-md-6 col-sm-4">
                <h3>Header & Footer Content</h3>
            </div>
            <div class="col-lg-4">
                <?php echo $this->Html->link('< Change other website contents',
                    ['controller'=>'Admins', 'action'=>'websitecontents'],
                    ['escape' => false, 'class' => 'btn btn-outline-secondary']); ?>
            </div>
        </div>
    </div>

    <div class="card-body">
        <div><?php echo $this->Html->link('Edit Header and Footer Contents',
            ['controller'=>'Admins', 'action'=>'headerfooteredit'], ['class' => 'btn btn-outline-primary']); ?>
        </div>
        <br>
        <div class="form-group">
            <b style="color: #262261;">Shoreditch Corporate Logo</b>
            <div class="product-image" style="float: none">
                <?php echo $this->Html->image( $logo, ['alt' => 'CakePHP']);?>
            </div>
        </div>
        <div class="form-group">
            <b style="color: #262261;">Phone number</b>
            <p><?= h($phone) ?></p>
        </div>
        <div class="form-group">
            <b style="color: #262261;">Business days and hours</b>
            <p><?= h($operatingtime) ?></p>
        </div>
        <div class="form-group">
            <b style="color: #262261;">Email in footer</b>
            <p><?= h($emailfull) ?></p>
        </div>
        <div class="form-group">
            <b style="color: #262261;">Office Address</b>
            <p><?= h($address) ?></p>
        </div>
        <div class="form-group">
            <b style="color: #262261;">Facebook Link</b>
            <p><?= h($facebook) ?></p>
        </div>
        <div class="form-group">
            <b style="color: #262261;">Linkedin Link</b>
            <p><?= h($linkedin) ?></p>
        </div>
        <div class="form-group">
            <b style="color: #262261;">Pinterest Link</b>
            <p><?= h($pinterest) ?></p>
        </div>

    </div>


<div>