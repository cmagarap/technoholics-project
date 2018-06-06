<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-md-5"></div>
            <div class="col-lg-4 col-md-7">
                <div class="card">
                    <div class="header">
                        <h4 class="title"><b>Add Promo</b></h4>
                    </div>
                    <hr>
                    <div class="content">
                        <form action = "<?= $this->config->base_url() ?>Settings/edit_promo_exec/<?=$this->uri->segment(3)?>" method = "POST" enctype="multipart/form-data" >
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Promo code<span style = "color: red">*</span></label>
                                        <input type="text" class="form-control border-input" placeholder="Promo Code" name = "promo_code" value = "<?= $promo->promo_code ?>">
                                        <?php if(validation_errors()):
                                        echo "<span style = 'color: red'>" . form_error("promo_code") . "</span>";
                                        endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Promo discount<span style = "color: red">*</span></label>
                                        <input type="number" class="form-control border-input" placeholder="Promo Discount" name = "promo_discount" value = "<?= $promo->promo_discount ?>">
                                        <?php if(validation_errors()):
                                        echo "<span style = 'color: red'>" . form_error("promo_discount") . "</span>";
                                        endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Promo Price condition<span style = "color: red">*</span></label>
                                        <input type="number" class="form-control border-input" placeholder="Promo Price Condition" name = "promo_condition" value = "<?= $promo->promo_condition?>">
                                        <?php if(validation_errors()):
                                        echo "<span style = 'color: red'>" . form_error("promo_condition") . "</span>";
                                        endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Promo end<span style = "color: red">*</span></label>
                                        <input type="text" id="text-calendar" class="calendar form-control border-input file" name="promo_end" placeholder="promo_end" value="<?= date('Y-m-d', $promo->promo_end)?>"/>
                                        <?php if(validation_errors()):
                                        echo "<span style = 'color: red'>" . form_error("promo_end") . "</span>";
                                        endif; ?>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="text-center">
                                <button type="submit" class="btn btn-info btn-fill btn-wd" style = "background-color: #31bbe0; border-color: #31bbe0; color: white;" name = "enter">Enter</button>
                                <a href = "<?= base_url() ?>settings" class="btn btn-info btn-fill btn-wd" style = "background-color: #dc2f54; border-color: #dc2f54; color: white;">Go back</a>
                            </div>
                            <br>
                            <div class="clearfix"></div>
                        </form>
                    </div> <!-- content -->
                </div> <!-- div-card -->
            </div> <!-- col-lg-8 col-md-7 -->
        </div> <!-- row -->
    </div> <!-- container fluid -->
</div><!-- content -->
<script>
    $(function() {
        $('input.calendar').pignoseCalendar({
            format: 'YYYY-MM-DD'
        });
    });
</script>