<div class="content">
    <div class="container-fluid">
        <div align = "right">
            <input type="text" name="search" class = "search" placeholder="Search account...">
            <!--<a href = "$this->config->base_url()inventory/search/" title = "Go"><i class="btn btn-info ti-search"></i></a>-->
            <!--<button type="submit" class = "search"><i class="fa ti-search" style="color: #31bbe0"></i></button>-->
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="card" style = "padding: 30px">
                    <div class="header">
                        <h3 class="title"><b>List of Users</b></h3>
                        <p class="category">Here is a subtitle for this table</p>
                        <br>
                        <a href = "<?= $this->config->base_url() ?>accounts/add_account" class="btn btn-info btn-fill" style="background-color: #31bbe0; border-color: #31bbe0; color: white;" title = "Add new user">New Account</a>
                        <a href = "<?= $this->config->base_url() ?>accounts/recover_account" class="btn btn-info btn-fill" style = "background-color: #31bbe0; border-color: #31bbe0; color: white;" title = "View Deactivated Accounts">Recover Users</a>
                    </div>
                    <br>
                    <?php if(!$users) {
                        echo "<center><h3><hr><br>There are no users exist in the database.</h3><br></center><br><br>";
                    } else {
                    ?>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-striped">
                            <thead>
                            <th><b>#</b></th>
                            <th><b>Username</b></th>
                            <th><b>Full Name</b></th>
                            <th><b>Email Address</b></th>
                            <th><b>User Type</b></th>
                            <th><b>Actions</b></th>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($users as $users):?>
                                <tr>
                                    <td><?= $users->user_id ?></td>
                                    <td>
                                        <?php
                                        if($users->username == NULL) echo "<i style = 'color: red'>NULL</i>";
                                        else echo $users->username;
                                        ?>
                                    </td>
                                    <td><?php echo $users->lastname . ", " . $users->firstname ?></td>
                                    <td><?= $users->email ?></td>
                                    <td>
                                        <?php
                                        if($users->access_level == 0) echo "General Manager";
                                        elseif($users->access_level == 1) echo "Admin Assistant";
                                        elseif($users->access_level == 2) echo "Customer";
                                        ?>
                                    </td>
                                    <td>
                                        <a class="btn btn-success" href="<?= $this->config->base_url() ?>accounts/view/<?= $users->user_id ?>" title = "View Account Info" alt = "View Account Info">
                                            <span class="ti-eye"></span>
                                        </a>
                                        <a class="btn btn-warning" href="<?= $this->config->base_url() ?>accounts/edit/<?= $users->user_id ?>" title = "Manage Account" alt = "Edit Account">
                                            <span class="ti-pencil"></span>
                                        </a>
                                        <a class="btn btn-danger delete" href="#" data-id="<?= $users->user_id ?>" title = "Delete Product" alt = "Delete User">
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
                        window.location = "<?= base_url() ?>account/delete/" + id;
                    } else {
                        swal("The account is safe!");
                    }
                });
        });
    </script>