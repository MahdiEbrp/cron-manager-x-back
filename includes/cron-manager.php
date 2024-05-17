<?php
class CronManager
{

  public function __construct()
  {

  } /**
    * Get all scheduled cron events
    *
    * @return array An array of all scheduled cron events
    */
  public function get_all_crons()
  {
    $cron_events = _get_cron_array();
    return $cron_events;
  }

}