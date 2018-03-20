<div class="cover-media-container" style="position: relative">

    <div class="intro fullheight">
        <div class="wrap-m">
            <?php if( ! $page->toggleTitle()->bool() ) : ?>
                <?php if( ! $page->titleAlternative()->isNotEmpty() ) : ?>
                    <h1><?= $page->title()->html() ?></h1>
                <?php else: ?>
                    <h1><?= $page->titleAlternative()->kirbytext() ?></h1>
                <?php endif; ?>
            <?php endif; ?>

            <div class="text">
                <?= $page->intro()->kirbytext() ?>
            </div>

            <?php if( page('blog') || page('project') ): ?>
            <div class="meta-container">
                <p class="item-date">
                    <?= $page->date('F j, Y') ?>
                    <?php if( ( $page->date() == true ) && $page->tags()->isNotEmpty() ): ?>
                        &nbsp; <strong>&middot;</strong> &nbsp;
                    <?php endif; ?>
                    <?= $page->tags() ?>
                </p>
            </div>
            <?php endif; ?>
        </div>
    </div>

    <div class="scrolldown"></div>

    <div class="mask"></div>

    <div class="cover-media">

        <?php if( $page->covermedia() == 'toggleImage' ): ?>
            <?php if( $image = $page->images()->find($page->coverimage()) ): ?>
                <?php
                    $image = thumb($image, array('width' => 2560, 'height' => 1200));
                ?>
                <div class="cover-image" style="background-image: url(<?= $image->url() ?>)"></div>
            <?php endif; ?>
        <?php elseif( $page->covermedia() == 'toggleVideo' && $page->covervideo()->isNotEmpty() ): ?>
            <div class="cover-video">
                <video loop muted autoplay>
            	    <source src="<?= $page->file( $page->covervideo() )->url() ?>" type="video/mp4">
        		</video>
            </div>
        <?php else: ?>
            <?php
                // Transform the comma-separated list of filenames into a file collection
                $filenames = $page->sliderimages()->split(',');
                if(count($filenames) < 2) $filenames = array_pad($filenames, 2, '');

                $files = call_user_func_array(array($page->files(), 'find'), $filenames);

                if(count($files) > 0) :
            ?>
            <div class="slider glide">
                <div class="glide__arrows">
                    <button class="glide__arrow prev" data-glide-dir="<">
                        <i class="fa fa-angle-left"></i>
                    </button>
                    <button class="glide__arrow next" data-glide-dir=">">
                        <i class="fa fa-angle-right"></i>
                    </button>
                </div>

                <div class="glide__wrapper">
                    <ul class="glide__track">
                        <?php
                        	// Use the file collection
                            foreach($files as $file)
                        	{
                                // $file = thumb($file, array('width' => 2560, 'height' => 1400));
                                echo '<li class="glide__slide" style="background-image: url(';
                        		echo $file->url();
                                echo ')"></li>';
                        	}
                        ?>
                    </ul>
                </div>

                <div class="glide__bullets"></div>
            </div><!-- .slider -->
            <?php endif;?>
        <?php endif;?>
    </div>
</div><!-- .wrap-->
