<?php
/**
 * Carousel Plugin
 *
 * @author Joro Yordanov <joro@yordanoff.net>
 * @version 1.0.0
 * @description based on the code of https://github.com/getkirby-plugins/columns-plugin by Bastian Allgeier
 */
kirbytext::$pre[] = function($kirbytext, $text) {

   $text = preg_replace_callback('!\(gallery(…|\.{3})\)(.*?)\((…|\.{3})gallery\)!is', function($matches) use($kirbytext) {

     $slides = preg_split('!(\n|\r\n)\+{4}\s+(\n|\r\n)!', $matches[2]);
     $html    = array();

     foreach($slides as $slide) {
       $field = new Field($kirbytext->field->page, null, trim($slide));
       $html[] = kirbytext($field);
     }

     return '<div class="gallery">
            '
                . implode($html) .
            '
            </div>';

   }, $text);

   return $text;

};
