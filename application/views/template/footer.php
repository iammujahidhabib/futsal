<!-- /.control-sidebar -->

<!-- Main Footer -->
<br>
<br>
<br>
<br>
<!-- ./wrapper -->
<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<?php $this->load->view('template/js'); ?>
<script>
  // var timestamp = '<?= time(); ?>';

  // function updateTime() {
  //   $('#time').html(Date(timestamp));
  //   timestamp++;
  // }
  $(document).ready(function() {
    // setInterval(updateTime, 1000);
    $('.example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<!-- Bootstrap 4 -->

</body>

</html>