<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="card">
                    <div class="header">
                        <h3 class="title"><b>Customer Product Preferences</b></h3>
                        <p class="category">
                            <i class="ti-reload" style = "font-size: 12px;"></i> As of <?= date("F j, Y h:i A"); ?>
                        </p>
                        <br>
                        <a href = "javascript:history.go(-1)" class="btn btn-info btn-fill btn-wd" style = "background-color: #dc2f54; border-color: #dc2f54; color: white;">Go back</a>
                    </div>
                    <?php
                    if (!$customer) {
                        echo "<center><h3><hr><br>There are no product preferences recorded.</h3><br></center><br><br>";
                    } else {
                    ?>

                    <div class="content table-responsive table-full-width">
                        <table class="table table-striped">
                            <thead>
                            <th colspan="2"><b>Customer</b></th>
                            <th><b>Product/s</b></th>
                            </thead>
                            <tbody>
                            <?php foreach ($customer as $cust):
                                if($cust->product_preference == NULL) continue;
                                else { ?>
                                    <tr>
                                        <?php $user_image = (string)$cust->image;
                                        $image_array = explode(".", $user_image); ?>
                                        <td><p><img src="<?= $this->config->base_url() ?>uploads_users/<?= $image_array[0] . "_thumb." . $image_array[1]; ?>" class="img-responsive img-circle" alt="<?= $cust->username ?>" title="<?= $cust->firstname . " " . $cust->lastname ?>"></p></td>
                                        <td><?= $cust->firstname . " " . $cust->lastname ?></td>
                                        <td><?= $cust->product_preference ?></td>
                                    </tr>
                                <?php }
                            endforeach; ?>
                            <tr>

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