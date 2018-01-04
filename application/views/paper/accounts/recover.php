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
                        <div align = "left">
                            <h3 class="title"><b>Deleted <?= ucwords($this->uri->segment(3)) ?> List</b></h3>
                            <p class="category"><i>You can recover deleted accounts here.</i></p><br>
                            <a href = "javascript:history.go(-1)" class="btn btn-info btn-fill" style = "background-color: #dc2f54; border-color: #dc2f54; color: white;">Go Back</a>
                        </div>
                    </div>

                    <br>
                    <?php
                    if ($this->uri->segment(3) == "admin") {
                        if (!$users) {
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
                                <?php foreach ($users as $users) { ?>
                                    <tr>
                                        <td><?= $users->admin_id ?></td>
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
                                            if ($users->access_level == 0)
                                                echo "General Manager";
                                            elseif ($users->access_level == 1)
                                                echo "Admin Assistant";
                                            elseif ($users->access_level == 2)
                                                echo "Customer";
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
                                <?php } ?>
                                </tbody>
                            </table>
                            <?php
                            echo "<div align = 'center'>" . $links . "</div>";
                            }
                        } else {
                            redirect("accounts");
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
                    window.location = "<?= $this->config->base_url() ?>accounts/recover_account_exec/admin/" + id;
                } else {
                    swal("The account remained inactive.");
                }
            });
    });
</script>
