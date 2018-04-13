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
                        <div class="col-sm-3">
                            <h3 class="title"><span class="ti-user" style="color: #dc2f54;2"></span>&nbsp; <b>Weekly Active Customers</b></h3>
                            <p class="category">
                                <i class="ti-reload" style = "font-size: 12px;"></i> As of <?= date("F j, Y h:i A"); ?>
                            </p>
                        </div>
                        <div class="col-sm-1"></div>
                        <form role="form" method="post">
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label>Filter by:</label>
                                    <select name="filter_active" id="filter_inventory" class="form-control border-input file" onchange="populate(this.id, 'select_f')">
                                        <option value="all">All</option>
                                        <option value="product_brand">Latest Login</option>
                                        <option value="added_at">Latest Action</option>
                                        <option value="product_price">Total Actions Range</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label>Select:</label>
                                    <select name="select_f" id="select_f" class="form-control border-input file">
                                        <option value="">—</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label>Sort by:</label>
                                    <select name="sort_inventory" class="form-control border-input file">
                                        <option value="product_name" >Username</option>
                                        <option value="product_brand" >Latest Login</option>
                                        <option value="added_at" >Latest Action</option>
                                        <option value="product_quantity" >Total Actions</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label style="color: white;">`</label>
                                    <br>
                                    <button type="submit" class="btn btn-info btn-fill" style="background-color: #31bbe0; border-color: #31bbe0; color: white; width: 55px" name="filter" title="Filter"><i class="ti-filter"></i></button>
                                    <a href = "javascript:history.go(-1)" class="btn btn-info btn-fill" style = "background-color: #dc2f54; border-color: #dc2f54; color: white;">Go back</a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <br><br><br><br>
                    <hr style="margin-bottom: -10px">
                    <div class="content table-responsive table-full-width">
                        <table class="table table-striped">
                            <thead>
                            <td colspan="2"><b><p>Customer</p></b></td>
                            <td><b><p>Latest Login</p></b></td>
                            <td><b><p>Latest Action</p></b></td>
                            <td align="right"><b><p>Total Actions</p></b></td>
                            <td align="right"><b><p>Status</p></b></td>
                            </thead>
                            <tbody>
                            <?php
                            $total_action = 0;
                            foreach ($customer as $customer):
                                $date = $this->item_model->max('user_log', 'customer_id = ' . $customer->customer_id, 'date');
                                $active_identifier = time() - $date->date;

                                $count_action = $this->item_model->getCount("user_log", "customer_id = " . $customer->customer_id) + $this->item_model->getCount("audit_trail", "customer_id = " . $customer->customer_id);

                                $this->db->select(array('at_detail', 'at_date'));
                                $trail =  $this->item_model->fetch("audit_trail", "status = 1 AND customer_id = " . $customer->customer_id, "at_date", "DESC", 1)[0];

                                $this->db->select(array('action', 'date'));
                                $log = $this->item_model->fetch("user_log", "status = 1 AND customer_id = " . $customer->customer_id, "date", "DESC", 1)[0];

                                if ($log AND $trail)
                                    $action = ($trail->at_date > $log->date) ? $log->action : $trail->at_detail;
                                elseif ($log AND !$trail)
                                    $action = $log->action;
                                elseif (!$log AND $trail) # least likely to happen, but still included
                                    $action = $trail->at_detail;
                                elseif (!$log AND !$trail)
                                    $action = "None";

                                $user_image = (string)$customer->image;
                                $image_array = explode(".", $user_image);
                                ?>
                                <tr>
                                    <?php if ($active_identifier < $week) : ?>
                                        <td><p><img src="<?= $this->config->base_url() ?>uploads_users/<?= $image_array[0] . "_thumb." . $image_array[1]; ?>" class="img-responsive img-circle" alt="<?= $customer->username ?>" title="<?= $customer->firstname . " " . $customer->lastname ?>"></p></td>
                                        <td><a href="<?= base_url() ?>accounts/view/<?= $customer->customer_id ?>" style="text-decoration: underline"><?php if($customer->username != NULL) echo $customer->username; else echo $customer->email; ?></a></td>
                                        <td><?= date("M-d-Y h:i A", $date->date) ?></td>
                                        <td><?= $action ?></td>
                                        <td align="right"><?= $count_action ?></td>
                                        <?php $total_action += $count_action; ?>
                                        <td align="right"><span class="text-success">ACTIVE</span></td>
                                    <?php else: continue;
                                    endif; ?>
                                </tr>
                            <?php endforeach; ?>
                            <tr>
                                <td></td>
                                <td><h3>Total Weekly Active Customers</h3></td>
                                <td><b>-</b></td>
                                <td><b>-</b></td>
                                <td align="right"><h3><?= $total_action ?></h3></td>
                                <td align="right"><h3><?= $acc ?></h3></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>