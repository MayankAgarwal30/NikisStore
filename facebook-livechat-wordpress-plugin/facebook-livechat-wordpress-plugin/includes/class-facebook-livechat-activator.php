<?php

/**
 * Fired during plugin activation
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Plugin_Name
 * @subpackage Plugin_Name/includes
 * @author     Your Name <email@example.com>
 */
class Facebook_Livechat_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		
		if(get_option('fl_save_changes') == false){
			$setting_array= array( 'fl_app_id' => '' , 'fl_page_add' => '', 'fl_btn_txt' =>'Facebook  Live Chat' , 'fl_Show_all' => 'yes','fl_select_page' => array(), 'fl_select_post' => array() );
			
			$setting_array_json=json_encode($setting_array);
			update_option( 'fl_save_changes' , $setting_array_json );
		}/* else{
			extract(json_decode(get_option('fl_save_changes'),true));
			$setting_array['fl_app_id'] = ( $fl_app_id == '')? '' : $fl_app_id ;
			$setting_array['fl_page_add'] = ( $fl_page_add == '')? '' : $fl_page_add ;
			$setting_array['fl_Show_all'] = ( $fl_Show_all == '') ? 'yes': $fl_Show_all ;
			$setting_array['fl_select_page'] = ( $sp_btn_clr== '')?  '' : $fl_select_page;
			$setting_array['fl_select_post'] = ( $fl_select_post== '')?  '' : $fl_select_post;
			$setting_array_json=json_encode($setting_array);
			update_option( 'skype_pulgin_setting_save' , $setting_array_json ); 
		} */

	}

}
