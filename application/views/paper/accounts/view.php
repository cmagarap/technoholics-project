<?php $account = $account[0]; ?>

<?php
//$items = $this->apriori->getAssociationRules();
//foreach($items as $item) {
//    //foreach ($item as $i) {
//        #echo var_dump(array_keys($item)) . "<br>";
//    //}
//    $new[] = array_keys($item);
//}
?>
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
                        <table>
                            <tr>
                                <th width="140px"><p style="font-size: 14px"><b>Email Address:</b></p></th>
                                <td><p style="font-size: 14px"><?= $account->email ?></p></td>
                            </tr>
                            <tr>
                                <th><p style="font-size: 14px"><b>Address:</b></p></th>
                                <td><p style="font-size: 14px"><?= "$account->complete_address, $account->barangay, $account->city_municipality, $account->province" ?></p></td>
                            </tr>
                            <tr>
                                <th><p style="font-size: 14px"><b>Age:</b></p></th>
                                <td><p style="font-size: 14px"><?= $account->age ?></p></td>
                            </tr>
                            <tr>
                                <th><p style="font-size: 14px"><b>Gender:</b></p></th>
                                <td><p style="font-size: 14px"><?= $account->gender ?></p></td>
                            </tr>
                            <tr>
                                <th><p style="font-size: 14px"><b>Birthdate:</b></p></th>
                                <td><p style="font-size: 14px"><?= date('F j, Y', $account->birthdate) ?></p></td>
                            </tr>
                            <tr>
                                <th><p style="font-size: 14px"><b>Contact No.:</b></p></th>
                                <td><p style="font-size: 14px"><?= $account->contact_no ?></p></td>
                            </tr>
                        </table>
                    </div>

                    <hr>
                    <div class="text-center">
                        <div class="row">
                            <div class="col-xs-3 col-xs-offset-1">
                                <h5><?= $rated ?><br /><small>Rated products</small></h5>
                            </div>
                            <div class="col-xs-4">
                                <h5>&#8369; <?= number_format($spent->total_price, 2) ?><br /><small>Spent</small></h5>
                            </div>
                            <div class="col-xs-3">
                                <h5><?php if ($bought->order_quantity == '')
                                echo '0';
                                elseif ($bought->order_quantity != '')
                                    echo $bought->order_quantity;
                                ?><br /><small>Items bought</small></h5>
                            </div>
                        </div>
                        <hr>
                        <br>
                        <div class="row">
                            <a href = "<?= $this->config->base_url() ?>accounts/view_transactions/<?= $account->customer_id ?>/page" class="btn btn-info btn-fill" style="background-color: #31bbe0; border-color: #31bbe0; color: white;">View transactions</a>
                            <a href = "<?= $this->config->base_url() ?>accounts/customer" class="btn btn-info btn-fill btn-wd" style = "background-color: #dc2f54; border-color: #dc2f54; color: white;">Go back</a>
                        </div>
                        <br>
                    </div>
                </div>

                <div class="card">
                    <div class="header">
                        <h4 class="title"><b>Previous Actions</b></h4>
                        <?php
                        if ($at_date) {
                            $overflow = 'style = "overflow-y: scroll; height: 200px;"';
                            ?>
                            <p class="category">
                                <i class="ti-reload" style = "font-size: 12px;"></i> As of <?= date("F j, Y h:i A", $at_date->at_date); ?>
                            </p><hr style = 'margin: 5px'>
                            <?php } else {
                                $overflow = '';
                            } ?>
                        </div>
                        <div class="content" <?= $overflow; ?>>
                            <ul class="list-unstyled team-members">
                                <?php
                                if ($logs) {
                                    foreach ($logs as $logs) {
                                        ?>
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
                                    } else {
                                        ?>
                                        <div align="center">
                                            <br><i>There are no transactions recorded for this user.</i><br><br>
                                        </div>
                                        <?php } ?>
                                    </ul>
                                </div> <!-- content -->
                            </div> <!-- card -->
                        </div>
                        <?php
                        if(isset($_POST['enter'])) {
                            $sup = $this->input->post('support');
                            $conf = $this->input->post('confidence');
                            $basis = $this->input->post('basis');
                        } else {
                            $sup = 2;
                            $conf = 100;
                            $basis = 'Purchase';
                        }
                        ?>
                        <div class="col-lg-7 col-sm-5">
                            <div class="card card-user">
                                <div class="header">
                                    <h2 class="title" style = "margin-bottom: 10px"><i class="ti-user"></i><b> &nbsp;Customer Analysis</b></h2>
                                    <p class="category">
                                        <i class="ti-reload" style = "font-size: 12px;"></i> As of <?= date("F j, Y h:i A"); ?>
                                    </p><hr style = 'margin: 5px'>
                                </div>
                                <div class="content">
                                    <h3 style="color: #31bbe0; margin-bottom: 0px">Set Rules for Apriori</h3>
                                    <form role="form" method="post">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Minimum Support <span style = "color: red">*</span></label>
                                                    <input type="number" class="form-control border-input" placeholder="" name="support" value="<?= $sup ?>" min="1" max="10"><?php
                                                    if (validation_errors()):
                                                        echo "<span style = 'color: red'>" . form_error("support") . "</span>";
                                                    endif;
                                                    ?>

                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Minimum Confidence <span style = "color: red">*</span></label>
                                                    <select name="confidence" class = "form-control border-input file">
                                                        <option value="100" <?php if($conf == 100) echo 'selected'; ?>>100%</option>
                                                        <option value="75" <?php if($conf == 75) echo 'selected'; ?>>75%</option>
                                                        <option value="50" <?php if($conf == 50) echo 'selected'; ?>>50%</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Based on <span style="color: red">*</span></label>
                                                    <select name="basis" class="form-control border-input file">
                                                        <option value="Purchase" <?php if($basis == 'Purchase') echo 'selected'; ?>>Purchased Items</option>
                                                        <option value="Viewed" <?php if($basis == 'Viewed') echo 'selected'; ?>>Viewed Items</option>
                                                        <option value="Search" <?php if($basis == 'Search') echo 'selected'; ?>>Searched Items</option>
                                                        <option value="Product Rating" <?php if($basis == 'Product Rating') echo 'selected'; ?>>Rated Items</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4"></div>
                                            <div class="col-md-5">
                                                <button type="submit" class="btn btn-info btn-fill" style="background-color: #31bbe0; border-color: #31bbe0; color: white; width: 83%" name="enter">Enter</button>
                                            </div>
                                        </div>
                                    </form>
                                    <hr>
                                    <?php if (!$message) { ?>
                                    <h3 style = "color: #31bbe0; margin-bottom: 0px">Frequent Itemsets</h3>
                                    <p class="category">Most frequent products involved in multiple record of transactions.</p><br>
                                    <div class="content table-responsive table-full-width">
                                        <table class="table table-striped">
                                            <thead>
                                                <th>Products</th>
                                                <th>Support</th>
                                            </thead>
                                            <tbody>
                                                <?= $this->apriori->printFreqItemsets(); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <hr>
                                    <h3 style = "color: #31bbe0; margin-bottom: 0px">Association Rules</h3>
                                    <p class="category">If-then statements used to uncover relationships between the products.</p><br>

                                    <div class="content table-responsive table-full-width" style="margin-top: 0px;">
                                        <table class="table table-striped">
                                            <thead>
                                                <th>Products</th>
                                                <th>Confidence Lvl.</th>
                                            </thead>
                                            <tbody>
                                                <?= $this->apriori->printAssociationRules(); ?>
                                            </tbody>
                                        </table>
                                    </div>

                                    <?php
                                } else {
                                    echo '<div align="center"><br><i>';
                                    echo $message;
                                    echo '</i></div><br>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- container fluid -->
        </div>