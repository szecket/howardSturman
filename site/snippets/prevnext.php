<div class="wrap-lg">
    <div class="prevnext">
        <?php if($page->hasPrevVisible() ): ?>
            <div class="prev <?php if( ! $page->hasNextVisible() ) echo 'fullwidth' ?>">

                <a href="<?= $page->prevVisible()->url(); ?>" class="al prevnext-label"
                    data-animsition-in-class="overlay-slide-out-right"
                    data-animsition-out-class="overlay-slide-out-right">
                    <?= $page->prevVisible()->title(); ?>
                    <strong><span>Previous</span></strong>
                </a>

                <?php if( $image = $page->prevVisible()->images()->find($page->prevVisible()->coverimage()) ): ?>
                    <img src="<?= thumb($image, array('width' => 800, 'height' => 450, 'crop' => true))->url() ?>" alt="" />
                <?php elseif( $image = $page->prevVisible()->images()->sortBy('sort', 'asc')->first() ): ?>
                    <img src="<?= thumb($image, array('width' => 800, 'height' => 450, 'crop' => true))->url() ?>" alt="" />
                <?php endif; ?>

            </div>
        <?php endif; ?>

        <?php if($page->hasNextVisible() ): ?>
            <div class="next <?php if( ! $page->hasPrevVisible() ) echo 'fullwidth' ?>">
                <a href="<?= $page->nextVisible()->url(); ?>" class="al prevnext-label"
                    data-animsition-in-class="overlay-slide-out-left"
                    data-animsition-out-class="overlay-slide-out-left">
                    <?= $page->nextVisible()->title(); ?>
                    <strong><span>Next</span></strong>
                </a>

                <?php if( $image = $page->nextVisible()->images()->find($page->nextVisible()->coverimage()) ): ?>
                    <img src="<?= thumb($image, array('width' => 800, 'height' => 450, 'crop' => true))->url() ?>" alt="" />
                <?php elseif( $image = $page->nextVisible()->images()->sortBy('sort', '1')->first() ): ?>
                    <img src="<?= thumb($image, array('width' => 800, 'height' => 450, 'crop' => true))->url() ?>" alt="" />
                <?php endif; ?>

            </div>
        <?php endif; ?>

        <div class="cf"></div>
    </div>
</div>
