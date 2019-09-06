<div>
    <?= $this->Flash->render() ?>
</div>
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-lg-8 col-md-6 col-sm-4">
                <h3>Home Page Content</h3>
            </div>
            <div class="col-lg-4">
                <?php echo $this->Html->link('< Change other website contents',
                    ['controller'=>'Admins', 'action'=>'websitecontents'],
                    ['escape' => false, 'class' => 'btn btn-outline-secondary']); ?>
            </div>
        </div>
    </div>

    <div class="card-body">
        <div><?php echo $this->Html->link('Edit Homepage content',
                ['controller'=>'Admins', 'action'=>'homepagecontentedit'], ['class' => 'btn btn-outline-primary']); ?>
        </div>
        <br>

        <div class="form-group">
            <b style="color: #262261;">Home page main carousel slide title</b>
            <p><?= h($homemaintitle) ?></p>
        </div>
        <div class="form-group">
            <b style="color: #262261;">Home page main carousel slide text</b>
            <p><?= h($homefirstslidetext) ?></p>
        </div>
        <div class="form-group">
            <b style="color: #262261;">Home page second carousel slide title</b>
            <p><?= h($hhomeslidetwotitle) ?></p>
        </div>
        <div class="form-group">
            <b style="color: #262261;">Home page third carousel slide title</b>
            <p><?= h($hhomeslidethreetitle) ?></p>
        </div>
        <div class="form-group">
            <b style="color: #262261;">Home page fourth carousel slide title</b>
            <p><?= h($hhomeslidefourtitle) ?></p>
        </div>
        <div class="form-group">
            <b style="color: #262261;">Home page fifth carousel slide title</b>
            <p><?= h($hhomeslidefivetitle) ?></p>
        </div>
        <div class="form-group">
            <b style="color: #262261;">Vision statement under home page carousel</b>
            <p><?= h($vision) ?></p>
        </div>
        <div class="form-group">
            <b style="color: #262261;">Goal under home page carousel</b>
            <p><?= h($goal) ?></p>
        </div>
        <div class="form-group">
            <b style="color: #262261;">About Us section on homepage title</b>
            <p><?= h($haboutheading) ?></p>
        </div>
        <div class="form-group">
            <b style="color: #262261;">About Us section on homepage text</b>
            <p><?= h($habouttext) ?></p>
        </div>
        <div class="form-group">
            <b style="color: #262261;">What we do section on homepage title</b>
            <p><?= h($hhomeservicestitle) ?></p>
        </div>
        <div class="form-group">
            <b style="color: #262261;">What we do section on homepage text</b>
            <p><?= h($hservicestext) ?></p>
        </div>
        <div class="form-group">
            <b style="color: #262261;">Contact Us section on homepage title</b>
            <p><?= h($hhomecontacttitle) ?></p>
        </div>
        <div class="form-group">
            <b style="color: #262261;">Contact Us section on homepage text</b>
            <p><?= h($hhomecontacttext) ?></p>
        </div>

    </div>


    <div>