<div class="content">
    <div class="container-fluid">
        <div align = "right">
            <form action = "" method = "POST">
                <div class="input-group">
                    <input type="text" name="search" class = "search" placeholder="Search customer...">
                    <div class="input-group-btn">
                        <button class="btn btn-default" type = "submit" style = "border-color: #ccc">
                            <i class="ti-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="card" style = "padding: 30px">
                    <div class="header">
                        <h2 class="title"><b>List of Customers</b></h2>
                        <?php if($this->session->userdata('type') == 0) { ?>
                            <p class="category">For admin accounts,
                                <a href = "<?= $this->config->base_url() ?>accounts/admin">click here</a>.<br>
                                <a href="<?= base_url() ?>reports/product_preference"> <u>See customers' product preference.</u></a>
                        <?php } elseif($this->session->userdata('type') == 1) { ?>
                            <p class="category">Here are the list of customers as of <?= date("F j, Y"); ?>.</p>
                            <a href="<?= base_url() ?>reports/product_preference"> <u>See customers' product preference.</u></a>
                        <?php } ?>
                        </p>
                        <br>
                        <a href = "<?= $this->config->base_url() ?>accounts/recover_account/customer" class="btn btn-info btn-fill" style = "background-color: #31bbe0; border-color: #31bbe0; color: white;" title = "View Deactivated Customer Accounts">Recover Users</a>
                    </div>
                    <br>
                    <?php if(!$users) {
                        echo "<center><h3><hr><br>There are no customers exist in the database.</h3><br></center><br><br>";
                    } else {
                    ?>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-striped">
                            <thead>
                            <th><b>#</b></th>
                            <th colspan="2"><b>Username</b></th>
                            <th><b>Full Name</b></th>
                            <th><b>Email Address</b></th>
                            <th><b>Contact no.</b></th>
                            <th><b>Actions</b></th>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($users as $users):?>
                                <tr>
                                    <td><?= $users->customer_id ?></td>

                                    <?php $user_image = (string)$users->image;
                                    $image_array = explode(".", $user_image); ?>

                                    <td align="center"><img class="avatar border-white" src="<?= $this->config->base_url() ?>uploads_users/<?= $image_array[0] . "_thumb." . $image_array[1]; ?>" alt="admin-user" title="<?= $users->firstname . " " . $users->lastname ?>"></td>
                                    <td>
                                        <?php
                                        if($users->username == NULL) {
                                            echo "<i style = 'color: #CCCCCC'>NULL</i>";
                                        } else {
                                            echo $users->username;
                                        }
                                        ?>
                                    </td>
                                    <td><?= $users->lastname . ", " . $users->firstname ?></td>
                                    <td><?= $users->email ?></td>
                                    <td>
                                        <?php
                                        if($users->contact_no == NULL) echo "<i style = 'color: #CCCCCC'>NULL</i>";
                                        else echo $users->contact_no;
                                        ?>
                                    </td>
                                    <td>
                                        <a class="btn btn-success" href="<?= $this->config->base_url() ?>accounts/view/customer/<?= $users->customer_id ?>" title = "View Product Info" alt = "View Account Info">
                                            <span class="ti-eye"></span>
                                        </a>
                                        <a class="btn btn-warning" href="<?= $this->config->base_url() ?>accounts/edit/customer/<?= $users->customer_id ?>" title = "Edit Product" alt = "Edit Account">
                                            <span class="ti-pencil"></span>
                                        </a>
                                        <a class="btn btn-danger delete" href="#" data-id="<?= $users->customer_id ?>" title = "Delete Account" alt = "Delete Product">
                                            <span class="ti-trash"></span>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                        <?php #echo "<div align = 'center'>" . $links . "</div>";
                        echo '</div>';
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(".delete").click(function () {
            var id = $(this).data('id');

            swal({
                title: "Are you sure you want to delete this account?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location = "<?= base_url() ?>accounts/delete/customer/" + id;
                    } else {
                        swal("The account is safe!");
                    }
                });
        });
    </script>