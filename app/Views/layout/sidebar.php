<!-- Main Sidebar Container -->
<?php $app_identity = app_identity() ?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url() ?>" class="brand-link">
        <img src="<?= $app_identity['app_icon']; ?>" alt="<?= $app_identity['app_title']; ?>" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-bold-light"><?= $app_identity['app_title']; ?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= base_url() ?>/uploads/image_user/<?= user()->image_user != '' ? user()->image_user : 'default.jpg' ?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="<?= base_url() ?>/admin/profile" class="d-block"><?= user()->fullname != '' ? user()->fullname : user()->username; ?></a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Cari ..." aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                <li class="nav-header">Panel User</li>
                <li class="nav-item">
                    <a href="<?= base_url(); ?>/admin" class="nav-link <?= $page == 'dashboard' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url(); ?>/admin/profile" class="nav-link <?= $page == 'profile' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-user-circle"></i>
                        <p>
                            Profil Pengguna
                        </p>
                    </a>
                </li>
                <?php if (in_groups('admin')) : ?>
                    <li class="nav-header">Panel Admin</li>
                    <li class="nav-item">
                        <a href="<?= base_url(); ?>/admin/home" class="nav-link <?= $page == 'home' ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-home"></i>
                            <p>
                                Halaman Beranda
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url(); ?>/admin/about" class="nav-link <?= $page == 'home' ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-audio-description"></i>
                            <p>
                                Halaman Tentang
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url(); ?>/admin/partner" class="nav-link <?= $page == 'partner' ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-handshake"></i>
                            <p>
                                Halaman Mitra
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url(); ?>/admin/certificate" class="nav-link <?= $page == 'certificate' ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-certificate"></i>
                            <p>
                                Halaman Sertifikat
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url(); ?>/admin/product" class="nav-link <?= $page == 'product' ? 'active' : '' ?>">
                            <i class="nav-icon fab fa-product-hunt"></i>
                            <p>
                                Halaman Produk
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url(); ?>/admin/team" class="nav-link <?= $page == 'team' ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Halaman Tim
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url(); ?>/admin/blog" class="nav-link <?= $page == 'blog' ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-blog"></i>
                            <p>
                                Halaman Blog
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url(); ?>/admin/faq" class="nav-link <?= $page == 'faq' ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-question-circle"></i>
                            <p>
                                Halaman Faq
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url(); ?>/admin/sosmed" class="nav-link <?= $page == 'sosmed' ? 'active' : '' ?>">
                            <i class="nav-icon fab fa-facebook"></i>
                            <p>
                                Sosmed
                            </p>
                        </a>
                    </li>
                    <li class="nav-header">Panel Pesan</li>
                    <li class="nav-item">
                        <a href="<?= base_url(); ?>/admin/contact" class="nav-link <?= $page == 'contact' ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-envelope-open-text"></i>
                            <p>
                                Pesan Masuk
                            </p>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>