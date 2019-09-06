<div>
    <?= $this->Flash->render() ?>
</div>
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-lg-8 col-md-6 col-sm-4">
                <h3>About Us Page Content</h3>
            </div>
            <div class="col-lg-4">
                <?php echo $this->Html->link('< Change other website contents',
                    ['controller'=>'Admins', 'action'=>'websitecontents'],
                    ['escape' => false, 'class' => 'btn btn-outline-secondary']); ?>
            </div>
        </div>
    </div>

    <div class="card-body">
        <div><?php echo $this->Html->link('Edit About Us page',
                ['controller'=>'Admins', 'action'=>'aboutuscontentedit'], ['class' => 'btn btn-outline-primary']); ?>
        </div>
        <br>

        <div class="form-group">
            <b style="color: #262261;">About Us page title</b>
            <p><?= h($aboutpagetitle) ?></p>
        </div>
        <div class="form-group">
            <b style="color: #262261;">Page subheading</b>
            <p><?= h($aboutpagesubheading) ?></p>
        </div>
        <div class="form-group">
            <b style="color: #262261;">About Us     page content</b>
            <p><?= h($content) ?></p>
        </div>


    </div>


    <div>