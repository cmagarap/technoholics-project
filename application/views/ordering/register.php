<div id="all">
    <div id="content">
        <div class="container">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="#">Home</a>
                    </li>
                    <li>New account / Sign in</li>
                </ul>
            </div>
            <div class="col-md-6">
                <div class="box">
                    <h1>New account</h1>
                    <p class="lead" style = "display: inline">Not our registered customer yet? </p>
                    <p class="text-muted" style = "display: inline"> Sign Up now.</p>
                    <br><br>
                    <p class="text-muted">If you have any questions, please feel free to <a href="<?= base_url().'home/contact'; ?>">contact us</a>, our customer service center is working for you 24/7.</p>
                    <hr>
                    <?php
                    if($_POST) {
                        $lastname = $_POST['lastname'];
                        $firstname = $_POST['firstname'];
                        $address = $_POST['address'];
                        $email = $_POST['email'];
                        $password = $_POST['password'];
                        $confirm_password = $_POST['confirm_password'];
                    }
                    else {
                        $lastname = "";
                        $firstname = "";
                        $address = "";
                        $email = "";
                        $password = "";
                        $confirm_password = "";
                    }
                    ?>
                    <form action="<?= base_url().'register/register_submit'; ?>" method="post">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="lastname">Last name</label>
                                <?php if(form_error("lastname")): ?>
                                    <input type="text" class="form-control" name="lastname" value = "<?= $lastname; ?>" style = "border-color: red">
                                    <span style = 'color: red'><?= form_error("lastname") ?></span>
                                <?php else: ?>
                                    <input type="text" class="form-control" name="lastname" value = "<?= $lastname; ?>">
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="firstname">First name</label>
                                <?php if(form_error("firstname")): ?>
                                    <input type="text" class="form-control" name="firstname" value = "<?= $firstname; ?>" style = "border-color: red">
                                    <span style = 'color: red'><?= form_error("firstname") ?></span>
                                <?php else: ?>
                                    <input type="text" class="form-control" name="firstname" value = "<?= $firstname; ?>">
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="address">Complete Address</label>
                                <?php if(form_error("address")): ?>
                                    <input type="text" class="form-control" name="address" value = "<?= $address; ?>" style = "border-color: red">
                                    <span style = 'color: red'><?= form_error("address") ?></span>
                                <?php else: ?>
                                    <input type="text" class="form-control" name="address" value = "<?= $address; ?>">
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="address">Detailed Address</label>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                               <select class="form-control" name="province" <?php if(form_error("province")){ echo 'style = "border-color: red"'; }?> >
                                <option value="" disabled selected>Province</option>
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
                            <?php if(form_error("province")): ?>
                             <span style = 'color: red'><?= form_error("province") ?></span>
                         <?php endif; ?>
                     </div>
                 </div>
                 <div class="col-md-4">
                    <div class="form-group">
                       <select class="form-control" name="city" <?php if(form_error("city")){ echo 'style = "border-color: red"'; }?> >
                        <option value="" disabled selected>City</option>
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
                    <?php if(form_error("city")): ?>
                       <span style = 'color: red'><?= form_error("city") ?></span>
                   <?php endif; ?>
               </div>
           </div>
           <div class="col-md-4">
            <div class="form-group">
             <select class="form-control" name="barangay" <?php if(form_error("barangay")){ echo 'style = "border-color: red"'; }?> >
                <option value="" disabled selected>Barangay</option>
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
            <?php if(form_error("barangay")): ?>
             <span style = 'color: red'><?= form_error("barangay") ?></span>
         <?php endif; ?>
     </div>
 </div>
 <div class="col-md-6">
    <div class="form-group">
        <label for="contact">Contact Number</label>
        <?php if(form_error("contact")): ?>
            <input type="number" class="form-control" name="contact" style = "border-color: red">
            <span style = 'color: red'><?= form_error("contact") ?></span>
        <?php else: ?>
            <input type="number" class="form-control" name="contact">
        <?php endif; ?>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label for="contact">Zip</label>
        <?php if(form_error("zip")): ?>
            <input type="number" class="form-control" name="zip" style = "border-color: red">
            <span style = 'color: red'><?= form_error("zip") ?></span>
        <?php else: ?>
            <input type="number" class="form-control" name="zip">
        <?php endif; ?>
    </div>
</div>
<div class="col-md-12">
    <div class="form-group">
        <label for="email">Email</label>
        <?php if(form_error("email")): ?>
            <input type="text" class="form-control" name="email" value = "<?= $email; ?>" style = "border-color: red">
            <span style = 'color: red'><?= form_error("email") ?></span>
        <?php else: ?>
            <input type="text" class="form-control" name="email" value = "<?= $email; ?>">
        <?php endif; ?>
    </div>
</div>
<div class="col-md-12">
    <div class="form-group">
        <label for="password">Password</label>
        <?php if(form_error("password")): ?>
            <input type="password" class="form-control" name="password" value = "<?= $password; ?>" style = "border-color: red">
            <span style = 'color: red'><?= form_error("password") ?></span>
        <?php else: ?>
            <input type="password" class="form-control" name="password" value = "<?= $password; ?>">
        <?php endif; ?>
    </div>
</div>
<div class="col-md-12">
    <div class="form-group">
        <label for="confirm_password">Confirm Password</label>
        <?php if(form_error("confirm_password")): ?>
            <input type="password" class="form-control" name="confirm_password" value = "<?= $confirm_password; ?>" style = "border-color: red">
            <span style = 'color: red'><?= form_error("confirm_password") ?></span>
        <?php else: ?>
            <input type="password" class="form-control" name="confirm_password" value = "<?= $confirm_password; ?>">
        <?php endif; ?>
    </div>
</div>
<div class="col-md-12">
    <label for="address">Birthdate</label>
</div>
<div class="col-md-4">
    <div class="form-group">
        <select class="form-control" name="month" <?php if(form_error("month")){ echo 'style = "border-color: red"'; }?> >
         <option value="" selected="selected">Month</option>
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
     <?php if(form_error("month")): ?>
         <span style = 'color: red'><?= form_error("month") ?></span>
     <?php endif; ?>
 </div>
</div>
<div class="col-md-4">
    <div class="form-group">
        <select class="form-control" name="day" <?php if(form_error("day")){ echo 'style = "border-color: red"'; }?> >
            <option value="" selected="selected">Day</option>
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
        <?php if(form_error("day")): ?>
         <span style = 'color: red'><?= form_error("day") ?></span>
     <?php endif; ?>
 </div>
</div>
<div class="col-md-4">
    <div class="form-group">
        <select class="form-control" name="year" <?php if(form_error("year")){ echo 'style = "border-color: red"'; }?> >
            <option value="" selected="selected">Year</option>
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
        <?php if(form_error("year")): ?>
         <span style = 'color: red'><?= form_error("year") ?></span>
     <?php endif; ?>
 </div>
</div>
<div class="col-md-12">
    <label for="confirm_password">Gender</label>
    <div class="form-group">
        <div class="row">
            <div class="col-md-2">
                <input type="radio" name="gender" value="Male"> Male
            </div>
            <input type="radio" name="gender" value="Female"> Female
        </div>
        <?php if(form_error("gender")): ?>
         <span style = 'color: red'><?= form_error("gender") ?></span>
     <?php endif; ?>
 </div>
</div>
<div class="col-md-12">
    <div class="form-group" align="center">
        <?= $script ?>
        <?= $widget ?>
        <?php if(form_error("g-recaptcha-response")): ?>
         <span style = 'color: red'><?= form_error("g-recaptcha-response") ?></span>
     <?php endif; ?>
 </div>
</div>
<div class="text-center">
    <button type="submit" class="btn btn-primary"><i class="fa fa-user-md"></i> Register</button>
</div>
</form>
</div>
</div>
<div class="col-md-6">
    <div class="box">
        <h1>Login</h1>
        <p class="lead" style = "display: inline">Already a member? </p>
        <p class="text-muted" style = "display: inline">Sign in now and start shopping.</p>
        <hr>
        <a href = "<?= base_url().'login'; ?>" class="btn btn-primary"><i class="fa fa-sign-in"></i> Log in</a>
    </div>
</div>
</div> <!-- /.container -->
    </div> <!-- /#content -->