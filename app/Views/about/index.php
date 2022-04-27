<?php $app_identity = app_identity() ?>
<?= $this->extend('layout/template'); ?>

<?= $this->section('plugin_css'); ?>
<!-- summernote -->
<link rel="stylesheet" href="<?= base_url() ?>/assets/admin/plugins/summernote/summernote-bs4.min.css">
<link rel="stylesheet" href="<?= base_url() ?>/assets/admin/plugins/cropperjs/dist/cropper.css">
<style>
    .image_area {
        position: relative;
    }

    #sample_image {
        display: block;
        max-width: 100%;
    }

    .preview {
        overflow: hidden;
        height: 200px;
        margin: 10px;
        border: 1px solid red;
    }

    .overlay {
        position: absolute;
        bottom: 10px;
        left: 0;
        right: 0;
        background-color: rgba(255, 255, 255, 0.5);
        overflow: hidden;
        height: 0;
        transition: .5s ease;
        width: 100%;
    }

    .image_area:hover .overlay {
        height: 50%;
        cursor: pointer;
    }

    .text {
        color: #333;
        font-size: 20px;
        position: absolute;
        top: 50%;
        left: 50%;
        -webkit-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        text-align: center;
    }
</style>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Halaman Tentang</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active">Edit Halaman Tentang</li>
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
                <!-- left column -->
                <div class="col-12">
                    <!-- Horizontal Form -->
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Edit Data Tentang</h3>
                            <div class="card-tools text-bold">
                                * harus diisi.
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form class="form-horizontal" action="<?= base_url() ?>/admin/about" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id_about" value="<?= $about['id_about']; ?>">
                            <input type="hidden" name="image_about_old" value="<?= $about['image_about']; ?>">
                            <?= csrf_field() ?>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="description_about" class="col-sm-2 col-form-label">Info Singkat*</label>
                                    <div class="col-sm-10">
                                        <textarea type="text" class="form-control" id="description_about" name="description_about" placeholder="Info Singkat"><?= $about['description_about']; ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="visi_about" class="col-sm-2 col-form-label">Visi*</label>
                                    <div class="col-sm-10">
                                        <textarea type="text" class="form-control" id="visi_about" name="visi_about" placeholder="Visi"><?= $about['visi_about']; ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="misi_about" class="col-sm-2 col-form-label">Misi*</label>
                                    <div class="col-sm-10">
                                        <textarea type="text" class="form-control" id="misi_about" name="misi_about" placeholder="Misi"><?= $about['misi_about']; ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="gambar" class="col-sm-2 col-form-label">Gambar Tentang</label>
                                    <div class="col-sm-10">
                                        <label for="upload_image">
                                            <img src="<?= base_url(); ?>/uploads/about/<?= $about['image_about']; ?>" id="uploaded_image" class="img-responsive img-fluid" style="max-width: 400px;" />
                                            <div class="overlay">
                                                <div class="text">Klik Untuk Mengubah Gambar</div>
                                            </div>
                                            <input type="file" accept="image/*" name="image" class="image" id="upload_image" style="display:none" />
                                        </label>
                                        <div class="error-validation">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Ubah Tentang</button>
                                <a href="<?= base_url() ?>/admin/about" class="btn btn-default float-right">Kembali</a>
                            </div>
                            <!-- /.card-footer -->
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<div class="modal fade" id="modal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Crop dan Sesuaikan Gambar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="img-container">
                    <div class="row">
                        <div class="col-md-9">
                            <img src="" id="sample_image" />
                        </div>
                        <div class="col-md-3">
                            <div class="preview"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="crop" class="btn btn-primary">Crop</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>

<?= $this->section('plugin_js'); ?>
<!-- Summernote -->
<script src="<?= base_url() ?>/assets/admin/plugins/summernote/summernote-bs4.min.js"></script>
<script src="<?= base_url() ?>/assets/admin/plugins/cropperjs/dist/cropper.js"></script>
<?= $this->endSection(); ?>

<?= $this->section('page_js'); ?>
<script>
    $(document).ready(function() {
        $('#description_about').summernote({
            placeholder: 'Info Singkat',
            height: 220
        });
        $('#visi_about').summernote({
            placeholder: 'Visi',
            height: 220
        });
        $('#misi_about').summernote({
            placeholder: 'Misi',
            height: 220
        });

        var $modal = $('#modal');
        var image = document.getElementById('sample_image');
        var cropper;
        var image_crop;

        $('#upload_image').change(function(event) {
            var files = event.target.files;

            var done = function(url) {
                image.src = url;
                $modal.modal('show');
            };

            if (files && files.length > 0) {
                reader = new FileReader();
                reader.onload = function(event) {
                    done(reader.result);
                };
                reader.readAsDataURL(files[0]);
            }
        });

        $modal.on('shown.bs.modal', function() {
            cropper = new Cropper(image, {
                aspectRatio: 4 / 3,
                viewMode: 1,
                preview: '.preview'
            });
        }).on('hidden.bs.modal', function() {
            cropper.destroy();
            cropper = null;
        }).on('hide.bs.modal', function() {
            cropper.destroy();
            cropper = null;
        });

        $('#crop').click(function() {
            canvas = cropper.getCroppedCanvas({
                width: 600,
                height: 450
            });
            $('#uploaded_image').attr('src', canvas.toDataURL());
            image_crop = canvas.toDataURL();
            $modal.modal('hide');
        });

        $("form").submit(function(e) {
            e.preventDefault();
            var formData = $(this).serialize() + '&image_about=' + image_crop;
            $.ajax({
                url: $(this).attr("action"),
                data: formData,
                type: $(this).attr("method"),
                success: function(res) {
                    res = JSON.parse(res);
                    if (res.status == 200) {
                        Swal.fire({
                            title: "Sukses",
                            text: res.pesan,
                            icon: "success",
                            confirmButtonClass: "btn btn-info",
                            buttonsStyling: false,
                        }).then(function(_res_) {
                            location.reload();
                        });
                    } else {
                        if (res.status == 400) {
                            var frm = Object.keys(res.pesan);
                            var val = Object.values(res.pesan);
                            $('form .invalid-feedback').remove();
                            $('.error-validation').html('');
                            frm.forEach(function(el, ind) {
                                if (val[ind] != '') {
                                    if (el == 'image_about') {
                                        $('.error-validation').html(val[ind]);
                                    }
                                    $('form #' + el).removeClass('is-invalid').addClass("is-invalid");
                                    var app = '<div id="' + el + '-error" class="invalid-feedback" for="' + el + '">' + val[ind] + '</div>';
                                    $('form #' + el).closest('.col-sm-10').append(app);
                                } else {
                                    $('form #' + el).removeClass('is-invalid');
                                    $('.error-validation').html('');
                                }
                            });
                        } else {
                            Swal.fire({
                                title: "Error",
                                text: res.pesan,
                                icon: "error",
                                confirmButtonClass: "btn btn-danger",
                                buttonsStyling: false,
                            });
                        }
                    }
                }
            })
            return false;
        });
    });
</script>
<?= $this->endSection(); ?>