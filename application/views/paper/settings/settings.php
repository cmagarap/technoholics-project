<?php $counter = $counter1 = $counter2 = $counter3 = 1;
if (isset($_POST['enter'])) {
    $colorpicker = $_POST['colorpicker'];
}
?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h2 class="title"><b>Content Management</b></h2>
                    </div><hr style="margin-bottom: -15px">
                    <div class="content">
                        <form action = "<?= $this->config->base_url() ?>settings/edit_images/" method = "POST" enctype = "multipart/form-data">
                            <div class="col-md-4">
                                <p>Image 1</p>
                                <img class="img-responsive" src="<?= base_url() ?>assets/ordering/img/<?= $content->image_1 ?>">
                                <br>
                                <div id="filediv"><input name="user_file[]" type="file" id="file" class="form-control border-input file"/></div></br>
                                <?php
                                if (validation_errors()):
                                    echo "<span style = 'color: red'>" . form_error("user_file[]") . "</span>";
                                endif;
                                ?>
                            </div>
                            <div class="col-md-4">
                                <p>Image 2</p>
                                <img class="img-responsive" src="<?= base_url() ?>assets/ordering/img/<?= $content->image_2 ?>">
                                <br>
                                <div id="filediv"><input name="user_file[]" type="file" id="file" class="form-control border-input file"/></div><br>
                                <?php
                                if (validation_errors()):
                                    echo "<span style = 'color: red'>" . form_error("user_file[]") . "</span>";
                                endif;
                                ?>
                            </div>
                            <div class="col-md-4">
                                <p>Image 3</p>
                                <img class="img-responsive" src="<?= base_url() ?>assets/ordering/img/<?= $content->image_3 ?>">
                                <br>
                                <div id="filediv"><input name="user_file[]" type="file" id="file" class="form-control border-input file"/></div><br>
                                <?php
                                if (validation_errors()):
                                    echo "<span style = 'color: red'>" . form_error("user_file[]") . "</span>";
                                endif;
                                ?>
                            </div>
                            <hr>
                            <div align = "center">
                                <button type="submit" class="btn btn-info btn-fill btn-wd" style = "background-color: #31bbe0; border-color: #31bbe0; color: white;">Edit Picture Slider</button>
                            </div>
                            <br>
                        </form>
                        <hr>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="header">
                                    <p class="title"><b>Edit Company Logo</b></p><br>
                                </div>
                                <form action = "<?= $this->config->base_url() ?>settings/edit_logo/" method = "POST" enctype = "multipart/form-data">
                                    <div class = "col-md-12">
                                        <img class="img-responsive" src="<?= base_url() ?>assets/ordering/img/<?= $content->company_logo ?>">
                                        <br>
                                        <div id="filediv"><input name="user_file[]" type="file" id="file" class="form-control border-input file"/></div></br>
                                        <?php
                                        if (validation_errors()):
                                            echo "<span style = 'color: red'>" . form_error("user_file[]") . "</span>";
                                        endif;
                                        ?>
                                    </div>
                                    <div align = "center">
                                        <button type="submit" class="btn btn-info btn-fill btn-wd" style = "background-color: #31bbe0; border-color: #31bbe0; color: white;">Edit Company Logo</button>
                                    </div>
                                    <br>
                                </form>
                            </div>
                            <div class="col-md-3">
                                <div class="header">
                                    <p class="title"><b>Edit Company Icon</b></p><br>
                                </div>
                                <form action = "<?= $this->config->base_url() ?>settings/edit_logo_icon/" method = "POST" enctype = "multipart/form-data">
                                    <div align="center">
                                        <img class="img-responsive" src="<?= base_url() ?>assets/ordering/img/<?= $content->logo_icon ?>">
                                    </div>
                                    <br>
                                    <div id="filediv"><input name="user_file[]" type="file" id="file" class="form-control border-input file"/></div><br>
                                    <?php
                                    if (validation_errors()):
                                        echo "<span style = 'color: red'>" . form_error("user_file[]") . "</span>";
                                    endif;
                                    ?>

                                    <div align = "center">
                                        <button type="submit" class="btn btn-info btn-fill btn-wd" style = "background-color: #31bbe0; border-color: #31bbe0; color: white;">Edit Company Icon</button>
                                    </div>
                                    <br>
                                </form>
                            </div>
                            <br>
                            <div class="col-md-3">
                                <p class="title"><b>Edit Heading Color for Admin</b></p>
                                <br>
                                <form action = "<?= $this->config->base_url() ?>settings/add_color_admin"  method = "POST">
                                    <select name="admin_colorpicker" value = "<?= $colorpicker ?>">
                                        <option value="#7bd148" <?php if ($content->color_1 == "#7bd148") echo 'selected'; ?>>Green</option>
                                        <option value="#5484ed" <?php if ($content->color_1 == "#5484ed") echo 'selected'; ?>>Bold blue</option>
                                        <option value="#a4bdfc" <?php if ($content->color_1 == "#a4bdfc") echo 'selected'; ?>>Blue</option>
                                        <option value="#46d6db" <?php if ($content->color_1 == "#46d6db") echo 'selected'; ?>>Turquoise</option>
                                        <option value="#7ae7bf" <?php if ($content->color_1 == "#7ae7bf") echo 'selected'; ?>>Light green</option>
                                        <option value="#51b749" <?php if ($content->color_1 == "#51b749") echo 'selected'; ?>>Bold green</option>
                                        <option value="#fbd75b" <?php if ($content->color_1 == "#fbd75b") echo 'selected'; ?>>Yellow</option>
                                        <option value="#ffb878" <?php if ($content->color_1 == "#ffb878") echo 'selected'; ?>>Orange</option>
                                        <option value="#ff887c" <?php if ($content->color_1 == "#ff887c") echo 'selected'; ?>>Red</option>
                                        <option value="#dc2127" <?php if ($content->color_1 == "#dc2127") echo 'selected'; ?>>Bold red</option>
                                        <option value="#dbadff" <?php if ($content->color_1 == "#dbadff") echo 'selected'; ?>>Purple</option>
                                        <option value="#e1e1e1" <?php if ($content->color_1 == "#e1e1e1") echo 'selected'; ?>>Gray</option>
                                        <option value="#555555" <?php if ($content->color_1 == "#555555") echo 'selected'; ?>>Black</option>
                                    </select>
                                    <button type="submit" class="btn btn-info btn-fill btn-wd" style = "background-color: #31bbe0; border-color: #31bbe0; color: white; margin-left: 20px">Enter</button>
                                </form>

                                <br><br>

                                <p class="title"><b>Edit Heading Color for Customer</b></p>
                                <br>
                                <form action = "<?= $this->config->base_url() ?>settings/add_color_customer"  method = "POST">
                                    <select name="customer_colorpicker" value="<?= $colorpicker ?>">
                                        <option value="#7bd148" <?php if ($content->customer_color1 == "#7bd148") echo 'selected'; ?>>Green</option>
                                        <option value="#5484ed" <?php if ($content->customer_color1 == "#5484ed") echo 'selected'; ?>>Bold blue</option>
                                        <option value="#a4bdfc" <?php if ($content->customer_color1 == "#a4bdfc") echo 'selected'; ?>>Blue</option>
                                        <option value="#46d6db" <?php if ($content->customer_color1 == "#46d6db") echo 'selected'; ?>>Turquoise</option>
                                        <option value="#7ae7bf" <?php if ($content->customer_color1 == "#7ae7bf") echo 'selected'; ?>>Light green</option>
                                        <option value="#51b749" <?php if ($content->customer_color1 == "#51b749") echo 'selected'; ?>>Bold green</option>
                                        <option value="#fbd75b" <?php if ($content->customer_color1 == "#fbd75b") echo 'selected'; ?>>Yellow</option>
                                        <option value="#ffb878" <?php if ($content->customer_color1 == "#ffb878") echo 'selected'; ?>>Orange</option>
                                        <option value="#ff887c" <?php if ($content->customer_color1 == "#ff887c") echo 'selected'; ?>>Red</option>
                                        <option value="#dc2127" <?php if ($content->customer_color1 == "#dc2127") echo 'selected'; ?>>Bold red</option>
                                        <option value="#dbadff" <?php if ($content->customer_color1 == "#dbadff") echo 'selected'; ?>>Purple</option>
                                        <option value="#e1e1e1" <?php if ($content->customer_color1 == "#e1e1e1") echo 'selected'; ?>>Gray</option>
                                        <option value="#555555" <?php if ($content->customer_color1 == "#555555") echo 'selected'; ?>>Black</option>
                                    </select>
                                    <button type="submit" class="btn btn-info btn-fill btn-wd" style = "background-color: #31bbe0; border-color: #31bbe0; color: white; margin-left: 20px">Enter</button>
                                </form>
                            </div>
                            <?php if ($this->session->userdata('type') == 0): ?>
                                <div class="col-md-3">
                                    <p class="title"><b>Backup Database</b></p>
                                    <br>
                                    <a href = "<?= $this->config->base_url() ?>Settings/database_backup" class="btn btn-info btn-fill" style = "background-color: #31bbe0; border-color: #31bbe0; color: white;" title = "Export Database">Generate SQL</a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class = "row">
        <div class = "col-md-12">
            <div class = "col-md-6">
                <div class="card">
                    <div class="header">
                        <h2 class="title"><b>Brands</b></h2>
                        <br>
                        <div align = "left">
                            <a href = "<?= $this->config->base_url() ?>settings/add_brand" class="btn btn-info btn-fill" style="background-color: #31bbe0; border-color: #31bbe0; color: white;" title = "Insert new category">Add Brand</a>
                        </div>
                    </div>
                    <hr>
                    <div class="content table-responsive" style="overflow-y: scroll; height: 200px;">
                        <?php
                        if (!$brand) {
                            echo "<center><h3><hr><br>There are no brands recorded in the database.</h3><br></center><br><br>";
                        } else { ?>
                            <table class="table table-striped">
                                <thead>
                                <th><b>#</b></th>
                                <th><b>Brand Name</b></th>
                                <th><b>Actions</b></th>
                                </thead>
                                <tbody>
                                <?php foreach ($brand as $brand): ?>
                                    <tr>
                                        <td><?= $counter1++ ?></td>
                                        <td><?= $brand->brand_name ?></td>
                                        <td>
                                            <a class="btn btn-warning" href="<?= $this->config->base_url() ?>settings/edit_brand/<?= $brand->brand_id ?>" title = "Edit Brand">
                                                <span class="ti-pencil"></span>
                                            </a>
                                            <a class="btn btn-danger delete_brand" href="#" data-id="<?= $brand->brand_id ?>" title = "Delete Brand">
                                                <span class="ti-trash"></span>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                                </tbody>
                            </table>
                            <?php
                            echo "<div align = 'center'>" . "</div>";
                        }
                        ?>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="header">
                        <h2 class="title"><b>Categories</b></h2>
                        <br>
                        <div align = "left">
                            <a href = "<?= $this->config->base_url() ?>settings/add_category" class="btn btn-info btn-fill" style="background-color: #31bbe0; border-color: #31bbe0; color: white;" title = "Insert new category">Add Category</a>
                        </div>
                    </div>
                    <hr>
                    <div class="content table-responsive" style="overflow-y: scroll; height: 200px;">
                        <?php
                        if (!$category) {
                            echo "<center><h3><hr><br>There are no categories recorded in the database.</h3><br></center><br><br>";
                        } else { ?>
                            <table class="table table-striped">
                                <thead>
                                <th><b>#</b></th>
                                <th><b>Category Name</b></th>
                                <th><b>Actions</b></th>
                                </thead>
                                <tbody>
                                <?php foreach ($category as $category): ?>
                                    <tr>
                                        <td><?= $counter2++ ?></td>
                                        <td><?= $category->category ?></td>
                                        <td>
                                            <a class="btn btn-warning" href="<?= $this->config->base_url() ?>settings/edit_category/<?= $category->category_id ?>" title = "Edit Category">
                                                <span class="ti-pencil"></span>
                                            </a>
                                            <a class="btn btn-danger delete_category" href="#" data-id="<?= $category->category_id ?>" title = "Delete Category">
                                                <span class="ti-trash"></span>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                                </tbody>
                            </table>
                            <?php
                            echo "<div align = 'center'>" . "</div>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-6">
                <div class="card">
                    <div class="header">
                        <h2 class="title"><b>Shippers</b></h2>
                        <br>
                        <div align = "left">
                            <a href = "<?= $this->config->base_url() ?>settings/add_shipper" class="btn btn-info btn-fill" style="background-color: #31bbe0; border-color: #31bbe0; color: white;" title="Insert new shipper">Add Shipper</a>
                        </div>
                    </div>
                    <hr>
                    <div class="content table-responsive" style="overflow-y: scroll; height: 200px;">
                        <?php
                        if (!$shipper) {
                            echo "<center><h3><hr><br>There are no shippers recorded in the database.</h3><br></center><br><br>";
                        } else { ?>
                            <table class="table table-striped">
                                <thead>
                                <th><b>#</b></th>
                                <th><b>Shipper Name</b></th>
                                <th><b>Actions</b></th>
                                </thead>
                                <tbody>
                                <?php foreach ($shipper as $shipper): ?>
                                    <tr>
                                        <td><?= $counter3++ ?></td>
                                        <td><?= $shipper->shipper_name ?></td>
                                        <td>
                                            <a class="btn btn-warning" href="<?= $this->config->base_url() ?>Settings/edit_shipper/<?= $shipper->shipper_id ?>" title = "Edit Shipper" alt = "Edit Shipper">
                                                <span class="ti-pencil"></span>
                                            </a>
                                            <a class="btn btn-danger delete_shipper" href="#" data-id="<?= $shipper->shipper_id ?>" title = "Delete Category" alt = "Delete Category">
                                                <span class="ti-trash"></span>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                                </tbody>
                            </table>
                            <?php
                            echo "<div align = 'center'>" . "</div>";
                        } ?>
                    </div>
                </div>
            </div>

            <div class = "col-md-6">
                <div class ="card">
                    <div class="header">
                        <h2 class="title"><b>Suppliers</b></h2>
                        <br>
                        <div align = "left">
                            <a href = "<?= $this->config->base_url() ?>settings/add_supplier" class="btn btn-info btn-fill" style="background-color: #31bbe0; border-color: #31bbe0; color: white;" title = "Insert new supplier">Add Supplier</a>
                        </div>
                    </div>
                    <hr>
                    <div class="content table-responsive" style="overflow-y: scroll; height: 200px;">
                        <?php
                        if (!$supplier) {
                            echo "<center><h3><hr><br>There are no products recorded in the database.</h3><br></center><br><br>";
                        } else { ?>
                            <table class="table table-striped">
                                <thead>
                                <th><b>#</b></th>
                                <th><b>Supplier Name</b></th>
                                <th><b>Actions</b></th>
                                </thead>
                                <tbody>
                                <?php foreach ($supplier as $supplier): ?>
                                    <tr>
                                        <td><?= $counter++ ?></td>
                                        <td><?= $supplier->company_name ?></td>
                                        </td>
                                        <td>
                                            <a class="btn btn-warning" href="<?= $this->config->base_url() ?>Settings/edit_supplier/<?= $supplier->supplier_id ?>" title = "Edit Supplier" alt = "Edit Supplier">
                                                <span class="ti-pencil"></span>
                                            </a>
                                            <a class="btn btn-danger delete_supplier" href="#" data-id="<?= $supplier->supplier_id ?>" title = "Delete Supplier" alt = "Delete Supplier">
                                                <span class="ti-trash"></span>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                                </tbody>
                            </table>
                            <?php
                            echo "<div align = 'center'>" . "</div>";
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(".delete_category").click(function () {
        var id = $(this).data('id');

        swal({
            title: "Are you sure you want to delete this brand?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    window.location = "<?= $this->config->base_url() ?>settings/delete_category/" + id;
                } else {
                    swal("The brand is safe!");
                }
            });
    });
</script>

<script>
    $(".delete_brand").click(function () {
        var id = $(this).data('id');

        swal({
            title: "Are you sure you want to delete this category?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    window.location = "<?= $this->config->base_url() ?>settings/delete_brand/" + id;
                } else {
                    swal("The category is safe!");
                }
            });
    });
</script>

<script>
    $(".delete_supplier").click(function () {
        var id = $(this).data('id');

        swal({
            title: "Are you sure you want to delete this shipper?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    window.location = "<?= $this->config->base_url() ?>settings/delete_supplier/" + id;
                } else {
                    swal("The shipper is safe!");
                }
            });
    });
</script>

<script>
    $(".delete_shipper").click(function () {
        var id = $(this).data('id');

        swal({
            title: "Are you sure you want to delete this supplier?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    window.location = "<?= $this->config->base_url() ?>settings/delete_shipper/" + id;
                } else {
                    swal("The supplier is safe!");
                }
            });
    });
</script>
<script src="<?= $this->config->base_url() ?>assets/paper/js/jquery.simplecolorpicker.js" ></script>
<script>
    $('select[name="admin_colorpicker"]').simplecolorpicker({
        picker: true,
        theme: 'fontawesome'
    });
</script>
<script>
    $('select[name="customer_colorpicker"]').simplecolorpicker({
        picker: true,
        theme: 'fontawesome'
    });
</script>