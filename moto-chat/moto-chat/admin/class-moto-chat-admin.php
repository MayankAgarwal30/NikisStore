<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://motothemes.net/
 * @since      1.0.0
 *
 * @package    Moto_Chat
 * @subpackage Moto_Chat/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Moto_Chat
 * @subpackage Moto_Chat/admin
 * @author     motothemes <admin@motothemes.net>
 */
class Moto_Chat_Admin {

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
		$this->admin_message = array(
			array('msg' => 'All fields are required.', 'class' => 'notice notice-error is-dismissible'),
			array('msg' => 'Setting have saved successfuly.', 'class' => 'notice notice-success is-dismissible'),
			array('msg' => '', 'class' => 'notice is-dismissible'),
		);

	}
	
	public function admin_notices(){
		if(isset($_GET['moc_msg'])){
			$msg = explode(',',$_GET['moc_msg']);
			for($i=0;$i<count($msg);$i++){
				if(!isset($this->admin_message[$msg[$i]])) continue;
				echo '<div class="',$this->admin_message[$msg[$i]]['class'],'">';
					if($msg[$i]==2){
						echo '<p>',(isset($_SESSION['moc_error_msg']) ? $_SESSION['moc_error_msg'] : 'Api isn\'t working please wait & try again.'),'</p>';	
					}else{
						echo '<p>',$this->admin_message[$msg[$i]]['msg'],'</p>';
					}
				echo '</div>';
			}
		}
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Moto_Chat_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Moto_Chat_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/moto-chat-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Moto_Chat_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Moto_Chat_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/moto-chat-admin.js', array( 'jquery' ), $this->version, false );
		
		global $wpdb;
		$prefix = $wpdb->prefix;
		$table = $prefix . "chat_user";
		
		$agent_id = $wpdb->get_var( "SELECT user_id FROM $table WHERE role = 'agent'" );
		
		wp_localize_script( $this->plugin_name, 'moc_obj', array( 
				'ajax_url' => admin_url( 'admin-ajax.php' ),
				'agent_id' => $agent_id
			)
		);

	}
	
	public function getnewcustomer(){
		
		global $wpdb;
		$prefix = $wpdb->prefix;
		$table = $prefix . "chat_user";
		$rtable = $prefix . "chat_mess";
		
		$userID = get_current_user_id();
		$current_login = get_user_meta($userID, 'moc_current_login', true);
		if(empty($current_login)){
			$current_login = date('Y-m-d H:i:s');
		}
		$sql = "SELECT * FROM $table WHERE $table.date >= '".$current_login."' and role != 'agent'";
		$newuser = $wpdb->get_results( $sql );
		
		if(!empty($newuser)){
			$user = array();
			foreach($newuser as $u){
				$lastmsg = $wpdb->get_var( "SELECT msg FROM $rtable WHERE user_from = ".$u->user_id." ORDER BY msg_id DESC LIMIT 0,1" );
				$user[] = array(
					'user_id' => $u->user_id,
					'name' => $u->name,
					'letter' => get_first_letter($u->name),
					'lastmsg' => $lastmsg,
					'agent_id' => 1
				);
			}
			
			if(!empty($current_login)){
				update_usermeta( $userID, 'moc_current_login', date('Y-m-d H:i:s') );
			}
			
			echo json_encode( array( 'status' => 1, 'customers' => $user) );
		}else{
			echo json_encode( array( 'status' => 0, 'customers' => $newuser, 'current_login' => $current_login, 'sql' => $sql ) );
		}
		die();
	}
	
	public function getchathistory(){
		if(isset($_POST['user_to']) && isset($_POST['user_from'])){
			global $wpdb;
			$prefix = $wpdb->prefix;
			$table = $prefix . "chat_user";
			$rtable = $prefix . "chat_mess";
			$user_to = $_POST['user_to'];
			$user_from = $_POST['user_from'];
			$sql = "SELECT * FROM $rtable WHERE $rtable.user_from = ".$user_to." || $rtable.user_to = ".$user_to." ORDER BY msg_id ASC";
			$chatdata = $wpdb->get_results( $sql );
			
			$user_1 = $wpdb->get_var( "SELECT name FROM $table WHERE user_id = ".$_POST['user_to'] );
			$user_2 = $wpdb->get_var( "SELECT name FROM $table WHERE user_id = ".$_POST['user_from'] );
			
			echo json_encode(array( 'status' => 1, 'data' => $chatdata, 'user_name' => array( $_POST['user_to'] => get_first_letter($user_1), $_POST['user_from'] => get_first_letter($user_2) ) ));
		}
		die();
	}
	
	public function current_chat(){
		if(isset($_POST['lastid'])){
			global $wpdb;
			$prefix = $wpdb->prefix;
			$rtable = $prefix . "chat_mess";
			$table_user = $prefix . "chat_user";
			$user_to = $_POST['cust_id'];
			$lastid = $_POST['lastid'];
			
			$sql = "SELECT * FROM $rtable WHERE $rtable.user_from = ".$user_to." && msg_id > $lastid && deliver = 0";
			$chatdata = $wpdb->get_results( $sql );
			
			for($i=0;$i<count($chatdata);$i++){
				$wpdb->update( $rtable, array('deliver'=>1), array('msg_id'=>$chatdata[$i]->msg_id) ); 	
			}
			
			$is_type = $wpdb->get_var( "SELECT is_type_cust FROM $table_user WHERE user_id = $user_to" );
			
			$udata = array(
				'is_type_agent' => $_POST['is_type']
			);
			$uwhere = array(
				'user_id' => $user_to
			);
			$wpdb->update( $table_user, $udata, $uwhere ); 
			
			echo json_encode(array( 'status' => 1, 'data' => $chatdata, 'is_type' => $is_type, 'cust_id' => $user_to, 'index' => $_POST['index'] ));
		}
		die();
	}
	
	public function wp_login($login){
		$user = get_userdatabylogin($login);
		$curent_login_time = get_user_meta( $user->ID , 'moc_current_login', true);
		//add or update the last login value for logged in user
		if(!empty($curent_login_time)){
			update_usermeta( $user->ID, 'moc_last_login', date('Y-m-d H:i:s') );
			update_usermeta( $user->ID, 'moc_current_login', date('Y-m-d H:i:s') );
		}else {
			update_usermeta( $user->ID, 'moc_current_login', date('Y-m-d H:i:s') );
			update_usermeta( $user->ID, 'moc_last_login', date('Y-m-d H:i:s') );
		}
	}
	
	public function set_session(){
		if (!session_id())
			session_start();
	}
	
	public function admin_menu(){
		add_menu_page( 'Moto Chat', 'Moto Chat', 'manage_options', 'moto-settings', array($this, 'chat'), 'dashicons-welcome-widgets-menus', 90 );
		add_submenu_page( 'moto-settings', 'Settings', 'Settings', 'manage_options', 'moto-settings', array($this, 'chat'));
		add_submenu_page( 'moto-settings', 'Current', 'Current', 'manage_options', 'moto-current', array($this, 'chat'));
		add_submenu_page( 'moto-settings', 'History', 'History', 'manage_options', 'moto-history', array($this, 'chat'));
	}
	
	public function chat(){		
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/partials/moto-chat-admin-display.php';
	}
	
	public function save(){
		if ( 
			!( ! isset( $_POST['moc_nonce_field'] ) 
			|| ! wp_verify_nonce( $_POST['moc_nonce_field'], 'moc_form_settings' ) ) 
		) {
			if(!empty($_POST['moc_key'])){
				$key = $_POST['moc_key'];
				$redirect = $_POST['_wp_http_referer'];
				unset($_POST['action'], $_POST['moc_nonce_field'], $_POST['_wp_http_referer'], $_POST['moc_setting_form'], $_POST['moc_key']);
				
				if(empty($_POST['moc_license_code'])){
					unset($_POST['moc_license_code']);
				}
				if(empty($_POST['moc_firebase_api_key'])){
					unset($_POST['moc_firebase_api_key']);
				}
				
				foreach($_POST as $k => $v){
					if(!is_array($v) && trim($v) == ''){ $redirect .= '&moc_msg=0'; $bool = true;  break; }
					if(!is_array($v)){
						$array[$k] = trim($v);
					}else{
						$fields_array = array();
						for($r=0;$r<count($v);$r++){
							if(!empty($v[$r])){
								$fields_array[] = $v[$r];
							}
						}
						$array[$k] = $fields_array;
					}
				}
				
				if($bool == true){
					$_SESSION['moc_data'] = $_POST;
					wp_redirect($redirect);
					exit();
				}
				
				if(isset($_POST['moc_license_code'])){
					$url = 'https://members.motothemes.net/notify/motochatverifykey';
					$agentID = substr(time(),3);
					$results = wp_remote_post( $url, array(
							'method' => 'POST',
							'body' => array( 'chatkey' => $_POST['moc_license_code'], 'chatdomain' => rtrim(get_site_url(), '/'), 'agentID' => $agentID )
						)
					);
					
					if ( !is_wp_error( $results ) ) {
					
						$response = (array) json_decode($results['body']);
						/*print_r($response);
						die();*/
						if($response['status']){
							if($response['status'] == 1){
								update_user_meta($agentID, 'moc_mobile_login_time', '');
								update_option('moc_mobile_agentID', $agentID);
							}
							$license_code_check = true;
							$_SESSION['moc_error_msg'] = $response['msg'];
						}else{
							$_SESSION['moc_error_msg'] = $response['msg'];
							$redirect .= '&moc_msg=2';
							wp_redirect($redirect);
							exit();
						}
						
					}
				}				
				
				$_SESSION['moc_data'] = '';
				$redirect .= '&moc_msg=1';
				if(isset($license_code_check) && $license_code_check){
					$redirect .= ',2';
				}

				$data = get_option('__moto_chat__settings__');
				
				if(!empty($data)){
					$data[$key] = $array;
				}else{
					$data = array( $key => $array );
				}
				
				update_option('__moto_chat__settings__', $data);
				wp_redirect($redirect);
				exit();
				
			}	
		}
	}

}