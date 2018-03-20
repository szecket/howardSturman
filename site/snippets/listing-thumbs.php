<?php if (isset($items)): ?>

<section class="section grid">
    <?php if($items->count()):
        $animationDelay = 0.4; ?>
        <?php foreach($items as $item): ?>

            <?php
                if ( $animationDelay < 1.6 ) {
        			$animationDelay += 0.1;
        		}

                if( $item->coverimage()->isNotEmpty() ) {
                    $image = $item->coverimage()->toFile();
                } else {
                    $image = $item->images()->sortBy('sort', 'asc')->first();
                }

                if( $item->columnwidth() == '12' ) {
                    $image = thumb($image, array('width' => 2400, 'height' => 800));
                } else {
                    $image = thumb($image, array('width' => 1600, 'height' => 800));
                }
            ?>
            <div class="item index item-<?= $item->griditem() ?>
                col-<?php
                    if( $item->columnwidth() != '4' && $item->columnwidth() != '8' && $item->columnwidth() != '12' && $item->columnwidth() != '6') {
                        echo 4;
                    } else {
                        echo $item->columnwidth();
                    }
                ?>
                <?= $item->mask(); ?>"
                style="animation-delay: <?= $animationDelay ?>s">
                <a href="<?= $item->url() ?>" class="al">

                    <div class="wrap-fl">
                        <h2><?= $item->title()->html() ?></h2>

                        <div class="meta-container">
                            <p class="item-date">
                                <?= $item->date('F j, Y') ?>
                                <?php
                                /*
                                 *
                                 * Uncomment the following if you want to show the tags of the project.
                                 * --------------------------------------------------------------------
                                 *
                                    <?php if( ( $item->date() == true ) && $item->tags()->isNotEmpty() ): ?>
                                        &nbsp; <strong>&middot;</strong> &nbsp;
                                    <?php endif; ?>
                                    <?= $item->tags() ?>

                                 */ ?>
                            </p>
                        </div>
                    </div>

                    <div class="cf"></div>

                    <span class="item-background" style="background-image: url(<?php if ( $item->coverimage()->isNotEmpty() ) echo $image->url() ?>)"></span>
                </a>
            </div>
        <?php endforeach ?>
        <div class="cf"></div>
    <?php else: ?>
        <p>This section does not contain any items yet :-(</p>
    <?php endif ?>
</section>
<div class="cf"></div>
<?php endif; ?>
