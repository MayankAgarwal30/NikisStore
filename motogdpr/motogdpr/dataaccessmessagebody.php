<?php
function dataAccessEmailContent()
{
$head='<html><head><meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head><body>
  ';
$body="<br>";
		$body .="<p style='padding:15px;width:100%;background-color:	#7B68EE;color:white;font-size:20px;border-radius:6px 6px 0px 0px;'>".__('Requested data for Your Email','motogdpr')." ".$_POST['daemail']."
		
		</p>";
		global $wpdb;
		// view all comments for selected request
		$body .="<br><p class='fmresult' style='padding:6px;width:100%;background-color:	#7B68EE;color:white'><b>".__('Comments for','motogdpr')." ".$_POST['daemail']."</b></p>";
		
		$body .='<table class="table table-striped">
    <thead>
      <tr>
        <th>'.__('Comment ID','motogdpr').'</th>
        <th>'.__('Date').'</th>
        <th>'.__('Post ID').'</th>
		<th>'.__('Content').'</th>
		<th>'.__('Approved').'</th>
		<th>'.__('Type').'</th>
      </tr>
    </thead>
	<tbody>';
	
	$args=array(
	'author_email' =>$_POST['daemail']);
	 $comments=get_comments( $args );
	 $cmnt="";
	 foreach($comments as $data)
	 {   $cmnt .= "<tr>";
		
		  $cmnt .= "<td>".$data->comment_ID."</td>
        <td>".$data->comment_date."</td>
        <td>".$data->comment_post_ID."</td>
		<td>".$data->comment_content."</td>
		<td>".$data->comment_approved."</td>
		<td>".$data->comment_type."</td>";
		  $cmnt .=  "</tr>";
	 }
	
	$body=$body.$cmnt;
	$body .="</tbody>
	</table>";
	
	
	
	// view all post meta for selected request 
		$body .="<br><p class='fmresult' style='padding:6px;width:100%;background-color:	#7B68EE;color:white'><b>".__('All user meta for','motogdpr')." ".$_POST['daemail']."</b></p>";
		$body .='<table class="table table-striped">
    <thead>
      <tr>
        <th>'.__('Meta ID','motogdpr').'</th>
        <th>'.__('User Id','motogdpr').'</th>
        <th>'.__('Meta Key','motogdpr').'</th>
		<th>'.__('Meta Value','motogdpr').'</th>
      </tr>
    </thead>
	<tbody>';
	
	if(email_exists($_POST['daemail']))
	{
	$metagdprtable=$wpdb->prefix."usermeta";
	
	 $sql="select * from ".$metagdprtable." where user_id=".email_exists($_POST['daemail'])."";
	   $gdprrecords=$wpdb->get_results($sql);
	   $user="";
	 foreach($gdprrecords as $data)
	 {   $user .="<tr>";
		
		  $user .="<td>".$data->umeta_id."</td>
        <td>".$data->user_id."</td>
        <td>".$data->meta_key."</td>
		<td>".$data->meta_value."</td>";
		$user.= "</tr>";
	 }
	}
	$body=$body.$user;
	$body .="</tbody>
	</table>";
	
	//results of all posts for selected user
	  $body .="<br><p class='fmresult' style='padding:6px;width:100%;background-color:	#7B68EE;color:white'><b>".__('Posts for','motogdpr')." ".$_POST['daemail']."</b></p>";
		$body.= '<table class="table table-striped">
    <thead>
      <tr>
        <th>'.__('ID','motogdpr').'</th>
        <th>'.__('Date','motogdpr').'</th>
		<th>'.__('Title','motogdpr').'</th>
		<th>'.__('Content','motogdpr').'</th>
		<th>'.__('Modified','motogdpr').'</th>
		<th>'.__('Link','motogdpr').'</th>
		<th>'.__('Status','motogdpr').'</th>
      </tr>
    </thead>
	<tbody>';
	
	if(email_exists($_POST['daemail']))
	{
	$args = array(
        'author'=>email_exists($_POST['daemail']), 
        'orderby' =>  'post_date',
        'order' =>  'ASC',
		'posts_per_page' => -1
           );

   $posts=get_posts( $args );
   $post="";
	 foreach($posts as $data)
	 {   $post .= "<tr>";
		
		  $post .= "<td>".$data->ID."</td>
        <td>".$data->post_date."</td>
        <td>".$data->post_title."</td>
		<td>".$data->post_content."</td>
		<td>".$data->post_modified_gmt."</td>
		<td><a href='".get_permalink( $data->ID )."' target='_BLANK'>".get_permalink( $data->ID )."</a></td>
		<td>".$data->post_status."</td>";
		  $post .= "</tr>";
	 }
	}
	$body=$body.$post;
	$body .= "</tbody>
	</table>";
$footer="</body></html>"	;
	return $head.$body.$footer;
}
?>