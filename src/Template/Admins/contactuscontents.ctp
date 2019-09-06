<div>
    <?= $this->Flash->render() ?>
</div>
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-lg-8 col-md-6 col-sm-4">
                <h3>Contact Us Page Content</h3>
            </div>
            <div class="col-lg-4">
                <?php echo $this->Html->link('< Change other website contents',
                    ['controller'=>'Admins', 'action'=>'websitecontents'],
                    ['escape' => false, 'class' => 'btn btn-outline-secondary']); ?>
            </div>
        </div>
    </div>

    <div class="card-body">
        <div><?php echo $this->Html->link('Edit Contact Us page',
                ['controller'=>'Admins', 'action'=>'contactuscontentedit'], ['class' => 'btn btn-outline-primary']); ?>
        </div>
        <br>

        <div class="form-group">
            <b style="color: #262261;">Contact Us page title</b>
            <p><?= h($contactpagetitle) ?></p>
        </div>
        <div class="form-group">
            <b style="color: #262261;">Phone</b>
            <p><?= h($phone) ?></p>
        </div>
        <div class="form-group">
            <b style="color: #262261;">Address</b>
            <p><?= h($address) ?></p>
        </div>
        <div class="form-group">
            <b style="color: #262261;">Business Days</b>
            <p><?= h($businessdays) ?></p>
        </div>
        <div class="form-group">
            <b style="color: #262261;">Business Hours</b>
            <p><?= h($businesshours) ?></p>
        </div>
        <div class="form-group">
            <b style="color: #262261;">Email account name</b>
            <p><?= h($emailaccount) ?></p>
        </div>
        <div class="form-group">
            <b style="color: #262261;">Email domain name</b>
            <p><?= h($emaildomain) ?></p>
        </div>
        <div class="form-group">
            <b style="color: #262261;">Google Map code for map address</b>
            <p><?= h($googlemap) ?></p>
        </div>




    </div>


    <div>