<?php snippet('header') ?>

<?php snippet('intro') ?>

<article class="article index">
    <div class="text">
        <div class="wrap-lg">
            <?= $page->text()->kirbytext() ?>
        </div>
    </div>
</article>

<?php snippet('footer') ?>
