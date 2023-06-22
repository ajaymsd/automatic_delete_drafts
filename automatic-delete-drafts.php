<?php 
/**
 * @package Automatic_Delete_Drafts
 * @version 1.7.2
 */
/*
Plugin Name: Automatic_Delete_Drafts
Plugin URI: http://wordpress.org/plugins/hello-dolly/
Description: Plugin to delete the drafts post type automatically after 10 am daily
Author: Ajay Mathesh
Version: 1.7.2
Author URI: http://ma.tt/
*/

defined('ABSPATH') or exit;


defined('AUDD_PLUGIN_FILE') or define('AUDD_PLUGIN_FILE',__FILE__);
// die(print_r(AUDD_PLUGIN_FILE));
defined('AUDD_PLUGIN_PATH') or define('AUDD_PLUGIN_PATH',plugin_dir_path(__FILE__));

//autoload files
if(file_exists(AUDD_PLUGIN_PATH .'/vendor/autoload.php')){
   require AUDD_PLUGIN_PATH . '/vendor/autoload.php';
}else{
    wp_die('Error During Autoload');
}

if(class_exists('AUDD\app\Route')){
    $route=new AUDD\app\Route();
    $route->hook();
}else{
    die('Route Not Loaded');
}

