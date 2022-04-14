<?= $this->extend('layout/template'); ?>

<?= $this->section('plugin_css'); ?>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Profil Pengguna</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active">Profil Pengguna</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" src="<?= base_url() ?>/uploads/image_user/<?= $user['image_user'] != '' ? $user['image_user'] : 'default.jpg' ?>" alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center"><?= $user['fullname'] != null ? $user['fullname'] : $user['username'] ?></h3>

                            <p class="text-muted text-center"><?= $user['email'] ?></p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Username</b> <a class="float-right"><?= $user['username'] ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Role</b> <a class="float-right"><?= $role['description'] ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Gender</b> <a class="float-right"><?= $user['gender'] == 'L' ? 'Laki-laki' : 'Perempuan' ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>No HP</b> <a class="float-right"><?= $user['phone'] ?></a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="<?php if (!(session()->getFlashdata('tag')) || session()->getFlashdata('tag') == 'uprofil') {
                                                                    print 'active';
                                                                } ?> nav-link" href="#uprofil" data-toggle="tab">Ubah Data Profil</a></li>
                                <li class="nav-item"><a class="<?= session()->getFlashdata('tag') == 'ufoto' ? 'active' : '' ?> nav-link" href="#ufoto" data-toggle="tab">Ubah Foto Pengguna</a></li>
                                <li class="nav-item"><a class="<?= session()->getFlashdata('tag') == 'upassword' ? 'active' : '' ?> nav-link" href="#upassword" data-toggle="tab">Ubah Password</a></li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="<?php if (!(session()->getFlashdata('tag')) || session()->getFlashdata('tag') == 'uprofil') {
                                                print 'active';
                                            } ?> tab-pane" id="uprofil">
                                    <form class="form-horizontal" id="formUbahProfilAdmin" action="<?= base_url() ?>/admin/profile-edit" method="POST">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="id_user" value="<?= $user['id'] ?>">
                                        <div class="form-group row">
                                            <label for="username" class="col-sm-3 col-form-label">Username</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" id="username" name="username" placeholder="Username pengguna" value="<?= old('username') ? old('username') : $user['username'] ?>">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('username') ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="fullname" class="col-sm-3 col-form-label">Nama lengkap</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control <?= ($validation->hasError('fullname')) ? 'is-invalid' : ''; ?>" id="fullname" name="fullname" placeholder="Nama lengkap pengguna" value="<?= old('fullname') ? old('fullname') : $user['fullname'] ?>">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('fullname') ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="gender" class="col-sm-3 col-form-label">Jenis kelamin</label>
                                            <div class="col-sm-9">
                                                <select class="form-control <?= ($validation->hasError('gender')) ? 'is-invalid' : ''; ?>" id="gender" name="gender">
                                                    <option value="" disabled selected>--Pilih Jenis Kelamin--</option>
                                                    <option value="L" <?php if (old('gender') == 'L') {
                                                                            print 'selected';
                                                                        } else {
                                                                            if ($user['gender'] == 'L') {
                                                                                print 'selected';
                                                                            } else {
                                                                                print '';
                                                                            }
                                                                        }
                                                                        ?>>Laki-laki</option>
                                                    <option value="P" <?php if (old('gender') == 'P') {
                                                                            print 'selected';
                                                                        } else {
                                                                            if ($user['gender'] == 'P') {
                                                                                print 'selected';
                                                                            } else {
                                                                                print '';
                                                                            }
                                                                        } ?>>Perempuan</option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('gender') ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="phone" class="col-sm-3 col-form-label">No HP</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control <?= ($validation->hasError('phone')) ? 'is-invalid' : ''; ?>" id="phone" name="phone" placeholder="No HP" value="<?= old('phone') ? old('phone') : $user['phone'] ?>">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('phone') ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="address" class="col-sm-3 col-form-label">Alamat</label>
                                            <div class="col-sm-9">
                                                <textarea class="form-control <?= ($validation->hasError('address')) ? 'is-invalid' : ''; ?>" id="address" name="address" placeholder="Alamat Pengguna"><?= old('address') ? old('address') : $user['address'] ?></textarea>
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('address') ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="offset-sm-3 col-sm-9">
                                                <button type="submit" class="btn btn-success">Simpan</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.tab-pane -->
                                <div class="<?= session()->getFlashdata('tag') == 'ufoto' ? 'active' : '' ?> tab-pane" id="ufoto">
                                    <img src="<?= base_url() ?>/uploads/image_user/<?= $user['image_user'] != '' ? $user['image_user'] : 'default.jpg' ?>" width="30%" class="img-fluid img-preview rounded mx-auto d-block mb-3" alt="">
                                    <form class="form-horizontal" action="<?= base_url() ?>/admin/profile-edit-image" method="post" enctype="multipart/form-data">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="id_user" value="<?= $user['id'] ?>">
                                        <div class="form-group row">
                                            <label for="foto" class="col-sm-2 col-form-label">Foto Baru</label>
                                            <div class="col-sm-10">
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" accept="image/*" class="form-control custom-file-input <?= ($validation->hasError('image_user')) ? 'is-invalid' : ''; ?>" id="foto" name="image_user" onchange="previewImg()">
                                                        <label class="custom-file-label" for="image_user">Pilih foto</label>
                                                    </div>
                                                </div>
                                                <?php if ($validation->hasError('image_user')) : ?>
                                                    <div class="error-validation">
                                                        <?= $validation->getError('image_user') ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <button type="submit" class="btn btn-success">Simpan dan Upload</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.tab-pane -->
                                <div class="<?= session()->getFlashdata('tag') == 'upassword' ? 'active' : '' ?> tab-pane" id="upassword">
                                    <form class="form-horizontal" id="form-password" action="<?= base_url() ?>/admin/profile-edit-password" method="POST">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="id_user" value="<?= $user['id'] ?>">
                                        <div class="form-group row">
                                            <label for="password_lm" class="col-sm-3 col-form-label">Password Lama</label>
                                            <div class="col-sm-9">
                                                <div class="input-group" id="show_hide_password_lm">
                                                    <input type="password" class="form-control <?= ($validation->hasError('password_lm')) ? 'is-invalid' : ''; ?>" id="password_lm" name="password_lm" placeholder="Password lama" autocomplete="off">
                                                    <div class="input-group-append">
                                                        <div class="input-group-text">
                                                            <span class="fas fa-eye-slash"></span>
                                                        </div>
                                                    </div>
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('password_lm') ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="password_br" class="col-sm-3 col-form-label">Password Baru</label>
                                            <div class="col-sm-9">
                                                <div class="input-group" id="show_hide_password">
                                                    <input type="password" class="form-control <?= ($validation->hasError('password_br')) ? 'is-invalid' : ''; ?>" id="password_br" name="password_br" placeholder="Password baru" autocomplete="off">
                                                    <div class="input-group-append">
                                                        <div class="input-group-text">
                                                            <span class="fas fa-eye-slash"></span>
                                                        </div>
                                                    </div>
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('password_br') ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="password_br2" class="col-sm-3 col-form-label">Password Baru (ulangi)</label>
                                            <div class="col-sm-9">
                                                <div class="input-group" id="show_hide_password_conn">
                                                    <input type="password" class="form-control <?= ($validation->hasError('password_br2')) ? 'is-invalid' : ''; ?>" id="password_br2" name="password_br2" placeholder="Password baru (ulangi)" autocomplete="off">
                                                    <div class="input-group-append">
                                                        <div class="input-group-text">
                                                            <span class="fas fa-eye-slash"></span>
                                                        </div>
                                                    </div>
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('password_br2') ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="offset-sm-3 col-sm-9">
                                                <button type="submit" class="btn btn-success">Ubah Password</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<?= $this->endSection(); ?>

<?= $this->section('plugin_js'); ?>
<?= $this->endSection(); ?>

<?= $this->section('page_js'); ?>
<?= $this->endSection(); ?>