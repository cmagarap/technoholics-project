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
                            <th>Image</th>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            </thead>
                            <tbody>
                            <?php foreach ($order_items as $order_items): ?>
                                <tr>
                                    <td>
                                        <?php
                                        $product_image = (string) $order_items->product_image1;
                                        $image_array = explode(".", $product_image);
                                        ?>
                                        <img src = "<?= $this->config->base_url() ?>uploads_products/<?= $image_array[0] . "_thumb." . $image_array[1]; ?>" style="border-radius: 100%; margin: -5px">
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
                        <form action = "<?= $this->config->base_url() ?>orders/track_exec" method = "POST" enctype="multipart/form-data">
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
                                        <!-- SHOULD BE CALENDAR -->
                                        <label for="shipper">Change Delivery Date</label>
                                        <select name="shipper" id="" class = "form-control border-input file">
                                            <option value="Chargers">Chargers</option>
                                            <option value="Accessories">Accessories</option>
                                            <option value="Featured">Feature</option>
                                            <option value="Laptop">Laptop</option>
                                            <option value="Cellphone">Cellphone</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class = "row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="progress">Order Progress</label>
                                        <select name="progress" class = "form-control border-input file">
                                            <option value="1">Processing</option>
                                            <option value="2">Shipping</option>
                                            <option value="3">Delivered</option>
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
