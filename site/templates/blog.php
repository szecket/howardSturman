<?php snippet('header') ?>

<?php snippet('intro') ?>

<div class="content-container">
    <?php
        // Fetch Pagination settings from Panel
        if( (int)(string)$site->paginationProjects() == 0 ) {
            $paginationLimit = 9999;
        } else {
            $paginationLimit = (int)(string)$site->paginationProjects();
        }

        // Select what type of content you'd like to display
        $articles = page('blog')->children()->visible()->paginate( $paginationLimit );
        $pagination = $articles->pagination();

        // Select the listing view you'd like to use
        snippet('listing-text',[ 'items' => $articles ]);
    ?>
    <div class="wrap">
        <?php snippet('pagination', [ 'pagination' => $pagination ]); ?>
    </div>
</div>

<?php snippet('footer') ?>
