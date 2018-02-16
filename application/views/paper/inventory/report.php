<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <div align = "left">
                            <h3 class="title"><b>Inventory Report</b></h3></br>
                        </div>
                        <a href = "javascript:history.go(-1)" class="btn btn-info btn-fill btn-wd" style = "background-color: #dc2f54; border-color: #dc2f54; color: white;">Go back</a>
                    </div>
                    <?php
                    if (!$inventory) {
                        echo "<center><h3><hr><br>There are no products recorded in the database.</h3><br></center><br><br>";
                    } else {
                    ?>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th><b title = "Product ID">#</b></th>
                                <th><b>Asset</b></th>
                                <th><b>Quantity</b></th>
                                <th><b>Value</b></th>
                                <th><b title = "Exact Value">Ext. Value</b></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $total_price = 0;
                            $total_items = 0;
                            foreach ($inventory as $product): ?>
                                <tr>
                                    <td><u><a href="<?= base_url() ?>inventory/view/<?= $product->product_id ?>"><?= $product->product_id ?></a></u>
                                    </td>
                                    <td><?= $product->product_name ?></td>
                                    <td align="right"><?= $product->product_quantity ?></td>
                                    <td align="right">&#8369; <?= number_format($product->product_price, 2) ?></td>
                                    <td align="right">&#8369; <?= number_format($product->product_price * $product->product_quantity, 2) ?></td>
                                    <?php $total_price += $product->product_price * $product->product_quantity;
                                    $total_items += $product->product_quantity; ?>
                                </tr>
                            <?php endforeach; ?>
                            <tr>
                                <td></td>
                                <td><h3>Total Inventory Value</h3></td>
                                <td><h3 align="right"><?= $total_items ?></h3></td>
                                <td align="right"><b>-</b></td>
                                <td align="right"><h3>&#8369; <?= number_format($total_price, 2) ?></h3></td>
                            </tr>
                            </tbody>
                        </table>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
