<footer class="footer">
    <div class="container-fluid">
        <nav class="pull-left">
            <ul>
                <li>
                    <a href="http://www.creative-tim.com">
                        Creative Tim
                    </a>
                </li>
                <li>
                    <a href="http://blog.creative-tim.com">
                        Blog
                    </a>
                </li>
                <li>
                    <a href="http://www.creative-tim.com/license">
                        Licenses
                    </a>
                </li>
            </ul>
        </nav>
        <div class="copyright pull-right">
            &copy; <script>document.write(new Date().getFullYear())</script> <img src = "<?= $this->config->base_url() ?>images/icon2.png" width = "9%">TECHNOHOLICS
        </div>
    </div>
</footer>
</body>

<!--   Core JS Files   -->
<script src="<?= $this->config->base_url()?>assets/paper/js/jquery-1.10.2.js" type="text/javascript"></script>
<script src="<?= $this->config->base_url()?>assets/paper/js/bootstrap.min.js" type="text/javascript"></script>

<!--  Checkbox, Radio & Switch Plugins -->
<script src="<?= $this->config->base_url()?>assets/paper/js/bootstrap-checkbox-radio.js"></script>

<!--  Charts Plugin -->
<script src="<?= $this->config->base_url()?>assets/paper/js/chartist.min.js"></script>

<!--  Notifications Plugin    -->
<script src="<?= $this->config->base_url()?>assets/paper/js/bootstrap-notify.js"></script>

<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

<!-- Paper Dashboard Core javascript and methods for Demo purpose -->
<script src="<?= $this->config->base_url()?>assets/paper/js/paper-dashboard.js"></script>

<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
<script src="<?= $this->config->base_url()?>assets/paper/js/demo.js"></script>

<!-- Notification popup will only display on the Dashboard page -->
<?php if ($heading == "Dashboard"): ?>
    <script type="text/javascript">
        $(document).ready(function(){

            demo.initChartist();

            $.notify({
                icon: 'ti-direction',
                message: "Welcome to <b>Paper Dashboard</b> - a beautiful Bootstrap freebie for your next project."

            },{
                type: 'info',
                timer: 4000
            });

        });
    </script>
<?php endif; ?>

</html>