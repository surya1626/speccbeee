<?php

namespace Drupal\specbee_assignment;

use Drupal\Component\Datetime\TimeInterface;
// use Drupal\Core\Datetime;
use Drupal\Core\Datetime\DateFormatter;
/**
 * Class CustomService
 * @package Drupal\specbee_assignment\Services
 */
class TimezoneService {

  protected $currentTime;
  protected $dateformat;
  /**
   * CustomService constructor.
   * @param TimeInterface $currentTime
   * @param DateFormatter $dateformat
   */
  public function __construct(TimeInterface $currentTime ,DateFormatter $dateformat) {
    $this->currentTime = $currentTime;
    $this->dateformat = $dateformat;
  }


  /**
   * @return \Drupal\Component\Render\MarkupInterface|string
   */
  public function getSelectedtimezone($timezone= '') {
    $timezone = $this->dateformat->format($this->currentTime->getRequestTime() , 'custom', 'd/M/Y H:i' , $timezone);
    return $timezone;
  }

}