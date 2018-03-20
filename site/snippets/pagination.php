<?php if (isset($pagination)): ?>
    <?php if( $pagination->hasPrevPage() || $pagination->hasNextPage() ): ?>
        <ul class="pagination">

            <?php if($pagination->hasPrevPage()): ?>
            <li>
                <a href="<?php echo $pagination->prevPageURL() ?>" class="al"
                data-animsition-in-class="overlay-slide-in-right"
                data-animsition-in-duration="500"
                data-animsition-out-class="overlay-slide-out-right"
                data-animsition-out-duration="500">
                    &larr;
                </a>
            </li>
            <?php endif ?>

            <?php foreach($pagination->range(10) as $r): ?>
            <li>
                <a class="al <?php if($pagination->page() == $r) echo 'active' ?>" href="<?php echo $pagination->pageURL($r) ?>"
                data-animsition-in-class="overlay-slide-in-bottom"
                data-animsition-out-class="overlay-slide-out-bottom">
                    <?php echo $r ?>
                </a>
            </li>
            <?php endforeach ?>

            <?php if($pagination->hasNextPage()): ?>
            <li class="last">
                <a href="<?php echo $pagination->nextPageURL() ?>" class="al"
                data-animsition-in-class="overlay-slide-in-left"
                data-animsition-out-class="overlay-slide-out-left">
                    &rarr;
                </a>
            </li>
            <?php endif ?>

        </ul>
    <?php endif; ?>
<?php endif; ?>
