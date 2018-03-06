<div class="content">
    <div class="container-fluid">
        <div align = "right">
            <form action ="<?= base_url() . 'accounts/recover_customer_search'; ?>" method = "POST">
                <div class="input-group">
                    <input type="text" name="search" class = "search" placeholder="Search account...">
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
                        <div align = "left">
                            <h2 class="title"><b>Deleted Customer List</b></h2>
                            <p class="category">You can recover deleted accounts here.</p><br>
                            <a href = "<?= base_url() ?>accounts/customer" class="btn btn-info btn-fill" style = "background-color: #dc2f54; border-color: #dc2f54; color: white;">Go Back</a>
                        </div>
                    </div>

                    <br>
                    <?php
                    if (!$users) {
                        echo "<center><h3><hr><br>There are no deleted accounts recorded in the database.</h3><br></center><br><br>";
                    } else {
                        ?>
                        <div class="content table-responsive table-full-width">
                            <table class="table table-striped">
                                <thead>
                                    <th><b>#</b></th>
                                    <th colspan="2"><b>Username</b></th>
                                    <th><b>Full Name</b></th>
                                    <th><b>Email Address</b></th>
                                    <th><b>Contact No.</b></th>
                                    <th><b>Actions</b></th>
                                </thead>
                                <tbody>
                                    <?php foreach ($users as $users) { ?>
                                    <tr>
                                        <td><?= $users->customer_id ?></td>

                                        <?php $user_image = (string)$users->image;
                                        $image_array = explode(".", $user_image); ?>

                                        <td align="center"><img class="avatar border-white" src="<?= $this->config->base_url() ?>uploads_users/<?= $image_array[0] . "_thumb." . $image_array[1]; ?>" alt="admin-user" title="<?= $users->firstname . " " . $users->lastname ?>"></td>

                                        <td>
                                            <?php
                                            if ($users->username == NULL)
                                                echo "<i style = 'color: #CCCCCC  '>NULL</i>";
                                            else
                                                echo $users->username;
                                            ?>
                                        </td>
                                        <td><?php echo $users->lastname . ", " . $users->firstname ?></td>
                                        <td><?= $users->email ?></td>
                                        <td>
                                            <?php
                                            if($users->contact_no == NULL) echo "<i style = 'color: #CCCCCC'>NULL</i>";
                                                else echo $users->contact_no;
                                                ?>
                                            </td>
                                            <td>
                                                <a class="btn btn-success" href="<?= $this->config->base_url() ?>accounts/view/<?= $users->customer_id ?>" title = "View Account Info" alt = "View Account Info">
                                                    <span class="ti-eye"></span>
                                                </a>
                                                <a class="btn btn-warning" href="<?= $this->config->base_url() ?>accounts/edit/<?= $users->customer_id ?>" title = "Manage Account" alt = "Edit Account">
                                                    <span class="ti-pencil"></span>
                                                </a>
                                                <a class="btn btn-danger recover" href="#" data-id="<?= $users->customer_id ?>" title = "Recover Account" alt = "Reactivate this Account" style = "color: #7ace4c; background: white; border-color: #7ace4c">
                                                    <span class="ti-back-left"></span>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <?php
                                echo "<div align = 'center'>" . $links . "</div>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(".recover").click(function () {
            var id = $(this).data('id');

            swal({
                title: "Reactivate this account?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location = "<?= $this->config->base_url() ?>accounts/recover_customer_exec/" + id;
                } else {
                    swal("The account remained inactive.");
                }
            });
        });
    </script>
