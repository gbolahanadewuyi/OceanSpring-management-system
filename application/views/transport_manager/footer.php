<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <input type="text" style="display:none;" value="<?php echo base_url(); ?>" id="baseurl" />
        <input type="text" style="display:none;" value="<?php echo $token; ?>" id="accessToken" />
        <input type="text" style="display:none;" value="<?php echo $zoneid; ?>" id="zoneid" />
        <input type="text" style="display:none;" value="<?php echo $roleid; ?>" id="roleid" />
        <input type="text" style="display:none;" value="<?php echo $id; ?>" id="userid" />
        <input type="text" style="display:none;" value="<?php echo $name; ?>" id="username" />
        <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; <?=date('Y')?> Oceanic Spring  Delivery</strong> All rights
    reserved.
</footer>


</div>


<!-- jQuery 3 -->
<script src="<?=base_url()?>dashboard/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?=base_url()?>dashboard/bower_components/jquery-ui/jquery-ui.min.js"></script>
<script src="https://kendo.cdn.telerik.com/2019.2.514/js/jquery.min.js"></script>
<script src="https://kendo.cdn.telerik.com/2019.2.514/js/kendo.all.min.js"></script>
<!-- Resolve conflict in sjQuery UI tooltip with Bootstrap tooltip -->
<script>
$.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?=base_url()?>dashboard/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="<?=base_url()?>dashboard/bower_components/raphael/raphael.min.js"></script>
<script src="<?=base_url()?>dashboard/bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="<?=base_url()?>dashboard/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?=base_url()?>dashboard/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?=base_url()?>dashboard/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?=base_url()?>dashboard/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?=base_url()?>dashboard/bower_components/moment/min/moment.min.js"></script>

<!-- Bootstrap WYSIHTML5 -->
<script src="<?=base_url()?>dashboard/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?=base_url()?>dashboard/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?=base_url()?>dashboard/bower_components/fastclick/lib/fastclick.js"></script>
<!-- Datatable -->
<script src="<?=base_url()?>dashboard/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>dashboard/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<!-- AdminLTE App -->
<script src="<?=base_url()?>dashboard/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?=base_url()?>dashboard/dist/js/pages/dashboard.js"></script>
<script src="<?=base_url()?>dashboard/dist/js/pages/dashboard2.js"></script>
<script src="<?=base_url()?>dashboard/bower_components/chart.js/Chart.js"></script>

<script src="<?=base_url()?>dashboard/requests/logout.js"></script>
<!-- AdminLTE for demo purposes -->

<!-- <script src="<?=base_url()?>public/page/logoutMerchant.js"></script> -->
<script src="<?=base_url()?>dashboard/notifications/sweetalert.min.js"></script>
<script src="<?=base_url()?>dashboard/notifications/bootstrap-notify.min.js"></script>



<?php if (base_url() . 'transportmanager/dashboard' == current_url()): ?>
<script src="<?=base_url()?>dashboard/requests/transport_manager/dashboard.js"></script>
<script src="<?=base_url()?>dashboard/js/dashboard.js"></script>

<?php endif;?>



<?php if (base_url() . 'transportmanager/eod_report' == current_url()): ?>
<script src="<?=base_url()?>dashboard/requests/transport_manager/eodreport.js"></script>

<?php endif;?>



<?php if (base_url() . 'transportmanager/stock' == current_url()): ?>

<script src="<?=base_url()?>dashboard/requests/transport_manager/stock.js"></script>

<?php endif;?>

<?php if (base_url() . 'transportmanager/truck_drivers' == current_url()): ?>

<script src="<?=base_url()?>dashboard/requests/transport_manager/createuser.js"></script>

<?php endif;?>


</body>

</html>