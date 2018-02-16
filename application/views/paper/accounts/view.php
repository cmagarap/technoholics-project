<?php $account = $account[0]; ?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-5 col-md-5">
                <div class="card card-user">
                    <div class="image">
                        <img src="<?= base_url() ?>assets/ordering/img/<?= $cover->image_2 ?>" alt="..."/>
                    </div>
                    <div class="content">
                        <div class="author">
                            <img class="avatar border-white" src="<?= $this->config->base_url() ?>uploads_users/<?= $account->image ?>" alt="admin-user" title="Admin User">
                            <h4 class="title"><?= $account->firstname . " " . $account->lastname ?> <br />
                                <a><small><?php if($account->username == NULL) echo $account->email;
                                        else echo $account->username; ?></small></a>
                            </h4>
                        </div>
                        <hr>
                        <p class="description text-center"><?= "Member since ".date("F j, Y", $account->registered_at) ?></p>
                    </div>
                    <hr>
                    <div class="text-center">
                        <div class="row">
                            <div class="col-md-3 col-md-offset-1">
                                <h5>12<br /><small>Files</small></h5>
                            </div>
                            <div class="col-md-4">
                                <h5>2GB<br /><small>Used</small></h5>
                            </div>
                            <div class="col-md-3">
                                <h5>24,6$<br /><small>Spent</small></h5>
                            </div>
                        </div>
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
            <div class="col-lg-7 col-md-5">
                <div class="card card-user">
                    <div class="header">
                        <h2 class="title" style = "margin-bottom: 10px"><b>Customer Analysis</b></h2>
                        <p class="category">
                            <i class="ti-reload" style = "font-size: 12px;"></i> As of <?= date("F j, Y h:i A"); ?>
                        </p><hr style = 'margin: 5px'>
                    </div>
                    <div class="content">
                        <?php if (!$message) {
                            echo '<h3 style = "color: #31bbe0">Frequent Itemsets</h3>';
                            $this->apriori->printFreqItemsets();
                            echo '<h3 style = "color: #31bbe0">Association Rules</h3>';
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