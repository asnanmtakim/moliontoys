<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url() ?>/assets/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?= base_url() ?>/assets/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="<?= base_url() ?>/assets/admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

<!-- daterange picker -->
<link rel="stylesheet" href="<?= base_url() ?>/assets/admin/plugins/daterangepicker/daterangepicker.css">
<!-- iCheck for checkboxes and radio inputs -->
<link rel="stylesheet" href="<?= base_url() ?>/assets/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
<!-- Bootstrap Color Picker -->
<link rel="stylesheet" href="<?= base_url() ?>/assets/admin/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
<!-- Tempusdominus Bootstrap 4 -->
<link rel="stylesheet" href="<?= base_url() ?>/assets/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
<!-- Bootstrap4 Duallistbox -->
<link rel="stylesheet" href="<?= base_url() ?>/assets/admin/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
<!-- BS Stepper -->
<link rel="stylesheet" href="<?= base_url() ?>/assets/admin/plugins/bs-stepper/css/bs-stepper.min.css">
<!-- dropzonejs -->
<link rel="stylesheet" href="<?= base_url() ?>/assets/admin/plugins/dropzone/min/dropzone.min.css">
<!-- Magnific Popup -->
<link rel="stylesheet" href="<?= base_url() ?>/assets/admin/plugins/magnific-popup/dist/magnific-popup.css">
<!-- overlayScrollbars -->
<link rel="stylesheet" href="<?= base_url() ?>/assets/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
<!-- pace-progress -->
<link rel="stylesheet" href="<?= base_url() ?>/assets/admin/plugins/pace-progress/themes/black/pace-theme-flat-top.css">



<!-- DataTables  & Plugins -->
<script src="<?= base_url() ?>/assets/admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>/assets/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>/assets/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>/assets/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>/assets/admin/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url() ?>/assets/admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>/assets/admin/plugins/jszip/jszip.min.js"></script>
<script src="<?= base_url() ?>/assets/admin/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url() ?>/assets/admin/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url() ?>/assets/admin/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url() ?>/assets/admin/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url() ?>/assets/admin/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>


<!-- Bootstrap4 Duallistbox -->
<script src="<?= base_url() ?>/assets/admin/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>

<!-- date-range-picker -->
<script src="<?= base_url() ?>/assets/admin/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="<?= base_url() ?>/assets/admin/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url() ?>/assets/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="<?= base_url() ?>/assets/admin/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- BS-Stepper -->
<script src="<?= base_url() ?>/assets/admin/plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- dropzonejs -->
<script src="<?= base_url() ?>/assets/admin/plugins/dropzone/min/dropzone.min.js"></script>
<!-- Magnific Popup -->
<script src="<?= base_url() ?>/assets/admin/plugins/magnific-popup/dist/jquery.magnific-popup.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url() ?>/assets/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- pace-progress -->
<script src="<?= base_url() ?>/assets/admin/plugins/pace-progress/pace.min.js"></script>


<!-- jQuery Mapael -->
<script src="<?= base_url() ?>/assets/admin/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="<?= base_url() ?>/assets/admin/plugins/raphael/raphael.min.js"></script>
<script src="<?= base_url() ?>/assets/admin/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="<?= base_url() ?>/assets/admin/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="<?= base_url() ?>/assets/admin/plugins/chart.js/Chart.min.js"></script>

<script>
   function hapuskoleksi(id) {
      Swal.fire({
         title: 'Yakin hapus data koleksi?',
         text: "Data yang sudah dihapus tidak bisa dikembalikan!",
         icon: 'warning',
         showCancelButton: true,
         confirmButtonColor: '#3085d6',
         cancelButtonColor: '#d33',
         confirmButtonText: 'Ya, hapus!',
         cancelButtonText: 'Batal'
      }).then((result) => {
         if (result.isConfirmed) {
            Swal.fire(
               'Terhapus!',
               'Data berhasil dihapus.',
               'success'
            ).then((result) => {
               location.href = "<?= base_url() ?>/koleksi-delete/" + id;
            });
         }
      });
   }

   $("#example1").DataTable({
      "responsive": true,
      "lengthChange": true,
      "autoWidth": false,
      // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
   }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
   $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
   });
   $('.image-link').magnificPopup({
      type: 'image',
      closeOnContentClick: true,
      closeBtnInside: false,
      fixedContentPos: true,
      image: {
         verticalFit: true
      },
      zoom: {
         enabled: true,
         duration: 300 // don't foget to change the duration also in CSS
      },
   });

   //Date range picker
   $('#tahun_terbit').datetimepicker({
      format: 'YYYY',
      icons: {
         time: "fas fa-clock",
      }
   });
</script>