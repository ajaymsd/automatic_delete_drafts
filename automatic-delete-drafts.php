<<?php 
/*
 * Plugin Name:       Automatic Delete Drafts
 * Plugin URI:        https://example.com/plugins/the-basics/
 * Description:       Used To Delete the Drafts Automatically at 10am Daily.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Ajay Mathesh
 * Author URI:        https://author.example.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       automatic-delete-drafts
 * Domain Path:       /languages
 */

defined('ABSPATH') || exit;


defined('AUDD_PLUGIN_FILE') or define('AUDD_PLUGIN_FILE',__FILE__);
defined('AUDD_PLUGIN_PATH') or define('AUDD_PLUGIN_PATH',plugin_dir_path(__FILE__));

//autoload files
if(file_exists(AUDD_PLUGIN_PATH .'/vendor/autoload.php')){
   require AUDD_PLUGIN_PATH . '/vendor/autoload.php';
}else{
    wp_die('Error While Autoloading');
}

if(class_exists('AUDD\App\Route')){
    $route=new AUDD\App\Route();
    $route->hook();
}else{
    wp_die('Route Not Loaded');
}

