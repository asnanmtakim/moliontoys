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
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-widget widget-user shadow">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-primary">
                            <h3 class="widget-user-username">Selamat Datang </h3>
                            <h5 class="widget-user-desc"><?= $app_identity['app_name']; ?></h5>
                            <!-- <h6 class="widget-user-desc"><?= $app_identity['app_about']; ?></h6> -->
                        </div>
                        <div class="widget-user-image">
                            <img class="img-circle elevation-2" src="<?= $app_identity['app_brand']; ?>" alt="Logo UCA">
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="description-block">
                                        <h5 class="description-header">Jl. Tikusan No. 37, Tikusan, Kec. Kapas, Kab. Bojonegoro</h5>
                                        <span>Email: klinikckm@gmail.com</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/. container-fluid -->
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