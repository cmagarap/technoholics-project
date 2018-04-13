<?php
$this->db->select(array('firstname', 'lastname')); # fetch only what is needed
$customer = $this->item_model->fetch("customer", array("customer_id" => $this->uri->segment(3)))[0];
?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="card">
                    <div class="header">
                        <div align = "left">
                            <h2 class="title"><b>Transaction History</b></h2>
                            <p class="category">
                                Here are the transactions of <span style = 'background-color: #dc2f54; color: white; padding: 3px;'><?= $customer->firstname ?> <?= $customer->lastname ?></span> as of <?= date("F j, Y"); ?>.<br>
                            </p>
                            <br>
                            <a href = "javascript:history.go(-1)" class="btn btn-info btn-fill btn-wd" style = "background-color: #dc2f54; border-color: #dc2f54; color: white;">Go back</a>
                        </div>
                    </div>
                    <?php
                    if (!$orders) {
                        echo "<center><h3><hr><br>There are no orders recorded in the database.</h3><br></center><br><br>";
                    } else {
                    ?>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-striped">
                            <thead>
                            <th></th>
                            <th><b>Order #</b></th>
                            <th><b>Transaction Date</b></th>
                            <th><b>Delivery Date</b></th>
                            <th><b>Total Quantity</b></th>
                            <th><b>Total Price</b></th>
                            <th><b>Actions</b></th>
                            </thead>
                            <tbody>
                            <?php foreach ($orders as $orders): ?>
                                <tr>
                                    <td>
                                        <p style = "font-size: 12px"><?php
                                            if ($orders->process_status == 1): echo "<span class='ti-package' title='Processing' style='font-size: 15px; color: #dc2f54'></span>";
                                            elseif ($orders->process_status == 2): echo "<span class='ti-truck' title='Shipping' style='font-size: 15px; color: #F3BB45'></span>";
                                            elseif ($orders->process_status == 3): echo "<span class='ti-check' title='Delivered' style='font-size: 15px; color: green'></span>";
                                            elseif ($orders->process_status == 4): echo "<span class='ti-plus' title='Pending' style='font-size: 15px; color: #31bbe0'></span>";
                                            endif;
                                            ?></p>
                                    </td>
                                    <td><?= $orders->order_id ?></td>
                                    <td><?= date("F j, Y", $orders->transaction_date) ?></td>
                                    <td><?= date("F j, Y", $orders->delivery_date) ?></td>
                                    <td><?= $orders->order_quantity ?></td>
                                    <td>&#8369;<?= number_format($orders->total_price, 2) ?></td>
                                    <td><?php if ($orders->process_status == 3) { ?>
                                            <a class="btn btn-info" href = "<?= base_url() ?>orders/view/<?= $orders->order_id ?>" title = "View Order" alt = "View Order">
                                                <span class="ti-eye"></span>
                                            </a>
                                        <?php } else { ?>
                                            <a class="btn btn-warning" href = "<?= base_url() ?>orders/track/<?= $orders->order_id ?>" title = "Track Order" alt = "Track Order">
                                                <span class="ti-shopping-cart"></span>
                                            </a>
                                        <?php } ?>
                                        <a class="btn btn-danger cancel <?php if ($orders->process_status == 3) echo 'disabled'; ?>" href="#" data-id="<?= $orders->order_id ?>" title = "Cancel order" alt = "Cancel order">
                                            <span class="ti-close"></span>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                        <?php echo "<div align = 'center'>" . $links . "</div>";
                        }
                        ?>
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
                    text: "You won't be able to undo this action once cancelled.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location = "<?= $this->config->base_url() ?>accounts/cancel/" + id;
                    } else {
                        swal({
                            title: "Your order is safe!",
                            text: "Your order has not been cancelled, don't worry!",
                            icon: "success",
                            buttons: false,
                        })
                    }
                });
            });
        </script>