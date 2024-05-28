<?php
class CronManager
{

  public function __construct()
  {

  }
   /**
    * Get all scheduled cron events
    *
    * @return array An array of all scheduled cron events
    */
  public function get_all_crons()
  {
    $cron_events = _get_cron_array();
    return $cron_events;
  }
  /**
   * Clear scheduled WordPress hooks (cron events) from the cron system.
   *
   * @param array $hook_names An array of hook names to be cleared from the cron system.
   *
   * @return array An associative array containing the following keys:
   *               - 'undeletedItems': An array of hooks that could not be deleted. This can
   *                 contain WP_Error objects or hook names as strings.
   *               - 'allCrons': An array of all the remaining scheduled cron events.
   */
  public function clear_scheduled_hooks(array $hook_names)
  {

    $undeleted_items = [];

    if (is_array($hook_names) || !empty($hook_names)) {
      foreach ($hook_names as $id => $hook_name) {
        $result = wp_clear_scheduled_hook($hook_name);

        if (is_wp_error($result)) {
          $undeleted_items[] = $result;
        } elseif ($result === false || $result === 0) {
          $undeleted_items[] = $hook_name;
        }
      }
    }

    return [
      'undeletedItems' => $undeleted_items,
      'allCrons' => $this->get_all_crons(),
    ];
  }
}