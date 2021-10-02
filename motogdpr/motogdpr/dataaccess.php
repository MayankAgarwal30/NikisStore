<?php
if(isset($_POST['defdatext']))
{
	$pref='Moto-GDPR-Compliance-';
	update_option($pref.'da-message',gdprEditorText('dataaccess'));
}
if(isset($_POST['gdprdatakeaction']))
{
	global $wpdb;
	$pref='Moto-GDPR-Compliance-';
	$wpcrmailheaders = "MIME-Version: 1.0" . "\r\n";
    $wpcrmailheaders .= "Content-type:text/html;charset=UTF-8" . "\r\n";
  require_once("dataaccessmessagebody.php");
  $eml=dataAccessEmailContent();
  $to=$_POST['daemail'];
  $subject=get_option($pref.'da-title');
  $msg=get_option($pref.'da-message').$eml;
  if(wp_mail($to,$subject,$msg,$wpcrmailheaders))
  {
	  $timenow=date('d-M-Y h:iA');
	  $datables=$wpdb->prefix."gdpr_request_records";
	  $wpdb->query($wpdb->prepare("update ".$datables." set action=%s , actiontime='%s' where id=%d ",array('1',$timenow,$_POST['dareqid'])));
	  echo "<script>alert('".__('Data successfully sent to','motogdpr')." ".$to."');</script>";
  }
  else
  {
	   echo "<script>alert('".__('Unable to send data','motogdpr')."');</script>";
  }
  
}
?>
<?php
if(isset($_POST['gdprdaremove']))
{
	global $wpdb;
	$table=$wpdb->prefix."gdpr_request_records";
	$wpdb->query($wpdb->prepare("delete from ".$table." where id=%d ",array($_POST['dareqid'])));
}
?>
<?php
$pref='Moto-GDPR-Compliance-';

   if(isset($_POST['dasettingssubmit']))
   {
	   update_option($pref.'da-email',$_POST['daemail']);
       update_option($pref.'da-title',$_POST['damailtitle']);
       update_option($pref.'da-message',stripslashes($_POST['damessage']));
   }
?>
<html lang="en">
  <head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <script type="text/javascript">
  function gdprdaAction(){
  			var confmsgg="<?php _e('Are you sure you want to delete this','motogdpr');?>";
			var conf=confirm(confmsgg);
			if(conf==true)
			{return true;}
			else
			{return false;}
			}
  </script>
  <script>
   $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
    });
</script>
  </head>
	<body>
	
	
	<br><br>
	<ul class="nav nav-tabs">
    <li><a href="admin.php?page=moto_gdpr"><?php _e('Compliance','motogdpr')?></a></li>
	<li><a href="admin.php?page=moto_gdpr_cookie"><?php _e('Cookie Consent','motogdpr')?></a></li>
     <li><a href="admin.php?page=moto_gdpr_tandc"><?php _e('Terms And Conditions','motogdpr')?></a></li>
  <li><a href="admin.php?page=moto_gdpr_pp"><?php _e('Privacy Policy','motogdpr')?></a></li>
     <li><a href="admin.php?page=moto_gdpr_rtbf"><?php _e('Right to be Forgotten','motogdpr')?></a></li>
     <li class="active"><a href="admin.php?page=moto_gdpr_dac"><?php _e('Data Access','motogdpr')?></a></li>
  <li><a href="admin.php?page=moto_gdpr_dbr"><?php _e('Data Breach','motogdpr')?></a></li>
  <li><a href="admin.php?page=moto_gdpr_drf"><?php _e('Data Rectification','motogdpr')?></a></li>
  <li><a href="admin.php?page=moto_gdpr_eu"><?php _e('Refuse EU Visitors','motogdpr')?></a></li>
  
</ul>
<br>
	
	
	
	
	<div class="container-fluid">
	<?php
	if(isset($_POST['gdprdaview']))
	{
		echo "<br>";
		$dataacsreq=__("Requested data for selected Email","motogdpr");
		echo "
		<h4 class='m0' style='padding:10px;background: linear-gradient(#525863, #444a55);color:white;margin-top:5px;border-radius:2px;padding-left:15px;'>".$dataacsreq.$_POST['daemail']."
		<a href=''><input type='button' class='btn btn-warning' value='".__('GO BACK','motogdpr')."'></a>
		</h4>";
		global $wpdb;
		// view all comments for selected request
		echo "<br><div class='row'>
		<div class='col-sm-12'>
		<div class='panel panel-primary'><div class='panel-heading'>
		<h4 class='m0'>".__('Comments for:','motogdpr')."<strong> ".$_POST['daemail']."</strong></h4></div>
<div class='panel-body'>
	  <div class='table-responsive'>
		<table class='table table-striped table-hover'>
    <thead>
      <tr>
        <th>".__('Comment ID','motogdpr')."</th>
        <th>".__('Date','motogdpr')."</th>
        <th>".__('Post ID','motogdpr')."</th>
		<th>".__('Content','motogdpr')."</th>
		<th>".__('Approved','motogdpr')."</th>
		<th>".__('Type','motogdpr')."</th>
      </tr>
    </thead>
	<tbody>";
	
	$args=array(
	'author_email' =>$_POST['daemail']);
	 $comments=get_comments( $args );
	 foreach($comments as $data)
	 {   echo "<tr>";
		
		  echo "<td>".$data->comment_ID."</td>
        <td>".$data->comment_date."</td>
        <td>".$data->comment_post_ID."</td>
		<td>".$data->comment_content."</td>
		<td>".$data->comment_approved."</td>
		<td>".$data->comment_type."</td>";
		  echo "</tr>";
	 }
	
	
	echo "</tbody>
	</table>
	</div>
	  </div>
	  </div>
	  </div>
	  </div>";
	
	
	
	// view all post meta for selected request 
		echo "<br><div class='row'>
		<div class='col-sm-12'>
		<div class='panel panel-primary'><div class='panel-heading'>
		<h4 class='m0'>".__('All user meta for:','motogdpr')."<strong> ".$_POST['daemail']."</strong></h4></div>
<div class='panel-body'>
	  <div class='table-responsive'>
		<table class='table table-striped table-hover'>
    <thead>
      <tr>
        <th>".__('Meta ID','motogdpr')."</th>
        <th>".__('User Id','motogdpr')."</th>
        <th>".__('Meta Key','motogdpr')."</th>
		<th>".__('Meta Value','motogdpr')."</th>
      </tr>
    </thead>
	<tbody>";
	
	if(email_exists($_POST['daemail']))
	{
	$metagdprtable=$wpdb->prefix."usermeta";
	
	 $sql="select * from ".$metagdprtable." where user_id=".email_exists($_POST['daemail'])."";
	   $gdprrecords=$wpdb->get_results($sql);
	   
	 foreach($gdprrecords as $data)
	 {   echo "<tr>";
		
		  echo "<td>".$data->umeta_id."</td>
        <td>".$data->user_id."</td>
        <td>".$data->meta_key."</td>
		<td>".$data->meta_value."</td>";
		echo "</tr>";
	 }
	}
	echo "</tbody>
	</table>
	</div>
	  </div>
	  </div>
	  </div>
	  </div>";
	
	//results of all posts for selected user
	  echo "<br><div class='row'>
		<div class='col-sm-12'>
		<div class='panel panel-primary'><div class='panel-heading'>
		<h4 class='m0'>".__('Posts for:','motogdpr')."<strong> ".$_POST['daemail']."</strong></h4></div>
<div class='panel-body'>
	  <div class='table-responsive'>
		<table class='table table-striped table-hover'>  
    <thead>
      <tr>
        <th>ID</th>
        <th>".__('Date','motogdpr')."</th>
		<th>".__('Title','motogdpr')."</th>
		<th>".__('Content','motogdpr')."</th>
		<th>".__('Modified','motogdpr')."</th>
		<th>".__('Link','motogdpr')."</th>
		<th>".__('Status','motogdpr')."</th>
      </tr>
    </thead>
	<tbody>";
	
	if(email_exists($_POST['daemail']))
	{
	$args = array(
        'author'=>email_exists($_POST['daemail']), 
        'orderby' =>  'post_date',
        'order' =>  'ASC',
		'posts_per_page' => -1
           );

   $posts=get_posts( $args );
	 foreach($posts as $data)
	 {   echo "<tr>";
		
		  echo "<td>".$data->ID."</td>
        <td>".$data->post_date."</td>
        <td>".$data->post_title."</td>
		<td>".$data->post_content."</td>
		<td>".$data->post_modified_gmt."</td>
		<td><a href='".get_permalink( $data->ID )."' target='_BLANK'>".get_permalink( $data->ID )."</a></td>
		<td>".$data->post_status."</td>";
		  echo "</tr>";
	 }
	}
	
	echo "</tbody>
	</table>
	</div>
	  </div>
	  </div>
	  </div>
	  </div>";
	}
	?>
	
	</div>
	
	<?php
	if(! isset($_POST['gdprdaview']))
	{
		?>
	
	
	<div class="container-fluid"><br>
	<form action="" method="post">	
	<div class="row">
	<div class="col-sm-12">
<div class="panel panel-primary">
<div class="panel-heading"><h4 class="m0"><?php _e('Data Access Request Settings','motogdpr')?></h4></div>
<div class="panel-body">
	 
	 <div class="alert alert-warning clrblack"><?php _e('Use this short code','motogdpr')?> <b>[MOTOGDPR_UserRequestForm]</b> <?php _e('to access user request forms in future.','motogdpr')?></div>
	 
  <div class="form-group">
    <label for=""><?php _e('Admin Email:','motogdpr')?></label>
    <input type="email" class="form-control" name="daemail" value="<?php echo get_option($pref.'da-email'); ?>">
  </div>
  <div class="form-group">
    <label for=""><?php _e('Mail Subject:','motogdpr')?></label>
    <input type="text" class="form-control" name="damailtitle" value="<?php echo get_option($pref.'da-title'); ?>">
  </div>
  <div class="form-group">
  <div class="panel panel-default">
    <div class="panel-body"><label for=""><?php _e('Content:','motogdpr')?></label>
    <?php wp_editor(get_option($pref.'da-message'),"damessage",$settings = array(
    'editor_height' => 200, 
    'textarea_rows' => 20, 
	));?>
	</div>
	<div class="panel-footer"><form action="" method="post"><input type="submit" class="btn btn-default" value="<?php _e('Use Default Text','motogdpr')?>"  name="defdatext"></form></div>
	</div>
  <input type="submit" class="btn btn-warning" value="<?php _e('SAVE SETTINGS','motogdpr') ?>" name="dasettingssubmit">
</div>
</div>
</div>
</form>
</div>


<div class="col-sm-12">
	<div class="row m0">
<div class="panel panel-primary">
<div class="panel-heading"><h4 class="m0"><?php _e('Data access requests list','motogdpr')?></h4></div>
<div class="panel-body">
<table class="table table-striped table-hover gdprrqtable">
	<thead>
		<tr>
		<th>#</th>
		<th><?php _e('Requested By','motogdpr')?></th>
		<th><?php _e('Status','motogdpr')?></th>
		<th><?php _e('Request Date','motogdpr')?></th>
		<th><?php _e('Action Taken','motogdpr')?></th>
		<th><?php _e('Options','motogdpr')?></th>
	    </tr>
	</thead>
	<tbody>
	<?php showRequestToDataAccess(); ?>
	</tbody>
	
 </table> 
</div>
   </form>
	</div>
	</div>
	</div>
</div>
	<?php } ?>
	<style>
		.gdprrqtable tbody tr td 
{
   padding-right:2px;
    vertical-align:middle;
}
select.selectcontrol{width:100%}
   .nav>li>a {
    position: relative;
    display: block;
    padding: 10px 10px;
}
.panel-primary {
    border-color: #525863;
}
.panel-primary>.panel-heading {
    color: #fff;
     background: linear-gradient(#525863, #444a55);
    border-color: #525863;
}
.nav-tabs>li.active>a, .nav-tabs>li.active>a:focus, .nav-tabs>li.active>a:hover {
    color: #F9A61C;
    cursor: default;
    background-color: #fff;
    border: 1px solid #000;
    border-bottom-color: transparent;
}
a {
    color: #525863;
    text-decoration: none;
}
.nav-tabs {
    border-bottom: 1px solid #000;
}
.btnsave{
	background-image: url("<?php echo plugins_url( 'img/btnsavesettings.png' , __FILE__); ?>");
	height:36px;
	width:150px;
	border:0px;
	margin-bottom: 5px;
}
.m0{
	margin:0px;
}
.panel {    
    border-radius: 2px;   
}
.panel-heading {
    padding: 10px 15px;
    border-bottom: 1px solid transparent;
    border-top-left-radius: 0px;
    border-top-right-radius: 0px;
}
.clrblack{
	color:#000;
}
.goback
{
	background-image: url("<?php echo plugins_url( 'img/Go-back-button.png' , __FILE__); ?>");
	height:36px;
	width:150px;
	border:0px;
	margin-left: 40px;	
	border-radius:4px;
}
	</style>
</body>
</html>
<?php gdprteknikforce_display_logo(); ?>