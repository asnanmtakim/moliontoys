<?php $app_identity = app_identity(); ?>
<?= $this->extend('welcome/template'); ?>

<?= $this->section('content'); ?>
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Detail Blog</h2>
                <ol>
                    <li><a href="<?= base_url(); ?>">Home</a></li>
                    <li><a href="<?= base_url(); ?>/blog">Blog</a></li>
                    <li>Detail Blog</li>
                </ol>
            </div>

        </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Blog Details Section ======= -->
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">

            <div class="row g-5">

                <div class="col-lg-8">

                    <article class="blog-details">

                        <div class="post-img">
                            <img src="<?= base_url(); ?>/uploads/blog/<?= $blog['image_blog']; ?>" alt="Gambar Blog" class="img-fluid">
                        </div>

                        <h2 class="title"><?= $blog['title_blog']; ?></h2>

                        <div class="meta-top">
                            <ul>
                                <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="#"><?= $blog['fullname']; ?></a></li>
                                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="#"><time datetime="<?= $blog['date_blog']; ?>"><?= format_tanggal($blog['date_blog']); ?></time></a></li>
                            </ul>
                        </div><!-- End meta top -->

                        <div class="content">
                            <?= $blog['description_blog']; ?>
                        </div><!-- End post content -->

                        <div class="meta-bottom">
                            <i class="bi bi-folder"></i>
                            <ul class="cats">
                                <li><a href="<?= base_url(); ?>/blog?cat=<?= $blog['name_category']; ?>"><?= $blog['name_category']; ?></a></li>
                            </ul>
                        </div><!-- End meta bottom -->

                    </article><!-- End blog post -->

                </div>

                <div class="col-lg-4">

                    <div class="sidebar">

                        <div class="sidebar-item search-form">
                            <h3 class="sidebar-title">Search</h3>
                            <form action="<?= base_url(); ?>/blog" class="mt-3" method="GET">
                                <input type="text" name="search">
                                <button type="submit"><i class="bi bi-search"></i></button>
                            </form>
                        </div><!-- End sidebar search formn-->

                        <div class="sidebar-item categories">
                            <h3 class="sidebar-title">Kategori</h3>
                            <ul class="mt-3">
                                <?php foreach ($category as $cat) : ?>
                                    <li><a href="<?= base_url(); ?>/blog?cat=<?= $cat['name_category']; ?>"><?= $cat['name_category']; ?> <span>(<?= $cat['count']; ?>)</span></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div><!-- End sidebar categories-->

                        <div class="sidebar-item recent-posts">
                            <h3 class="sidebar-title">Post Terbaru</h3>

                            <div class="mt-3">
                                <?php foreach ($recent_blog as $rb) : ?>
                                    <div class="post-item mt-3">
                                        <img src="<?= base_url(); ?>/uploads/blog/<?= $rb['image_blog']; ?>" alt="" class="flex-shrink-0">
                                        <div>
                                            <h4><a href="<?= base_url(); ?>/blog/<?= $rb['slug_blog']; ?>"><?= $rb['title_blog']; ?></a></h4>
                                            <time datetime="<?= $rb['date_blog']; ?>"><?= format_tanggal($rb['date_blog']); ?></time>
                                        </div>
                                    </div><!-- End recent post item-->
                                <?php endforeach; ?>
                            </div>

                        </div><!-- End sidebar recent posts-->

                    </div><!-- End Blog Sidebar -->

                </div>
            </div>

        </div>
    </section><!-- End Blog Details Section -->

</main><!-- End #main -->
<?= $this->endSection(); ?>