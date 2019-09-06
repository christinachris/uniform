<div>
    <?= $this->Flash->render() ?>
</div>
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-lg-8 col-md-6 col-sm-4">
                <h3>What We Do Page Content</h3>
            </div>
            <div class="col-lg-4">
                <?php echo $this->Html->link('< Change other website contents',
                    ['controller'=>'Admins', 'action'=>'websitecontents'],
                    ['escape' => false, 'class' => 'btn btn-outline-secondary']); ?>
            </div>
        </div>
    </div>

    <div class="card-body">
        <div><?php echo $this->Html->link('Edit What We Do page',
                ['controller'=>'Admins', 'action'=>'servicescontentedit'], ['class' => 'btn btn-outline-primary']); ?>
        </div>
        <br>

        <div class="form-group">
            <b style="color: #262261;">What We Do page title</b>
            <p><?= h($whatwedotitle) ?></p>
        </div>
        <div class="form-group">
            <b style="color: #262261;">Page Section One Title</b>
            <p><?= h($sectiononetitle) ?></p>
        </div>
        <div class="form-group">
            <b style="color: #262261;">Page Section One Text</b>
            <p><?= h($sectiononecontent) ?></p>
        </div>
        <div class="form-group">
            <b style="color: #262261;">Page Section Two Title</b>
            <p><?= h($sectiontwotitle) ?></p>
        </div>
        <div class="form-group">
            <b style="color: #262261;">Page Section Two Text</b>
            <p><?= h($sectiontwocontent) ?></p>
        </div>
        <div class="form-group">
            <b style="color: #262261;">Supplier section description</b>
            <p><?= h($supplierdescription) ?></p>
        </div>
        <div class="form-group">
            <b style="color: #262261;">Page Section Three Title</b>
            <p><?= h($sectionthreetitle) ?></p>
        </div>
        <div class="form-group">
            <b style="color: #262261;">Page Section Three Text</b>
            <p><?= h($sectionthreecontent) ?></p>
        </div>





    </div>


    <div>