<div id="all">
    <div id="content">
        <div class="container">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="<?= base_url() . 'home' ?>">Home</a>
                    </li>
                    <li>My account</li>
                </ul>
            </div>
            <div class="col-md-3">
                <div class="panel panel-default sidebar-menu">
                    <div class="panel-heading">
                        <h3 class="panel-title">Customer section</h3>
                    </div>
                    <div class="panel-body">
                        <ul class="nav nav-pills nav-stacked">
                            <li>
                                <a href="<?= base_url() . 'home/customer_orders' ?>"><i class="fa fa-list"></i> My orders</a>
                            </li>
                            <li>
                                <a href="<?= base_url() . 'home/wishlist' ?>"><i class="fa fa-heart"></i> My wishlist</a>
                            </li>
                            <li class="active">
                                <a href="<?= base_url() . 'home/account' ?>"><i class="fa fa-user"></i> My account</a>
                            </li>
                            <li>
                                <a href="<?= base_url() . 'home/logout' ?>"><i class="fa fa-sign-out"></i> Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-9" id="customer-orders">
                <div class="box">
                    <h1>My account</h1>
                    <p class="lead">Change your personal details or your password here.</p>
                    <p class="text-muted">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>

                    <h3>Change profile picture</h3>
                    <form method="post" enctype="multipart/form-data" action="<?= base_url() . 'home/save_profile_picture'; ?>">
                        <div class="row">
                            <div class="col-sm-12" align="center">
                                <img src="<?= base_url() ?>uploads_users/<?= $account->image ?>" alt="customer-user" width="30%" style="border-radius: 100%; margin: 1px 5px 10px 5px">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4"></div>
                            <div class="col-sm-4">
                                <input class="form-control" type="file" name="user_file">
                            </div>
                        </div>
                        <div class="col-sm-12 text-center" style="margin-top: 2%">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Change Picture</button>
                        </div>
                    </form>
                    <hr>
                    <h3>Change password</h3>
                    <form>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="password_old">Old password</label>
                                    <input type="password" class="form-control" id="password_old">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="password_1">New password</label>
                                    <input type="password" class="form-control" id="password_1">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="password_2">Retype new password</label>
                                    <input type="password" class="form-control" id="password_2">
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->

                        <div class="col-sm-12 text-center">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save new password</button>
                        </div>
                    </form>

                    <hr>

                    <h3>Change Email</h3>
                    <form Method="post" action="<?= base_url() . 'home/save_email'; ?>">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="city">Email</label>
                                    <?php if (form_error("email")): ?>
                                        <input type="text" class="form-control" name="email" value ="<?= $account->email ?>" style = "border-color: red">
                                        <span style = 'color: red'><?= form_error("email") ?></span>
                                    <?php else: ?>
                                        <input type="text" class="form-control" name="email" value="<?= $account->email ?>">
                                    <?php endif; ?>                                          
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 text-center">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save new Email</button>
                        </div>
                    </form>
                    <hr>
                    <h3>Personal details</h3>
                    <form Method="post" action="<?= base_url() . 'home/save_changes'; ?>">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="firstname">Firstname</label>
                                    <?php if (form_error("firstname")): ?>
                                        <input type="text" class="form-control" name="firstname" value ="<?= $account->firstname ?>" style = "border-color: red">
                                        <span style = 'color: red'><?= form_error("firstname") ?></span>
                                    <?php else: ?>
                                        <input type="text" class="form-control" name="firstname" value="<?= $account->firstname ?>">
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="lastname">Lastname</label>
                                    <?php if (form_error("lastname")): ?>
                                        <input type="text" class="form-control" name="lastname" value ="<?= $account->lastname ?>" style = "border-color: red">
                                        <span style = 'color: red'><?= form_error("lastname") ?></span>
                                    <?php else: ?>
                                        <input type="text" class="form-control" name="lastname" value="<?= $account->lastname ?>">
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <?php if (form_error("username")): ?>
                                        <input type="text" class="form-control" name="username" value ="<?= $account->username ?>" style = "border-color: red">
                                        <span style = 'color: red'><?= form_error("username") ?></span>
                                    <?php else: ?>
                                        <input type="text" class="form-control" name="username" value="<?= $account->username ?>">
                                    <?php endif; ?>                                
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="complete_address">Complete Address</label>
                                    <?php if (form_error("complete_address")): ?>
                                        <input type="text" class="form-control" name="complete_address" value ="<?= $account->complete_address ?>" style = "border-color: red">
                                        <span style = 'color: red'><?= form_error("complete_address") ?></span>
                                    <?php else: ?>
                                        <input type="text" class="form-control" name="complete_address" value="<?= $account->complete_address ?>">
                                    <?php endif; ?>                                
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="province">Province</label>
                                    <?php if (form_error("province")): ?>
                                        <input type="text" class="form-control" name="province" value ="<?= $account->province ?>" style = "border-color: red">
                                        <span style = 'color: red'><?= form_error("province") ?></span>
                                    <?php else: ?>
                                        <input type="text" class="form-control" name="province" value="<?= $account->province ?>">
                                    <?php endif; ?>                                          
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="city">City / Municipality</label>
                                    <?php if (form_error("city")): ?>
                                        <input type="text" class="form-control" name="city" value ="<?= $account->city_municipality ?>" style = "border-color: red">
                                        <span style = 'color: red'><?= form_error("city") ?></span>
                                    <?php else: ?>
                                        <input type="text" class="form-control" name="city" value="<?= $account->city_municipality ?>">
                                    <?php endif; ?>                                          
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="city">Barangay</label>
                                    <?php if (form_error("barangay")): ?>
                                        <input type="text" class="form-control" name="barangay" value ="<?= $account->barangay ?>" style = "border-color: red">
                                        <span style = 'color: red'><?= form_error("barangay") ?></span>
                                    <?php else: ?>
                                        <input type="text" class="form-control" name="barangay" value="<?= $account->barangay ?>">
                                    <?php endif; ?>                                          
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label for="zip">ZIP</label>
                                    <?php if (form_error("zip")): ?>
                                        <input type="text" class="form-control" name="zip" value ="<?= $account->zip_code ?>" style = "border-color: red">
                                        <span style = 'color: red'><?= form_error("zip") ?></span>
                                    <?php else: ?>
                                        <input type="text" class="form-control" name="zip" value="<?= $account->zip_code ?>">
                                    <?php endif; ?>  
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label for="contact">Contact Number</label>
                                    <?php if (form_error("contact")): ?>
                                        <input type="text" class="form-control" name="contact" value ="<?= $account->contact_no ?>" style = "border-color: red">
                                        <span style = 'color: red'><?= form_error("contact") ?></span>
                                    <?php else: ?>
                                        <input type="text" class="form-control" name="contact" value="<?= $account->contact_no ?>">
                                    <?php endif; ?>  
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 text-center">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save changes</button>
                        </div>
                        <hr>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>