<?php
// get all images in the folder
$images = $page->images();


// limit the number of images
// $images = $page->images()->limit(6);
?>
<div class="gallery">
    <?php foreach($images as $image): ?>
      <img src="<?= $image->url() ?>" alt="">
    <?php endforeach ?>  
</div>
