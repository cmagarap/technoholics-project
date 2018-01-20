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
                                            if($orders->process_status == 1): echo "<span class='ti-package' title = 'Processing' style = 'font-size: 15px; color: #dc2f54'></span>";
                                            elseif($orders->process_status == 2): echo "<span class='ti-truck' title = 'Shipping' style = 'font-size: 15px; color: #F3BB45'></span>";
                                            elseif($orders->process_status == 3): echo "<span class='ti-check' title = 'Delivered' style = 'font-size: 15px; color: green'></span>";
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
                                        <a class="btn btn-warning <?php if($orders->process_status == 3) echo 'disabled'; ?>" href = "<?= base_url() ?>orders/track/<?= $orders->order_id ?>" title = "Track Order" alt = "Track Order">
                                            <span class="ti-shopping-cart"></span>
                                        </a>
                                        <a class="btn btn-danger cancel <?php if($orders->process_status == 3) echo 'disabled'; ?>" href="#" data-id="<?= $orders->order_id ?>" title = "Cancel order" alt = "Cancel order">
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
<script>
    $(".cancel").click(function () {
        var id = $(this).data('id');

        swal({
            title: "Are you sure you want to cancel this order?",
            text: "You will not be able to undo this action once cancelled.",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    window.location = "<?= $this->config->base_url() ?>orders/cancel/" + id;
                } else {
                    swal("This order is safe!");
                }
            });
    });
</script>