<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/admin
 * @author     Your Name <email@example.com>
 */
class Facebook_Livechat_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/facebook-livechat-admin.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/jquery-ui.css', array(), $this->version, 'all' );  
	} 

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts(){
	
		 wp_enqueue_script( 'fl_multiselect_js' , plugin_dir_url( __FILE__ ) . 'js/fl_multi_select.js', array( 'jquery' ), $this->version, true );
	   wp_enqueue_script( 'color-picker' , plugin_dir_url( __FILE__ ) . 'js/wp-color-picker-script.js', array( 'jquery' ), $this->version, false );  
	wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/facebook-livechat-admin.js', array( 'jquery' ), $this->version, false );	   
	}
	
	public function fl_add_admin_menu(){
		add_menu_page('Facebook Livechat','Facebook Livechat','manage_options','facebook_livechat_slug',array($this,'fl_load_page'),plugin_dir_url( __FILE__ ) .'images/messenger.png');  
	}
	public function fl_load_page(){
		add_action( 'admin_enqueue_scripts', array($this,'enqueue_scripts') );  
		if(get_option('fl_setting')){
			extract(json_decode(get_option('fl_setting'),true));
		}
		require_once plugin_dir_path( __FILE__) . 'partials/facebook-livechat-admin-display.php';
	}
	
	public function fl_handle_post_request(){
		if(isset($_POST['fl_form_submit_btn'])){
			$array=array();
			$array['fl_app_id'] = isset($_POST['fl_app_id'])?$_POST['fl_app_id']:'';
			$array['fl_page_add'] = isset($_POST['fl_page_add'])?$_POST['fl_page_add']:'';
			$array['fl_page_id'] = isset($_POST['fl_page_id'])?$_POST['fl_page_id']:'';
			$array['fl_btn_txt'] = isset($_POST['fl_btn_txt'])?$_POST['fl_btn_txt']:'';
			$array['fl_beforelogin_txt'] = isset($_POST['fl_beforelogin_txt'])?$_POST['fl_beforelogin_txt']:'';
			$array['fl_afterlogin_txt'] = isset($_POST['fl_afterlogin_txt'])?$_POST['fl_afterlogin_txt']:''; 
			$array['fl_Show_all'] = isset($_POST['fl_Show_all'])?$_POST['fl_Show_all']:'';  
			$array['fl_chat'] = isset($_POST['fl_chat'])?$_POST['fl_chat']:'';   
			$array['fl_themecolor'] = isset($_POST['fl_themecolor'])?$_POST['fl_themecolor']:'';  
			$array['fl_select_page'] = (isset($_POST['fl_select_page']) && is_array($_POST['fl_select_page']))?$_POST['fl_select_page']:array(); 
			$array['fl_select_post'] =  (isset($_POST['fl_select_post']) && is_array($_POST['fl_select_post']))?$_POST['fl_select_post']:array();   
			$arr_json = json_encode($array);
			$result = update_option('fl_setting',$arr_json);
			//if($result){
				update_option('fl_save_changes' , '1');
			//}
		}
	}

}
