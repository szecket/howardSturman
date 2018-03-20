<?php
    /*
    *
    * Each entry has dynamically set meta image for
    * Facebooks's Open Graph and Twitter's Card Tags.
    *
    * There is a certain priority how the meta image is selected:
    * 1. Cover Image (if any)
    * 2. First Image of the document (if any)
    * 3. Global Image setup from Site Options (if any)
    * 4. No Meta Image tags at all if none of the above is true.
    *
    * */

    $metaImageCover = $page->coverimage()->toFile();
    $metaImageFirst =  $page->images()->sortBy('sort', 'asc')->first();
    $metaImageGlobal = $site->images()->find($site->metaimage());

    $anyMetaImage = true;

    if( $metaImageCover )
    {
        $metaImageURL = $metaImageCover->url();
    }
    elseif( $metaImageFirst )
    {
        $metaImageURL = $metaImageFirst->url();
    }
    elseif( $metaImageGlobal )
    {
        $metaImageURL = $metaImageGlobal->url();
    } else {
        $anyMetaImage = false;
    }
?>

<?php if( $anyMetaImage ): ?>
<meta name="twitter:image" content="<?= $metaImageURL ?>" />
<meta name="og:image" content="<?= $metaImageURL ?>" />
<?php endif; ?>
