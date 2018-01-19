<footer class="footer">
    <div class="container-fluid">
        <nav class="pull-left">
            <ul>
                <li>
                    <!-- Kung ano anong stuff -->
                </li>
                <li>

                </li>
                <li>

                </li>
            </ul>
        </nav>
        <div class="copyright pull-right">
            &copy; <script>document.write(new Date().getFullYear())</script> <img src = "<?= $this->config->base_url() ?>images/icon2.png" width = "9%">TECHNOHOLICS
        </div>
    </div>
</footer>

</body>
<!--
<script src="assets/js/jquery-1.11.1.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/bootstrap-datepicker.js"></script>
<script src="assets/js/custom.js"></script>
-->

<!--   Core JS Files   -->
<!-- Notification popup will only display on the Dashboard page -->
<?php if ($heading == "Dashboard"): ?>
    <script type="text/javascript">
        $(document).ready(function(){

            demo.initChartist();

            $.notify({
                icon: 'ti-direction',
                message: "Welcome to <b>Technoholics Admin System</b> - a beautiful Bootstrap freebie for your next project."
            },{
                type: 'info',
                timer: 4000
            });

        });
    </script>
<?php endif; ?>

<script>
$(document).ready(function() {
    var max_fields      = 4; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div><input type="file" class="form-control border-input file" name ="user_file[]"><a href="#" class="remove_field">Remove</a></div>'); //add input box
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});
    NProgress.configure({ showSpinner: false });
    
    NProgress.start();  

    var interval = setInterval(function() { NProgress.inc(); }, 1000);        

    jQuery(window).load(function () {
        clearInterval(interval);
        NProgress.done();
    });

    jQuery(window).unload(function () {
        NProgress.start();
    });
    
</script>

</html>