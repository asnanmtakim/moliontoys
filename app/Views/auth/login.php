<?php $app_identity = app_identity() ?>
<?= $this->extend($config->viewLayout) ?>

<?= $this->section('content'); ?>
<div class="card-body">
    <p class="login-box-msg"><?= lang('Auth.loginTitle') ?> <?= $app_identity['app_name']; ?></p>
    <?= view('Myth\Auth\Views\_message_block') ?>
    <form action="<?= route_to('login') ?>" method="post" id="form-password">
        <?= csrf_field() ?>
        <?php if ($config->validFields === ['email']) : ?>
            <div class="input-group mb-3">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
                <input type="email" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.email') ?>">
                <div class="invalid-feedback">
                    <?= session('errors.login') ?>
                </div>
            </div>
        <?php else : ?>
            <div class="input-group mb-3">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
                <input type="text" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.emailOrUsername') ?>">
                <div class="invalid-feedback">
                    <?= session('errors.login') ?>
                </div>
            </div>
        <?php endif; ?>
        <div class="input-group mb-3" id="show_hide_password">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
            <input type="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" name="password" placeholder="<?= lang('Auth.password') ?>">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-eye-slash"></span>
                </div>
            </div>
            <div class="invalid-feedback">
                <?= session('errors.password') ?>
            </div>
        </div>
        <div class="row">
            <?php if ($config->allowRemembering) : ?>
                <div class="col-8">
                    <div class="icheck-success">
                        <input type="checkbox" id="remember" name="remember" <?php if (old('remember')) : ?> checked <?php endif ?>>
                        <label for="remember">
                            <?= lang('Auth.rememberMe') ?>
                        </label>
                    </div>
                </div>
            <?php endif; ?>
            <!-- /.col -->
            <div class="col-4">
                <button type="submit" class="btn btn-success btn-block"><?= lang('Auth.loginAction') ?></button>
            </div>
            <!-- /.col -->
        </div>
    </form>
    <?php if ($config->allowRegistration) : ?>
        <p class="mb-0">
            <a href="<?= route_to('register') ?>" class="text-center"><?= lang('Auth.needAnAccount') ?></a>
        </p>
    <?php endif; ?>
    <?php if ($config->activeResetter) : ?>
        <p class="mb-1">
            <a href="<?= route_to('forgot') ?>"><?= lang('Auth.forgotYourPassword') ?></a>
        </p>
    <?php endif; ?>

</div>
<!-- /.card-body -->
<?= $this->endSection(); ?>