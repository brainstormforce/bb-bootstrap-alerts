<?php
/**
 * Plugin Name: BB Bootstrap Alerts
 * Plugin URI: http://www.brainstormforce.com
 * Description: Notification module for the Beaver Builder Plugin.
 * Version: 1.0
 * Author: Akash D.
 * Author URI: Soon...
 */
define( 'BB_NOTIFICATIONS_DIR', plugin_dir_path( __FILE__ ) );
define( 'BB_NOTIFICATIONS_URL', plugins_url( '/', __FILE__ ) );

function bsf_bb_alerts() {
    if ( class_exists( 'FLBuilder' ) ) {
    	 require_once 'bb-bootstrap-alerts-module/bb-bootstrap-alerts-module.php';
    }
}
add_action( 'init', 'bsf_bb_alerts' );
