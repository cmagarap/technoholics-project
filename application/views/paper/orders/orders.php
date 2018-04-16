<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5">
                <div class="card">
                    <div class="header">
                        <h3><span class="ti-pie-chart" style = "color: #31bbe0;"></span>&nbsp;<b> Orders Chart</b></h3>
                        <p class="category">Customer Orders for this day.</p>
                        <hr>
                    </div>
                    <div class="content">
                        <?php
                        $this->db->select('process_status');
                        $data = $this->item_model->fetch('orders', "status = 1 AND FROM_UNIXTIME(transaction_date, '%m-%d-%Y') = '". date("m-d-Y") ."'");
                        if($data) {
                            ?>
                            <div id="doughnut-chart-container" style = "margin-top: -25px; margin-bottom: 10px;">
                                <canvas id="order_doughnut" style = "height: 300px"></canvas>
                            </div>
                            <script type="text/javascript" src="<?= base_url() ?>assets/paper/js/orders_doughnut.js"></script>
                            <?php } else { ?>
                            <div align="center"><h4>There are no customer orders for today. </h4></div>
                            <br><br>
                            <?php } ?>
                            <div class="footer">
                                <hr>
                                <div class="stats">
                                    <i class="ti-reload"></i> Updated <?= date("F j, Y h:i A"); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- DATE PICKER -->
                    <div class="card">
                        <div class="header">
                            <h3><span class="ti-calendar" style = "color: #31bbe0;"></span>&nbsp; <b>Calendar</b></h3>
                            <p class="category">Select a date to filter order records.</p>
                            <hr>
                            <div class="calendar"></div>
                            <form action="<?= base_url() . 'orders/page'; ?>" method="POST">
                            </br>
                            <div align="center">
                                <button type="submit" id="submit" class="btn btn-info btn-fill" style="background-color: #31bbe0; border-color: #31bbe0; color: white;">Submit</button>
                                <input type="hidden" id="date" name="date">
                            </div>
                        </form>
                    </br>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="card">
                <div class="header">
                    <h3><span class="ti-notepad" style = "color: #31bbe0"></span>&nbsp; <b>List of Orders</b></h3>
                    <p class="category"><?= $date ?></p>
                </div>
                <?php
                if (!$orders) {
                    echo "<center><h3><hr><br>There are no orders recorded for the date you have selected.</h3><br></center><br><br>";
                } else {
                    ?>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-striped">
                            <thead>
                                <th><b>Status</b></th>
                                <th><b>ID</b></th>
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
                                            if ($orders->process_status == 1): echo "<span class='ti-package' title='Processing' style='font-size: 15px; color: #dc2f54'></span> <b style='color: #dc2f54'>Processing</b>";
                                                elseif ($orders->process_status == 2): echo "<span class='ti-truck' title='Shipping' style='font-size: 15px; color: #F3BB45'></span> <b style='color: #F3BB45'> Shipping </b>";
                                                    elseif ($orders->process_status == 3): echo "<span class='ti-check' title='Delivered' style='font-size: 15px; color: green'></span><b style='color: green'> Delivered</b>";
                                                        elseif ($orders->process_status == 4): echo "<span class='ti-plus' title='Pending' style='font-size: 15px; color: #31bbe0'></span> <b style='color: #31bbe0'>Pending</b>";
                                                        endif;
                                                        ?></p>
                                                    </td>
                                                    <td><?= $orders->order_id ?></td>
                                                    <?php
                                                    $this->db->select(array("username", "email"));
                                                    $customers = $this->item_model->fetch("customer", "customer_id = " . $orders->customer_id);
                                                    $customers = $customers[0];
                                                    ?>

                                                    <td><?php if ($customers->username == NULL) { echo $customers->email; }
                                                    else { echo $customers->username; } ?></td>
                                                    <td>&#8369;<?= number_format($orders->total_price, 2) ?></td>
                                                    <td><?= date("M-d-Y", $orders->delivery_date) ?>
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
                                </div>
                                <?php echo "<div align = 'center'>" . $links . "</div>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $("#submit").hide();

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

            $(function() {
                $('#wrapper .version strong').text('v' + $.fn.pignoseCalendar.version);

                function onClickHandler(date, obj) {
            /**
             * @date is an array which be included dates(clicked date at first index)
             * @obj is an object which stored calendar interal data.
             * @obj.calendar is an element reference.
             * @obj.storage.activeDates is all toggled data, If you use toggle type calendar.
             * @obj.storage.events is all events associated to this date
             */

             var $calendar = obj.calendar;
             $("#submit").show();
             var text = '';

             if(date[0] !== null) {
                text += date[0].format('YYYY-MM-DD');
            }

            if(date[0] !== null && date[1] !== null) {
                text += ' ~ ';
            } else if(date[0] === null && date[1] == null) {
                text += 'nothing';
                $("#submit").hide();
            }

            if(date[1] !== null) {
                text += date[1].format('YYYY-MM-DD');
            }

            $('#date').val(text);
        }

        // Default Calendar
        $('.calendar').pignoseCalendar({
            select: onClickHandler
        });

        // This use for DEMO page tab component.
        $('.menu .item').tab();
    });
</script>
