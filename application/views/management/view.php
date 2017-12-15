<?php
$products = $products[0];
?>
<html>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <?= $title ?>
                        </div>
                        <div class="panel-body">
                            <form action="<?= base_url() ?>management/product/updateproduct/<?= $this->uri->segment(4) ?>" method="POST">
                                <div class="form-group">
                                    <label>product ID</label>
                                    <input type="text" name="product_id" readonly="" value="<?= $products->product_id ?>" class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <label>product NAME</label>
                                    <input type="text" name="product_name"  readonly=""  value="<?= $products->product_name ?>" class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <label>product DESCRIPTION</label>
                                    <input type="text" name="product_desc"  readonly=""  value="<?= $products->product_desc ?>" class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <label>product PRICE</label>
                                    <input type="number" step="any" name="product_price" readonly=""  value="<?= $products->product_price ?>" class="form-control"/>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
