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
                            <form action="<?=base_url()?>management/updateproduct/<?= $this->uri->segment(3)?>" method="POST">
                                <div class="form-group">
                                    <label>product ID</label>
                                    <input type="text" name="product_id" readonly="" value="<?= $products->product_id ?>" class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <label>product NAME</label>
                                    <input type="text" name="product_name" value="<?= $products->product_name ?>" class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <label>product DESCRIPTION</label>
                                    <input type="text" name="product_desc" value="<?= $products->product_desc ?>" class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <label>product PRICE</label>
                                    <input type="number" step="any" name="product_price" value="<?= $products->product_price ?>" class="form-control"/>
                                </div>

                                <input type="submit" class="btn btn-success"/>
                                <input type="reset" class="btn btn-warning pull-right"/>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>


