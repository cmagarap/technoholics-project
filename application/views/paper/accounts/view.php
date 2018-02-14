<?php $account = $account[0]; ?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-5 col-md-5">
                <div class="card card-user">
                    <div class="content">
                        <div align = "center"><img src="<?= $this->config->base_url() ?>uploads_users/<?= $account->image ?>" alt="<?= $account->username ?>" title = "<?= $account->username ?>" width= "50%" class = "img-circle image-shadow"/></div>
                        <div align = "center">
                            <br><hr><br>
                            <h4 class="title"><?php
                                if($account->username == NULL) echo $account->email;
                                else echo $account->username;
                                ?><br />
                                <a href="#"><small><?= $account->lastname.", ".$account->firstname ?></small></a>
                            </h4><br>
                            <p class="description text-center"><i><?= "Member since ".date("F j, Y", $account->registered_at) ?></i></p>
                        </div>
                    </div>
                    <hr>
                    <br>
                    <div align="center">
                        <a href = "javascript:history.go(-1)" class="btn btn-info btn-fill btn-wd" style = "background-color: #dc2f54; border-color: #dc2f54; color: white;">Go back</a>
                    </div>
                    <br>
                </div>
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
        </div> <!-- row -->
        <div class="row">
            <div class="col-lg-5 col-md-7">
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
                            if($this->uri->segment(3) == "admin") {
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
                                                    <font color="#31bbe0"><?= date("h:i A", $logs->date) ?></font>
                                                </div>
                                            </div>
                                        </li>
                                    <?php }
                                } else { ?>
                                    <div align="center">
                                        <br><i>There are no activities recorded by this user.</i><br><br>
                                    </div>
                                    <?php
                                }
                            } elseif($this->uri->segment(3) == "customer") {
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
                                }
                                else { ?>
                                    <div align="center">
                                        <br><i>There are no transactions recorded for this user.</i><br><br>
                                    </div>
                                    <?php
                                }
                            } ?>
                        </ul>
                    </div> <!-- content -->
                </div> <!-- card -->
            </div> <!-- col-lg-5 col-md-7 -->
        </div>
    </div> <!-- container fluid -->
</div> <!-- content -->