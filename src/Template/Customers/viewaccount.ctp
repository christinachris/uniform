<div class="section-heading text-center"></div>
<?= $this->Flash->render() ?>
<div class="row">
    <div class="customers form large-9 medium-8 columns content col-md-6 offset-md-3">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-8 col-md-6 col-sm-4">
                        <h3>My Account</h3>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="form-group">
                    <b style="color: #262261;"> First Name</b>
                    <p><?= h($customer->firstname) ?></p>
                </div>
                <div class="form-group">
                    <b style="color: #262261;"> Last Name</b>
                    <p><?= h($customer->lastname) ?></p>
                </div>
                <div class="form-group">
                    <b style="color: #262261;"> Email</b>
                    <p><?= h($customer->email) ?></p>
                </div>
                <div class="form-group">
                    <b style="color: #262261;"> Phone</b>
                    <p><?= h($customer->phone) ?></p>
                </div>
                <br>

                <div>
                  <?php echo $this->Html->link('<i class="icon_pencil-edit"></i><span class="m-menu__link-text">' . h('  Edit Details') . '</span>',
                      ['controller'=>'Customers', 'action'=>'editaccount'],
                      ['escape' => false, 'class' => 'btn akame-btn active']); ?>
                  <?php echo $this->Html->link('<i class="icon_lock"></i><span class="m-menu__link-text">' . h('   Change Password') . '</span>',
                      ['controller'=>'Customers', 'action'=>'changepw'],
                      ['escape' => false, 'class' => 'btn akame-btn active']); ?>

                </div>

            </div>


        </div>
    </div>
</div>