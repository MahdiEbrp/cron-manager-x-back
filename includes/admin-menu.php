<?php
/**
 * Register the submenu page for Cron Manager X under the Tools menu.
 *
 * This function uses the 'admin_menu' hook to add a new submenu page called
 * 'Cron Manager X' under the 'Tools.php' menu. The page is only accessible
 * to users with the 'manage_options' capability.
 *
 * When the page is loaded, it calls the `____cron_manager_x_page` function
 * to render the content.
 *
 * @return void
 */
function ____cron_manager_x()
{
    add_submenu_page(
        'tools.php',
        'Cron Manager X',
        'Cron Manager X',
        'manage_options',
        'cron_manager_x',
        '____cron_manager_x_page'
    );
}
/**
 * Render the content for the Cron Manager X page.
 *
 * This function outputs a simple div with the id 'root'. It is expected
 * that this div will be used as a mounting point for a JavaScript application
 * or library to render the actual content of the Cron Manager X page.
 *
 * @return void
 */
function ____cron_manager_x_page()
{
    ?>
    <div id="root"></div>
    <?php
}
add_action('admin_menu', '____cron_manager_x');