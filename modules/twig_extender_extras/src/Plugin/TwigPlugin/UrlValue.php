<?php

namespace Drupal\twig_extender_extras\Plugin\TwigPlugin;

use Drupal\twig_extender\Plugin\Twig\TwigPluginBase;
use Drupal\Core\Entity;

/**
 * The plugin for render a url string of a link field object.
 *
 * @TwigPlugin(
 *   id = "twig_extender_url_value",
 *   label = @Translation("Get the raw url value from Field"),
 *   type = "filter",
 *   name = "url_value",
 *   function = "urlValue"
 * )
 */
class UrlValue extends TwigPluginBase {

  /**
   * Implementation for render block.
   */
  public function urlValue($field) {
    try {
      $field_type = $field->getFieldDefinition()->getType();
      if ($field_type == 'link') {
        $uri = $field->first()->getUrl();
        return $uri;
      }
    }
    catch (\Exception $e){
      \Drupal::logger('twig_extender_extras')->error($e->getMessage());
      throw $e;
    }
  }

}
