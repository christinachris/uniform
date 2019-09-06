<div>
    <?= $this->Flash->render() ?>
</div>
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-lg-8 col-md-6 col-sm-4">
                <h3>Other Content</h3>
            </div>
            <div class="col-lg-4">
                <?php echo $this->Html->link('< Change other website contents',
                    ['controller'=>'Admins', 'action'=>'websitecontents'],
                    ['escape' => false, 'class' => 'btn btn-outline-secondary']); ?>
            </div>
        </div>
    </div>

    <div class="card-body">
        <div><?php echo $this->Html->link('Edit Other Content',
                ['controller'=>'Admins', 'action'=>'othercontentedit'], ['class' => 'btn btn-outline-primary']); ?>
        </div>
        <br>
        <div class="form-group">
            <b style="color: #262261;">Shipping</b>
            <p>$<?= ($shippingprice) ?></p>
        </div>

    </div>


    <div>