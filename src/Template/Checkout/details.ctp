<div class="card">
    <h3 class="card-header">Customer Details</h3>
    <div class="card-body">
        <?php echo $this->Form->create() ?>
        <div class="form-group">
            <label>Name</label><?php echo $this->Form->text('name', ['class'=>'form-control', 'required']) ?>
        </div>
        <div class="form-group"
            <label>Email</label><?php echo $this->Form->password('email', ['class'=>'form-control', 'required']) ?>
        </div>
        <div class="form-group"
            <label>Delivery Information</label><?php echo $this->Form->password('password', ['class'=>'form-control', 'required']) ?>
        </div>
        <div class="form-group"
            <label>Unit/House Number</label><?php echo $this->Form->password('No.', ['class'=>'form-control', 'required']) ?>
        </div>
        <div class="form-group"
            <label>Street</label><?php echo $this->Form->password('street', ['class'=>'form-control', 'required']) ?>
        </div>
        <div class="form-group"
            <label>Suburb</label><?php echo $this->Form->password('suburb', ['class'=>'form-control', 'required']) ?>
        </div>
        <div class="form-group"
            <label>Territory</label><?php echo $this->Form->password('territory', ['class'=>'form-control', 'required']) ?>
        </div>
        <div class="form-group"
            <label>Postal Code</label><?php echo $this->Form->password('postal code', ['class'=>'form-control', 'required']) ?>
        </div>
        <?php
            echo $this->Form->submit('Next', ['class'=>'btn akame-btn active']);
            echo $this->Form->end();
        ?>
        <br>
        <br>

    </div>
</div>