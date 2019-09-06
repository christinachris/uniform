<div class="section-heading text-center"></div>
<div class="row">
    <div class="col-md-6 offset-md-3">
        <?= $this->Flash->render() ?>
        <div class="card">
            <h3 class="card-header">Login</h3>
            <div class="card-body">
                <p id="resetpwdescription"> To shop your organisation's uniform, please login below.</p>
                <?= $this->Form->create(
                null,
                [
                'url' => [
                'controller' => 'Customers',
                'action' => 'login',
                '?' => [
                'redirect' => $this->request->getQuery('redirect')
                ]
                ]
                ]); ?>
                <div class="form-group">
                    <label>Email</label><?php echo $this->Form->text('email', ['class'=>'form-control', 'required', 'type'=>'email']) ?>
                </div>
                <div class="form-group">
                    <label>Password</label><?php echo $this->Form->password('password', ['class'=>'form-control', 'required']) ?>
                </div>
                <?php
                echo $this->Form->submit('Log in', ['class'=>'btn akame-btn active']);
                echo $this->Form->end();
                ?>
                <br>

                <div class="form-group">
                    <b style="color: #262261" class="pull-right"><?= $this->Html->link("Forgot Password", ['action' => 'forgotpw']); ?></b>
                    <br>
                    <b style="color: #262261;" class="pull-right"><?= $this->Html->link("Resend Verification Email", ['action' => 'reverify']); ?></b>
                </div>

            <br>
            <br>

            <div class="form-group">
                <h5> Are you a new user?</h5>
                <?= $this->Html->link("Create Account", ['action' => 'register'], ['class' => 'logintext active']); ?>
            </div>
        </div>
    </div>

</div>
