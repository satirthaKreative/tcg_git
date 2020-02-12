  <!-- /.content-wrapper -->

  <footer class="main-footer">

    <strong>Copyright &copy; 2019-2020 <a href="javascript:;">TCG</a>.</strong>

    All rights reserved.

    <div class="float-right d-none d-sm-inline-block">

      <b>Design & Developed By <a href="javascript:;">Kreative Mechinez</a></b>

    </div>

  </footer>



  <!-- Control Sidebar -->

  <aside class="control-sidebar control-sidebar-dark">

    <!-- Control sidebar content goes here -->

  </aside>

  <!-- /.control-sidebar -->

</div>

<!-- ./wrapper -->



<!-- jQuery UI 1.11.4 -->

<script src="<?= base_url(); ?>assets/admin_assets/plugins/jquery-ui/jquery-ui.min.js"></script>

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

<script>

  $.widget.bridge('uibutton', $.ui.button)

</script>

<!-- Bootstrap 4 -->

<script src="<?= base_url(); ?>assets/admin_assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- ChartJS -->

<script src="<?= base_url(); ?>assets/admin_assets/plugins/chart.js/Chart.min.js"></script>

<!-- Sparkline -->

<script src="<?= base_url(); ?>assets/admin_assets/plugins/sparklines/sparkline.js"></script>

<!-- JQVMap -->

<script src="<?= base_url(); ?>assets/admin_assets/plugins/jqvmap/jquery.vmap.min.js"></script>

<script src="<?= base_url(); ?>assets/admin_assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>

<!-- jQuery Knob Chart -->

<script src="<?= base_url(); ?>assets/admin_assets/plugins/jquery-knob/jquery.knob.min.js"></script>

<!-- daterangepicker -->

<script src="<?= base_url(); ?>assets/admin_assets/plugins/moment/moment.min.js"></script>

<script src="<?= base_url(); ?>assets/admin_assets/plugins/daterangepicker/daterangepicker.js"></script>

<!-- Tempusdominus Bootstrap 4 -->

<script src="<?= base_url(); ?>assets/admin_assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

<!-- Summernote -->

<script src="<?= base_url(); ?>assets/admin_assets/plugins/summernote/summernote-bs4.min.js"></script>

<!-- overlayScrollbars -->

<script src="<?= base_url(); ?>assets/admin_assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

<!-- AdminLTE App -->

<script src="<?= base_url(); ?>assets/admin_assets/dist/js/adminlte.js"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->

<script src="<?= base_url(); ?>assets/admin_assets/dist/js/pages/dashboard.js"></script>

<!-- AdminLTE for demo purposes -->

<script src="<?= base_url(); ?>assets/admin_assets/dist/js/demo.js"></script>

<script src="<?= base_url(); ?>assets/admin_assets/plugins/datatables/jquery.dataTables.js"></script>

<script src="<?= base_url(); ?>assets/admin_assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

<script>

  $(function () {

    $("#example1").DataTable();

    $('#example2').DataTable({

      "paging": true,

      "lengthChange": false,

      "searching": false,

      "ordering": true,

      "info": true,

      "autoWidth": false,

    });

  });

</script>

<!-- Accordion -->
<script>
  
  $(document).ready(function() {
    $('.accordion').find('.accordion-toggle').click(function() {
      $(this).next().slideToggle('600');
      $(".accordion-content").not($(this).next()).slideUp('600');
    });
    $('.accordion-toggle').on('click', function() {
      $(this).toggleClass('active').siblings().removeClass('active');
    });
  });
    
</script>



</body>

</html>

