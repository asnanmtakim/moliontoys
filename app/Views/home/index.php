<?php $app_identity = app_identity() ?>
<?= $this->extend('layout/template'); ?>

<?= $this->section('plugin_css'); ?>
<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url() ?>/assets/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?= base_url() ?>/assets/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="<?= base_url() ?>/assets/admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<!-- Magnific Popup -->
<link rel="stylesheet" href="<?= base_url() ?>/assets/admin/plugins/magnific-popup/dist/magnific-popup.css">
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Halaman Beranda</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active">Halaman Beranda</li>
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
                            <h3 class="card-title">Halaman Beranda <?= $app_identity['app_title']; ?></h3>
                            <div class="card-tools">
                                <a href="<?= base_url() ?>/admin/home-add">
                                    <div class="btn btn-success btn-sm">
                                        <i class="fas fa-plus mr-1"></i>
                                        Tambah halaman beranda
                                    </div>
                                </a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-sm table-bordered table-hover table-striped">
                                    <thead class="">
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th>Judul</th>
                                            <th>Deskripsi</th>
                                            <th>Gambar</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($home as $hm) : ?>
                                            <tr>
                                                <td class="text-center"><?= $i++ ?></td>
                                                <td><?= $hm['title_home']; ?></td>
                                                <td><?= $hm['description_home']; ?></td>
                                                <td class="text-center">
                                                    <a href="<?= base_url(); ?>/uploads/home/<?= $hm['image_home']; ?>" class="image-link">
                                                        <img src="<?= base_url(); ?>/uploads/home/<?= $hm['image_home']; ?>" class="rounded" width="30px" alt="">
                                                    </a>
                                                </td>
                                                <td class="text-center">
                                                    <div class="btn-group">
                                                        <a href="<?= base_url(); ?>/admin/home-edit/<?= $hm['id_home']; ?>" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                                        <button class="btn btn-sm btn-danger item_delete" data-id="<?= $hm['id_home']; ?>" data-name="<?= $hm['title_home']; ?>"><i class="fas fa-trash"></i></button>
                                                    </div>
                                                </td>
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
<!-- Magnific Popup -->
<script src="<?= base_url() ?>/assets/admin/plugins/magnific-popup/dist/jquery.magnific-popup.js"></script>
<?= $this->endSection(); ?>

<?= $this->section('page_js'); ?>
<script>
    $("#example1").DataTable({
        "responsive": true,
        "lengthChange": true,
        "language": table_language(),
        "autoWidth": false,
        "columnDefs": [{
            "targets": 4,
            "orderable": false
        }],
        "fnDrawCallback": function() {
            $('.image-link').magnificPopup({
                type: 'image',
                mainClass: 'mfp-with-zoom', // this class is for CSS animation below

                zoom: {
                    enabled: true, // By default it's false, so don't forget to enable it
                    duration: 300, // duration of the effect, in milliseconds
                    easing: 'ease-in-out', // CSS transition easing function
                    opener: function(openerElement) {
                        return openerElement.is('img') ? openerElement : openerElement.find('img');
                    }
                }
            });
        }
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    $(document).off("click", "table#example1 button.item_delete")
        .on("click", "table#example1 button.item_delete", function(e) {
            e.preventDefault();
            let id = $(this).attr("data-id");
            let name = $(this).attr("data-name");
            Swal.fire({
                title: 'Yakin hapus Halaman Beranda?',
                text: "Hapus beranda " + name + ", data yang sudah dihapus tidak bisa dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonClass: "btn btn-danger mx-1",
                cancelButtonClass: "btn btn-outline-light mx-1",
                buttonsStyling: false,
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "POST",
                        url: BASE_URL + "/admin/home-delete/",
                        data: {
                            id: id
                        },
                        dataType: "json",
                        success: function(res) {
                            if (res.status == 200) {
                                Swal.fire({
                                    title: "Berhasil",
                                    text: res.pesan,
                                    icon: "success",
                                    confirmButtonClass: "btn btn-success",
                                    buttonsStyling: false,
                                }).then((result) => {
                                    location.reload();
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
                    });
                }
            });
        });
</script>
<?= $this->endSection(); ?>