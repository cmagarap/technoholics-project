 <?php
 if (isset($_POST['enter'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $address = $_POST['address'];
    $zip = $_POST['zip'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    
}

else{
    $firstname = "";
    $lastname = "";
    $address = "";
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
                            <li class="disabled"><a href="#"><i class="fa fa-eye"></i><br>Order review</a>
                            </li>
                            <li class="disabled"><a href="#"><i class="fa fa-money"></i><br>Payment Method</a>
                            </li>
                        </ul>
                        <div class="content">
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
                                        <select class="form-control" name="province" >
                                            <option value="" disabled selected>Choose a province</option>
                                            <option value="Abra">Abra</option>
                                            <option value="Agusan Del Norte">Agusan Del Norte</option>
                                            <option value="Agusan Del Sur">Agusan Del Sur</option>
                                            <option value="Aklan">Aklan</option>
                                            <option value="Albay">Albay</option>
                                            <option value="Antique">Antique</option>
                                            <option value="Aurora">Aurora</option>
                                            <option value="Basilan">Basilan</option>
                                            <option value="Bataan">Bataan</option>
                                            <option value="Batangas">Batangas</option>
                                            <option value="Benguet">Benguet</option>
                                            <option value="Biliran">Biliran</option>
                                            <option value="Bohol">Bohol</option>
                                            <option value="Bukidnon">Bukidnon</option>
                                            <option value="Bulacan">Bulacan</option>
                                            <option value="Cagayan">Cagayan</option>
                                            <option value="Camarines Norte">Camarines Norte</option>
                                            <option value="Camarines Sur">Camarines Sur</option>
                                            <option value="Camiguin">Camiguin</option>
                                            <option value="Capiz">Capiz</option>
                                            <option value="Catanduanes">Catanduanes</option>
                                            <option value="Cavite">Cavite</option>
                                            <option value="Cebu">Cebu</option>
                                            <option value="Compostela Valley">Compostela Valley</option>
                                            <option value="Cotabato">Cotabato</option>
                                            <option value="Davao Del Norte">Davao Del Norte</option>
                                            <option value="Davao Del Sur">Davao Del Sur</option>
                                            <option value="Davao Oriental">Davao Oriental</option>
                                            <option value="Dinagat Islands">Dinagat Islands</option>
                                            <option value="Eastern Samar">Eastern Samar</option>
                                            <option value="Guimaras">Guimaras</option>
                                            <option value="Ifugao">Ifugao</option>
                                            <option value="Ilocos Norte">Ilocos Norte</option>
                                            <option value="Ilocos Sur">Ilocos Sur</option>
                                            <option value="Iloilo">Iloilo</option>
                                            <option value="Isabela">Isabela</option>
                                            <option value="Kalinga">Kalinga</option>
                                            <option value="La Union">La Union</option>
                                            <option value="Laguna">Laguna</option>
                                            <option value="Lanao Del Norte">Lanao Del Norte</option>
                                            <option value="Lanao Del Sur">Lanao Del Sur</option>
                                            <option value="Leyte">Leyte</option>
                                            <option value="Maguindanao">Maguindanao</option>
                                            <option value="Marinduque">Marinduque</option>
                                            <option value="Masbate">Masbate</option>
                                            <option value="Metro Manila-Caloocan">Metro Manila-Caloocan</option>
                                            <option value="Metro Manila-Las Pinas">Metro Manila-Las Pinas</option>
                                            <option value="Metro Manila-Makati">Metro Manila-Makati</option>
                                            <option value="Metro Manila-Malabon">Metro Manila-Malabon</option>
                                            <option value="Metro Manila-Mandaluyong">Metro Manila-Mandaluyong</option>
                                            <option value="Metro Manila-Manila">Metro Manila-Manila</option>
                                            <option value="Metro Manila-Marikina">Metro Manila-Marikina</option>
                                            <option value="Metro Manila-Muntinlupa">Metro Manila-Muntinlupa</option>
                                            <option value="Metro Manila-Navotas">Metro Manila-Navotas</option>
                                            <option value="Metro Manila-Paranaque">Metro Manila-Paranaque</option>
                                            <option value="Metro Manila-Pasay">Metro Manila-Pasay</option>
                                            <option value="Metro Manila-Pasig">Metro Manila-Pasig</option>
                                            <option value="Metro Manila-Pateros">Metro Manila-Pateros</option>
                                            <option value="Metro Manila-Quezon City">Metro Manila-Quezon City</option>
                                            <option value="Metro Manila-San Juan">Metro Manila-San Juan</option>
                                            <option value="Metro Manila-Taguig">Metro Manila-Taguig</option>
                                            <option value="Metro Manila-Valenzuela">Metro Manila-Valenzuela</option>
                                            <option value="Misamis Occidenta">Misamis Occidental</option>
                                            <option value="Misamis Oriental">Misamis Oriental</option>
                                            <option value="Mountain Province">Mountain Province</option>
                                            <option value="Negros Occidental">Negros Occidental</option>
                                            <option value="Negros Oriental">Negros Oriental</option>
                                            <option value="North Cotabato">North Cotabato</option>
                                            <option value="Northern Samar">Northern Samar</option>
                                            <option value="Nueva Ecija">Nueva Ecija</option>
                                            <option value="Nueva Vizcaya">Nueva Vizcaya</option>
                                            <option value="Occidental Mindoro">Occidental Mindoro</option>
                                            <option value="Oriental Mindoro">Oriental Mindoro</option>
                                            <option value="Palawan">Palawan</option>
                                            <option value="Pampanga">Pampanga</option>
                                            <option value="Pangasinan">Pangasinan</option>
                                            <option value="Quezon">Quezon</option>
                                            <option value="Quirino">Quirino</option>
                                            <option value="Rizal">Rizal</option>
                                            <option value="Romblon">Romblon</option>
                                            <option value="Sarangani">Sarangani</option>
                                            <option value="Siquijor">Siquijor</option>
                                            <option value="Sorsogon">Sorsogon</option>
                                            <option value="South Cotabato">South Cotabato</option>
                                            <option value="Southern Leyte">Southern Leyte</option>
                                            <option value="Sultan Kudarat">Sultan Kudarat</option>
                                            <option value="Sulu">Sulu</option>
                                            <option value="Surigao Del Norte">Surigao Del Norte</option>
                                            <option value="Surigao Del Sur">Surigao Del Sur</option>
                                            <option value="Tarlac">Tarlac</option>
                                            <option value="Tawi~Tawi">Tawi~Tawi</option>
                                            <option value="Western Samar">Western Samar</option>
                                            <option value="Zambales">Zambales</option>
                                            <option value="Zamboanga Del Norte">Zamboanga Del Norte</option>
                                            <option value="Zamboanga Del Sur">Zamboanga Del Sur</option>
                                            <option value="Zamboanga Sibugay">Zamboanga Sibugay</option>
                                        </select>   
                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->

                            <div class="row">
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label for="city">City / Municipality</label>
                                        <select class="form-control" name="city">
                                            <option value="" disabled selected>Choose a city</option>
                                            <option value="Bangued">Bangued</option>
                                            <option value="Boliney">Boliney</option>
                                            <option value="Bucay">Bucay</option>
                                            <option value="Bucloc">Bucloc</option>
                                            <option value="Daguioman">Daguioman</option>
                                            <option value="Danglas">Danglas</option>
                                            <option value="Dolores">Dolores</option>
                                            <option value="La Paz">La Paz</option>
                                            <option value="Lacub">Lacub</option>
                                            <option value="Lagangilang">Lagangilang</option>
                                            <option value="Lagayan">Lagayan</option>
                                            <option value="Langiden">Langiden</option>
                                            <option value="Licuan~Baay">Licuan~Baay</option>
                                            <option value="Luba">Luba</option>
                                            <option value="Malibcong">Malibcong</option>
                                            <option value="Manabo">Manabo</option>
                                            <option value="Penarrubia">Penarrubia</option>
                                            <option value="Pidigan">Pidigan</option>
                                            <option value="Pilar">Pilar</option>
                                            <option value="Sallapadan">Sallapadan</option>
                                            <option value="San Isidro">San Isidro</option>
                                            <option value="San Juan">San Juan</option>
                                            <option value="San Quintin">San Quintin</option>
                                            <option value="Tayum">Tayum</option>
                                            <option value="Tineg">Tineg</option>
                                            <option value="Tubo">Tubo</option>
                                            <option value="Villaviciosa">Villaviciosa</option>
                                        </select>

                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label for="barangay">Barangay</label>
                                        <select class="form-control" name="barangay" >
                                            <option value="" disabled selected>Choose a barangay</option>
                                            <option value="Agtangao">Agtangao</option>
                                            <option value="Angad">Angad</option>
                                            <option value="Bagacao">Bagacao</option>
                                            <option value="Bangbangar">Bangbangar</option>
                                            <option value="Cabuloan">Cabuloan</option>
                                            <option value="Calaba">Calaba</option>
                                            <option value="Cosili East (Proper)">Cosili East (Proper)</option>
                                            <option value="Cosili West (Buaya)">Cosili West (Buaya)</option>
                                            <option value="Dangdangla">Dangdangla</option>
                                            <option value="Lingtan">Lingtan</option>
                                            <option value="Lipcan">Lipcan</option>
                                            <option value="Lubong">Lubong</option>
                                            <option value="Macarcarmay">Macarcarmay</option>
                                            <option value="Macray">Macray</option>
                                            <option value="Malita">Malita</option>
                                            <option value="Maoay">Maoay</option>
                                            <option value="Palao">Palao</option>
                                            <option value="Patucannay">Patucannay</option>
                                            <option value="Sagap">Sagap</option>
                                            <option value="San Antonio">San Antonio</option>
                                            <option value="Santa Rosa">Santa Rosa</option>
                                            <option value="Sao-atan">Sao-atan</option>
                                            <option value="Sappaac">Sappaac</option>
                                            <option value="Tablac (Calot)">Tablac (Calot)</option>
                                            <option value="Zone 1 Pob. (Nalasin)">Zone 1 Pob. (Nalasin)</option>
                                            <option value="Zone 2 Pob. (Consiliman)">Zone 2 Pob. (Consiliman)</option>
                                            <option value="Zone 3 Pob. (Lalaud)">Zone 3 Pob. (Lalaud)</option>
                                            <option value="Zone 4 Pob. (Town Proper)">Zone 4 Pob. (Town Proper)</option>
                                            <option value="Zone 5 Pob. (Bo. Barikir)">Zone 5 Pob. (Bo. Barikir)</option>
                                            <option value="Zone 6 Pob. (Sinapangan)">Zone 6 Pob. (Sinapangan)</option>
                                            <option value="Zone 7 Pob. (Baliling)">Zone 7 Pob. (Baliling)</option>
                                        </select>

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
                                <button type="submit" class="btn btn-primary" name="enter">Continue to Delivery Method<i class="fa fa-chevron-right"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
