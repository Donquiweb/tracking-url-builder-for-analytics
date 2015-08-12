<?php
/*
Plugin Name: 	Tracking URL Builder for Analytics
Version: 		1.0.1
Description: 	A simple form to create url for tracking of custom campaigns on Google Analytics
Author: 		Luca Raldiri
Author URI: 	http://www.lucaraldiri.it
License:     	GPLv3
License URI: 	http://www.gnu.org/licenses/gpl.html
Text Domain: 	tracking-url-builder-for-analytics
*/

/**
 * Load translations
 */
function tuba_load_textdomain() {
	load_plugin_textdomain( 'tracking-url-builder-for-analytics', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}

add_action( 'init', 'tuba_load_textdomain', 1 );

require_once ( dirname( __FILE__ ) . '/admin.php');

