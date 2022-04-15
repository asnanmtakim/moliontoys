<?php $app_identity = app_identity(); ?>
<?= $this->extend('welcome/template'); ?>

<?= $this->section('content'); ?>
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Blog</h2>
                <ol>
                    <li><a href="index.html">Home</a></li>
                    <li>Blog</li>
                </ol>
            </div>

        </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">

            <div class="row g-5">

                <div class="col-lg-8">

                    <div class="row gy-4 posts-list">

                        <?php foreach ($blog as $bg) : ?>
                            <div class="col-lg-6">
                                <article class="d-flex flex-column">

                                    <div class="post-img">
                                        <img src="<?= base_url(); ?>/uploads/blog/<?= $bg['image_blog']; ?>" alt="" class="img-fluid">
                                    </div>

                                    <h2 class="title">
                                        <a href="<?= base_url(); ?>/blog/<?= $bg['slug_blog']; ?>"><?= $bg['title_blog']; ?></a>
                                    </h2>

                                    <div class="meta-top">
                                        <ul>
                                            <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="<?= base_url(); ?>/blog/<?= $bg['slug_blog']; ?>"><?= $bg['fullname']; ?></a></li>
                                            <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="<?= base_url(); ?>/blog/<?= $bg['slug_blog']; ?>"><time datetime="<?= $bg['date_blog']; ?>"><?= format_tanggal($bg['date_blog']); ?></time></a></li>
                                        </ul>
                                    </div>

                                    <div class="content">
                                        <p>
                                            <?= fromat_substr($bg['description_blog'], 100); ?>...
                                        </p>
                                    </div>

                                    <div class="read-more mt-auto align-self-end">
                                        <a href="<?= base_url(); ?>/blog/<?= $bg['slug_blog']; ?>">Baca Lebih Lanjut</a>
                                    </div>

                                </article>
                            </div><!-- End post list item -->
                        <?php endforeach; ?>
                    </div><!-- End blog posts list -->

                    <?= $pager->links('blog', 'blog_pagination') ?>

                </div>

                <div class="col-lg-4">

                    <div class="sidebar">

                        <div class="sidebar-item search-form">
                            <h3 class="sidebar-title">Search</h3>
                            <form action="" class="mt-3">
                                <input type="text">
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
    </section><!-- End Blog Section -->

</main><!-- End #main -->
<?= $this->endSection(); ?>