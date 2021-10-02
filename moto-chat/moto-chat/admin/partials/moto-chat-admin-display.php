<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://motothemes.net/
 * @since      1.0.0
 *
 * @package    Moto_Chat
 * @subpackage Moto_Chat/admin/partials
 */
$settings = get_option('__moto_chat__settings__');  
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<div class="wrap">  
	<div id="icon-themes" class="icon32"></div>  
	<h2>Moto Chat</h2>

	<?php $active_tab = isset( $_GET[ 'page' ] ) ? $_GET[ 'page' ] : 'moto-settings'; ?>  

	<h2 class="nav-tab-wrapper">  
		<a href="<?php echo admin_url('admin.php?page=moto-settings'); ?>" class="nav-tab <?php echo $active_tab == 'moto-settings' ? 'nav-tab-active' : ''; ?>">Setting</a>  
		<a href="<?php echo admin_url('admin.php?page=moto-current'); ?>" class="nav-tab <?php echo $active_tab == 'moto-current' ? 'nav-tab-active' : ''; ?>">Current Chat</a>  
		<a href="<?php echo admin_url('admin.php?page=moto-history'); ?>" class="nav-tab <?php echo $active_tab == 'moto-history' ? 'nav-tab-active' : ''; ?>">History</a>    
	</h2>	
	
	<?php do_action('moc_form_error'); ?> 
	
	<?php
	if(isset($_GET['page']) && $_GET['page'] == 'moto-settings'){
		require_once 'settings.php';
	}
	
	if(isset($_GET['page']) && $_GET['page'] == 'moto-current'){
		global $wpdb;
		$prefix = $wpdb->prefix;
		$table = $prefix . "chat_user";
		$userID = get_current_user_id();
		$current_login = get_user_meta($userID, 'moc_last_login', true);
		$sql = "SELECT * FROM $table WHERE $table.date >= '".$current_login."' AND role='customer' ORDER BY user_id DESC";
		$customer = $wpdb->get_results( $sql );
		$agent_id = $wpdb->get_var( "SELECT user_id FROM $table WHERE role = 'agent'" );	
		$rtable = $prefix . "chat_mess";
		require_once 'current.php';
	}
	
	if(isset($_GET['page']) && $_GET['page'] == 'moto-history'){
		global $wpdb;
		$prefix = $wpdb->prefix;
		$table = $prefix . "chat_user";
		$rtable = $prefix . "chat_mess";
		
		$sql = "SELECT * FROM $table WHERE role='customer' ORDER BY user_id DESC";
		$customer = $wpdb->get_results( $sql );
		$agent_id = $wpdb->get_var( "SELECT user_id FROM $table WHERE role = 'agent'" );	
		
		require_once 'history.php';
	}
	?>
	
</div>