<?php
/**
 * Demopad Plugin
 *
 * @author Joro Yordanov <joro@yordanoff.net>
 * @version 1.0.0
 * @description based on the code of https://github.com/getkirby-plugins/columns-plugin by Bastian Allgeier
 */
kirbytext::$pre[] = function($kirbytext, $text) {

   $text = preg_replace_callback('!\(demo(…|\.{3})\)(.*?)\((…|\.{3})demo\)!is', function($matches) use($kirbytext) {

     $demos = preg_split('!(\n|\r\n)\+{6}\s+(\n|\r\n)!', $matches[2]);
     $html    = array();

     foreach($demos as $demo) {
       $field = new Field($kirbytext->field->page, null, trim($demo));
       $html[] = '<div class="demopad-inner">' . kirbytext($field) . '</div>';
     }

     return '<div class="demopad">
            '
                . implode($html) .
            '
            </div>';

   }, $text);

   return $text;

};
