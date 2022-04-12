<?php
$app_identity = app_identity();
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta content="width=device-width, initial-scale=1.0" name="viewport">

   <title><?= $app_identity['app_title']; ?> - <?= $title; ?></title>
   <meta content="" name="description">

   <meta content="" name="keywords">

   <!-- Favicons -->
   <link href="<?= $app_identity['app_icon']; ?>" rel="icon">
   <link href="<?= $app_identity['app_icon']; ?>" rel="apple-touch-icon">

   <!-- Google Fonts -->
   <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

   <!-- Vendor CSS Files -->
   <link href="<?= base_url(); ?>/assets/welcome/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
   <link href="<?= base_url(); ?>/assets/welcome/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
   <link href="<?= base_url(); ?>/assets/welcome/vendor/aos/aos.css" rel="stylesheet">
   <link href="<?= base_url(); ?>/assets/welcome/vendor/remixicon/remixicon.css" rel="stylesheet">
   <link href="<?= base_url(); ?>/assets/welcome/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
   <link href="<?= base_url(); ?>/assets/welcome/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">

   <!-- Template Main CSS File -->
   <link href="<?= base_url(); ?>/assets/welcome/css/style.css" rel="stylesheet">

   <!-- =======================================================
  * Template Name: FlexStart - v1.7.0
  * Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

   <!-- ======= Header ======= -->
   <header id="header" class="header fixed-top">
      <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

         <a href="<?= base_url(); ?>" class="logo d-flex align-items-center">
            <img src="<?= $app_identity['app_brand']; ?>" alt="">
            <span><?= $app_identity['app_title']; ?></span>
         </a>

         <nav id="navbar" class="navbar">
            <ul>
               <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
               <li><a class="nav-link scrollto" href="#about">Tentang Kami</a></li>
               <li><a class="nav-link scrollto" href="#services">Pelayanan</a></li>
               <li><a class="nav-link scrollto" href="#team">Tim Kerja</a></li>
               <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
               <li><a class="getstarted scrollto" href="<?= base_url(); ?>/login">Login</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
         </nav><!-- .navbar -->

      </div>
   </header><!-- End Header -->

   <!-- ======= Hero Section ======= -->
   <section id="hero" class="hero d-flex align-items-center">

      <div class="container">
         <div class="row">
            <div class="col-lg-6 d-flex flex-column justify-content-center">
               <h1 data-aos="fade-up"><?= $app_identity['app_name']; ?></h1>
               <h2 data-aos="fade-up" data-aos-delay="400"><?= $app_identity['app_about']; ?></h2>
               <!-- <div data-aos="fade-up" data-aos-delay="600">
                  <div class="text-center text-lg-start">
                     <a href="<?= base_url(); ?>/login" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                        <span>Login</span>
                        <i class="bi bi-arrow-right"></i>
                     </a>
                  </div>
               </div> -->
            </div>
            <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
               <img src="<?= base_url(); ?>/assets/welcome/img/hero.png" class="img-fluid" alt="">
            </div>
         </div>
      </div>

   </section><!-- End Hero -->

   <main id="main">
      <!-- ======= About Section ======= -->
      <section id="about" class="about">

         <div class="container" data-aos="fade-up">
            <div class="row gx-0">

               <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
                  <div class="content">
                     <h3>Tentang kami</h3>
                     <?= $app_identity['app_about_us']; ?>
                  </div>
               </div>

               <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
                  <img src="<?= base_url(); ?>/assets/welcome/img/about.png" class="img-fluid" alt="">
               </div>

            </div>
         </div>

      </section><!-- End About Section -->

      <!-- ======= Counts Section ======= -->
      <!-- <section id="counts" class="counts">
         <div class="container" data-aos="fade-up">

            <div class="row gy-4">

               <div class="col-lg-3 col-md-6">
                  <div class="count-box">
                     <i class="bi bi-emoji-smile"></i>
                     <div>
                        <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1" class="purecounter"></span>
                        <p>Happy Clients</p>
                     </div>
                  </div>
               </div>

               <div class="col-lg-3 col-md-6">
                  <div class="count-box">
                     <i class="bi bi-journal-richtext" style="color: #ee6c20;"></i>
                     <div>
                        <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1" class="purecounter"></span>
                        <p>Projects</p>
                     </div>
                  </div>
               </div>

               <div class="col-lg-3 col-md-6">
                  <div class="count-box">
                     <i class="bi bi-headset" style="color: #15be56;"></i>
                     <div>
                        <span data-purecounter-start="0" data-purecounter-end="1463" data-purecounter-duration="1" class="purecounter"></span>
                        <p>Hours Of Support</p>
                     </div>
                  </div>
               </div>

               <div class="col-lg-3 col-md-6">
                  <div class="count-box">
                     <i class="bi bi-people" style="color: #bb0852;"></i>
                     <div>
                        <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1" class="purecounter"></span>
                        <p>Hard Workers</p>
                     </div>
                  </div>
               </div>

            </div>

         </div>
      </section> -->
      <!-- End Counts Section -->

      <!-- ======= Services Section ======= -->
      <section id="services" class="services">

         <div class="container" data-aos="fade-up">

            <header class="section-header">
               <h2>Pelayanan</h2>
               <p>Pelayanan Kami</p>
            </header>

            <div class="row gy-4">

               <div class="col-lg-4 col-md-6" id="pelayanan_rj" data-aos="fade-up" data-aos-delay="200">
                  <div class="service-box blue">
                     <i class="ri-stethoscope-line icon"></i>
                     <h3>Rawat Jalan</h3>
                     <p>Pelayanan medis kepada seorang pasien untuk tujuan pengamatan, diagnosis, pengobatan, rehabilitasi, dan pelayanan kesehatan lainnya, tanpa mengharuskan pasien tersebut dirawat inap.</p>
                  </div>
               </div>

               <div class="col-lg-4 col-md-6" id="pelayanan_ri" data-aos="fade-up" data-aos-delay="300">
                  <div class="service-box orange">
                     <i class="ri-heart-pulse-line icon"></i>
                     <h3>Rawat Inap</h3>
                     <p>Proses perangkapan pasien oleh tenaga kesehatan profesional akibat penyakit tertentu, di mana pasien diinapkan di suatu ruangan di rumah sakit . Ruang rawat inap adalah ruang tempat pasien dirawat.</p>
                  </div>
               </div>

               <div class="col-lg-4 col-md-6" id="pelayanan_ugd" data-aos="fade-up" data-aos-delay="500">
                  <div class="service-box red">
                     <i class="ri-first-aid-kit-line icon"></i>
                     <h3>Unit Gawat Darurat</h3>
                     <p>Penanganan awal pasien, sesuai dengan tingkat kegawatannya.</p>
                  </div>
               </div>

            </div>

         </div>

      </section><!-- End Services Section -->

      <!-- ======= Team Section ======= -->
      <section id="team" class="team">

         <div class="container" data-aos="fade-up">

            <header class="section-header">
               <h2>Tim Kerja</h2>
               <p>Tim Kerja Kami</p>
            </header>

            <div class="row gy-4">
               <?php
               $delay = 100;
               foreach ($dokter as $dkr) :
               ?>
                  <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="<?= $delay; ?>">
                     <div class="member">
                        <div class="member-img">
                           <img src="<?= base_url(); ?>/uploads/image_user/<?= $dkr->image_user; ?>" class="img-fluid" alt="Image Dokter">
                           <div class="social">
                              <a href="mailto: <?= $dkr->email; ?>"><i class="bi bi-envelope"></i></a>
                           </div>
                        </div>
                        <div class="member-info">
                           <h4><?= $dkr->fullname; ?></h4>
                           <span>Dokter <?= $dkr->specialist; ?></span>
                        </div>
                     </div>
                  </div>
               <?php
                  $delay = $delay + 100;
               endforeach;
               ?>

            </div>

         </div>

      </section><!-- End Team Section -->

      <!-- ======= Contact Section ======= -->
      <section id="contact" class="contact">

         <div class="container" data-aos="fade-up">

            <header class="section-header">
               <h2>Contact</h2>
               <p>Hubungi Kami</p>
            </header>

            <div class="row gy-4">

               <div class="col-lg-6">

                  <div class="row gy-4">
                     <div class="col-md-6">
                        <div class="info-box">
                           <i class="bi bi-geo-alt"></i>
                           <h3>Alamat</h3>
                           <p><?= $app_identity['app_address']; ?></p>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="info-box">
                           <i class="bi bi-telephone"></i>
                           <h3>Telp</h3>
                           <p><?= $app_identity['app_phone']; ?><br>+6285230700422</p>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="info-box">
                           <i class="bi bi-envelope"></i>
                           <h3>Email</h3>
                           <p><?= $app_identity['app_email']; ?></p>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="info-box">
                           <i class="bi bi-clock"></i>
                           <h3>Jam Buka</h3>
                           <p>Setiap Hari Buka 24 Jam</p>
                        </div>
                     </div>
                  </div>

               </div>

               <div class="col-lg-6">
                  <div class="php-email-form">
                     <div class="ratio ratio-4x3">
                        <iframe src="<?= $app_identity['app_maps']; ?>" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                     </div>
                  </div>

               </div>

            </div>

         </div>

      </section><!-- End Contact Section -->

   </main><!-- End #main -->

   <!-- ======= Footer ======= -->
   <footer id="footer" class="footer">

      <div class="footer-top">
         <div class="container">
            <div class="row gy-4">
               <div class="col-lg-5 col-md-12 footer-info">
                  <a href="index.html" class="logo d-flex align-items-center">
                     <img src="<?= $app_identity['app_brand']; ?>" alt="">
                     <span><?= $app_identity['app_title']; ?></span>
                  </a>
                  <p><?= $app_identity['app_about']; ?></p>
                  <div class="social-links mt-3">
                     <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                     <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                     <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                     <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                  </div>
               </div>

               <div class="col-lg-2 col-6 footer-links">
                  <h4>Links</h4>
                  <ul>
                     <li><i class="bi bi-chevron-right"></i> <a href="#">Home</a></li>
                     <li><i class="bi bi-chevron-right"></i> <a href="#about">Tentang Kami</a></li>
                     <li><i class="bi bi-chevron-right"></i> <a href="#services">Pelayanan</a></li>
                     <li><i class="bi bi-chevron-right"></i> <a href="#team">Tim Kerja</a></li>
                     <li><i class="bi bi-chevron-right"></i> <a href="#contact">Contact</a></li>
                  </ul>
               </div>

               <div class="col-lg-2 col-6 footer-links">
                  <h4>Pelayanan Kami</h4>
                  <ul>
                     <li><i class="bi bi-chevron-right"></i> <a href="#pelayanan_rj">Pelayanan Rawat Jalan</a></li>
                     <li><i class="bi bi-chevron-right"></i> <a href="#pelayanan_ri">Pelayanan Rawat Inap</a></li>
                     <li><i class="bi bi-chevron-right"></i> <a href="#pelayanan_ugd">Pelayanan UGD</a></li>
                  </ul>
               </div>

               <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
                  <h4>Hubungi Kami</h4>
                  <p>
                     <?= $app_identity['app_address']; ?>
                     <br><br>
                     <strong>Phone:</strong> <?= $app_identity['app_phone']; ?><br>
                     <strong>Email:</strong> <?= $app_identity['app_email']; ?><br>
                  </p>

               </div>

            </div>
         </div>
      </div>

      <div class="container">
         <div class="copyright">
            &copy; Copyright <?= date('Y'); ?> <strong><span><?= $app_identity['app_title']; ?></span></strong>. All Rights Reserved
         </div>
         <div class="credits">
            Designed by <a href="https://instagram.com/asnanmtakim">Asnanmtakim</a>
         </div>
      </div>
   </footer><!-- End Footer -->

   <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

   <!-- Vendor JS Files -->
   <script src="<?= base_url(); ?>/assets/welcome/vendor/bootstrap/js/bootstrap.bundle.js"></script>
   <script src="<?= base_url(); ?>/assets/welcome/vendor/aos/aos.js"></script>
   <script src="<?= base_url(); ?>/assets/welcome/vendor/php-email-form/validate.js"></script>
   <script src="<?= base_url(); ?>/assets/welcome/vendor/swiper/swiper-bundle.min.js"></script>
   <script src="<?= base_url(); ?>/assets/welcome/vendor/purecounter/purecounter.js"></script>
   <script src="<?= base_url(); ?>/assets/welcome/vendor/isotope-layout/isotope.pkgd.min.js"></script>
   <script src="<?= base_url(); ?>/assets/welcome/vendor/glightbox/js/glightbox.min.js"></script>

   <!-- Template Main JS File -->
   <script src="<?= base_url(); ?>/assets/welcome/js/main.js"></script>

</body>

</html>