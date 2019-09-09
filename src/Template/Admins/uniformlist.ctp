<div>
    <?= $this->Flash->render() ?>
</div>
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-lg-8 col-md-6 col-sm-4">
                <h3>Uniforms</h3>
                <p><?php echo $orgname ?></p>
            </div>
            <div class="lg-col-4 btn pull-right">
                <?php echo $this->Html->link('<span class="m-menu__link-text">' . h('+ Add New Uniforms') . '</span>',
                    ['controller'=>'Admins', 'action'=>'uniformadd',$oid],
                    ['escape' => false, 'class' => 'btn btn-success']); ?>
            </div>
            <div class="col-lg-4">
                <?php echo $this->Html->link('<span class="m-menu__link-text">' . h('< Back to'.' '.$orgname.' details') . '</span>',
                ['controller'=>'Admins', 'action'=>'organisationdetails', $iid],
                ['escape' => false, 'class' => 'btn btn-outline-secondary']); ?>

            </div>
        </div>
    </div>

    <div class="card-body">
        <p id="resetpwdescription"> Click on a uniform name to view more details of the item</p>

                <table width="80%" class="cartlabel" >
                    <thead class="section-padding-80">
                        <tr>
                            <th class="">Name</th>
                            <th class="">Type</th>
                            <th class="">Gender</th>
                            <th>Status</th>
                        </tr>
                    </thead>


                    <tbody>
                    <?php foreach($uniforms as $uniform){ ?>
                    <tr>
                        <th><p><?php echo $this->Html->link($uniform['uniformname'],['controller'=>'admins',
                                    'action' => 'uniformdetails', $uniform->_id], ['class'=>'btn btn-info']);?></p></th>
                        <th style="vertical-align: middle"><p><?php echo $uniform['type'];?></p></th>
                        <th style="vertical-align: middle"><p><?php echo $uniform['gender'];?></p></th>
                        <th style="vertical-align: middle"><p><?php
                            if ($uniform['status'] == 1) {
                                echo 'Active';
                            } else echo 'Inactive';
                            ?> </p></th>
                    </tr>
                    </tbody>
                    <?php } ?>
                </table>

    </div>


</div>
