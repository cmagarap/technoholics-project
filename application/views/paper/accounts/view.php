<?php $account = $account[0]; ?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-5 col-sm-5">
                <div class="card card-user">
                    <div class="image">
                        <img src="<?= base_url() ?>assets/ordering/img/<?= $cover->image_2 ?>" alt="..."/>
                    </div>
                    <div class="content">
                        <div class="author">
                            <img class="avatar border-white" src="<?= $this->config->base_url() ?>uploads_users/<?= $account->image ?>" alt="admin-user" title="Admin User">
                            <h2 class="title"><?= $account->firstname . " " . $account->lastname ?> <br />
                            </h2>
                            <p style="font-size: 11px; color: darkgrey"><?php if($account->username == NULL) echo $account->email;
                                else echo $account->username; ?>
                            <br>
                            <?= "Member since ".date("F j, Y", $account->registered_at) ?></p>
                        </div>
                        <hr>
                        <div class="col-md-4"><p style="font-size: 14px"><b>Email Address:</b></p></div>
                        <div class="col-md-8"><p style="font-size: 14px"><?= $account->email ?></p></div>
                        <div class="col-md-4"><p style="font-size: 14px"><b>Address:</b></p></div>
                        <div class="col-md-8"><p style="font-size: 14px"><?= "$account->complete_address, $account->barangay, $account->city_municipality, $account->province" ?></p></div>
                        <div class="col-md-4"><p style="font-size: 14px"><b>Age:</b></p></div>
                        <div class="col-md-8"><p style="font-size: 14px"><?= $account->age ?></p></div>
                        <div class="col-md-4"><p style="font-size: 14px"><b>Birthdate:</b></p></div>
                        <div class="col-md-8"><p style="font-size: 14px"><?= date('F j, Y', $account->birthdate) ?></p></div>
                        <div class="col-md-4"><p style="font-size: 14px"><b>Contact No.:</b></p></div>
                        <div class="col-md-8"><p style="font-size: 14px"><?= $account->contact_no ?></p></div>

                    </div>
                    <br><br><br>
                    <hr>
                    <div class="text-center">
                        <div class="row">
                            <div class="col-xs-3 col-xs-offset-1">
                                <h5><?= $rated ?><br /><small>Rated products</small></h5>
                            </div>
                            <div class="col-xs-4">
                                <h5>&#8369; <?= number_format($spent->total_price, 2) ?><br /><small>Spent</small></h5>
                            </div>
                            <div class="col-xs-3">
                                <h5><?php if($bought->order_quantity == '') echo '0';
                                elseif($bought->order_quantity != '') echo $bought->order_quantity; ?><br /><small>Items bought</small></h5>
                            </div>
                        </div>
                        <hr>
                        <br>
                        <div class="row">
                            <a href = "javascript:history.go(-1)" class="btn btn-info btn-fill btn-wd" style = "background-color: #dc2f54; border-color: #dc2f54; color: white;">Go back</a>
                        </div>
                        <br>
                    </div>
                </div>
                <?php if ($this->uri->segment(3) == "customer"): ?>
                <div class="card">
                    <div class="header">
                        <h4 class="title"><b>Previous Transactions</b></h4>
                        <?php if($at_date) {
                            $overflow = 'style = "overflow-y: scroll; height: 200px;"';
                            ?>
                            <p class="category">
                                <i class="ti-reload" style = "font-size: 12px;"></i> As of <?= date("F j, Y h:i A", $at_date->at_date); ?>
                            </p><hr style = 'margin: 5px'>
                        <?php } else { $overflow = ''; }?>
                    </div>
                    <div class="content" <?= $overflow; ?>>
                        <ul class="list-unstyled team-members">
                            <?php
                            if ($logs) {
                                foreach ($logs as $logs) { ?>
                                    <li>
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <?= "#" . $logs->at_id ?>
                                            </div>
                                            <div class="col-xs-6">
                                                <?= $logs->at_detail ?>
                                                <br/>
                                                <span class="text-muted"><small style = "color: #CCCCCC"><?= date("F j, Y", $logs->at_date) ?></small></span>
                                            </div>
                                            <div class="col-xs-3 text-right">
                                                <font color="#31bbe0"><?= date("h:i A", $logs->at_date) ?></font>
                                            </div>
                                        </div>
                                    </li>
                                <?php }
                            } else { ?>
                                <div align="center">
                                    <br><i>There are no transactions recorded for this user.</i><br><br>
                                </div>
                            <?php } ?>
                        </ul>
                    </div> <!-- content -->
                </div> <!-- card -->
            </div>
            <div class="col-lg-7 col-sm-5">
                <div class="card card-user">
                    <div class="header">
                        <h2 class="title" style = "margin-bottom: 10px"><i class="ti-user"></i><b> &nbsp;Customer Analysis</b></h2>
                        <p class="category">
                            <i class="ti-reload" style = "font-size: 12px;"></i> As of <?= date("F j, Y h:i A"); ?>
                        </p><hr style = 'margin: 5px'>
                    </div>
                    <div class="content">
                        <?php if (!$message) {
                            echo '<h3 style = "color: #31bbe0; margin-bottom: 0px">Frequent Itemsets</h3>';
                            echo '<p class="category">Most frequent products involved in multiple record of transactions.</p><br>';
                            $this->apriori->printFreqItemsets();
                            echo '<h3 style = "color: #31bbe0; margin-bottom: 0px">Association Rules</h3>';
                            echo '<p class="category">If-then statements used to uncover relationships between data.</p><br>';
                            $this->apriori->printAssociationRules();
                        } else {
                            echo '<div align="center"><br><i>';
                            echo $message;
                            echo '</i></div>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
            <?php elseif ($this->uri->segment(3) == "admin"): ?>
            </div>
            <div class="col-lg-7 col-md-5">
                <div class="card">
                    <div class="header">
                        <h4 class="title"><b>Previous Actions</b></h4>
                        <?php if($log_date) {
                            $overflow = 'style = "overflow-y: scroll; height: 200px;"';
                            ?>
                            <p class="category">
                                <i class="ti-reload" style = "font-size: 12px;"></i> As of <?= date("F j, Y h:i A", $log_date->date); ?>
                            </p><hr style = 'margin: 5px'>
                        <?php }?>
                    </div>
                    <div class="content">
                        <ul class="list-unstyled team-members">
                            <?php
                            if ($logs) {
                                foreach ($logs as $logs) { ?>
                                    <li>
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <?= "#" . $logs->log_id ?>
                                            </div>
                                            <div class="col-xs-6">
                                                <?= $logs->action ?>
                                                <br/>
                                                <span class="text-muted"><small style = "color: #CCCCCC"><?= date("F j, Y", $logs->date) ?></small></span>
                                            </div>
                                            <div class="col-xs-3 text-right">
                                                <p style="color: #31bbe0"><?= date("h:i A", $logs->date) ?></p>
                                            </div>
                                        </div>
                                    </li>
                                <?php }
                            } else { ?>
                                <div align="center">
                                    <br><i>There are no transactions recorded for this user.</i><br><br>
                                </div>
                            <?php } ?>
                        </ul>
                    </div> <!-- content -->
                </div> <!-- card -->
            </div> <!-- col-lg-5 col-md-7 -->
        </div>
        <?php endif; ?>
    </div> <!-- container fluid -->
</div> <!-- content -->