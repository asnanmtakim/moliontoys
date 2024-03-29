<?php $app_identity = app_identity(); ?>
<?= $this->extend('welcome/template'); ?>

<?= $this->section('content'); ?>
<!-- ======= Hero Section ======= -->
<section id="hero" class="hero carousel  carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">
   <?php foreach ($home as $hm) : ?>
      <div class="carousel-item <?= $hm['active_home'] == 1 ? 'active' : ''; ?>">
         <div class="container">
            <div class="row justify-content-center gy-6">

               <div class="col-lg-6 col-md-8">
                  <img src="<?= base_url(); ?>/uploads/home/<?= $hm['image_home']; ?>" alt="" class="img-fluid img">
               </div>

               <div class="col-lg-9 text-center">
                  <h2><?= $hm['title_home']; ?></h2>
                  <p><?= $hm['description_home']; ?></p>
               </div>

            </div>
         </div>
      </div><!-- End Carousel Item -->
   <?php endforeach; ?>
   <a class="carousel-control-prev" href="#hero" role="button" data-bs-slide="prev">
      <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
   </a>

   <a class="carousel-control-next" href="#hero" role="button" data-bs-slide="next">
      <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
   </a>

   <ol class="carousel-indicators"></ol>

</section><!-- End Hero Section -->

<main id="main">

   <!-- ======= About Section ======= -->
   <section id="about" class="about">
      <div class="container" data-aos="fade-up">

         <div class="section-header">
            <h2>Tentang Kami</h2>
            <p>Informasi tentang perusahaan kami</p>
         </div>

         <div class="row g-4 g-lg-5" data-aos="fade-up" data-aos-delay="200">

            <div class="col-lg-5">
               <div class="about-img">
                  <img src="<?= base_url(); ?>/uploads/about/<?= $about['image_about']; ?>" class="img-fluid" alt="">
               </div>
            </div>

            <div class="col-lg-7">
               <h3 class="pt-0 pt-lg-5">Tentang <?= $app_identity['app_name']; ?></h3>

               <!-- Tabs -->
               <ul class="nav nav-pills mb-3">
                  <li><a class="nav-link active" data-bs-toggle="pill" href="#info">Info Singkat</a></li>
                  <li><a class="nav-link" data-bs-toggle="pill" href="#visi">Visi</a></li>
                  <li><a class="nav-link" data-bs-toggle="pill" href="#misi">Misi</a></li>
               </ul><!-- End Tabs -->

               <!-- Tab Content -->
               <div class="tab-content">

                  <div class="tab-pane fade show active" id="info">
                     <?= $about['description_about']; ?>
                  </div><!-- End Tab 1 Content -->

                  <div class="tab-pane fade show" id="visi">
                     <?= $about['visi_about']; ?>
                  </div><!-- End Tab 2 Content -->

                  <div class="tab-pane fade show" id="misi">
                     <?= $about['misi_about']; ?>
                  </div><!-- End Tab 3 Content -->

               </div>

            </div>

         </div>

      </div>
   </section><!-- End About Section -->

   <!-- ======= Clients Section ======= -->
   <section id="clients" class="clients">
      <div class="container" data-aos="zoom-out">

         <div class="clients-slider swiper">
            <div class="swiper-wrapper align-items-center">
               <?php foreach ($partner as $pn) : ?>
                  <div class="swiper-slide"><img src="<?= base_url(); ?>/uploads/partner/<?= $pn['image_partner']; ?>" class="img-fluid" alt="<?= $pn['title_partner']; ?>"></div>
               <?php endforeach; ?>
            </div>
         </div>

      </div>
   </section><!-- End Clients Section -->

   <!-- ======= Features Section ======= -->
   <section id="features" class="features">
      <div class="container" data-aos="fade-up">

         <div class="section-header">
            <h2>Sertifikat dan Legalitas</h2>
            <p>Sertifikat dan legalisasi dari badan Nasional dan Internasional</p>
         </div>

         <ul class="nav nav-tabs row gy-4 d-flex">
            <?php foreach ($certificate as $key => $value) : ?>
               <li class="nav-item col-6 col-md-4 col-lg-2">
                  <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#tab-<?= $key; ?>">
                     <i class="bi bi-binoculars color-cyan"></i>
                     <h4><?= $value['title_certificate']; ?></h4>
                  </a>
               </li><!-- End Tab 1 Nav -->
            <?php endforeach; ?>
         </ul>

         <div class="tab-content">
            <?php foreach ($certificate as $keyc => $valuec) : ?>
               <div class="tab-pane active show" id="tab-<?= $keyc; ?>">
                  <div class="row gy-4">
                     <div class="col-lg-8 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="100">
                        <h3><?= $valuec['title_certificate']; ?></h3>
                        <?= $value['description_certificate']; ?>
                     </div>
                     <div class="col-lg-4 order-1 order-lg-2 text-center" data-aos="fade-up" data-aos-delay="200">
                        <a href="<?= base_url(); ?>/uploads/certificate/<?= $valuec['file_certificate']; ?>" class="glightbox2 preview-link">
                           <img src="<?= base_url(); ?>/uploads/certificate/<?= $valuec['file_certificate']; ?>" alt="Sertifikat" class="img-fluid">
                        </a>
                        <!-- <a href="" target="_blank">
                           <iframe src="<?= base_url(); ?>/uploads/certificate/<?= $valuec['file_certificate']; ?>" frameborder="0" width="100%" height="450px"></iframe>
                        </a> -->
                     </div>
                  </div>
               </div><!-- End Tab Content 1 -->
            <?php endforeach; ?>
         </div>

      </div>
   </section><!-- End Features Section -->

   <!-- ======= Portfolio Section ======= -->
   <section id="portfolio" class="portfolio" data-aos="fade-up">

      <div class="container">
         <div class="section-header">
            <h2>Produk Kami</h2>
            <p>Produk-produk yang kami hasilkan</p>
         </div>
      </div>

      <div class="container-fluid" data-aos="fade-up" data-aos-delay="200">
         <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry" data-portfolio-sort="original-order">
            <ul class="portfolio-flters">
               <li data-filter="*" class="filter-active">All</li>
               <!-- <li data-filter=".filter-app">App</li>
                  <li data-filter=".filter-product">Product</li>
                  <li data-filter=".filter-branding">Branding</li>
                  <li data-filter=".filter-books">Books</li> -->
            </ul><!-- End Portfolio Filters -->
            <div class="row g-0 portfolio-container">
               <?php foreach ($product as $pd) : ?>
                  <div class="col-xl-3 col-lg-4 col-md-6 portfolio-item filter-product">
                     <img src="<?= base_url(); ?>/uploads/product/<?= $pd['id_product']; ?>/<?= $pd['image_product'][0]['image_file']; ?>" class="img-fluid" alt="">
                     <div class="portfolio-info">
                        <h4><?= $pd['name_product']; ?></h4>
                        <a href="<?= base_url(); ?>/uploads/product/<?= $pd['id_product']; ?>/<?= $pd['image_product'][0]['image_file']; ?>" title="<?= $pd['name_product']; ?>" data-gallery="portfolio-gallery" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                        <a href="<?= base_url(); ?>/product/<?= $pd['slug_product']; ?>" title="Detail" class="details-link"><i class="bi bi-link-45deg"></i></a>
                     </div>
                  </div><!-- End Portfolio Item -->
               <?php endforeach; ?>
            </div><!-- End Portfolio Container -->

         </div>

      </div>
   </section><!-- End Portfolio Section -->

   <!-- ======= Team Section ======= -->
   <!-- <section id="team" class="team">
      <div class="container" data-aos="fade-up">

         <div class="section-header">
            <h2>Tim kami</h2>
            <p>Tim solid kami.</p>
         </div>

         <div class="row gy-5">
            <?php foreach ($team as $tm) : ?>
               <div class="col-xl-4 col-md-6 d-flex" data-aos="zoom-in" data-aos-delay="200">
                  <div class="team-member">
                     <div class="member-img">
                        <img src="<?= base_url(); ?>/uploads/team/<?= $tm['image_team']; ?>" class="img-fluid" alt="">
                     </div>
                     <div class="member-info">
                        <div class="social">
                           <a href="https://wa.me/<?= $tm['wa_team']; ?>" target="_blank"><i class="bi bi-whatsapp"></i></a>
                           <a href="https://facebook.com/<?= $tm['fb_team']; ?>"><i class="bi bi-facebook" target="_blank"></i></a>
                           <a href="https://instagram.com/<?= $tm['ig_team']; ?>"><i class="bi bi-instagram" target="_blank"></i></a>
                        </div>
                        <h4><?= $tm['name_team']; ?></h4>
                        <span><?= $tm['position_team']; ?></span>
                     </div>
                  </div>
               </div>
            <?php endforeach; ?>
         </div>
      </div>
   </section> -->
   <!-- End Team Section -->

   <!-- ======= Recent Blog Posts Section ======= -->
   <section id="recent-blog-posts" class="recent-blog-posts">

      <div class="container" data-aos="fade-up">

         <div class="section-header">
            <h2>Blog</h2>
            <p>Postingan Blog</p>
         </div>

         <div class="row">
            <?php foreach ($blog as $bg) : ?>
               <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                  <div class="post-box">
                     <div class="post-img"><img src="<?= base_url(); ?>/uploads/blog/<?= $bg['image_blog']; ?>" class="img-fluid" alt=""></div>
                     <div class="meta">
                        <span class="post-date"><?= format_tanggal($bg['date_blog']); ?></span>
                        <span class="post-author"> / <?= $bg['fullname']; ?></span>
                     </div>
                     <h3 class="post-title"><?= $bg['title_blog']; ?></h3>
                     <p><?= fromat_substr($bg['description_blog'], 100); ?>...</p>
                     <a href="<?= base_url(); ?>/blog/<?= $bg['slug_blog']; ?>" class="readmore stretched-link"><span>Baca Lebih Lanjut</span><i class="bi bi-arrow-right"></i></a>
                  </div>
               </div>
            <?php endforeach; ?>
         </div>

      </div>

   </section><!-- End Recent Blog Posts Section -->

   <!-- ======= F.A.Q Section ======= -->
   <section id="faq" class="faq">
      <div class="container-fluid" data-aos="fade-up">

         <div class="row gy-4">

            <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1">

               <div class="content px-xl-5">
                  <h3>Frequently Asked <strong>Questions</strong></h3>
                  <p>
                     Pertanyaan-pertanyaan
                  </p>
               </div>

               <div class="accordion accordion-flush px-xl-5" id="faqlist">
                  <?php foreach ($faq as $key => $value) : ?>
                     <div class="accordion-item" data-aos="fade-up" data-aos-delay="200">
                        <h3 class="accordion-header">
                           <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-<?= $key; ?>">
                              <i class="bi bi-question-circle question-icon"></i>
                              <?= $value['question_faq']; ?>
                           </button>
                        </h3>
                        <div id="faq-content-<?= $key; ?>" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                           <div class="accordion-body">
                              <?= $value['answer_faq']; ?>
                           </div>
                        </div>
                     </div><!-- # Faq item-->
                  <?php endforeach; ?>
               </div>

            </div>

            <div class="col-lg-5 align-items-stretch order-1 order-lg-2 img" style='background-image: url("<?= base_url(); ?>/assets/welcome/img/faq.jpg");'>&nbsp;</div>
         </div>

      </div>
   </section><!-- End F.A.Q Section -->

   <!-- ======= Contact Section ======= -->
   <section id="contact" class="contact">
      <div class="container">

         <div class="section-header">
            <h2>Hubungi Kami</h2>
            <p>Hubungi kami di kontak dibawah</p>
         </div>

      </div>

      <div class="map">
         <iframe src="<?= $app_identity['app_maps']; ?>" frameborder="0" allowfullscreen></iframe>
      </div><!-- End Google Maps -->

      <div class="container">

         <div class="row gy-5 gx-lg-5">

            <div class="col-lg-4">

               <div class="info">
                  <h3>Kontak kami</h3>
                  <p>Kontak kami</p>

                  <div class="info-item d-flex">
                     <i class="bi bi-geo-alt flex-shrink-0"></i>
                     <div>
                        <h4>Alamat:</h4>
                        <p><?= $app_identity['app_address']; ?></p>
                     </div>
                  </div><!-- End Info Item -->

                  <div class="info-item d-flex">
                     <i class="bi bi-envelope flex-shrink-0"></i>
                     <div>
                        <h4>Email:</h4>
                        <a href="mailto:<?= $app_identity['app_email']; ?>">
                           <p><?= $app_identity['app_email']; ?></p>
                        </a>
                     </div>
                  </div><!-- End Info Item -->

                  <div class="info-item d-flex">
                     <i class="bi bi-phone flex-shrink-0"></i>
                     <div>
                        <h4>Telp:</h4>
                        <a href="http://wa.me/<?= $app_identity['app_phone']; ?>" target="_blank" rel="noopener noreferrer">
                           <p><?= $app_identity['app_phone']; ?></p>
                        </a>
                     </div>
                  </div><!-- End Info Item -->

               </div>

            </div>

            <div class="col-lg-8">
               <form action="<?= base_url(); ?>/sent-message" method="post" role="form" class="php-email-form">
                  <div class="row">
                     <div class="col-md-6 form-group">
                        <input type="text" name="name" class="form-control" id="name" placeholder="Nama" required>
                     </div>
                     <div class="col-md-6 form-group mt-3 mt-md-0">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                     </div>
                  </div>
                  <div class="form-group mt-3">
                     <input type="text" class="form-control" name="subject" id="subject" placeholder="Judul" required>
                  </div>
                  <div class="form-group mt-3">
                     <textarea class="form-control" name="message" id="message" placeholder="Pesan" required></textarea>
                  </div>
                  <div class="my-3">
                     <div class="loading">Loading</div>
                     <div class="error-message"></div>
                     <div class="sent-message">Pesan Berhasil Terkirim. Terima Kasih!</div>
                  </div>
                  <div class="text-center"><button type="submit">Kirim Pesan</button></div>
               </form>
            </div><!-- End Contact Form -->

         </div>

      </div>
   </section><!-- End Contact Section -->

</main><!-- End #main -->
<?= $this->endSection(); ?>