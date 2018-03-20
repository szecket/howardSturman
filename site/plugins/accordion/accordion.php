<?php
/**
 * Accordion Plugin
 *
 * @author Joro Yordanov <joro@yordanoff.net>
 * @version 1.0.0
 */

 kirbytext::$pre[] = function($kirbytext, $text) {

    $text = preg_replace_callback('!\(accordion(…|\.{3})\)(.*?)\((…|\.{3})accordion\)!is', function($matches) use($kirbytext) {

      $accordions = preg_split('!(\n|\r\n)\+{4}\s+(\n|\r\n)!', $matches[2]);
      $html = array();

      foreach($accordions as $acc) {
        $field = new Field($kirbytext->field->page, null, trim($acc));

        $html[] = '<li class="accordion-entry">
                        <input type="checkbox" checked>
                        <span class="accordion-icon"></span>'
                        . kirbytext($field) .
                  '</li>';
      }

      return '<ul class="accordion">' . implode($html) . ' </ul>';

    }, $text);

    return $text;

 };
