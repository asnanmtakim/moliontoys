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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Source+Sans+Pro:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= base_url(); ?>/assets/welcome/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/assets/welcome/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/assets/welcome/vendor/aos/aos.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/assets/welcome/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/assets/welcome/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Variables CSS Files. Uncomment your preferred color scheme -->
    <!-- <link href="<?= base_url(); ?>/assets/welcome/css/variables.css" rel="stylesheet"> -->
    <!-- <link href="<?= base_url(); ?>/assets/welcome/css/variables-blue.css" rel="stylesheet"> -->
    <!-- <link href="<?= base_url(); ?>/assets/welcome/css/variables-green.css" rel="stylesheet"> -->
    <link href="<?= base_url(); ?>/assets/welcome/css/variables-orange.css" rel="stylesheet">
    <!-- <link href="<?= base_url(); ?>/assets/welcome/css/variables-purple.css" rel="stylesheet"> -->
    <!-- <link href="<?= base_url(); ?>/assets/welcome/css/variables-red.css" rel="stylesheet"> -->
    <!-- <link href="<?= base_url(); ?>/assets/welcome/css/variables-pink.css" rel="stylesheet"> -->

    <!-- Template Main CSS File -->
    <link href="<?= base_url(); ?>/assets/welcome/css/main.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: HeroBiz - v2.1.0
  * Template URL: https://bootstrapmade.com/herobiz-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top" data-scrollto-offset="0">
        <div class="container-fluid d-flex align-items-center justify-content-between">

            <a href="<?= base_url(); ?>" class="logo d-flex align-items-center scrollto me-auto me-lg-0">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <img src="<?= $app_identity['app_icon']; ?>" alt="Logo">
                <h1 class="mb-0"><?= $app_identity['app_title']; ?></h1>
            </a>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto" href="<?= base_url(); ?>#hero">Beranda</a></li>
                    <li><a class="nav-link scrollto" href="<?= base_url(); ?>#about">Tentang</a></li>
                    <li><a class="nav-link scrollto <?= $page == 'product' ? 'active' : ''; ?>" href="<?= base_url(); ?>#portfolio">Produk</a></li>
                    <li><a class="nav-link scrollto" href="<?= base_url(); ?>#team">Tim</a></li>
                    <li><a class="<?= $page == 'blog' ? 'active' : ''; ?>" href="<?= base_url(); ?>/blog">Blog</a></li>
                    <li><a class="nav-link scrollto" href="<?= base_url(); ?>#faq">Faq</a></li>
                    <li><a class="nav-link scrollto" href="<?= base_url(); ?>#contact">Kontak</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle d-none"></i>
            </nav><!-- .navbar -->
        </div>
    </header><!-- End Header -->

    <?= $this->renderSection('content'); ?>

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">

        <div class="footer-content">
            <div class="container">
                <div class="row">

                    <div class="col-lg-5 col-md-6">
                        <div class="footer-info">
                            <h3><?= $app_identity['app_title']; ?></h3>
                            <p>
                                <?= $app_identity['app_address']; ?><br><br>
                                <strong>Telp:</strong> <a href="http://wa.me/<?= $app_identity['app_phone']; ?>" target="_blank" rel="noopener noreferrer"><?= $app_identity['app_phone']; ?></a><br>
                                <strong>Email:</strong> <a href="mailto:<?= $app_identity['app_email']; ?>"><?= $app_identity['app_email']; ?></a><br>
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Link</h4>
                        <ul>
                            <li><i class="bi bi-chevron-right"></i> <a href="<?= base_url(); ?>#hero">Beranda</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="<?= base_url(); ?>#about">Tentang</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="<?= base_url(); ?>#portfolio">Produk</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="<?= base_url(); ?>#team">Tim</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="<?= base_url(); ?>/blog">Blog</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="<?= base_url(); ?>#faq">Faq</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-4 col-md-6 footer-links">
                        <h4>Produk Kami</h4>
                        <ul>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">Mainan Anak</a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>

        <div class="footer-legal text-center">
            <div class="container d-flex flex-column flex-lg-row justify-content-center justify-content-lg-between align-items-center">

                <div class="d-flex flex-column align-items-center align-items-lg-start">
                    <div class="copyright">
                        &copy; 2022 Copyright <strong><span><?= $app_identity['app_name']; ?></span></strong>. All Rights Reserved
                    </div>
                    <div class="credits">
                        <!-- All the links in the footer should remain intact. -->
                        <!-- You can delete the links only if you purchased the pro version. -->
                        <!-- Licensing information: https://bootstrapmade.com/license/ -->
                        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/herobiz-bootstrap-business-template/ -->
                        Designed by <a href="https://instagram.com/asnanmtakim">Asnanmtakim</a>
                    </div>
                </div>

                <div class="social-links order-first order-lg-last mb-3 mb-lg-0">
                    <?php foreach ($sosmed as $sm) : ?>
                        <a href="<?= $sm['link_sosmed']; ?>" class="<?= $sm['icon_sosmed']; ?>"><i class="bi bi-<?= $sm['icon_sosmed']; ?>"></i></a>
                    <?php endforeach; ?>
                </div>

            </div>
        </div>

    </footer><!-- End Footer -->

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="<?= base_url(); ?>/assets/welcome/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url(); ?>/assets/welcome/vendor/aos/aos.js"></script>
    <script src="<?= base_url(); ?>/assets/welcome/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="<?= base_url(); ?>/assets/welcome/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="<?= base_url(); ?>/assets/welcome/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="<?= base_url(); ?>/assets/welcome/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="<?= base_url(); ?>/assets/welcome/js/main.js"></script>

</body>

</html>