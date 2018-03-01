<?php
# for Active Customers
$acc = 0;
$week = 604800;
foreach ($customer as $customer1){
    $date1 = $this->item_model->max('user_log', 'customer_id = ' . $customer1->customer_id, 'date');
    $active_identifier1 = time() - $date1->date;
    if ($active_identifier1 < $week)
        $acc++;
}
?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h3 class="title"><b>Weekly Active Customers</b></h3>
                        <p class="category">
                            <i class="ti-reload" style = "font-size: 12px;"></i> As of <?= date("F j, Y h:i A"); ?>
                        </p>
                        <br>
                        <a href = "javascript:history.go(-1)" class="btn btn-info btn-fill btn-wd" style = "background-color: #dc2f54; border-color: #dc2f54; color: white;">Go back</a>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-striped">
                            <thead>
                            <th colspan="2"><b>Customer</b></th>
                            <th><b>Latest Login</b></th>
                            <th><b>Latest Action</b></th>
                            <th><b>Total Actions</b></th>
                            <th><b>Status</b></th>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($customer as $customer):
                                $date = $this->item_model->max('user_log', 'customer_id = ' . $customer->customer_id, 'date');
                                $active_identifier = time() - $date->date;

                                $count_action = $this->item_model->getCount("user_log", "customer_id = " . $customer->customer_id);

                                $this->db->select("action");
                                $action = $this->item_model->fetch("user_log", "status = 1 AND customer_id = " . $customer->customer_id, "date", "DESC", 1)[0];

                                $userinformation = $this->item_model->fetch('customer', array('customer_id' => $customer->customer_id))[0];
                                $user_image = (string)$userinformation->image;
                                $image_array = explode(".", $user_image);
                                ?>
                                <tr>
                                    <?php if ($active_identifier < $week) : ?>
                                        <td><p><img src="<?= $this->config->base_url() ?>uploads_users/<?= $image_array[0] . "_thumb." . $image_array[1]; ?>" class="img-responsive img-circle" alt="<?= $customer->username ?>" title="<?= $customer->firstname . " " . $customer->lastname ?>"></p></td>
                                        <td><a href="<?= base_url() ?>accounts/view/customer/<?= $customer->customer_id ?>" style="text-decoration: underline"><?= $customer->username ?></a></td>
                                        <td><?= date("m-j-Y h:i A", $date->date) ?></td>
                                        <td><?= $action->action ?></td>
                                        <td><?= $count_action ?></td>
                                        <td><span class="text-success">ACTIVE</span></td>
                                    <?php else: continue;
                                    endif; ?>
                                </tr>
                            <?php endforeach; ?>
                            <tr>
                                <td></td>
                                <td><h3>Total Weekly Active Customers</h3></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><h3><?= $acc ?></h3></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>