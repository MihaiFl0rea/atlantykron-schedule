<?php
/**
 * Created by PhpStorm.
 * User: Mihai
 * Date: 7/9/2018
 * Time: 9:39 PM
 */
?>

<footer class="footer">
    <div class="container-fluid">
        <p class="pull-left">Atlantykron Centenarium</p>
        <p class="copyright pull-right">
            &copy; <script>document.write(new Date().getFullYear())</script> <strong>Atlantykron</strong>
        </p>
    </div>
</footer>

<!--   Core JS Files   -->
<script src="<?php echo assets_js_url(); ?>jquery-1.10.2.js" type="text/javascript"></script>
<script src="<?php echo assets_js_url(); ?>bootstrap.min.js" type="text/javascript"></script>

<!--  Checkbox, Radio & Switch Plugins -->
<script src="<?php echo assets_js_url(); ?>bootstrap-checkbox-radio-switch.js"></script>

<!--  Charts Plugin -->
<script src="<?php echo assets_js_url(); ?>chartist.min.js"></script>

<!--  Notifications Plugin    -->
<script src="<?php echo assets_js_url(); ?>bootstrap-notify.js"></script>

<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="<?php echo assets_js_url(); ?>light-bootstrap-dashboard.js"></script>

<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
<script src="<?php echo assets_js_url(); ?>demo.js"></script>

<!-- jQuery UI -->
<script src="<?php echo assets_js_url(); ?>jquery-ui.min.js"></script>

<!-- jQuery timepicker library -->
<script src="<?php echo assets_js_url(); ?>jquery.timepicker.min.js"></script>

<!-- datatables library -->
<script src="<?php echo assets_js_url(); ?>datatables.min.js"></script>

<!-- select2 library -->
<script src="<?php echo assets_js_url(); ?>select2.min.js"></script>

<!-- Custom app scripts -->
<script src="<?php echo assets_js_url(); ?>custom-scripts.js"></script>
<!--<script type="text/javascript">
    $(document).ready(function(){

        demo.initChartist();

        $.notify({
            icon: 'pe-7s-gift',
            message: "Welcome to <b>Atlantykron</b> - <?php /*echo date('Y') . ' Edition'; */?>."

        },{
            type: 'info',
            timer: 4000
        });

    });
</script>-->
