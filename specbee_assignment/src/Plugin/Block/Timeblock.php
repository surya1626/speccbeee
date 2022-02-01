<?php

namespace Drupal\specbee_assignment\Plugin\Block;

use Drupal\Core\Access\AccessResult;
use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Cache\Cache;
/**
 * Provides a block with a simple text.
 *
 * @Block(
 *   id = "speccbee_time_block",
 *   admin_label = @Translation("speccbee_time_block"),
 * )
 */
class Timeblock extends BlockBase {
  /**
   * {@inheritdoc}
   */
  public function build() {
    $service = \Drupal::service('specbee_assignment.custom_services');
    $config = \Drupal::config('specbee_assignment.settings');
    $timezone = $config->get('timezone') ;
    $city = $config->get('city');
    $country = $config->get('country');
    $value = $service->getSelectedtimezone($config->get('timezone'));
    $markup = '<h1><b>City : </b>'.$city.'</h1></br><h2><b>Country :  </b>'.$country.'</h2></br><h2><b>Time :  </b>'.$value.'</h2></br>';
    return [
      '#markup' => $markup,
    ];
  }
  public function getCacheMaxAge() {
    return 0;
  }
}