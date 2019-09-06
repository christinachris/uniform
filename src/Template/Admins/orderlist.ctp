<div>
    <?= $this->Flash->render() ?>
</div>
<div class="card">
<div class="card-header">
    <div class="row">
        <div class="col-lg-8 col-md-6 col-sm-4">
            <h3>Orders</h3>
        </div>
        <div class="lg-col-4 btn pull-right">
            <?php echo $this->Html->link('Admin Dashboard',
                    ['controller'=>'Admins', 'action'=>'admindashboard'],
                    ['escape' => false, 'class' => 'btn btn-link']); ?>
        </div>
    </div>
    <div>
        <nav aria-label="Page navigation">
            <ul class="pagination">
                <?php
                $this->Paginator->templates([
                    'prevActive' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
                    'prevDisabled' => '<li class="page-item disabled"><a class="page-link" href="{{url}}">{{text}}</a></li>',
                    'number' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
                    'current' => '<li class="page-item active"><a class="page-link" href="{{url}}">{{text}}</a></li>',
                    'nextActive' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
                    'nextDisabled' => '<li class="page-item disabled"><a class="page-link" href="{{url}}">{{text}}</a></li>',
                    'ellipsis' => '<li class="ellipsis"><span class="page-link" href="{{url}}">...</span></li>',
                    'first' =>'<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
                    'last' =>'<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',

                ]); ?>
                <?= $this->Paginator->first('First') ?>
                <?= $this->Paginator->prev() ?>
                <?= $this->Paginator->numbers(array(
                    'modulus' => 2,
                    'first'=> 1,
                    'last'=> 1,
                    'skip' => '',
                    'separator' => " \n",
                    'before' => null,
                    'after' => null,
                    'escape' => false
                )) ?>
                <?= $this->Paginator->next() ?>
                <?= $this->Paginator->last('Last') ?>
            </ul>
            <br>
            <p id="resetpwdescription"><?= $this->Paginator->counter(
                    ['format' => __('Page {{page}} of {{pages}}, 
                    showing {{current}} record(s) out of {{count}} total orders')]) ?></p>
        </nav>
    </div>
</div>

<div class="card-body">
    <table width="100%" class="cartlabel" >
        <thead class="section-padding-80">
        <tr>
            <th>ID</th>
            <th>Organisation</th>
            <th>Customer Name</th>
            <th>Date</th>
            <th>Order Total</th>
            <th>Paid Status</th>
        </tr>
        </thead>
        <br>


        <tbody>
        <?php foreach($orders as $order){ ?>
        <tr>
            <th><p><?php echo $this->Html->link($order['id'],['controller'=>'admins',
                    'action' => 'orderdetails', $order->id], ['class'=>'btn btn-info']);?></p></th>

            <th style="vertical-align: middle"><p><?php echo $order['customer']['organisation']->organisationname; ?></p></th>
            <th style="vertical-align: middle"><p><?php echo$order['customer']->firstname.' '. $order['customer']->lastname; ?></p></th>
            <th style="vertical-align: middle"><p><?php echo $order['orderdate'];?></p></th>
            <th style="vertical-align: middle"><p>$<?php echo $this->Number->precision($order['totalprice'],2);?></p></th>
            <th style="vertical-align: middle"><p><?php echo $order['paidstatus'];?></p></th>
        </tr>
        </tbody>
        <?php } ?>
    </table>

</div>





</div>
