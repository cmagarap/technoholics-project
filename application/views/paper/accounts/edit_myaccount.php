<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-md-5">
                <div class="card card-user">
                    <div class="image">
                        <img src="<?= $this->config->base_url() ?>images/bf.jpg" alt="..."/>
                    </div>
                    <div class="content">
                        <div class="author">
                            <?php # TO ACCESS THE IMAGE THUMBNAIL:
                            $user = $user[0];
                            $user_image = (string)$user->image;
                            $image_array = explode(".", $user_image);
                            ?>
                            <img class="avatar border-white" src="<?= $this->config->base_url() ?>uploads_users/<?= $image_array[0] . "_thumb." . $image_array[1]; ?>" alt="admin-user" title="Admin User">
                            <h4 class="title"><?= $user->firstname . " " . $user->lastname ?> <br />
                                <a><small><?php if($user->username == NULL) echo $user->email;
                                        else echo $user->username; ?></small></a>
                            </h4>
                        </div>
                        <hr>
                        <p class="description">
                            <?php
                            if ($user->access_level == 0) echo "General Manager";
                            elseif ($user->access_level == 1) echo "Admin Assistant";
                            ?>
                        </p>
                        <a href="">Change Profile Picture</a><br>
                        <a href="">Change Password</a>
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
                    </div>
                </div>

            </div>
            <div class="col-lg-8 col-md-7">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Edit Profile</h4>
                    </div>
                    <div class="content">
                        <hr>
                        <form action = "<?= $this->config->base_url() ?>my_account/edit_myprofile_exec" method = "POST">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>User Type</label>
                                        <input type="text" class="form-control border-input" disabled placeholder="Company" value="<?php
                                        if ($user->access_level == 0) echo "General Manager";
                                        elseif ($user->access_level == 1) echo "Admin Assistant";
                                        ?>">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for = "username">Username</label>
                                        <input type="text" class="form-control border-input" placeholder="Username" name = "username" value="<?= $user->username; ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="email">Email address</label>
                                        <input type="text" name = "email" class="form-control border-input" placeholder="Email" value = "<?= $user->email ?>">
                                        <?php if(validation_errors('email')):
                                            echo "<span style = 'color: red'>" . form_error("email") . "</span>";
                                        endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for = "firstaname">First Name</label>
                                        <input type="text" class="form-control border-input" placeholder="Company" name = "firstname" value="<?= $user->firstname; ?>">
                                        <?php if(validation_errors('firstname')):
                                            echo "<span style = 'color: red'>" . form_error("firstname") . "</span>";
                                        endif; ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for = "lastname">Last Name</label>
                                        <input type="text" class="form-control border-input" placeholder="Last Name" name = "lastname" value="<?= $user->lastname; ?>">
                                        <?php if(validation_errors('lastname')):
                                            echo "<span style = 'color: red'>" . form_error("lastname") . "</span>";
                                        endif; ?>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="text-center">
                                <button type="submit" class="btn btn-info btn-fill btn-wd">Update Profile</button>
                                <a href = "javascript:history.go(-1)" class="btn btn-info btn-fill btn-wd" style = "background-color: #dc2f54; border-color: #dc2f54; color: white;">Go back</a>
                            </div>
                            <br>
                            <!--<div class="clearfix"></div>-->
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="header">
                        <h4 class="title">My Recent Activities</h4>
                    </div>
                    <div class="content">
                        <ul class="list-unstyled team-members">
                            <li>
                                <div class="row">
                                    <div class="col-xs-3">
                                        <div class="avatar">
                                            <img src="assets/img/faces/face-0.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        DJ Khaled
                                        <br />
                                        <span class="text-muted"><small>Offline</small></span>
                                    </div>

                                    <div class="col-xs-3 text-right">
                                        <btn class="btn btn-sm btn-success btn-icon"><i class="fa fa-envelope"></i></btn>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="row">
                                    <div class="col-xs-3">
                                        <div class="avatar">
                                            <img src="assets/img/faces/face-1.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        Creative Tim
                                        <br />
                                        <span class="text-success"><small>Available</small></span>
                                    </div>

                                    <div class="col-xs-3 text-right">
                                        <btn class="btn btn-sm btn-success btn-icon"><i class="fa fa-envelope"></i></btn>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="row">
                                    <div class="col-xs-3">
                                        <div class="avatar">
                                            <img src="assets/img/faces/face-3.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        Flume
                                        <br />
                                        <span class="text-danger"><small>Busy</small></span>
                                    </div>

                                    <div class="col-xs-3 text-right">
                                        <btn class="btn btn-sm btn-success btn-icon"><i class="fa fa-envelope"></i></btn>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>