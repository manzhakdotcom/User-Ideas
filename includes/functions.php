<?php

function test() {
    add_thickbox();
    ob_start();
    include_once ( UI_PLUGIN_DIR . '/templates/test.php');
    $content = ob_get_contents();
    ob_end_clean();

    echo $content;

}

function test2() {
    echo plugin_dir_path(__FILE__);
}