<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2 col-md-5"></div>
            <div class="col-lg-8 col-md-7">
                <div class="card" style = "padding: 20px">
                    <div class="header">
                        <?php $order = $order_items[0]; ?>
                        <h4 class="title"><b>Order #<?= $order->order_id; ?></b></h4>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-striped" style = "width: 100%">
                            <thead>
                            <th align = "right"><i class="ti-image" style = "color: #31bbe0"></i></th>
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
                    </div>
                    <hr>
                    <div class="row">
                        <div class="text-center">
                            <a href = "javascript:history.go(-1)" class="btn btn-info btn-fill btn-wd" style = "background-color: #dc2f54; border-color: #dc2f54; color: white;">Go back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
