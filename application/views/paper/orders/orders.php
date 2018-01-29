<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5">
                <div class="card">
                    <div class="header">
                        <h3><span class="ti-stats-up" style = "color: #31bbe0;"></span>&nbsp;<b>Chart</b></h3>
                        <hr>
                    </div>
                </div>
                <!-- DATE PICKER -->
                <div class="card">
                    <div class="header">
                        <h3><span class="ti-calendar" style = "color: #31bbe0;"></span>&nbsp; <b>Calendar</b></h3>
                        <hr>
                        <div class= "calendar">
                            <div id="v-cal">
                                <div class="vcal-header">
                                    <button class="vcal-btn" data-calendar-toggle="previous">
                                        <svg height="24" version="1.1" viewbox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M20,11V13H8L13.5,18.5L12.08,19.92L4.16,12L12.08,4.08L13.5,5.5L8,11H20Z"></path></svg>
                                    </button>
                                    <div class="vcal-header__label" data-calendar-label="month">
                                        March 2017
                                    </div>
                                    <button class="vcal-btn" data-calendar-toggle="next">
                                        <svg height="24" version="1.1" viewbox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z"></path></svg>
                                    </button>
                                </div>
                                <div class="vcal-week"style="color: #fff;">
                                    <span>Mon</span> <span>Tue</span><span>Wed</span> <span>Thu</span> <span>Fri</span> <span>Sat</span> <span>Sun</span>
                                </div>
                                <div class="vcal-body" data-calendar-area="month"></div>
                            </div>

                            <p class="demo-picked">
                                Date picked: <span data-calendar-label="picked"></span>
                            </p>

                            <script src="<?= $this->config->base_url() ?>assets/paper/dist/vanillaCalendar.js" type="text/javascript"></script>
                            <script>
                                window.addEventListener('load', function () {
                                    vanillaCalendar.init();
                                })
                            </script>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="card">
                    <div class="header">
                        <h3><b>List of Orders</b></h3>
                        <p class="category"><i>Here are the list of orders for......</i></p>
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
                            <th><b>#</b></th>
                            <th><b>Customer</b></th>
                            <th><b>Total Price</b></th>
                            <th><b>Delivery Date</b></th>
                            <th><b>Actions</b></th>
                            </thead>
                            <tbody>
                            <?php foreach ($orders as $orders): ?>
                                <tr>
                                    <td>
                                        <p style = "font-size: 12px"><?php
                                            if ($orders->process_status == 1): echo "<span class='ti-package' title = 'Processing' style = 'font-size: 15px; color: #dc2f54'></span>";
                                            elseif ($orders->process_status == 2): echo "<span class='ti-truck' title = 'Shipping' style = 'font-size: 15px; color: #F3BB45'></span>";
                                            elseif ($orders->process_status == 3): echo "<span class='ti-check' title = 'Delivered' style = 'font-size: 15px; color: green'></span>";
                                            endif;
                                            ?></p>
                                    </td>
                                    <td><?= $orders->order_id ?></td>
                                    <?php $customers = $this->item_model->fetch("customer", "customer_id = " . $orders->customer_id);
                                    $customers = $customers[0];
                                    ?>
                                    <td><?= $customers->username ?></td>
                                    <td>&#8369;<?= number_format($orders->total_price, 2) ?></td>
                                    <td><?= date("m-j-Y", $orders->delivery_date) ?>
                                    </td>
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
                    window.location = "<?= $this->config->base_url() ?>orders/cancel/" + id;
                } else {
                    swal("This order is safe!");
                }
            });
    });
</script>