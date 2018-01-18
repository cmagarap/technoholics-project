<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5">
                <div class="card" style = "padding: 0px 10px 30px 10px">
                    <div class="header">
                        <h3>Chart</h3>
                        <hr>
                    </div>
                </div>
                <div class="card">
                    <div class="header">
                        <h3>Calendar</h3>
                        <hr>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="card">
                    <div class="header">
                        <h3><b>List of Orders</b></h3>
                        <p class="category"><i>Here are the list of orders for......</i></p>
                    </div>
                    <?php if(!$orders) {
                        echo "<center><h3><hr><br>There are no orders recorded in the database.</h3><br></center><br><br>";
                    } else {
                    ?>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-striped">
                            <thead>
                            <th></th>
                            <th><b>#</b></th>
                            <th><b>Customer</b></th>
                            <th><b>Total Price</b></th>
                            <th><b>Delivery Date</b></th>
                            <th><b>Actions</b></th>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($orders as $orders): ?>
                                <tr>
                                    <td>
                                        <p style = "font-size: 12px"><?php
                                            if($orders->status == 1): echo "<span class='ti-package' title = 'Processing' style = 'font-size: 15px'></span>";
                                            elseif($orders->status == 2): echo "<span class='ti-truck' title = 'Shipping' style = 'font-size: 15px'></span>";
                                            elseif($orders->status == 3): echo "<span class='ti-check' title = 'Delivered' style = 'font-size: 15px'></span>";
                                            endif;
                                            ?></p>
                                    </td>
                                    <td><?= $orders->order_id ?></td>
                                    <?php $customers = $this->item_model->fetch("customer", "customer_id = " . $orders->customer_id);
                                    $customers = $customers[0]; ?>
                                    <td><?= $customers->username ?></td>
                                    <td>&#8369;<?= number_format($orders->total_price, 2) ?></td>
                                    <td><?= date("n-j-Y", $orders->delivery_date) ?>
                                    </td>
                                    <td>
                                        <a class="btn btn-warning" href = "<?= base_url() ?>orders/track/<?= $orders->order_id ?>" title = "Track Order" alt = "Track Order">
                                            <span class="ti-shopping-cart"></span>
                                        </a>
                                        <a class="btn btn-danger delete" href="#" data-id="#" title = "Cancel order" alt = "Cancel order">
                                            <span class="ti-close"></span>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                        <?php echo "<div align = 'center'>" . $links . "</div>";
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

