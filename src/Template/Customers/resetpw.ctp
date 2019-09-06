<div class="section-heading text-center"></div>
<div class="row">
    <div class="col-md-6 offset-md-3">
        <?= $this->Flash->render() ?>
        <div class="card">
            <h3 class="card-header">Reset Password</h3>
            <div class="card-body">
                <?php echo $this->Form->create() ?>
                <div class="form-group">
                    <label> Email </label><?php echo $this->Form->control('email', ['required', 'type'=>'email', 'label'=> false, 'class'=>'form-control']); ?>
                </div>
                <div class="form-group">
                    <label> Reset Code </label><?php echo $this->Form->control('token', ['required', 'label'=> false, 'class'=>'form-control']); ?>
                </div>
                <div class="form-group">
                    <label>New Password</label><?php echo $this->Form->control('password', ['class'=>'form-control', 'required', 'label'=>false]) ?>
                </div>

                <?php
                echo $this->Form->submit('Reset', ['class'=>'btn akame-btn active']);
                echo $this->Form->end();
                ?>


                <br>
                <br>

                <div class="form-group">
                    <!--                <h5> Login</h5>-->
                    <?= $this->Html->link("< Go back to Login", ['action' => 'login'], ['class' => 'logintext']); ?>
                </div>
            </div>
        </div>
    </div>

</div>
