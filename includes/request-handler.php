<?php

function ___cron_manager_requests()
{
    $unsafeData = file_get_contents('php://input');
    $method = $_SERVER['REQUEST_METHOD'];
    if (isset($unsafeData) && $unsafeData !== "") {
        $decodedData = json_decode($unsafeData, true);
        if (isset($decodedData['action']) && isset($method)) {
            $action = $decodedData['action'];
            __handle_supported_request($action, $method);
        }
    }
}
function __handle_supported_request(string $action, string $method)
{
    $cron_manager = new CronManager();
    switch ($action) {
        case 'CronManagerXGetAll':
            header("Access-Control-Allow-Origin: *");
            if ($method == 'POST')
                wp_send_json(___json_unescape_encode($cron_manager->get_all_crons()));
            else
                wp_send_json(___json_unescape_encode(array("error" => "ERR_INVALID_METHOD")), 405);
            break;
        default:
            break;
    }
}

add_filter('rest_api_init', '___cron_manager_requests', 10, 3);