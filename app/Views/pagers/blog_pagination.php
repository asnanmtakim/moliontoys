<?php $pager->setSurroundCount(2) ?>
<div class="blog-pagination">
    <ul class="justify-content-center">
        <?php foreach ($pager->links() as $link) : ?>
            <li class="<?= $link['active'] ? 'active' : '' ?>"><a href="<?= $link['uri'] ?>"><?= $link['title'] ?></a></li>
        <?php endforeach ?>
    </ul>
</div><!-- End blog pagination -->