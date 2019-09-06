<div class="section-heading text-center"></div>

<div class="row">
    <div class="customers form large-9 medium-8 columns content col-md-6 offset-md-3">
        <?= $this->Flash->render() ?>
        <div class="card">
            <h3 class="card-header">Do you have a code to bypass checkout?</h3>

            <div class="card-body">
                <p> If you have received a valid checkout bypass code from us, please enter it here. Submit and confirm your order, and we will invoice you. </p>
                <?= $this->Form->create() ?>

                <div class="form-group">
                    <label> <b>Checkout Bypass Code:</b></label> <?php echo $this->Form->control('bypasscode', ['required', 'class'=>'form-control', 'label'=>false]); ?>
                </div>

                <?= $this->Form->button('Enter Code', ['class'=>'btn akame-btn active', 'controller'=>'Carts','action' => 'bypasscheckoutreview']) ?>
                <?= $this->Form->end() ?>

                <br>
                <br>

                <div class="form-group">
                    <?= $this->Html->link("< Back to Cart ", ['controller'=>'Carts', 'action' => 'cart'], ['class' => 'logintext active']); ?>
                </div>

            </div>


        </div>
    </div>
</div>

