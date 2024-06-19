<?php
/**
 * Plugin Name: Alerts for Beaver Builder
 * Plugin URI: http://www.brainstormforce.com
 * Description: This is the plugin to create predefined alert messages.
 * Version: 1.2.5
 * Author: Pratik Chaskar
 * Author URI: https://pratikchaskar.com/
 * Text Domain: bb-bootstrap-alerts
 */
define( 'BB_BALERTS_DIR', plugin_dir_path( __FILE__ ) );
define( 'BB_BALERTS_URL', plugins_url( '/', __FILE__ ) );

// check of BSFBBAlerts class already exist or not
if ( !class_exists( 'BSFBBAlerts' ) ) {

    class BSFBBAlerts
    {
    	
        function __construct() {

            add_action( 'init', array( $this, 'load_bb_alerts' ) );
            add_action('init', array( $this, 'load_textdomain'));
        }

        // function to load BB Alerts
        function load_bb_alerts() {
		    if ( class_exists( 'FLBuilder' ) ) {

                // If class exist it loads the module
		    	require_once 'bb-bootstrap-alerts-module/bb-bootstrap-alerts-module.php';
		    }
            else
            {
                // Display admin notice for activating beaver builder
                add_action('admin_notices',array($this,'admin_notices_function'));
                add_action('network_admin_notices',array($this,'admin_notices_function'));
            }
		}

        // function to load text domain
        public function load_textdomain() {
            load_plugin_textdomain( 'bb-bootstrap-alerts' );
        }

        // function to display admin notice
        function admin_notices_function() {

            // check for Beaver Builder Installed / Activated or not
            if ( file_exists( plugin_dir_path( 'bb-plugin-agency/fl-builder.php' ) ) 
                || file_exists( plugin_dir_path( 'beaver-builder-lite-version/fl-builder.php' ) ) ) {

                $url = network_admin_url() . 'plugins.php?s=Beaver+Builder+Plugin';
            } else {
                $url = network_admin_url() . 'plugin-install.php?s=billyyoung&tab=search&type=author';
            }

            echo '<div class="notice notice-error">';
            echo "<p>". sprintf( __( 'The <strong>Bootstrap Alerts For Beaver Builder</strong> plugin requires <strong><a href="%s">Beaver Builder</strong></a> plugin installed & activated.' , 'bb-bootstrap-alerts' ), $url ) ."</p>";
            echo '</div>';
        }
    }

    new BSFBBAlerts();
}