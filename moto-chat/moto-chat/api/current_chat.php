<?php
require_once '../../../../wp-load.php';

if(isset($_POST['lastid']) && isset($_POST['action']) && $_POST['action'] == 'receive'){
	global $wpdb;
	$prefix = $wpdb->prefix;
	$rtable = $prefix . "chat_mess";
	$table_user = $prefix . "chat_user";
	$user_to = $_POST['cust_id'];
	$lastid = $_POST['lastid'];
	
	$sql = "SELECT * FROM $rtable WHERE $rtable.user_from = ".$user_to." && msg_id > $lastid";
	$chatdata = $wpdb->get_results( $sql );
	
	$is_type = $wpdb->get_var( "SELECT is_type_cust FROM $table_user WHERE user_id = $user_to" );
	
	$udata = array(
		'is_type_agent' => $_POST['is_type']
	);
	$uwhere = array(
		'user_id' => $user_to
	);
	$wpdb->update( $table_user, $udata, $uwhere ); 
	
	echo json_encode(array( 'status' => 1, 'data' => $chatdata, 'is_type' => $is_type, 'cust_id' => $user_to ));
	die();
}

if(isset($_POST['action']) && $_POST['action'] == 'send'){
	global $wpdb;
	$prefix = $wpdb->prefix;
	
	$user_from = $_POST['user_from'];
	$user_to = $_POST['user_to'];
	$user_msg = $_POST['user_msg'];
	$table_mess = $prefix . "chat_mess";
	$array = array(
		'user_from' => $user_from,
		'user_to' => $user_to,
		'msg' => $user_msg,
		'date' => date('Y-m-d H:i:s')
	);
	
	$wpdb->insert( $table_mess, $array ); 
	$msg_id = $wpdb->insert_id;
	echo json_encode( array( 'status' => 1, 'msg' => $user_msg, 'msg_id' => $msg_id, 'cust_id' => $user_to ) );
	die();
}