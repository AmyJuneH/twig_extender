<?php

namespace Drupal\twig_extender_extras\Plugin\TwigPlugin;

use Drupal\twig_extender\Plugin\Twig\TwigPluginBase;

/**
 * Provide helper methods for Drupal render elements.
 *
 * @TwigPlugin(
 *   id = "twig_extender_moment_calendar",
 *   label = @Translation("Identifies the children of an element array, optionally sorted by weight."),
 *   type = "filter",
 *   name = "moment_calendar",
 *   function = "moment"
 * )
 */
class MomentCalendar extends BaseMoment {

  /**
   * Identifies the children of an element array, optionally sorted by weight.
   *
   * The children of a element array are those key/value pairs whose key does
   * not start with a '#'. See drupal_render() for details.
   *
   * @param array $elements
   *   The element array whose children are to be identified. Passed by
   *   reference.
   * @param bool $sort
   *   Boolean to indicate whether the children should be sorted by weight.
   *
   * @return array
   *   The filtered array to loop over.
   * @throws \Exception
   */
  public function moment($date,$timezone = NULL) {
    $moment = $this->getMoment($date, $timezone);

    $build = [
      '#cache' => [
        'contexts' => ['languages', 'timezone']
      ],
      '#markup' => $moment->calendar()
    ];

    return $build;
  }

}
