
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Products List</h4>
                        <p class="category">Here is a subtitle for this table</p>
                    </div>
                    <?php if(!$products) {
                        echo "<center><h3>THERE ARE NO PRODUCTS RECORDED IN THE DATABASE.</h3><br></center>";
                    } else {
                        echo "<div align = 'right'>" . $links . "</div>";
                        ?>
                        <div class="content table-responsive table-full-width">
                            <table class="table table-striped">
                                <thead>
                                <th>#</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Actions</th>
                                </thead>
                                <tbody>
                                <?php
                                $counter = 1;
                                foreach ($products as $products):?>
                                <tr>
                                    <td><?= $counter++ ?></td>
                                    <td><?= $products->product_name ?></td>
                                    <td><?= $products->product_category ?></td>
                                    <td>&#8369; <?= number_format($products->product_price, 2) ?></td>
                                    <td><?= $products->product_quantity ?></td>
                                </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>

                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>