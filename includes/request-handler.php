<?php
/**
 * Handles incoming requests for the cron manager.
 *
 * This function reads the input data from a HTTP request, decodes the JSON payload,
 * and delegates the request to the appropriate handler based on the action specified
 * in the input data.
 *
 * @return void
 */
function ___cron_manager_requests()
{
    $unsafeData = file_get_contents('php://input');
    $method = $_SERVER['REQUEST_METHOD'];
    if (isset($unsafeData) && $unsafeData !== "") {
        $decodedData = json_decode($unsafeData, true);
        if (isset($decodedData['action']) && isset($method)) {
            $action = $decodedData['action'];
            $data = $decodedData['data'];
            __handle_supported_request($action, $method, $data);
        }
    }
}
/**
 * Handles supported cron manager actions.
 *
 * This function handles specific actions for the cron manager such as getting all cron jobs
 * or removing specified cron items. It validates the request method and data, then performs
 * the requested action using the CronManager class.
 *
 * @param string $action The action to be performed.
 * @param string $method The HTTP method of the request.
 * @param mixed $data The data associated with the request action.
 *
 * @return void
 */
function __handle_supported_request(string $action, string $method, $data)
{
    $cron_manager = new CronManager();
    switch ($action) {
        case 'CronManagerXGetAll':
            if ($method == 'POST')
                wp_send_json(___json_unescape_encode($cron_manager->get_all_crons()));
            else
                wp_send_json(___json_unescape_encode(array("error" => "ERR_INVALID_METHOD")), 405);
            break;
        case 'CronManagerXRemoveItems':
            if ($method == 'POST' && isset($data) && count($data) > 0) {
                $result = $cron_manager->clear_scheduled_hooks($data);
                wp_send_json(___json_unescape_encode($result));
            }
            else
                wp_send_json(___json_unescape_encode(array("error" => "ERR_INVALID_METHOD")), 405);
            break;
        default:
            break;
    }
}

add_filter('admin_init', '___cron_manager_requests', 10, 3);