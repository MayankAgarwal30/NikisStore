<?php
 /**
 * Plugin Name:     Live Chat Facebook WordPress Plugin
 * Plugin URI:        pluginexpert.com
 * Description:      Live Chat Facebook WordPress Plugin allows you to embed a facebook live chatbox on your website, your visitors and customers can chat with you via Facebook Message. This is very easy way to provide customer support and keep contact with your customers.
 * Version:            1.0.1
 * Author:             Plugin Expert
 * Author URI:        pluginexpert.com 
 */
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-plugin-name-activator.php
 */
function activate_facebook_livechat() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-facebook-livechat-activator.php';
	Facebook_Livechat_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-plugin-name-deactivator.php
 */
function deactivate_facebook_livechat() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-facebook-livechat-deactivator.php';
	Facebook_Livechat_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_facebook_livechat' );
register_deactivation_hook( __FILE__, 'deactivate_facebook_livechat' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-facebook-livechat.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_facebook_livechat() {

	$plugin = new Facebook_Livechat();
	$plugin->run();

}
run_facebook_livechat();
