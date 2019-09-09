<div>
    <?= $this->Flash->render() ?>
</div>
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-lg-8 col-md-6 col-sm-4">
                <h3>Website Contents</h3>
            </div>

        </div>
    </div>
    <div class="card-body">
        <div>
        <b>Select a page you would like to edit content for:</b>
        </div>
        <br>
        <div class="row">
            <div class="col-md-6">
                <b style="color: #262261;">Header and Footer</b>
                <br>
                <p>Edit content for the header and footer displayed on every page of your site.</p>
                <?php echo $this->Html->link('Header and Footer content',
                    ['controller'=>'admins', 'action'=>'headerfooter'],
                    ['escape' => false, 'class' => 'btn btn-outline-info']); ?>
            </div>
            <br>
            <div class="col-md-6">
                <b style="color: #262261;">Home</b>
                <br>
                <p>Edit and update static home page content.</p>
                <?php echo $this->Html->link('Home page content',
                    ['controller'=>'admins', 'action'=>'homepagecontents'],
                    ['escape' => false, 'class' => 'btn btn-outline-info']); ?>
            </div>
        </div>
        <br><br>
        <div class="row">
            <div class="col-md-6">
                <b style="color: #262261;">About Us</b>
                <br>
                <p>Edit content for the about us page of your website.</p>
                <?php echo $this->Html->link('About Us page content',
                    ['controller'=>'admins', 'action'=>'aboutuscontents'],
                    ['escape' => false, 'class' => 'btn btn-outline-info']); ?>
            </div>
            <br>
            <div class="col-md-6">
                <b style="color: #262261;">What We Do</b>
                <br>
                <p>Edit content about the services you provide.</p>
                <?php echo $this->Html->link('What We Do page content',
                    ['controller'=>'admins', 'action'=>'servicescontents'],
                    ['escape' => false, 'class' => 'btn btn-outline-info']); ?>
            </div>
        </div>
        <br><br>
        <div class="row">
            <div class="col-md-6">
                <b style="color: #262261;">Contact Us</b>
                <br>
                <p>Edit contact details on the Get In Touch page of your website.</p>
                <?php echo $this->Html->link('Contact Us page content',
                    ['controller'=>'admins', 'action'=>'contactuscontents'],
                    ['escape' => false, 'class' => 'btn btn-outline-info']); ?>
            </div>
            <br>
            <div class="col-md-6">
                <b style="color: #262261;">Other Content</b>
                <br>
                <p>Edit other content (e.g. Shipping amount).</p>
                <?php echo $this->Html->link('Other Content',
                    ['controller'=>'admins', 'action'=>'othercontent'],
                    ['escape' => false, 'class' => 'btn btn-outline-info']); ?>
            </div>

        </div>

    </div>
<div>