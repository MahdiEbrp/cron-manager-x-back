<?php
add_action('admin_enqueue_scripts', '___cron_manager_x_dependency');
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