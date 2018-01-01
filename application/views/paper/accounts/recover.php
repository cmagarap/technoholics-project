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
                        <div align = "left">
                            <h3 class="title"><b>Deleted Accounts List</b></h3>
                            <p class="category"><i>You can recover deleted accounts here.</i></p><br>
                            <a href = "<?= site_url('accounts/page'); ?>" class="btn btn-info btn-fill" style = "background-color: #dc2f54; border-color: #dc2f54; color: white;">Go Back</a>
                        </div>
                    </div>

                    <br>
                    <?php if(!$users) {
                        echo "<center><h3><hr><br>There are no deleted accounts recorded in the database.</h3><br></center><br><br>";
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
                                    <td><?= $users->admin_id ?></td>
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
                                        <a class="btn btn-success" href="<?= $this->config->base_url() ?>accounts/view/<?= $users->admin_id ?>" title = "View Account Info" alt = "View Account Info">
                                            <span class="ti-eye"></span>
                                        </a>
                                        <a class="btn btn-warning" href="<?= $this->config->base_url() ?>accounts/edit/<?= $users->admin_id ?>" title = "Manage Account" alt = "Edit Account">
                                            <span class="ti-pencil"></span>
                                        </a>
                                        <a class="btn btn-danger recover" href="#" data-id="<?= $users->admin_id ?>" title = "Recover Account" alt = "Reactivate this Account" style = "color: #7ace4c; background: white; border-color: #7ace4c">
                                            <span class="ti-back-left"></span>
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
    <!--<div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                </div>
                <div class="modal-body">
                    <p>This is a large modal.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>-->

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
                        window.location = "<?= $this->config->base_url() ?>accounts/recover_account_exec/admin/" + id;
                    } else {
                        swal("The account remained inactive.");
                    }
                });
        });
    </script>
