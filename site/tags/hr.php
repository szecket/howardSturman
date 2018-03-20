<?php

kirbytext::$tags['hr'] = array(
  'html' => function($tag) {

    $class = $tag->attr('hr');

    return '<hr class="' . $class . '" />';

  }
);
