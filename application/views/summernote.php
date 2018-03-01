<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <form role="form" action="" method="POST">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        EMAIL FORM
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label>RECEIPIENT</label>
                            <input type="email" required="" name="receipient" id="receipient" placeholder="Email Address" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label>SUBJECT</label>
                            <input type="text" required="" name="subject" id="subject" placeholder="Email SUBJECT" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label>MESSAGE</label>
                            <textarea name="message" id="message" class="summernote"></textarea>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <input type="submit" id="submitBtn" class="btn btn-success"/>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('.summernote').summernote({
            "height": 200,
            "placeholder": "Email message",
        });

        $('#submitBtn').click(function (e) {
            e.preventDefault();
              swal("Sending...", {
               button: false,
                closeOnClickOutside: false,
              });
            $.ajax({
                "method": "POST",
                "url": "<?= base_url() ?>email/sendmail",
                "dataType": "JSON",
                "data": {
                    "receipient": $("#receipient").val(),
                    "subject": $("#subject").val(),
                    "message": $("#message").val(),
                },
                success: function (res) {
                  if(res.success){
                       $("#receipient").val("");
                       $("#subject").val("");
                       $(".summernote").summernote('reset');
                      swal("Success!", "Email was sent successfully!", "success"); 
                  }else{
                      swal("Attention!", "There was a problem encountered upon sending the email!", "error"); 
                  }
                    
                }
            });

        });



    });


</script>