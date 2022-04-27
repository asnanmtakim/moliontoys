<?php $app_identity = app_identity() ?>
<?= $this->extend('layout/template'); ?>

<?= $this->section('plugin_css'); ?>
<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url() ?>/assets/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?= base_url() ?>/assets/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="<?= base_url() ?>/assets/admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<!-- summernote -->
<link rel="stylesheet" href="<?= base_url() ?>/assets/admin/plugins/summernote/summernote-bs4.min.css">
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Contacts</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active">Contacts</li>
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
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Hasil form contact <?= $app_identity['app_title']; ?></h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-hover table-striped">
                                    <thead class="">
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th>Tanggal</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Subject/judul</th>
                                            <th>Pesan</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($contact as $con) : ?>
                                            <tr>
                                                <td class="text-center"><?= $i++ ?></td>
                                                <td><?= date('d/m/Y H:i:s', strtotime($con['created_at'])); ?></td>
                                                <td><?= $con['name']; ?></td>
                                                <td><?= $con['email']; ?></td>
                                                <td><?= $con['subject']; ?></td>
                                                <td><?= $con['message']; ?></td>
                                                <td><span class="badge badge-<?= $con['status'] == 1 ? 'success' : 'warning'; ?>"><?= $con['status'] == 1 ? 'Sudah terbalas' : 'Belum dibalas'; ?></span></td>
                                                <td><button class="btn btn-sm btn-primary item_balas" title="Balas" data-id="<?= $con['id']; ?>"><i class="fas fa-envelope"></i> Balas</button></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
        <!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form-data" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-12">
                    <hr class="mt-0 mb-2">
                    <div class="row">
                        <label class="col-sm-3 my-0">
                            Tgl Contact
                        </label>
                        <div class="col-sm-9" id="tanggal">
                        </div>
                    </div>
                    <hr class="my-2">
                    <div class="row">
                        <label class="col-sm-3 my-0">
                            Pengirim
                        </label>
                        <div class="col-sm-9" id="pengirim">
                        </div>
                    </div>
                    <hr class="my-2">
                    <div class="row">
                        <label class="col-sm-3 my-0">
                            Subject/judul
                        </label>
                        <div class="col-sm-9" id="judul">
                        </div>
                    </div>
                    <hr class="my-2">
                    <div class="row">
                        <label class="col-sm-3 my-0">
                            Pesan
                        </label>
                        <div class="col-sm-9" id="pesan">
                        </div>
                    </div>
                    <hr class="my-2">
                    <h5 class="text-bold text-center mb-3">Form Balasan</h5>
                    <form action="<?= base_url(); ?>/admin/contact-email" id="form-data" class="form" method="POST">
                        <input type="hidden" name="id" id="id_contact">
                        <div class="row">
                            <label for="subject_email" class="col-sm-3 col-form-label">Subject Email</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="subject_email" name="subject_email" required placeholder="Subject Email">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="balas" class="col-form-label">Pesan Balasan</label>
                            </div>
                            <div class="col-12">
                                <textarea name="balas" id="balas" required></textarea>
                            </div>
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-outline-danger">Close</button>
                <button type="submit" class="btn btn-success" id="save-form">Kirim Email</button>
            </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('plugin_js'); ?>
<!-- DataTables  & Plugins -->
<script src="<?= base_url() ?>/assets/admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>/assets/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>/assets/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>/assets/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>/assets/admin/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url() ?>/assets/admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>/assets/admin/plugins/jszip/jszip.min.js"></script>
<script src="<?= base_url() ?>/assets/admin/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url() ?>/assets/admin/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url() ?>/assets/admin/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url() ?>/assets/admin/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url() ?>/assets/admin/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- Summernote -->
<script src="<?= base_url() ?>/assets/admin/plugins/summernote/summernote-bs4.min.js"></script>
<?= $this->endSection(); ?>

<?= $this->section('page_js'); ?>
<script>
    $("#example1").DataTable({
        "responsive": true,
        "lengthChange": true,
        "autoWidth": false,
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $(document).off("click", "table#example1 button.item_balas")
        .on("click", "table#example1 button.item_balas", function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: BASE_URL + "/admin/contact-one",
                data: {
                    id: $(this).attr("data-id")
                },
                dataType: "json",
                success: function(res) {
                    if (res.status == 200) {
                        $("#modal-form").modal({
                            backdrop: false
                        });
                        $("#modal-form div.modal-header h4.modal-title").html("Balas Kirim Email Form Contact");
                        $("#modal-form .modal-body #tanggal").html('');
                        $("#modal-form .modal-body #pengirim").html('');
                        $("#modal-form .modal-body #judul").html('');
                        $("#modal-form .modal-body #pesan").html('');
                        $("#modal-form .modal-body #tanggal").html(tglIndoJam(res.data.created_at));
                        $("#modal-form .modal-body #pengirim").html(res.data.name + ' (' + res.data.email + ')');
                        $("#modal-form .modal-body #judul").html(res.data.subject);
                        $("#modal-form .modal-body #pesan").html(res.data.message);
                        $("#modal-form form#form-data #id_contact").val(res.data.id);
                        $("#modal-form form#form-data #subject_email").val(res.data.subject_email);
                        $("#modal-form form#form-data .note-editable").html('');
                        $("#modal-form form#form-data .note-editable").html(res.data.balas);
                    } else {
                        swal({
                            title: "Error",
                            text: res.pesan,
                            icon: "error",
                            confirmButtonClass: "btn btn-danger",
                            buttonsStyling: false,
                        });
                    }
                }
            });
        });
    $(function() {
        // Summernote
        $('#balas').summernote({
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['fontname', ['fontname']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link']],
                ['height', ['height']],
                ['view', ['fullscreen']],
            ],
            placeholder: 'Pesan Balasan',
            height: 200
        });
    })
</script>
<?= $this->endSection(); ?>