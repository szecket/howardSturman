<?php snippet('header') ?>

<?php snippet('intro') ?>

<div class="wrap">
    <article class="article index">

        <div class="text">
            <?= $page->text()->kirbytext() ?>
        </div>

    </article>

    <hr />

    <?php if( page('blog') ): ?>
        <?php if($page->hasNextVisible() ): ?>
            <strong>Read Next</strong> <br />
            <a href="<?= $page->nextVisible()->url(); ?>" class="h1"><?= $page->nextVisible()->title(); ?></a> &rarr;
        <?php else: ?>
            <strong>End.</strong> <br />
            <a href="<?= $site->url(); ?>" class="h1">Start over</a> &rarr;
        <?php endif; ?>
    <?php endif; ?>

    <hr />
</div><!-- wrapper -->

<?php snippet('footer') ?>
