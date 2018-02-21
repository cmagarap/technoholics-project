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
                        <h1>Checkout - Address</h1>
                        <ul class="nav nav-pills nav-justified">
                            <li class="active"><a href="#"><i class="fa fa-map-marker"></i><br>Address</a>
                            </li>
                            <li class="disabled"><a href="#"><i class="fa fa-truck"></i><br>Delivery Method</a>
                            </li>
                            <li class="disabled"><a href="#"><i class="fa fa-money"></i><br>Payment Method</a>
                            </li>
                            <li class="disabled"><a href="#"><i class="fa fa-eye"></i><br>Order review</a>
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

                                    <?php if(form_error("firstname")): ?>
                                        <input type="text" class="form-control" name="firstname" value ="<?php if($this->session->has_userdata('checkout1_session')){ echo $this->session->userdata['checkout1_session']['fname']; } else { echo $firstname;}?>" style = "border-color: red">
                                        <span style = 'color: red'><?= form_error("firstname") ?></span>
                                    <?php else: ?>
                                        <input type="text" class="form-control" name="firstname" value="<?php if($this->session->has_userdata('checkout1_session')){ echo $this->session->userdata['checkout1_session']['fname']; } else { echo $firstname;}?>">
                                    <?php endif; ?>

                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="lastname">Lastname</label>

                                    <?php if(form_error("lastname")): ?>
                                        <input type="text" class="form-control" name="lastname" value ="<?php if($this->session->has_userdata('checkout1_session')){ echo $this->session->userdata['checkout1_session']['lname']; } else { echo $lastname;}?>" style = "border-color: red">
                                        <span style = 'color: red'><?= form_error("lastname") ?></span>
                                    <?php else: ?>
                                        <input type="text" class="form-control" name="lastname" value="<?php if($this->session->has_userdata('checkout1_session')){ echo $this->session->userdata['checkout1_session']['lname']; } else { echo $lastname;}?>">
                                    <?php endif; ?>

                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="address">Complete Address</label>

                                <?php if(form_error("address")): ?>
                                    <input type="text" class="form-control" name="address" value ="<?php if($this->session->has_userdata('checkout1_session')){ echo $this->session->userdata['checkout1_session']['address']; } else { echo $address;}?>" style = "border-color: red">
                                    <span style = 'color: red'><?= form_error("address") ?></span>
                                <?php else: ?>
                                    <input type="text" class="form-control" name="address" value="<?php if($this->session->has_userdata('checkout1_session')){ echo $this->session->userdata['checkout1_session']['address']; } else { echo $address;}?>">
                                <?php endif; ?>  

                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="province">Province</label>

                                <?php if(form_error("province")): ?>
                                    <input type="text" class="form-control" name="province" value ="<?php if($this->session->has_userdata('checkout1_session')){ echo $this->session->userdata['checkout1_session']['province']; } else { echo $province;}?>" style = "border-color: red">
                                    <span style = 'color: red'><?= form_error("province") ?></span>
                                <?php else: ?>
                                    <input type="text" class="form-control" name="province" value="<?php if($this->session->has_userdata('checkout1_session')){ echo $this->session->userdata['checkout1_session']['province'];} else { echo $province;}?>">
                                <?php endif; ?>   

                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->

                            <div class="row">
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label for="city">City / Municipality</label>

                                <?php if(form_error("city")): ?>
                                    <input type="text" class="form-control" name="city" value ="<?php if($this->session->has_userdata('checkout1_session')){ echo $this->session->userdata['checkout1_session']['city']; } else { echo $city;}?>" style = "border-color: red">
                                    <span style = 'color: red'><?= form_error("city") ?></span>
                                <?php else: ?>
                                    <input type="text" class="form-control" name="city" value="<?php if($this->session->has_userdata('checkout1_session')){ echo $this->session->userdata['checkout1_session']['city']; } else { echo $city;}?>">
                                <?php endif; ?>      

                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label for="barangay">Barangay</label>

                                <?php if(form_error("barangay")): ?>
                                    <input type="text" class="form-control" name="barangay" value ="<?php if($this->session->has_userdata('checkout1_session')){ echo $this->session->userdata['checkout1_session']['barangay']; } else { echo $barangay;}?>" style = "border-color: red">
                                    <span style = 'color: red'><?= form_error("barangay") ?></span>
                                <?php else: ?>
                                    <input type="text" class="form-control" name="barangay" value="<?php if($this->session->has_userdata('checkout1_session')){ echo $this->session->userdata['checkout1_session']['barangay']; } else { echo $barangay;}?>">
                                <?php endif; ?>

                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label for="zip">ZIP</label>

                                <?php if(form_error("zip")): ?>
                                    <input type="text" class="form-control" name="zip" value ="<?php if($this->session->has_userdata('checkout1_session')){ echo $this->session->userdata['checkout1_session']['zip']; } else { echo $zip;}?>" style = "border-color: red">
                                    <span style = 'color: red'><?= form_error("zip") ?></span>
                                <?php else: ?>
                                    <input type="text" class="form-control" name="zip" value="<?php if($this->session->has_userdata('checkout1_session')){ echo $this->session->userdata['checkout1_session']['zip']; } else { echo $zip;}?>">
                                <?php endif; ?>  

                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label for="contact">Contact Number</label>

                                <?php if(form_error("contact")): ?>
                                    <input type="text" class="form-control" name="contact" value ="<?php if($this->session->has_userdata('checkout1_session')){ echo $this->session->userdata['checkout1_session']['contact']; } else { echo $contact;}?>" style = "border-color: red">
                                    <span style = 'color: red'><?= form_error("contact") ?></span>
                                <?php else: ?>
                                    <input type="text" class="form-control" name="contact" value="<?php if($this->session->has_userdata('checkout1_session')){ echo $this->session->userdata['checkout1_session']['contact']; } else { echo $contact;}?>">
                                <?php endif; ?>  
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 ">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                <?php if(form_error("email")): ?>
                                    <input type="text" class="form-control" name="email" value ="<?php if($this->session->has_userdata('checkout1_session')){ echo $this->session->userdata['checkout1_session']['email']; } else { echo $email;}?>" style = "border-color: red">
                                    <span style = 'color: red'><?= form_error("email") ?></span>
                                <?php else: ?>
                                    <input type="text" class="form-control" name="email" value="<?php if($this->session->has_userdata('checkout1_session')){ echo $this->session->userdata['checkout1_session']['email']; } else { echo $email;}?>">
                                <?php endif; ?>  

                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->
                        </div>
                        <div class="box-footer">
                            <div class="pull-left">
                                <a href="<?= base_url().'home/basket'; ?>" class="btn btn-default"><i class="fa fa-chevron-left"></i>Back to Basket</a>
                            </div>
                            <div class="pull-right">

                                <button type="submit" class="btn btn-primary">Continue to Delivery Method<i class="fa fa-chevron-right"></i>

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