<div class="section-heading text-center"></div>
<div class="row">
    <div class="col-md-6 offset-md-3">
        <?= $this->Flash->render() ?>
        <div class="card">
            <h3 class="card-header">Resend Verification Email</h3>
            <div class="card-body">
                <p id="resetpwdescription"> Please provide your account email address, and we will send you another reverification link</p>
                <?php echo $this->Form->create() ?>
                <div class="form-group">
                    <label>Email</label><?php echo $this->Form->text('email', ['class'=>'form-control', 'required', 'type'=>'email']) ?>
                </div>

                <?php
                echo $this->Form->submit('Send verification email', ['class'=>'btn akame-btn active']);
                echo $this->Form->end();
                ?>
                <br>
                <div class="form-group">
                    <b style="color: #262261" class="pull-right"><?= $this->Html->link("Create Account", ['action' => 'register']); ?></b>
                </div>

                <br>
                <br>

                <div class="form-group">
                    <?= $this->Html->link("< Go back to Login", ['action' => 'login'], ['class' => 'logintext']); ?>
                </div>
            </div>
        </div>
    </div>

</div>
