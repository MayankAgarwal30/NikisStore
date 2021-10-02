<?php 
	if(isset($_GET['moc_msg']) && $_GET['moc_msg'] == 0){
		extract($_SESSION['moc_data']);
	}else{
		if(isset($settings['general_settings']) && !empty($settings['general_settings'])) extract($settings['general_settings']); 
	}
?>
<form method="post" action="<?php echo admin_url('admin-post.php'); ?>">  
	<input type="hidden" name="action" value="moc_form_settings">
	<?php wp_nonce_field( 'moc_form_settings', 'moc_nonce_field' ); ?>
	<table class="form-table">
		<tbody>
			<tr>
				<th scope="row"><label for="moc_license_code">License Code</label></th>
				<td>
					<input name="moc_license_code" type="text" id="moc_license_code" value="<?php echo isset($moc_license_code) ? htmlspecialchars( stripslashes( $moc_license_code ) ) : ''; ?>" class="regular-text">
					<span></span>
					<p class="description" id="tagline-description"></p>
				</td>
			</tr>
			<tr>
				<th scope="row"><label for="moc_firebase_api_key">Firebase API Key</label></th>
				<td>
					<input name="moc_firebase_api_key" type="text" id="moc_firebase_api_key" value="<?php echo isset($moc_firebase_api_key) ? htmlspecialchars( stripslashes( $moc_firebase_api_key ) ) : ''; ?>" class="regular-text">
					<span></span>
					<p class="description" id="tagline-description"><a href="https://console.firebase.google.com/" target="_blank">Get Firebase API Key</a></p>
				</td>
			</tr>
			<tr>
				<th scope="row"><label for="moc_select_page">Select Page</label></th>
				<td>
					<select name="moc_select_page" id="moc_select_page">
					<option value="all">Select All</option>
					<?php
					$pages = get_pages(); 
					if(!empty($pages)){
						foreach ( $pages as $page ) {
							$option = '<option value="' . $page->ID  . '" '.(isset($moc_select_page) && $moc_select_page == $page->ID ? 'selected' : '').'>';
							$option .= $page->post_title;
							$option .= '</option>';
							echo $option;
						}
					}
					?>
					</select>
					<span></span>
					<p class="description" id="tagline-description">The Chat Box will be show on the page.</p>
				</td>
			</tr>
		</tbody>
	</table>
	<p class="submit">
		<input type="hidden" name="moc_key" value="general_settings">
		<input type="submit" value="save setting" name="moc_setting_form" class="button button-primary">
	</p>
</form> 