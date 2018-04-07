<?php
if (isset($_POST['enter'])) {
    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    $address = $_POST['address'];
    $province = $_POST['province'];
    $city = $_POST['city'];
    $barangay = $_POST['barangay'];
    $email = $_POST['email'];
    $zip = $_POST['zip'];
    $contact = $_POST['contact'];
} else {
    $lastname = "";
    $firstname = "";
    $address = "";
    $city = "";
    $province = "";
    $barangay = "";
    $contact = "";
    $email = "";
    $zip = "";
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
                                        <label for="address">Complete Address <span style="color: #bbb; font-size:12px;">(House Number, Street, & Barangay)</span></label>

                                        <?php if(form_error("address")): ?>
                                            <input type="text" class="form-control" name="address" value ="<?php if($this->session->has_userdata('checkout1_session')){ echo $this->session->userdata['checkout1_session']['address']; } else { echo $address;}?>" style = "border-color: red">
                                            <span style = 'color: red'><?= form_error("address") ?></span>
                                        <?php else: ?>
                                            <input type="text" class="form-control" name="address" value="<?php if($this->session->has_userdata('checkout1_session')){ echo $this->session->userdata['checkout1_session']['address']; } else { echo $address;}?>">
                                        <?php endif; ?>  

                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="province">Province</label>

                                        <?php if(form_error("province")): ?>
                                            <input type="text" class="form-control" name="province" value ="<?php if($this->session->has_userdata('checkout1_session')){ echo $this->session->userdata['checkout1_session']['province']; } else { echo $province;}?>" style = "border-color: red">
                                            <span style = 'color: red'><?= form_error("province") ?></span>
                                        <?php else: ?>
                                            <input type="text" class="form-control" name="province" value="<?php if($this->session->has_userdata('checkout1_session')){ echo $this->session->userdata['checkout1_session']['province']; } else { echo $province;}?>">
                                        <?php endif; ?>  

                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="City">City</label>

                                        <?php if(form_error("city")): ?>
                                            <input type="text" class="form-control" name="city" value ="<?php if($this->session->has_userdata('checkout1_session')){ echo $this->session->userdata['checkout1_session']['city']; } else { echo $city;}?>" style = "border-color: red">
                                            <span style = 'color: red'><?= form_error("city") ?></span>
                                        <?php else: ?>
                                            <input type="text" class="form-control" name="city" value="<?php if($this->session->has_userdata('checkout1_session')){ echo $this->session->userdata['checkout1_session']['city']; } else { echo $city;}?>">
                                        <?php endif; ?>  

                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->
                            <div class="row">
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
                                        <label for="contact">Contact Number</label>

                                        <?php if(form_error("contact")): ?>
                                            <input type="text" class="form-control" name="contact" value ="<?php if($this->session->has_userdata('checkout1_session')){ echo $this->session->userdata['checkout1_session']['contact']; } else { echo $contact;}?>" style = "border-color: red">
                                            <span style = 'color: red'><?= form_error("contact") ?></span>
                                        <?php else: ?>
                                            <input type="text" class="form-control" name="contact" value="<?php if($this->session->has_userdata('checkout1_session')){ echo $this->session->userdata['checkout1_session']['contact']; } else { echo $contact;}?>">
                                        <?php endif; ?>  
                                    </div>
                                </div>
                                <div class="col-sm-4 col-md-3"">
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
                                <div class="col-sm-3 col-md-3">
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
                            </div>
                            <div class="row">
                             <div class="col-md-2">
                                <label for="address">Birthdate</label>
                                <div class="form-group">
                                    <select class="form-control" name="month" <?php if (form_error("month")) {echo 'style = "border-color: red"';} ?> >
                                        <option value="" disabled selected="selected">Month</option>
                                        <option value="01">January</option>
                                        <option value="02">February</option>
                                        <option value="03">March</option>
                                        <option value="04">April</option>
                                        <option value="05">May</option>
                                        <option value="06">June</option>
                                        <option value="07">July</option>
                                        <option value="08">August</option>
                                        <option value="09">September</option>
                                        <option value="10">October</option>
                                        <option value="11">November</option>
                                        <option value="12">December</option>
                                    </select>
                                    <?php if (form_error("month")): ?>
                                        <span style = 'color: red'><?= form_error("month") ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label for="address">&nbsp;</label>
                                <div class="form-group">
                                    <select class="form-control" name="day" <?php if (form_error("day")) {echo 'style = "border-color: red"';} ?> >
                                        <option value="" disabled selected="selected">Day</option>
                                        <option value="01">01</option>
                                        <option value="02">02</option>
                                        <option value="03">03</option>
                                        <option value="04">04</option>
                                        <option value="05">05</option>
                                        <option value="06">06</option>
                                        <option value="07">07</option>
                                        <option value="08">08</option>
                                        <option value="09">09</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                        <option value="13">13</option>
                                        <option value="14">14</option>
                                        <option value="15">15</option>
                                        <option value="16">16</option>
                                        <option value="17">17</option>
                                        <option value="18">18</option>
                                        <option value="19">19</option>
                                        <option value="20">20</option>
                                        <option value="21">21</option>
                                        <option value="22">22</option>
                                        <option value="23">23</option>
                                        <option value="24">24</option>
                                        <option value="25">25</option>
                                        <option value="26">26</option>
                                        <option value="27">27</option>
                                        <option value="28">28</option>
                                        <option value="29">29</option>
                                        <option value="30">30</option>
                                        <option value="31">31</option>
                                    </select>
                                    <?php if (form_error("day")): ?>
                                        <span style = 'color: red'><?= form_error("day") ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label for="address">&nbsp;</label>
                                <div class="form-group">
                                    <select class="form-control" name="year" <?php if (form_error("year")) {echo 'style = "border-color: red"';} ?> >
                                        <option value="" disabled selected="selected">Year</option>
                                        <option value="2018">2018</option>
                                        <option value="2017">2017</option>
                                        <option value="2016">2016</option>
                                        <option value="2015">2015</option>
                                        <option value="2014">2014</option>
                                        <option value="2013">2013</option>
                                        <option value="2012">2012</option>
                                        <option value="2011">2011</option>
                                        <option value="2010">2010</option>
                                        <option value="2009">2009</option>
                                        <option value="2008">2008</option>
                                        <option value="2007">2007</option>
                                        <option value="2006">2006</option>
                                        <option value="2005">2005</option>
                                        <option value="2004">2004</option>
                                        <option value="2003">2003</option>
                                        <option value="2002">2002</option>
                                        <option value="2001">2001</option>
                                        <option value="2000">2000</option>
                                        <option value="1999">1999</option>
                                        <option value="1998">1998</option>
                                        <option value="1997">1997</option>
                                        <option value="1996">1996</option>
                                        <option value="1995">1995</option>
                                        <option value="1994">1994</option>
                                        <option value="1993">1993</option>
                                        <option value="1992">1992</option>
                                        <option value="1991">1991</option>
                                        <option value="1990">1990</option>
                                        <option value="1989">1989</option>
                                        <option value="1988">1988</option>
                                        <option value="1987">1987</option>
                                        <option value="1986">1986</option>
                                        <option value="1985">1985</option>
                                        <option value="1984">1984</option>
                                        <option value="1983">1983</option>
                                        <option value="1982">1982</option>
                                        <option value="1981">1981</option>
                                        <option value="1980">1980</option>
                                        <option value="1979">1979</option>
                                        <option value="1978">1978</option>
                                        <option value="1977">1977</option>
                                        <option value="1976">1976</option>
                                        <option value="1975">1975</option>
                                        <option value="1974">1974</option>
                                        <option value="1973">1973</option>
                                        <option value="1972">1972</option>
                                        <option value="1971">1971</option>
                                        <option value="1970">1970</option>
                                        <option value="1969">1969</option>
                                        <option value="1968">1968</option>
                                        <option value="1967">1967</option>
                                        <option value="1966">1966</option>
                                        <option value="1965">1965</option>
                                        <option value="1964">1964</option>
                                        <option value="1963">1963</option>
                                        <option value="1962">1962</option>
                                        <option value="1961">1961</option>
                                        <option value="1960">1960</option>
                                        <option value="1959">1959</option>
                                        <option value="1958">1958</option>
                                        <option value="1957">1957</option>
                                        <option value="1956">1956</option>
                                        <option value="1955">1955</option>
                                        <option value="1954">1954</option>
                                        <option value="1953">1953</option>
                                        <option value="1952">1952</option>
                                        <option value="1951">1951</option>
                                        <option value="1950">1950</option>
                                        <option value="1949">1949</option>
                                        <option value="1948">1948</option>
                                        <option value="1947">1947</option>
                                        <option value="1946">1946</option>
                                        <option value="1945">1945</option>
                                        <option value="1944">1944</option>
                                        <option value="1943">1943</option>
                                        <option value="1942">1942</option>
                                        <option value="1941">1941</option>
                                        <option value="1940">1940</option>
                                        <option value="1939">1939</option>
                                        <option value="1938">1938</option>
                                        <option value="1937">1937</option>
                                        <option value="1936">1936</option>
                                        <option value="1935">1935</option>
                                        <option value="1934">1934</option>
                                        <option value="1933">1933</option>
                                        <option value="1932">1932</option>
                                        <option value="1931">1931</option>
                                        <option value="1930">1930</option>
                                        <option value="1929">1929</option>
                                        <option value="1928">1928</option>
                                        <option value="1927">1927</option>
                                        <option value="1926">1926</option>
                                        <option value="1925">1925</option>
                                        <option value="1924">1924</option>
                                        <option value="1923">1923</option>
                                        <option value="1922">1922</option>
                                        <option value="1921">1921</option>
                                        <option value="1920">1920</option>
                                        <option value="1919">1919</option>
                                        <option value="1918">1918</option>
                                        <option value="1917">1917</option>
                                        <option value="1916">1916</option>
                                        <option value="1915">1915</option>
                                        <option value="1914">1914</option>
                                        <option value="1913">1913</option>
                                        <option value="1912">1912</option>
                                        <option value="1911">1911</option>
                                        <option value="1910">1910</option>
                                        <option value="1909">1909</option>
                                        <option value="1908">1908</option>
                                        <option value="1907">1907</option>
                                        <option value="1906">1906</option>
                                        <option value="1905">1905</option>
                                        <option value="1904">1904</option>
                                        <option value="1903">1903</option>
                                        <option value="1902">1902</option>
                                        <option value="1901">1901</option>
                                        <option value="1900">1900</option>
                                    </select>
                                    <?php if (form_error("year")): ?>
                                        <span style = 'color: red'><?= form_error("year") ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="gender">Gender</label>
                                <div class="form-group">
                                    <div aling="left">
                                        <input type="radio" name="gender" value="Male"> Male &nbsp;
                                        <input type="radio" name="gender" value="Female"> Female
                                    </div>
                                    <?php if (form_error("gender")): ?>
                                        <span style = 'color: red'><?= form_error("gender") ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
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
