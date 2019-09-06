<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Customer $customer
 */
?>

<div class="section-heading text-center"></div>

<div class="row">
    <div class="customers form large-9 medium-8 columns content col-md-6 offset-md-3">
        <?= $this->Flash->render() ?>
    <div class="card">
        <h3 class="card-header">Create account</h3>
            <div class="card-body">
                <?= $this->Form->create() ?>

                <div class="form-group">
                    <label> First Name </label> <?php echo $this->Form->control('firstname', ['required', 'class'=>'form-control', 'label'=>false]); ?>
                </div>
                <div class="form-group">
                    <label> Last Name </label><?php echo $this->Form->control('lastname', ['required', 'label'=> false, 'class'=>'form-control']);  ?>
                </div>
                <div class="form-group">
                    <label> Email </label><?php echo $this->Form->control('email', ['required', 'type'=>'email', 'label'=> false, 'class'=>'form-control']); ?>
                </div>
                <div class="form-group">
                    <label> Phone </label><?php echo $this->Form->control('phone', ['required', 'type'=>'email', 'label'=> false, 'class'=>'form-control', 'type'=>'tel']); ?>
                </div>
                <div class="form-group">
                    <label> Organisation Code </label><?php echo $this->Form->control('organisationcode', ['required', 'label'=>false, 'class'=>'form-control']); ?>
                </div>
                <div class="form-group">
                    <label> Password </label><?php echo $this->Form->control('password', ['required', 'label'=> false, 'class'=>'form-control']);?>
                </div>

                    <?= $this->Form->button('Create', ['class'=>'btn akame-btn active']) ?>
                    <?= $this->Form->end() ?>

                <br>
                <br>

                <!--      link to login          -->
                    <h5> Already have an account?</h5>
                    <?= $this->Html->link("Login", ['action' => 'login'], ['class' => 'logintext logintext:active']); ?>
                </div>


            </div>
        </div>
    </div>

