<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 col-md-7">
                <div class="card" style = "padding: 20px">
                    <div class="header">
                        <?php $order = $order_items[0]; ?>
                        <h4 class="title"><b>Order #<?= $order->order_id; ?></b></h4>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-striped" style = "width: 100%">
                            <thead>
                            <th colspan="2"><u style = "color: #31bbe0">Product</u></th>
                            <th><u style = "color: #31bbe0">Price</u></th>
                            <th><u style = "color: #31bbe0">Quantity</u></th>
                            </thead>
                            <tbody>
                            <?php foreach ($order_items as $order_items): ?>
                                <tr>
                                    <td align="center">
                                        <?php
                                        $product_image = (string) $order_items->product_image1;
                                        $image_array = explode(".", $product_image);
                                        ?>
                                        <img src = "<?= $this->config->base_url() ?>uploads_products/<?= $image_array[0] . "_thumb." . $image_array[1]; ?>" style="margin: -5px">
                                    </td>
                                    <td>
                                        <?= $order_items->product_name ?>
                                    </td>
                                    <td align = "right">&#8369;<?= number_format($order_items->product_price, 2) ?></td>
                                    <td align = "right"><?= $order_items->quantity ?></td>
                                </tr>
                            <?php endforeach; ?>
                            <?php
                            $for_order = $this->item_model->fetch("orders", "order_id = " . $this->uri->segment(3));
                            $for_order = $for_order[0];
                            ?>
                            <tr>
                                <td></td>
                                <td><b>TOTAL</b></td>
                                <td align = "right"><b>&#8369;<?= number_format($for_order->total_price, 2) ?></b></td>
                                <td align = "right"><b><?= $for_order->order_quantity ?></b></td>
                            </tr>
                            </tbody>
                        </table>
                    </div> <!-- content -->
                </div> <!-- div-card -->
            </div> <!-- col-lg-8 col-md-7 -->
            <div class="col-lg-4 col-md-5">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Edit Order</h4>
                        <hr>
                    </div>
                    <div class="content">
                        <form action = "<?= $this->config->base_url() ?>orders/track_exec/<?= $order->order_id ?>" method = "POST">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <?php
                                        $shippers = $this->item_model->fetch("shipper", NULL, "shipper_name", "ASC");
                                        ?>
                                        <label for="shipper">Change Shipper</label>
                                        <select name="shipper" id="" class = "form-control border-input file">
                                            <?php foreach ($shippers as $shippers): ?>
                                                <option value="<?= $shippers->shipper_id ?>"
                                                    <?php if ($for_order->shipper_id == $shippers->shipper_id) {
                                                        echo "selected";
                                                    } ?>
                                                ><?= $shippers->shipper_name ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class = "row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="shipper">Change Delivery Date</label>
                                        <input type="text" id="text-calendar" class="calendar form-control border-input file" name="order_date" placeholder="YYYY-MM-DD" value="<?= date('Y-m-d', $delivery->delivery_date) ?>"/>
                                    </div>
                                </div>
                            </div>
                            <div class = "row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="progress">Order Progress</label>
                                        <select name="progress" class = "form-control border-input file">
                                            <option value="1" <?php if($for_order->process_status == 1) echo "selected"; ?>>Processing</option>
                                            <option value="2" <?php if($for_order->process_status == 2) echo "selected"; ?>>Shipping</option>
                                            <option value="3" <?php if($for_order->process_status == 3) echo "selected"; ?>>Delivered</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-info btn-fill btn-wd" style = "background-color: #31bbe0; border-color: #31bbe0; color: white;" name = "enter">Enter</button>
                                    <a href = "<?= base_url() ?>orders" class="btn btn-info btn-fill btn-wd" style = "background-color: #dc2f54; border-color: #dc2f54; color: white;">Go back</a>
                                </div>
                            </div>
                            <br>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(function() {
    $('input.calendar').pignoseCalendar({
        format: 'YYYY-MM-DD' // date format string. (2017-02-02)
    });
});
</script>