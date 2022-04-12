<?php
$app_identity = app_identity();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $app_identity['app_title']; ?> - <?= $title; ?></title>

    <!-- Favicons -->
    <link href="<?= $app_identity['app_icon']; ?>" rel="icon">
    <link href="<?= $app_identity['app_icon']; ?>" rel="apple-touch-icon">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/admin/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">

    <?= $this->renderSection('plugin_css'); ?>

    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/admin/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/admin/dist/css/custom.css">
</head>

<body class=" dark-mode hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="<?= base_url() ?>" class="h1"><b><?= $app_identity['app_title']; ?></b></a>
            </div>

            <?= $this->renderSection('content'); ?>

        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="<?= base_url() ?>/assets/admin/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url() ?>/assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <?= $this->renderSection('plugin_js'); ?>

    <!-- AdminLTE App -->
    <script src="<?= base_url() ?>/assets/admin/dist/js/adminlte.min.js"></script>
    <script src="<?= base_url() ?>/assets/admin/dist/js/custom.js"></script>
</body>

</html>