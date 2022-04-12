<?php
$app_identity = app_identity();
?>
<?= $this->extend('layout/template'); ?>

<?= $this->section('plugin_css'); ?>
<!-- overlayScrollbars -->
<link rel="stylesheet" href="<?= base_url() ?>/assets/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>404 Error Page</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active">404 Error Page</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="error-page">
            <h2 class="headline text-warning"> 404</h2>

            <div class="error-content">
                <h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops! Halaman tidak ditemukan.</h3>

                <p>
                    <?php if (!empty($message) && $message !== '(null)') : ?>
                        <?= esc($message) ?>
                    <?php else : ?>
                        Kemungkinan halaman telah dihapus, atau Anda salah menulis URL.
                    <?php endif ?>
                </p>

                <form class="search-form">
                    <a href="<?= previous_url(); ?>" class="btn btn-sm btn-outline-warning">Kembali</a>
                    <!-- /.input-group -->
                </form>
            </div>
            <!-- /.error-content -->
        </div>
        <!-- /.error-page -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?= $this->endSection(); ?>

<?= $this->section('plugin_js'); ?>
<!-- overlayScrollbars -->
<script src="<?= base_url() ?>/assets/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- ChartJS -->
<script src="<?= base_url() ?>/assets/admin/plugins/chart.js/Chart.min.js"></script>
<?= $this->endSection(); ?>

<?= $this->section('page_js'); ?>
<?= $this->endSection(); ?>