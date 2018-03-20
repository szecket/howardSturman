<?php

kirbytext::$tags['unwrap'] = array(
  'html' => function($tag) {
    if( $tag->attr('unwrap') === 'open' ) {
        return '</div><div class="unwrap">';
    } else {
        return '</div><div class="wrap">';
    }
  }
);

?>
