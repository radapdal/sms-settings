<?php
 /**
  * The plugin bootstrap file
  *
  * This file is read by WordPress to generate the plugin information in the
  * plugin admin area. This file also defines a function that starts the plugin.
  *
  * @wordpress-plugin
  * Plugin Name:       SMS Settings
  * Plugin URI:        https://www.socialmedia-solutions.com
  * Description:       Custom site functionalities for SMS
  * Version:           1.0.0
  * Author:            Rad Apdal
  * Author URI:        https://github.com/radapdal
  * License:           GPL-2.0+
  * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
  */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

// Include the dependencies needed to instantiate the plugin.
foreach ( glob( plugin_dir_path( __FILE__ ) . 'includes/*.php' ) as $file ) {
    include_once $file;
}

/**
 * Initialize Settings
 */
function initialize_admin_settings() {

    $serializer = new Serializer();
    $serializer->init();

    $deserializer = new Deserializer();

    $plugin = new Submenu( new Submenu_Page( $deserializer ) );
    $plugin->init();
}
add_action( 'plugins_loaded', 'initialize_admin_settings' );
