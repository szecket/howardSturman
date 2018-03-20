<?php
/**
 * Carousel Plugin
 *
 * @author Joro Yordanov <joro@yordanoff.net>
 * @version 1.0.0
 * @description based on the code of https://github.com/getkirby-plugins/columns-plugin by Bastian Allgeier
 */
kirbytext::$pre[] = function($kirbytext, $text) {

   $text = preg_replace_callback('!\(carousel(…|\.{3})\)(.*?)\((…|\.{3})carousel\)!is', function($matches) use($kirbytext) {

     $slides = preg_split('!(\n|\r\n)\+{4}\s+(\n|\r\n)!', $matches[2]);
     $html    = array();

     foreach($slides as $slide) {
       $field = new Field($kirbytext->field->page, null, trim($slide));
       $html[] = '<li class="glide__slide">' . kirbytext($field) . '</li>';
     }

     return '<div class="carousel glide">
             <div class="glide__wrapper">
             <ul class="glide__track">
            '
                . implode($html) .
            '
            </ul>
            </div>
            <div class="glide__bullets"></div>
            </div>';

   }, $text);

   return $text;

};
