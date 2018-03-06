<div class="content"><?php $user = $user[0]; ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-5"></div>
            <div class="col-lg-6 col-md-7">
                <div class="card">
                    <div class="header">
                        <div align = "center">

                            <h4 class="title"><b>Update profile picture</b></h4>
                        </div>
                    </div>
                    <hr>
                    <div class="content">
                        <form action="<?= $this->config->base_url() ?>my_account/change_pic_exec" method = "POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>New Image <span style = "color: red">*</span></label>
                                        <input type="file" class="form-control border-input file" name="new_pic">
                                        <?php if(!validation_errors()):
                                            if ($this->session->flashdata('error') != ''): ?>
                                                <span style = 'color: red'>
                                                    <?php echo $this->session->flashdata('error'); ?>
                                                </span>
                                            <?php endif;
                                        endif; ?>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="text-center">
                                <button type="reset" class="btn btn-danger btn-fill btn-wd" style = "background-color: #F3BB45; border-color: #F3BB45; color: white;" name = "reset">Reset</button>
                                <button type="submit" class="btn btn-info btn-fill btn-wd" style = "background-color: #31bbe0; border-color: #31bbe0; color: white;" name = "enter">Enter</button>
                                <a href = "<?= base_url() ?>my_account" class="btn btn-info btn-fill btn-wd" style = "background-color: #dc2f54; border-color: #dc2f54; color: white;">Go back</a>
                            </div>
                            <br>
                            <div class="clearfix"></div>
                        </form>
                    </div> <!-- content -->
                </div> <!-- div-card -->
            </div> <!-- col-lg-8 col-md-7 -->
        </div> <!-- row -->
    </div> <!-- container fluid -->
</div><!-- content --><?php
/**
 * Created by PhpStorm.
 * User: Sony
 * Date: 3/4/2018
 * Time: 3:05 AM
 */