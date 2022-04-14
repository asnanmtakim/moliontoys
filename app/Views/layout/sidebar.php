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
                    <a href="/admin" class="nav-link <?= $page == 'dashboard' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/profile" class="nav-link <?= $page == 'profile' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-user-circle"></i>
                        <p>
                            Profil Pengguna
                        </p>
                    </a>
                </li>
                <?php if (in_groups('admin')) : ?>
                    <li class="nav-header">Panel Admin</li>
                    <li class="nav-item <?= ($page == 'poli' || $page == 'ruangan' || $page == 'diagnosis' || $page == 'tindakan') ? 'menu-open' : '' ?>">
                        <a href="#" class="nav-link <?= ($page == 'poli' || $page == 'ruangan' || $page == 'diagnosis' || $page == 'tindakan') ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-database"></i>
                            <p>
                                Data Master
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/poli" class="nav-link <?= $page == 'poli' ? 'active' : '' ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Poli</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/ruangan" class="nav-link <?= $page == 'ruangan' ? 'active' : '' ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Ruangan</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/diagnosis" class="nav-link <?= $page == 'diagnosis' ? 'active' : '' ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Diagnosis</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/tindakan" class="nav-link <?= $page == 'tindakan' ? 'active' : '' ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Tindakan dan Tarif</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item <?= ($page == 'petugas' || $page == 'dokter' || $page == 'perawat') ? 'menu-open' : '' ?>">
                        <a href="#" class="nav-link <?= ($page == 'petugas' || $page == 'dokter' || $page == 'perawat') ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Data Pengguna
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/petugas" class="nav-link <?= $page == 'petugas' ? 'active' : '' ?>">
                                    <i class="fas fa-user-tie nav-icon"></i>
                                    <p>Petugas</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/dokter" class="nav-link <?= $page == 'dokter' ? 'active' : '' ?>">
                                    <i class="fas fa-user-md nav-icon"></i>
                                    <p>Dokter</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/perawat" class="nav-link <?= $page == 'perawat' ? 'active' : '' ?>">
                                    <i class="fas fa-user-nurse nav-icon"></i>
                                    <p>Perawat dan Bidan</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php endif; ?>
                <?php if (in_groups(['admin', 'pendaftaran'])) : ?>
                    <li class="nav-header">Panel Pendaftaran</li>
                    <li class="nav-item">
                        <a href="/pasien" class="nav-link <?= $page == 'pasien' ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-user-injured"></i>
                            <p>
                                Data Pasien
                            </p>
                        </a>
                    </li>
                    <li class="nav-item <?= ($page == 'pendaftaran_rj' || $page == 'pendaftaran_ri' || $page == 'pendaftaran_ugd') ? 'menu-open' : '' ?>">
                        <a href="#" class="nav-link <?= ($page == 'pendaftaran_rj' || $page == 'pendaftaran_ri' || $page == 'pendaftaran_ugd') ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-hand-holding-medical"></i>
                            <p>
                                Pendaftaran
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/pendaftaran-rj" class="nav-link <?= $page == 'pendaftaran_rj' ? 'active' : '' ?>">
                                    <i class="fas fa-stethoscope nav-icon"></i>
                                    <p>Rawat Jalan</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/pendaftaran-ri" class="nav-link <?= $page == 'pendaftaran_ri' ? 'active' : '' ?>">
                                    <i class="fas fa-procedures nav-icon"></i>
                                    <p>Rawat Inap</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/pendaftaran-ugd" class="nav-link <?= $page == 'pendaftaran_ugd' ? 'active' : '' ?>">
                                    <i class="fas fa-briefcase-medical nav-icon"></i>
                                    <p>Gawat Darurat</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php endif; ?>
                <?php if (in_groups(['admin', 'dokter', 'perawat'])) : ?>
                    <li class="nav-header">Panel Pelayanan</li>
                    <li class="nav-item <?= ($page == 'pelayanan_rj' || $page == 'pelayanan_ri' || $page == 'pelayanan_ugd') ? 'menu-open' : '' ?>">
                        <a href="#" class="nav-link <?= ($page == 'pelayanan_rj' || $page == 'pelayanan_ri' || $page == 'pelayanan_ugd') ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-hospital-user"></i>
                            <p>
                                Pelayanan
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/pelayanan-rj" class="nav-link <?= $page == 'pelayanan_rj' ? 'active' : '' ?>">
                                    <i class="fas fa-stethoscope nav-icon"></i>
                                    <p>Rawat Jalan</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/pelayanan-ri" class="nav-link <?= $page == 'pelayanan_ri' ? 'active' : '' ?>">
                                    <i class="fas fa-procedures nav-icon"></i>
                                    <p>Rawat Inap</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/pelayanan-ugd" class="nav-link <?= $page == 'pelayanan_ugd' ? 'active' : '' ?>">
                                    <i class="fas fa-briefcase-medical nav-icon"></i>
                                    <p>Gawat Darurat</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>