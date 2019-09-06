<div class="section-heading text-center"></div>
<div class="row">
    <div class="col-md-6 offset-md-3">
        <?= $this->Flash->render() ?>
        <div class="card">
            <h3 class="card-header">Change Password</h3>
            <div class="card-body">
                <?php echo $this->Form->create() ?>
                <div class="form-group">
                    <label>Enter Current Password </label>
                    <?php echo $this->Form->control('old_password', ['required', 'label'=> false, 'class'=>'form-control', 'type'=>'password']); ?>
                </div>
                <div class="form-group">
                    <label>Enter New Password</label>
                    <?php echo $this->Form->control('New_password', ['class'=>'form-control', 'required', 'label'=>false, 'type'=>'password']) ?>
                </div>
                <div class="form-group">
                    <label>Confirm New Password</label>
                    <?php echo $this->Form->control('confPassword', ['class'=>'form-control', 'required', 'label'=>false, 'type'=>'password']) ?>
                </div>
                <br>

                <?php
                echo $this->Form->submit('Save New Password', ['class'=>'btn akame-btn active pull-right']);
                echo $this->Form->end();
                ?>

            </div>
        </div>
    </div>

</div>
