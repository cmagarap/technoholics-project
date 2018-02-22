<?php

  $content = $this->item_model->fetch("content",  array("content_id" => 1));
$content = $content[0];

$home1 = $content->color_1;
?>
<footer class="footer">
    <div class="container-fluid">
        <div class="copyright pull-left">
        Template made with <i class="fa fa-heart heart"></i> by <a href="http://www.creative-tim.com" target = "_blank">Creative Tim</a>
        </div>
        <div class="copyright pull-right">
            &copy; <?= date("Y"); ?> <img src = "<?= $this->config->base_url() ?>images/icon2.png" width = "9%">TECHNOHOLICS
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
            $.notify({
                icon: 'ti-direction',
                message: "Welcome to <b>Technoholics Admin System</b> where you can manage inventory, orders, sales, etc."
            },{
                type: 'info',
                timer: 4000
            });

        });
    </script>
<?php endif; ?>

<script>
var abc = 0; //Declaring and defining global increement variable
var max_fields = 4;
var counter = 1;

$(document).ready(function() {

//To add new input file field dynamically, on click of "Add More Files" button below function will be executed

    $('#add_more').click(function() {
    if(counter < max_fields){ //max input box allowed
    counter++;
    $(this).before($("<div/>", {id: 'filediv'}).fadeIn('slow').append(
        $("<input/>", {name: 'user_file[]', type: 'file', id: 'file'}),        
        $("<br/>")
        ));
    }
    });

//following function will executes on change event of file input to select different file	
$('body').on('change', '#file', function(){
            if (this.files && this.files[0]) {
                 abc += 1; //increementing global variable by 1
				
				var z = abc - 1;
                var x = $(this).parent().find('#previewimg' + z).remove();
                $(this).before("<div id='abcd"+ abc +"' class='abcd'><img id='previewimg" + abc + "' src=''/></div>");
               
			    var reader = new FileReader();
                reader.onload = imageIsLoaded;
                reader.readAsDataURL(this.files[0]);
               
			    $(this).hide();
                $("#abcd"+ abc).append($("<button>Remove</button>",{id: 'button', alt: 'delete'}).click(function() {
                counter--;
                $(this).parent().parent().remove();
                }));
            }
        });

//To preview image     
    function imageIsLoaded(e) {
        $('#previewimg' + abc).attr('src', e.target.result);
    };

    $('#upload').click(function(e) {
        var name = $(":file").val();
        if (!name)
        {
            alert("First Image Must Be Selected");
            e.preventDefault();
        }
    });
});

$('input[name=search]').keyup(function(){
    var query = $(this).val();
    if(query != '')
    {
        $.ajax({
            url:"<?php echo base_url(); ?>inventory/auto",
            method:"POST",
            data:{query:query},
            success:function(data)
            {
                $('#productlist').fadeIn();
                $('#productlist').html(data);
            }
        });
    }
});

$(document).on('click', '#link', function(){
    $('input[name=search]').val($(this).text());
    $('#productlist').fadeOut();
});

$(document).on('focusout', 'input[name=search]', function(){
    $('#productlist').fadeOut();
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