<div class="section-heading text-center"></div>
<div class="row">
    <div class="col-md-6 offset-md-3">
        <?= $this->Flash->render() ?>
        <div class="card">
            <h3 class="card-header">Edit Account</h3>
            <div class="card-body">
                <?= $this->Form->create(null, ['url' => ['controller' => 'Customers', 'action' => 'editaccount',]]); ?>
                <div class="form-group">
                    <label style="color: #262261"><b>First Name</b></label><?php echo $this->Form->text('firstname', ['class'=>'form-control', 'required','default'=>$customer->firstname]) ?>
                </div>
                <div class="form-group">
                    <label style="color: #262261"><b>Last Name</b></label><?php echo $this->Form->text('lastname', ['class'=>'form-control', 'required','default'=>$customer->lastname]) ?>
                </div>
                <div class="form-group">
                    <label style="color: #262261"><b>Phone</b></label><?php echo $this->Form->text('phone', ['class'=>'form-control','default'=>$customer->phone]) ?>
                </div>
                <br>

                <?php
                echo $this->Form->submit('Save', ['class'=>'btn akame-btn active pull-right']);
                echo $this->Form->end();
                ?>

                <br>
                <br>
                <br>
                <?= $this->Html->link("< Back to My Account", ['action' => 'viewaccount']); ?>

            </div>
        </div>

    </div>
