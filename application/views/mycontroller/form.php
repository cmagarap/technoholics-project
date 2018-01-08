<div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="panel panel-info">
                <div class="panel-heading">
                    FORM
                </div>
                <div class="panel-body">
                    <form class="form" action="<?=$this->config->base_url()?>mycontroller/formsubmit" method="POST">
                        <div class="form-group">
                            <label>VALUE</label>
                            <input type="text" class="form-control" name="val"/>
                        </div>
                        <input type="submit" class="btn btn-info" />
                        <input type="reset" class="btn btn-danger pull-right"/>  
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>
</div>
