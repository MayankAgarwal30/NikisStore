<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/admin/partials
 */
?>
<div id="flc_main_wrapper">
	<h1>Facebook Livechat Setting</h1>
	<form name="sp_setting_form" id="sp_setting_form" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
		<div class="flv_table_setting">
			<h3>Facebook Api Setting</h3>
			<table class="form-table">
				<tr>
					<th scope="row"><label for="fl_app_id">Facebook App Id<span class="fl_font_color_red" >*</span></label></th>
					<td>
						<input name="fl_app_id" type="text" id="fl_app_id" value="<?php echo isset($fl_app_id)? $fl_app_id : ''; ?>" class="regular-text"><br>
						<span class="fl_app_id_err fl_font_color_red"></span>
						<p class="description" >Facebook app id  <a href="https://developers.facebook.com/docs/apps/register" target="_blank">Get here</a></p>
					</td>
					
				</tr>
				<tr>
					<th scope="row"><label for="fl_page_add">Facebook Page URL<span  class="fl_font_color_red" >*</span></label></th>
					<td>
						<input name="fl_page_add" type="text" id="fl_page_add" value="<?php echo isset($fl_page_add)? $fl_page_add : ''; ?>" class="regular-text"><br>
						<span class="fl_page_add_err fl_font_color_red" ></span>
					</td>
				</tr>
				<tr>
					<th scope="row"><label for="fl_page_add">Facebook Page ID<span  class="fl_font_color_red" >*</span></label></th>
					<td>
						<input name="fl_page_id" type="text" id="fl_page_id" value="<?php echo isset($fl_page_id)? $fl_page_id : ''; ?>" class="regular-text"><br>
						<span class="fl_page_add_err fl_font_color_red" ></span>
					</td>
				</tr> 
			</table>
		</div>
		<div class="flv_table_setting">
			<h3>Page Setting</h3>
			<table class="form-table">
				<tr>
					<th scope="row"><label for="fl_Show_all">Select Facebook Messenger or Chat</label></th>
					<td>
						<?php  $fl_chat = isset($fl_chat)?$fl_chat:'yes'; ?>
						<input name="fl_chat" type="radio"  value="yes" <?php echo (isset($fl_chat) && $fl_chat =="yes" )?'checked':'';  ?> >Yes
						<input name="fl_chat" type="radio"  value="no" <?php echo (isset($fl_chat) && $fl_chat =="no" )?'checked':'';  ?> >No
					</td> 
				</tr> 
				<tr>
					<th scope="row"><label for="fl_btn_txt"> Facebook Button Text</label></th>
					<td>
						<input name="fl_btn_txt" type="text" id="fl_btn_txt" value="<?php echo isset($fl_btn_txt)? $fl_btn_txt : 'Facebook Live Chat'; ?>" class="regular-text"><br>
					</td>
				</tr>
				<tr>
					<th scope="row"><label for="fl_btn_txt"> Chat Box Before login text</label></th>
					<td>
						<input name="fl_beforelogin_txt" type="text" id="fl_beforelogin_txt" value="<?php echo isset($fl_beforelogin_txt)? $fl_beforelogin_txt : 'Please login for chatting.'; ?>" class="regular-text"><br>
					</td>
				</tr>
				<tr>
					<th scope="row"><label for="fl_btn_txt"> Chat box after login text</label></th>
					<td>
						<input name="fl_afterlogin_txt" type="text" id="fl_afterlogin_txt" value="<?php echo isset($fl_afterlogin_txt)? $fl_afterlogin_txt : 'Chat with me.'; ?>" class="regular-text"><br>
					</td>    
				</tr>
				<tr>
					<th scope="row"><label for="fl_btn_txt"> Chat box theme color</label></th>
					<td> 
						<input name="fl_themecolor" id="fl_themecolor" class="jscolor" value="<?php echo isset($fl_themecolor)? $fl_themecolor : '151509'; ?>"><br>   
					</td>   					
				</tr>
				<tr>
					<th scope="row"><label for="fl_Show_all">Show To All</label></th>
					<td>
						<?php  $fl_Show_all = isset($fl_Show_all)?$fl_Show_all:'yes'; ?>
						<input name="fl_Show_all" type="radio"  value="yes" <?php echo (isset($fl_Show_all) && $fl_Show_all =="yes" )?'checked':'';  ?> >Yes
						<input name="fl_Show_all" type="radio"  value="no" <?php echo (isset($fl_Show_all) && $fl_Show_all =="no" )?'checked':'';  ?> >No
					</td>
				</tr>
				<tr>
					<th scope="row"><label for="fl_select_page">Select Page</label></th>
					<td>
						<select id="fl_select_page"  name="fl_select_page[]" multiple="multiple"  class="regular-text fl_admin_select">
						  <option value="1">Select All</option>		
						<?php 
						  $pages = get_pages(); 
						  foreach ( $pages as $page ) {?>
						  <option value="<?php echo $page->ID;?>"
						  <?php if(!empty($fl_select_page))
						  if(in_array($page->ID, $fl_select_page))
							  echo "selected"; ?> > <?php echo $page->post_title; ?> 
						  </option>					  
						  <?php				
						  }
						 ?>
						 </select>
					</td>
					
				</tr>
				<tr>
					<th scope="row"><label for="fl_select_post">Select Post</label></th>
					<td>
						<select id="fl_select_post"  name="fl_select_post[]" multiple="multiple"  class="regular-text fl_admin_select"  >
						  <option value="1">Select All</option>				 
					 <?php
							$postlist = get_posts( 'orderby=menu_order&sort_order=asc' );
							$posts = array();
							foreach ( $postlist as $post ) {?>
							  <option value="<?php echo $post->ID;?>"
						  <?php if(!empty($fl_select_post))
						  if(in_array($post->ID, $fl_select_post))
							  echo "selected"; ?> > <?php echo $post->post_title; ?> 
							</option>
							<?php
							}
					?> 
						 </select>
					</td>
				</tr>
			</table>
		</div>
		<div class="submit">
			<input type="submit" name="fl_form_submit_btn" id="fl_form_submit_btn" class="button button-primary" value="Save Changes">
		</div>
		<?php if(get_option('fl_save_changes') && get_option('fl_save_changes') == "1" ){
			echo '<div id="fl_save_result"><h3>Save successfully</h3></div>';
			update_option('fl_save_changes' , '0');
		}  ?>
	</form>
</div>
