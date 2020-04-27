<footer class="main-footer">
  <div class="pull-right hidden-xs">
  <input type="text" style="display:none;" value="<?php echo base_url(); ?>" id="baseurl" />
    <b>Version</b> 2.4.0
  </div>
  <strong>Copyright &copy; <?= date('Y') ?> Oceanic spring </strong> All rights
  reserved.
</footer>


</div>


<!-- jQuery 3 -->
<script src="<?= base_url() ?>dashboard/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url() ?>dashboard/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url() ?>dashboard/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="<?= base_url() ?>dashboard/bower_components/raphael/raphael.min.js"></script>
<script src="<?= base_url() ?>dashboard/bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="<?= base_url() ?>dashboard/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?= base_url() ?>dashboard/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?= base_url() ?>dashboard/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url() ?>dashboard/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?= base_url() ?>dashboard/bower_components/moment/min/moment.min.js"></script>

<!-- Bootstrap WYSIHTML5 -->
<script src="<?= base_url() ?>dashboard/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?= base_url() ?>dashboard/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?= base_url() ?>dashboard/bower_components/fastclick/lib/fastclick.js"></script>
<!-- Datatable -->
<script src="<?= base_url() ?>dashboard/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>dashboard/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<!-- AdminLTE App -->
<script src="<?= base_url() ?>dashboard/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= base_url() ?>dashboard/dist/js/pages/dashboard.js"></script>
<script src="<?= base_url() ?>dashboard/dist/js/pages/dashboard2.js"></script>
<script src="<?= base_url() ?>dashboard/bower_components/chart.js/Chart.js"></script>



<?php if (base_url() . 'dem_manager/dashboard' == current_url()) : ?>
  <script src="<?= base_url() ?>dashboard/js/dashboard.js"></script>
  
<?php endif; ?>

<?php if (base_url() . 'dem_manager/users' == current_url()) : ?>
  <script src="<?= base_url() ?>dashboard/requests/dem_managers/user.js"></script>
  
<?php endif; ?>
<?php if (base_url() . 'dem_manager/customer' == current_url()) : ?>
  <script src="<?= base_url() ?>dashboard/requests/dem_managers/customer.js"></script>
  
<?php endif; ?>

<?php if (base_url() . 'dem_manager/orders' == current_url()) : ?>
  <script src="<?= base_url() ?>dashboard/requests/dem_managers/order.js"></script>
  
<?php endif; ?>

<?php if (base_url() . 'dem_manager/vouchers' == current_url()) : ?>
  <script src="<?= base_url() ?>dashboard/requests/dem_managers/voucher.js"></script>
  
<?php endif; ?>

<?php if (base_url() . 'dem_manager/callLogs' == current_url()) : ?>
  <script src="<?= base_url() ?>dashboard/requests/dem_managers/calllog.js"></script>
  
<?php endif; ?>

<?php if (base_url() . 'dem_manager/anniversary_orders' == current_url()) : ?>
  <script src="<?= base_url() ?>dashboard/requests/dem_managers/anniversary.js"></script>
  
<?php endif; ?>

<?php if (base_url() . 'dem_manager/loyalty' == current_url()) : ?>
<script>
       Morris.Bar({
  element: 'graph',
  data: [
    { y: 'Used', a: document.getElementById('val1').value },
    { y: 'Unused', a: document.getElementById('val2').value },
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
  stacked:true

});
    </script>
  <script src="<?= base_url() ?>dashboard/requests/dem_managers/loyalty.js"></script>
  
<?php endif; ?>

<!-- AdminLTE for demo purposes -->

<script src="<?=base_url()?>dashboard/requests/logout.js"></script>
<!-- <script src="<?= base_url() ?>public/page/logoutMerchant.js"></script> -->
<script src="<?= base_url() ?>dashboard/notifications/sweetalert.min.js"></script>
<script src="<?= base_url() ?>dashboard/notifications/bootstrap-notify.min.js"></script>

</body>

</html>