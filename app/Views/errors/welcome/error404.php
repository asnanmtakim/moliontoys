<?php $app_identity = app_identity(); ?>
<?= $this->extend('welcome/template'); ?>

<?= $this->section('content'); ?>
<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>404 Error Page</h2>
                <ol>
                    <li><a href="<?= base_url(); ?>">Beranda</a></li>
                    <li>404 Error Page</li>
                </ol>
            </div>

        </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section class="inner-page">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2 class="text-danger">404</h2>
                <h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops! Halaman tidak ditemukan.</h3>
                <p>
                    <?php if (!empty($message) && $message !== '(null)') : ?>
                        <?= esc($message) ?>
                    <?php else : ?>
                        Kemungkinan halaman telah dihapus, atau Anda salah menulis URL.
                    <?php endif ?>
                </p>
            </div>

        </div>
    </section><!-- End Inner Page -->

</main><!-- End #main -->
<?= $this->endSection(); ?>