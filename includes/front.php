<?php
add_action('admin_enqueue_scripts', '___cron_manager_x_dependency');
/**
* Enqueue the JavaScript and CSS files for the Cron Manager X page.
*
* This function determines the directory path where the assets are located,
* and then enqueues the 'index.js' file as a script and the 'index.css' file
* as a style for the Cron Manager X page.
*
* The script is enqueued with a version number of '1.0.0' and set to load
* in the footer.
*
* The style is enqueued with a version number of '1.0.0' and set to load
* for all media types.
*
* @return void
*/
function ___cron_manager_x_dependency()
{
    $screen = get_current_screen();
    if ($screen->id === 'tools_page_cron_manager_x') {
        $directoryName = plugin_dir_url(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'assets' . DIRECTORY_SEPARATOR;
        $styleFileName = $directoryName . '/index.css';
        $javaScriptFileName = $directoryName . '/index.js';
        wp_enqueue_script('___cron_manager_x_script', $javaScriptFileName, array(), '1.0.0', true);
        wp_enqueue_style('___cron_manager_x_style', $styleFileName, array(), '1.0.0', 'all');
    }
}