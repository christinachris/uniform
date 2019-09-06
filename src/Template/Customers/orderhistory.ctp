<div class="section-heading text-center"></div>
<div class="row">
    <div class="customers form large-9 medium-8 columns content col-md-6 offset-md-3">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-8 col-md-6 col-sm-4">
                        <h3>Order History</h3>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <table style="width: 80%;" class="cartlabel">
                    <thead style="section-padding-80">
                        <tr>
                            <th align="right">Order Number</th>
                            <th align="right">Date</th>
                            <th align="right">Order Total</th>
                        </tr>
                    </thead>
                    <?php $sum=0; ?>
                    <?php foreach($orders as $order){ ?>
                     <tbody>
                        <tr>
                            <th align="right"> <p> <?php echo $this->Html->link($order['id'],['controller'=>'customers', 'action' => 'orderdetails', $order->id]);?> </p></th>
                            <th align="right"><p> <?php echo $order['orderdate'] ?></p>  </th>
                            <th align="right"><p> $<?php echo $this->Number->precision($order['totalprice'],2) ?> </p></th>
                        </tr>
                     </tbody>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>