<div id="content">
    <div class="container">

<div class="col-md-12">
    <ul class="breadcrumb">
        <li><a href="<?= base_url() . 'home'; ?>">Home</a>
        </li>
        <li>My Orders</li>
    </ul>
        <div class="box">
            <h1>My Orders</h1>
        </div>
            <div class="box">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Order Number</th>
                            <th>Total Quantity</th>
                            <th>Total Price </th>
                            <th>Delivery Date</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($orders as $orders): ?>
                        <tr>
                            <td><?=$orders->order_id?></td>
                            <td><?=$orders->order_quantity?></td>
                            <td><?=$orders->total_price?></td>
                            <td><?=date("m-d-Y",$orders->delivery_date)?></td>
                            <td><a href="<?= base_url() . 'home/orderstatus/' . $orders->order_id ?>">VIEW</a> | 
                                <a href="<?= base_url() . 'home/orderstatus/' . $orders->order_id ?>">CANCEL</a></td>
                        </tr>
                        <?php endforeach ?>
                        </tbody>
                        <tfoot>
                        <tr>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

