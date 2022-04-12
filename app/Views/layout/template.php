<?php $app_identity = app_identity() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $app_identity['app_title'] ?> - <?= $title ?></title>

    <link href="<?= $app_identity['app_icon']; ?>" rel="icon">
    <link href="<?= $app_identity['app_icon']; ?>" rel="apple-touch-icon">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/admin/plugins/fontawesome-free/css/all.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/admin/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/admin/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/admin/plugins/toastr/toastr.min.css">
    <!-- pace-progress -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/admin/plugins/pace-progress/themes/black/pace-theme-minimal.css">

    <!-- Page style -->
    <?= $this->renderSection('plugin_css'); ?>

    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/admin/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/admin/dist/css/custom.css">
</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed sidebar-mini-md pace-primary">
    <div class="wrapper">

        <!-- Preloader -->
        <!-- <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__wobble" src="<?= $app_identity['app_icon']; ?>" alt="<?= $app_identity['app_title']; ?>" height="60" width="60">
        </div> -->

        <?= $this->include('layout/navbar'); ?>

        <?= $this->include('layout/sidebar'); ?>

        <!-- Content Wrapper. Contains page content -->
        <?= $this->renderSection('content'); ?>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer text-sm">
            <strong>Copyright &copy; <?= date('Y'); ?> <a href="https://instagram.com/asnanmtakim" target="_blank">Asnanmtakim</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 1.0.0 <small>beta</small>
            </div>
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="<?= base_url() ?>/assets/admin/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?= base_url() ?>/assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Select2 -->
    <script src="<?= base_url() ?>/assets/admin/plugins/select2/js/select2.full.min.js"></script>
    <!-- InputMask -->
    <script src="<?= base_url() ?>/assets/admin/plugins/moment/moment.min.js"></script>
    <script src="<?= base_url() ?>/assets/admin/plugins/inputmask/jquery.inputmask.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="<?= base_url() ?>/assets/admin/plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- Toastr -->
    <script src="<?= base_url() ?>/assets/admin/plugins/toastr/toastr.min.js"></script>
    <!-- pace-progress -->
    <script src="<?= base_url() ?>/assets/admin/plugins/pace-progress/pace.min.js"></script>
    <!-- bs-custom-file-input -->
    <script src="<?= base_url() ?>/assets/admin/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

    <!-- Plugin js -->
    <?= $this->renderSection('plugin_js'); ?>

    <!-- AdminLTE App -->
    <script src="<?= base_url() ?>/assets/admin/dist/js/adminlte.js"></script>
    <script src="<?= base_url() ?>/assets/admin/dist/js/custom.js"></script>
    <script>
        var BASE_URL = '<?= base_url(); ?>';
        $(document).ready(function() {
            tulisTanggal();

            //Initialize Select2 Elements
            $('.select2').select2();
            $(".select2multi").select2({
                tags: true,
                tokenSeparators: [',']
            })

            bsCustomFileInput.init();
        });

        function tulisTanggal() {
            var tanggallengkap = new String();
            var namahari = "Min Sen Sel Rab Kam Jum Sab";
            namahari = namahari.split(" ");
            var namabulan = "Januari Februari Maret April Mei Juni Juli Agustus September Oktober November Desember";
            namabulan = namabulan.split(" ");
            var tgl = new Date();
            var hari = tgl.getDay();
            var tanggal = tgl.getDate();
            var bulan = tgl.getMonth();
            var tahun = tgl.getFullYear();
            tanggallengkap = namahari[hari] + ", " + tanggal + " " + namabulan[bulan] + " " + tahun + "";
            document.getElementById("tanggal").innerHTML = tanggallengkap;

            waktu();
        }

        window.setTimeout("waktu()", 1000);

        function waktu() {
            var tanggal = new Date();
            setTimeout("waktu()", 1000);
            document.getElementById("jam").innerHTML = tanggal.getHours() + ":" + tanggal.getMinutes() + ":" + tanggal.getSeconds();
        }

        function setSess(name, value) {
            return $.ajax({
                type: "POST",
                url: BASE_URL + "/welcome/setSess",
                data: {
                    sessName: name,
                    sessValue: value,
                },
                dataType: "json",
                success: function(res) {},
            });
        }
    </script>
    <?php if (session()->getFlashdata('message_error')) { ?>
        <script>
            $(document).ready(function() {
                toastr.error("<?= session()->getFlashdata('message_error'); ?>")
            });
        </script>
    <?php } ?>
    <?php if (session()->getFlashdata('message_success')) { ?>
        <script>
            $(document).ready(function() {
                toastr.success("<?= session()->getFlashdata('message_success'); ?>")
            });
        </script>
    <?php } ?>

    <!-- Page js -->
    <?= $this->renderSection('page_js'); ?>
</body>

</html>