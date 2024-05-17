<?php

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
function ____cron_manager_x_page()
{
    ?>
    <div id="root"></div>
    <?php
}
add_action('admin_menu', '____cron_manager_x');