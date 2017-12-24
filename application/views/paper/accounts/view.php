<?php $account = $account[0]; ?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-5 col-md-5">
                <div class="card card-user">
                    <div class="content" style = "padding-top: 40px;">
                        <div align = "center">
                            <img src="<?= $this->config->base_url() ?>uploads_users/<?= $account->image ?>" alt="<?= $account->username ?>" title = "<?= $account->username ?>" width= "50%" class = "img-circle"/>
                        </div>
                        <div align = "center">
                            <br><hr><br>
                            <h4 class="title"><?= $account->username ?><br />
                                <a href="#"><small><?= $account->lastname.", ".$account->firstname ?></small></a>
                            </h4>
                            <br>
                            <p class="description text-center">
                                <i><?= "Member since ".date("F j, Y", $account->registered_at) ?></i>
                            </p>
                            <br>
                        </div>
                    </div>
                    <hr>
                    <div class="text-center">
                        <div class="row">
                            <div class="col-md-2 col-md-offset-1">
                                <h5></h5> <!-- just for space -->
                            </div>
                            <div class="col-md-6">
                                <h5>
                                    <b>
                                        <?php
                                            if($account->access_level == 0) { echo "General Manager"; } # wala dapat ito
                                            elseif($account->access_level == 1) { echo "Admin Assistant"; }
                                            elseif($account->access_level == 2) { echo "Customer"; }
                                        ?>
                                    </b>
                                    <br>
                                    <small>User type</small>
                                </h5>
                            </div>
                            <div class="col-md-1">
                                <h5></h5>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div align="center">
                        <a href = "javascript:history.go(-1)" class="btn btn-info btn-fill btn-wd" style = "background-color: #dc2f54; border-color: #dc2f54; color: white;">Go back</a>
                    </div>
                    <br>
                </div>
            </div>
            <div class="col-lg-5 col-md-7">
                <div class="card">
                    <div class="header">
                        <h4 class="title"><b>Previous Activities</b></h4>
                    </div>
                    <div class="content">
                        <ul class="list-unstyled team-members">
                            <?php for($i = 8; $i >= 1; $i++): ?>
                                <li>
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <?= "#".$i ?>
                                        </div>
                                        <div class="col-xs-6">
                                            Buyer <?= $i ?> # should be log id
                                            <br />
                                            <span class="text-muted"><small>Offline</small></span>
                                        </div>
                                        <div class="col-xs-3 text-right">
                                            <button class="btn btn-sm btn-success btn-icon"><i class="fa fa-envelope"></i></button>
                                        </div>
                                    </div>
                                </li>
                            <?php endfor; ?>
                        </ul>
                    </div> <!-- content -->
                </div> <!-- card -->
            </div> <!-- col-lg-5 col-md-7 -->
        </div> <!-- row -->
    </div> <!-- container fluid -->
</div> <!-- content -->