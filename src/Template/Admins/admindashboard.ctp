<div>
    <?= $this->Flash->render() ?>
</div>
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-lg-8 col-md-6 col-sm-4">
                <h3>

                <?php echo $this->Html->link(
                    '<span class="m-menu__link-text">'.' Admin Dashboard ' . '</span><i class="icon_tools">  </i>',
                    ['controller'=>'Admins', 'action'=>'admindashboard'],
                    ['escape' => false, 'class' => '']
                );
                ?>
                </h3>
            </div>
         </div>
    </div>
    <div class="card-body">
        <div class="row">

            <div class="col-md-6">
                <b style="color: #262261;">Organisations and Uniforms</b>
                <br>
                <p>View, add, edit and delete organisations and their uniforms</p>
                <?php echo $this->Html->link('Go to organisations',
                    ['controller'=>'admins', 'action'=>'organisationlist'],
                    ['escape' => false, 'class' => 'btn btn-outline-dark']); ?>
            </div>
            <br>
            <div class="col-md-6">
                <b style="color: #262261;">Website Contents</b>
                <br>
                <p>Edit and update static page content</p>
                <?php echo $this->Html->link('Go to website contents',
                    ['controller'=>'admins', 'action'=>'websitecontents'],
                    ['escape' => false, 'class' => 'btn btn-outline-dark']); ?>
            </div>
        </div>

        <br><br>

        <div>
            <b style="color: #262261;">Orders</b>
            <p>View recent orders and status </p>
            <?php echo $this->Html->link('Go to orders',
                    ['controller'=>'admins', 'action'=>'orderlist'],
                    ['escape' => false, 'class' => 'btn btn-outline-dark']); ?>
        </div>

    </div>

</div>
