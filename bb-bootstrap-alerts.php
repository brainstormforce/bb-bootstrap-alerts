<?php
/**
 * Plugin Name: Bootstrap Alerts For Beaver Builder
 * Plugin URI: http://www.brainstormforce.com
 * Description: This is the plugin to create predefined alert messages.
 * Version: 1.0
 * Author: Brainstorm Force
 * Author URI: https://www.brainstormforce.com/
 * Text Domain: bb-bootstrap-alerts
 */
define( 'BB_BALERTS_DIR', plugin_dir_path( __FILE__ ) );
define( 'BB_BALERTS_URL', plugins_url( '/', __FILE__ ) );


if ( !class_exists( 'BSFBBAlerts' ) ) {

    class BSFBBAlerts
    {
    	
        function __construct() {

            add_action( 'init', array( $this, 'load_bb_alerts' ) );
        }

        function load_bb_alerts() {
		    if ( class_exists( 'FLBuilder' ) ) {
		    	require_once 'bb-bootstrap-alerts-module/bb-bootstrap-alerts-module.php';
		    }
		}
    }

    new BSFBBAlerts();
}