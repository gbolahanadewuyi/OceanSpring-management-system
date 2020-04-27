<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <input type="text" style="display:none;" value="<?php echo base_url(); ?>" id="baseurl" />
        <input type="text" style="display:none;" value="<?php echo $token; ?>" id="accessToken" />
        <input type="text" style="display:none;" value="<?php echo $zoneid; ?>" id="zoneid" />
        <input type="text" style="display:none;" value="<?php echo $roleid; ?>" id="roleid" />
        <input type="text" style="display:none;" value="<?php echo $id; ?>" id="userid" />
        <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; <?=date('Y')?> Ocean Spring Delivery </strong> All rights
    reserved.
</footer>


</div>


<!-- jQuery 3 -->
<script src="<?=base_url()?>dashboard/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?=base_url()?>dashboard/bower_components/jquery-ui/jquery-ui.min.js"></script>
<script src="https://kendo.cdn.telerik.com/2019.2.514/js/jquery.min.js"></script>
<script src="https://kendo.cdn.telerik.com/2019.2.514/js/kendo.all.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
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
<script src="<?=base_url()?>dashboard/notifications/sweetalert.min.js"></script>
<script src="<?=base_url()?>dashboard/notifications/bootstrap-notify.min.js"></script>



<?php if (base_url() . 'admin/dashboard' == current_url()): ?>
<script src="<?=base_url()?>dashboard/requests/admin/admindashboard.js"></script>
<script src="<?=base_url()?>dashboard/js/dashboard.js"></script>

<?php endif;?>

<?php if (base_url() . 'admin/users' == current_url()): ?>
<script src="<?=base_url()?>dashboard/requests/admin/user.js"></script>

<?php endif;?>
<?php if (base_url() . 'admin/customer' == current_url()): ?>
<script src="<?=base_url()?>dashboard/requests/customer.js"></script>

<?php endif;?>

<?php if (base_url() . 'admin/orders' == current_url()): ?>
<script src="<?=base_url()?>dashboard/requests/admin/order.js"></script>

<?php endif;?>

<?php if (base_url() . 'admin/vouchers' == current_url()): ?>
<script src="<?=base_url()?>dashboard/requests/voucher.js"></script>

<?php endif;?>

<?php if (base_url() . 'admin/callLogs' == current_url()): ?>
<script src="<?=base_url()?>dashboard/requests/calllog.js"></script>

<?php endif;?>

<?php if (base_url() . 'admin/anniversary_orders' == current_url()): ?>
<script src="<?=base_url()?>dashboard/requests/admin/anniversary.js"></script>

<?php endif;?>

<?php if (base_url() . 'admin/create_user' == current_url()): ?>
<script src="<?=base_url()?>dashboard/requests/admin/createuser.js"></script>

<?php endif;?>

<?php if (base_url() . 'admin/authdealer' == current_url()): ?>
<script src="<?=base_url()?>dashboard/requests/admin/authdealer.js"></script>

<?php endif;?>


<?php if (base_url() . 'admin/eod_report' == current_url()): ?>
<script src="<?=base_url()?>dashboard/requests/admin/eodreport.js"></script>

<?php endif;?>

<?php if (base_url() . 'admin/loyalty' == current_url()): ?>
<script>
Morris.Bar({
    element: 'graph',
    data: [{
            y: 'Used',
            a: document.getElementById('val1').value
        },
        {
            y: 'Unused',
            a: document.getElementById('val2').value
        },
        // { y: '2008', a: 50},
        // { y: '2009', a: 75 },
        // { y: '2010', a: 50},
        // { y: '2011', a: 75 },
        // { y: '2012', a: 100 }
    ],
    xkey: 'y',
    ykeys: ['a'],
    labels: ['Number of cards'],
    resize: true,
    gridTextWeight: 'small',
    gridTextSize: '20',
    stacked: true

});
</script>
<script src="<?=base_url()?>dashboard/requests/admin/loyalty.js"></script>

<?php endif;?>

<!-- AdminLTE for demo purposes -->



</body>

</html>