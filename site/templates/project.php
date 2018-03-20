<?php snippet('header') ?>
<?php snippet('intro') ?>

<article class="article index">
    <div class="text">
        <div class="wrap">
            <?= $page->text()->kirbytext() ?>
        </div>
    </div>
</article>

<?php snippet('imagegallery') ?>

<?php snippet('prevnext') ?>
<?php snippet('footer') ?>
