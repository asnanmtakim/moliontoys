<?php $app_identity = app_identity(); ?>
<?= $this->extend('welcome/template'); ?>

<?= $this->section('content'); ?>
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2><?= $title; ?></h2>
                <ol>
                    <li><a href="<?= base_url(); ?>">Beranda</a></li>
                    <li><?= $title; ?></li>
                </ol>
            </div>

        </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
        <div class="container" data-aos="fade-up">

            <div class="row gy-4">

                <div class="col-lg-7">
                    <div class="portfolio-details-slider swiper">
                        <div class="swiper-wrapper align-items-center">
                            <?php foreach ($product['image_product'] as $ip) : ?>
                                <div class="swiper-slide">
                                    <img src="<?= base_url(); ?>/uploads/product/<?= $product['id_product']; ?>/<?= $ip['image_file']; ?>" alt="">
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="portfolio-info">
                        <h3><?= $product['name_product']; ?></h3>
                        <ul>
                            <li><strong>Kategori</strong>: Mainan Anak</li>
                            <li><strong>Merk</strong>: Molion</li>
                            <li><strong>Bahan</strong>: <?= $product['material_product']; ?></li>
                        </ul>
                    </div>
                    <div class="portfolio-description">
                        <h2>Deskripsi Produk</h2>
                        <p class="text-justify">
                            <?= $product['detail_product']; ?>
                        </p>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Portfolio Details Section -->

</main><!-- End #main -->
<?= $this->endSection(); ?>