<?php
$app_identity = app_identity();
?>
<?= $this->extend($config->viewLayout) ?>

<?= $this->section('content'); ?>
<div class="card-body">
    <p class="login-box-msg"><?= lang('Auth.register') ?> <?= $app_identity['app_name']; ?></p>
    <?= view('Myth\Auth\Views\_message_block') ?>
    <form action="<?= route_to('register') ?>" method="post" id="form-password">
        <?= csrf_field() ?>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <i class="fas fa-envelope"></i>
                </span>
            </div>
            <input type="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" placeholder="<?= lang('Auth.email') ?> aktif" value="<?= old('email') ?>">
            <div class="invalid-feedback">
                <?= session('errors.email') ?>
            </div>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <i class="fas fa-user"></i>
                </span>
            </div>
            <input type="text" class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" value="<?= old('username') ?>" placeholder="NIM">
            <div class="invalid-feedback">
                <?= session('errors.username') ?>
            </div>
        </div>
        <div class="input-group mb-3" id="show_hide_password">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <i class="fas fa-lock"></i>
                </span>
            </div>
            <input type="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" name="password" autocomplete="off" placeholder="<?= lang('Auth.password') ?>">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-eye-slash"></span>
                </div>
            </div>
            <div class="invalid-feedback">
                <?= session('errors.password') ?>
            </div>
        </div>
        <div class="input-group mb-3" id="show_hide_password_conn">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <i class="fas fa-lock"></i>
                </span>
            </div>
            <input type="password" class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" name="pass_confirm" placeholder="<?= lang('Auth.repeatPassword') ?>">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-eye-slash"></span>
                </div>
            </div>
            <div class="invalid-feedback">
                <?= session('errors.pass_confirm') ?>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <button type="submit" class="btn btn-success btn-block"><?= lang('Auth.register') ?></button>
            </div>
            <!-- /.col -->
        </div>
    </form>
    <p class="mt-3 mb-1">
        <?= lang('Auth.alreadyRegistered') ?>
        <a href="<?= route_to('login') ?>" class="text-center"><?= lang('Auth.signIn') ?></a>
    </p>
</div>
<!-- /.form-box -->
<?= $this->endSection(); ?>