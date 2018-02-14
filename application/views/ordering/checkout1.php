<div id="all">

    <div id="content">
        <div class="container">

            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="#">Home</a>
                    </li>
                    <li>Checkout - Address</li>
                </ul>
            </div>

            <div class="col-md-12" id="checkout">

                <div class="box">
                    <form method="post" action="<?= base_url().'home/checkout1_exec';?>">
                        <h1>Checkout</h1>
                        <ul class="nav nav-pills nav-justified">
                            <li class="active"><a href="#"><i class="fa fa-map-marker"></i><br>Address</a>
                            </li>
                            <li class="disabled"><a href="#"><i class="fa fa-money"></i><br>Payment Method</a>
                            </li>
                            <li class="disabled"><a href="#"><i class="fa fa-eye"></i><br>Order Review</a>
                            </li>
                        </ul>

                        <div class="content">
                         <?php
                        if (isset($_POST['enter'])) {
                            $firstname = $_POST['firstname'];
                            $lastname = $_POST['lastname'];
                            $address = $_POST['address'];
                            $city = $_POST['city'];
                            $province = $_POST['province'];
                            $city = $_POST['city'];
                            $barangay= $_POST['barangay'];
                            $zip = $_POST['zip'];
                            $contact = $_POST['contact'];
                            $email = $_POST['email'];
                            
                        }
                        else{
                            $firstname = "";
                            $lastname = "";
                            $address = "";
                            $city = "";
                            $province = "";
                            $city = "";
                            $barangay= "";
                            $zip = "";
                            $contact = "";
                            $email = "";
                        } 
                        ?>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="firstname">Firstname</label>
                                        <input type="text" class="form-control" id="firstname" name="firstname" value = "<?= $firstname ?>">
                                        <?php if(validation_errors()):
                                            echo "<span style = 'color: red'>" . form_error("firstname") . "</span>";
                                        endif; ?>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="lastname">Lastname</label>
                                        <input type="text" class="form-control" id="lastname" name="lastname" value = "<?= $lastname ?>">
                                        <?php if(validation_errors()):
                                            echo "<span style = 'color: red'>" . form_error("lastname") . "</span>";
                                        endif; ?>
                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="address">Complete Address</label>
                                        <input type="text" class="form-control" id="address" name="address" value = "<?= $address ?>">
                                        <?php if(validation_errors()):
                                            echo "<span style = 'color: red'>" . form_error("address") . "</span>";
                                        endif; ?>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="province">Province</label>
                                        <input type="text" class="form-control" id="province" name="province" value = "<?= $province ?>">
                                        <?php if(validation_errors()):
                                            echo "<span style = 'color: red'>" . form_error("province") . "</span>";
                                        endif; ?>
                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->

                            <div class="row">
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label for="city">City / Municipality</label>
                                        <input type="text" class="form-control" id="city" name="city" value = "<?= $city ?>">
                                        <?php if(validation_errors()):
                                            echo "<span style = 'color: red'>" . form_error("city") . "</span>";
                                        endif; ?>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label for="barangay">Barangay</label>
                                        <input type="text" class="form-control" id="barangay" name="barangay" value = "<?= $barangay ?>">
                                        <?php if(validation_errors()):
                                            echo "<span style = 'color: red'>" . form_error("barangay") . "</span>";
                                        endif; ?>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label for="zip">ZIP</label>
                                        <input type="text" class="form-control" id="zip" name="zip" value = "<?= $zip ?>">
                                        <?php if(validation_errors()):
                                            echo "<span style = 'color: red'>" . form_error("zip") . "</span>";
                                        endif; ?>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label for="contact">Contact Number</label>
                                        <input type="text" class="form-control" id="contact" name="contact" value = "<?= $contact ?>">
                                        <?php if(validation_errors()):
                                            echo "<span style = 'color: red'>" . form_error("contact") . "</span>";
                                        endif; ?>
                                        </br>
                                    </div>
                                </div>
                                <div class="col-sm-6 ">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control" id="email" name="email" value = "<?= $email ?>">
                                        <?php if(validation_errors()):
                                            echo "<span style = 'color: red'>" . form_error("email") . "</span>";
                                        endif; ?>
                                    </div>
                                </div>

                            </div>
                            <!-- /.row -->
                        </div>

                        <div class="box-footer">
                            <div class="pull-left">
                                <a href="<?= base_url().'home/basket'; ?>" class="btn btn-default"><i class="fa fa-chevron-left"></i>Back to basket</a>
                            </div>
                            <div class="pull-right">
                                <button type="submit" class="btn btn-primary" name  = "enter">Continue to Payment Method<i class="fa fa-chevron-right"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.box -->


            </div>
            <!-- /.col-md-9 -->


        </div>
        <!-- /.container -->
    </div>
    <!-- /#content -->