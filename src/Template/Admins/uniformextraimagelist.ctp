<div>
    <?= $this->Flash->render() ?>
</div>
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-lg-8 col-md-6 col-sm-4">
                <h3>Extra Photo Edit</h3>
                <?php echo $this->Html->link('<span class="m-menu__link-text">' . h('+ Add New Pictures') . '</span>',
                        ['controller'=>'Admins', 'action'=>'uniformextraimageadd',$uid],
                        ['escape' => false, 'class' => 'btn btn-success']); ?>
            </div>
            </div>
            <div class="col-lg-4">
                <?php echo $this->Html->link('<span class="m-menu__link-text">' . h('< Back') . '</span>',
                        ['controller'=>'Admins', 'action'=>'uniformimageedit',$uid],
                        ['escape' => false, 'class' => 'btn btn-outline-secondary']); ?>

            </div>
        </div>
    </div>

    <div class="card-body">

        <table width="80%" class="cartlabel" >
            <thead class="section-padding-80">
            <tr>
                <th class="">File Name</th>
                <th class=""></th>
                <th class=""></th>
            </tr>
            </thead>


            <tbody>
            <?php foreach($pictures as $picture){ ?>
            <tr>
                <th style="vertical-align: middle"><p><?php echo $picture['extraphotopath'];?></p></th>
                <th style="vertical-align: middle">
                    <div class="product-image" style="float: none;">
                        <?php echo $this->Html->image("/files/Pictures/extraphotopath/{$picture->extraphotopath}");?>
                    </div>
                </th>
                <th>
                    <?php echo $this->Html->link('<span class="m-menu__link-text">' . h('Delete') . '</span>',
                            ['controller'=>'admins', 'action'=>'uniformextraimagedelete',$picture->_id],
                            ['escape' => false, 'class' => 'btn btn-outline-danger btn-block']); ?>
                </th>

            </tr>
            </tbody>
            <?php } ?>
        </table>

    </div>


</div>