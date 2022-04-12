<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="<?= base_url() ?>/welcome" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="<?= base_url() ?>/welcome#contact" class="nav-link">Contact</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <form class="form-inline">
            <div class="input-group input-group-sm">
                <p class="form-control text-center form-control-navbar">
                    <span id="tanggal"></span>
                    <span id="jam"></span>
                </p>
            </div>
        </form>
        <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                <img src="<?= base_url() ?>/uploads/image_user/<?= user()->image_user != '' ? user()->image_user : 'default.jpg' ?>" class="user-image mr-0 img-circle shadow" alt="User Image">
                <span class="d-none d-md-inline ml-2"><?= user()->username; ?></span>
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                <!-- User image -->
                <li class="user-header bg-primary">
                    <img src="<?= base_url() ?>/uploads/image_user/<?= user()->image_user != '' ? user()->image_user : 'default.jpg' ?>" class="img-circle shadow" alt="User Image">
                    <p>
                        <?= user()->fullname != '' ? user()->fullname : user()->username; ?>
                        <small><?= user()->email; ?></small>
                    </p>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                    <a href="<?= base_url(); ?>/profile" class="btn btn-secondary btn-flat">Profile</a>
                    <a href="<?= base_url(); ?>/logout" class="btn btn-warning btn-flat float-right">Logout</a>
                </li>
            </ul>
        </li>
        <!-- <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li> -->
        <!-- <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                <i class="fas fa-th-large"></i>
            </a>
        </li> -->
    </ul>
</nav>
<!-- /.navbar -->