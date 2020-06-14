<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://example.com
 * @since             1.0.0
 * @package           Plugin_Name
 *
 * @wordpress-plugin
 * Plugin Name:       Export DB
 * Plugin URI:        http://example.com/plugin-name-uri/
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Your Name or Your Company
 * Author URI:        http://example.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       plugin-name
 * Domain Path:       /languages
 */



//Load script
add_action( 'admin_enqueue_scripts', 'my_custom_script_load' );
function my_custom_script_load(){
  wp_enqueue_script( 'my-custom-script', plugin_dir_url( __FILE__ ) . 'admin_ajax.js', array( 'jquery' ) );
}

//Add menu
add_action('admin_bar_menu', 'add_item', 1010);


//AJAX   Hook wp_ajax_{{callback}}
add_action( 'wp_ajax_database_dump', 'database_dump_callback' );

function add_item( $admin_bar ){
	//	global $pagenow;
		$admin_bar->add_menu(array( 'id'=>'db-export-2','title'=>'DB Export 2','href'=>'#' ) );
}



function database_dump_callback() {
    global $wpdb;
    $user = DB_USER;
    $pass = DB_PASSWORD;
    $host = DB_HOST;
    $database = DB_NAME;
    $dir = get_home_path();

    // Test if wp-cli is working on server
    $info = shell_exec("wp --info");
    // Works only with WP-CLI installed on server
    if (!empty($info)) {
        // Do WP-CLI-specific things.
        shell_exec("wp db export {$dir}db.sql");
    } else {
        // Works only if server allows shell execution of mysqldump
        exec(
            "mysqldump --user={$user} --password={$pass} --host={$host} {$database} --result-file={$dir}/db.sql"
        );
        // TODO:
        // Check if the file size of db.sql is zero, then alert user.
    }
    $response =
        "Database dumped to db.sql on the root path of this amazing site";
    echo $response;
    wp_die();
}

