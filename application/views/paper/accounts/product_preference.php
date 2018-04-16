<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h3 class="title"><span class="ti-shopping-cart-full" style="color: #dc2f54;2"></span> &nbsp;<b>Customer Transaction Behavioral Analysis Report</b></h3>
                        <p class="category">
                            <i class="ti-reload" style = "font-size: 12px;"></i> As of <?= date("F j, Y h:i A"); ?>
                        </p><br>
                        <form target="_blank" method="post">
                            <a href="<?= base_url() ?>accounts" class="btn btn-info btn-fill" style = "background-color: #dc2f54; border-color: #dc2f54; color: white;" title="Go Back"><i class="ti-arrow-left"></i></a>
                            <input type="submit" name="generate_pdf" class="btn btn-info btn-fill" style="background-color: #F3BB45; border-color: #F3BB45; color: white;" value="Generate PDF" />
                        </form>
                    </div>
                    <?php
                    if (!$customer) {
                        echo "<center><h3><hr><br>There are no product preferences recorded.</h3><br></center><br><br>";
                    } else {
                    ?>
                    <hr style="margin-bottom: -10px">
                    <div class="content table-responsive table-full-width">
                        <table class="table table-striped">
                            <thead>
                            <td colspan="2"><p><b>Customer</b></p></td>
                            <td><p><b>Recent Action</b></p></td>
                            <td><p><b>Most Performed Action</b></p></td>
                            <td><p><b>Preferred Product/s</b></p></td>
                            <td><p><b>Preference Basis</b></p></td>
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
                                        <?php
                                        $this->db->select('at_detail');
                                        $recent_action = $this->item_model->fetch('audit_trail', 'status = 1 AND customer_id = ' . $cust->customer_id, 'at_date', 'DESC', 1);
                                        $most_performed = $this->db->query("SELECT COUNT(at_detail) as count_detail, at_detail FROM audit_trail WHERE customer_id = '" . $cust->customer_id . "' AND status = 1 GROUP BY at_detail ORDER BY count_detail DESC LIMIT 1");
                                        ?>
                                        <td><?php if($recent_action) echo $recent_action[0]->at_detail;
                                        else echo "<i style='color: #CCCCCC'>NULL</i>"; ?></td>
                                        <td><?php if($most_performed->result()) {
                                                foreach ($most_performed->result() as $result) {
                                                    echo $result->at_detail;
                                                }
                                            }
                                        else echo "<i style='color: #CCCCCC'>NULL</i>"; ?></td>

                                        <td><?= $cust->product_preference ?></td>
                                        <td><?= $cust->preference_basis ?></td>
                                    </tr>
                                <?php }
                            endforeach; ?>
                            </tbody>
                        </table>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>