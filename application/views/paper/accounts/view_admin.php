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
                            <p style="font-size: 11px; color: darkgrey"><?php if ($account->username == NULL)
                                    echo $account->email;
                                else
                                    echo $account->username;
                                ?>
                                <br>
                                <?= "Member since " . date("F j, Y", $account->registered_at) ?></p>
                        </div>
                        <hr>
                        <br>
                        <div class="row" align="center">
                            <a href = "javascript:history.go(-1)" class="btn btn-info btn-fill btn-wd" style = "background-color: #dc2f54; border-color: #dc2f54; color: white;">Go back</a>
                        </div>
                        <br>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-md-5">
                <div class="card">
                    <div class="header">
                        <h4 class="title"><b>Previous Actions</b></h4>
                        <?php
                        if ($log_date) {
                            $overflow = 'style = "overflow-y: scroll; height: 200px;"';
                            ?>
                            <p class="category">
                                <i class="ti-reload" style = "font-size: 12px;"></i> As of <?= date("F j, Y h:i A", $log_date->date); ?>
                            </p><hr style = 'margin: 5px'>
                        <?php } ?>
                    </div>
                    <div class="content">
                        <ul class="list-unstyled team-members">
                            <?php
                            if ($logs) {
                                foreach ($logs as $logs) {
                                    ?>
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
                            } else {
                                ?>
                                <div align="center">
                                    <br><i>There are no user log recorded for this user.</i><br><br>
                                </div>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>