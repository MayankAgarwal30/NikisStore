

<?php
$pref='Moto-GDPR-Compliance-';
//---------all new

if(get_option($pref.'dont-accept-cookie-url'))
{
	
}
else
{
	add_option($pref.'dont-accept-cookie-url','');
}
//-------cooki record remove

if(isset($_POST['cookieconsentremove']))
{
	global $wpdb;
	$table=$wpdb->prefix."gdpr_request_records";
	$wpdb->query($wpdb->prepare("delete from ".$table." where id=%d ",array($_POST['cookieconsentid'])));

}

//------
if(isset($_POST['defctext']))
{
	update_option($pref.'notice',gdprEditorText('cookie'));
}
if(isset($_POST['savegdprcookie']))
{
update_option($pref.'notice',stripslashes($_POST['gdprnotice']));
update_option($pref.'show',$_POST['cookie']);
update_option($pref.'cookie-style',$_POST['gdprcustomstyle']);
update_option($pref.'cookie-text-color',$_POST['gdprtxtcolor']);
update_option($pref.'cookie-bg-color',$_POST['gdprbgcolor']);
update_option($pref.'cookie-position',$_POST['gdprcookieposition']);
update_option($pref.'cookie-distance',$_POST['wpgdrdistance']);
update_option($pref.'cookie-accept-button',$_POST['wpgdracceptbuttontext']);

if(isset($_POST['wpgdprcookieeu']))
{
	update_option($pref.'cookie-eu','1');
}
else
{
	update_option($pref.'cookie-eu','0');
}
if(filter_var($_POST['wpgdrdntacceptbuttonurl'],FILTER_VALIDATE_URL))
{
	update_option($pref.'dont-accept-cookie-url',$_POST['wpgdrdntacceptbuttonurl']);
}
else
{
	$alertmsg=__('Please enter a valid url where to redirect if user does not accept cookie','motogdpr');

	echo "<script>alert('".$alertmsg."');</script>";
}

}

$chkd="";
if(get_option($pref.'show')=='1')
{
	$chkd="checked";
}
//wp editor style
$settings = array(    
    'textarea_rows' => 8, 
	
);

?>

<html lang="en">
  <head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
	<body>
	
	<br><br>
	<ul class="nav nav-tabs">
    <li><a href="admin.php?page=moto_gdpr"><?php _e('Compliance','motogdpr')?></a></li>
	<li class="active"><a href="admin.php?page=moto_gdpr_cookie"><?php _e('Cookie Consent','motogdpr')?></a></li>
     <li><a href="admin.php?page=moto_gdpr_tandc"><?php _e('Terms And Conditions','motogdpr')?></a></li>
  <li><a href="admin.php?page=moto_gdpr_pp"><?php _e('Privacy Policy','motogdpr')?></a></li>
     <li><a href="admin.php?page=moto_gdpr_rtbf"><?php _e('Right to be Forgotten','motogdpr')?></a></li>
     <li><a href="admin.php?page=moto_gdpr_dac"><?php _e('Data Access','motogdpr')?></a></li>
  <li><a href="admin.php?page=moto_gdpr_dbr"><?php _e('Data Breach','motogdpr')?></a></li>
  <li><a href="admin.php?page=moto_gdpr_drf"><?php _e('Data Rectification','motogdpr')?></a></li>
  <li><a href="admin.php?page=moto_gdpr_eu"><?php _e('Refuse EU Visitors','motogdpr')?></a></li>
</ul>
<br>	
	<br>
	<form action="" method="post">
	<div class="container-fluid">
	
	<h4 style="padding:10px;background: linear-gradient(#525863, #444a55);color:white;margin-top:5px;border-radius:2px;padding-left:15px;"><?php _e('Cookie Consent','motogdpr')?></h4>
	<div class="row">
	
	<div class="col-sm-8">
<div class="panel panel-primary h376">
<div class="panel-heading"><h4 class="m0"><?php _e('Edit Your Cookie Notice','motogdpr')?></h4></div>
<div class="panel-body"><?php wp_editor(get_option($pref.'notice'),'gdprnotice',$settings); ?>
</div>
<div class="panel-footer"><form action="" method="post"><input type="submit" class="btn btn-default" value="<?php _e('Use Default Text','motogdpr')?>"  name="defctext"></form></div>
</div>
</div>
	
	<div class="col-sm-4">
<div class="panel panel-primary">
<div class="panel-heading"><h4 class="m0"><?php _e('Settings','motogdpr')?></h4></div>
<div class="panel-body">
<div class="row">
<div class="col-sm-7">
<h5><?php _e('Select Page to display','motogdpr')?></h5>
</div>
<div class="col-sm-5">
<?php gdpr_all_pages('cookie'); ?>
</div>
</div>

<div class="row">
<div class="col-sm-7">
<h5><?php _e('Text Color','motogdpr')?></h5>
</div>
<div class="col-sm-5">
<input type="color" style="width:100%" name="gdprtxtcolor" value="<?php echo get_option($pref.'cookie-text-color'); ?>">
</div>
</div>

<div class="row">
<div class="col-sm-7">
<h5><?php _e('Background Color','motogdpr')?></h5>
</div>
<div class="col-sm-5">
<input type="color" style="width:100%" name="gdprbgcolor" value="<?php echo get_option($pref.'cookie-bg-color'); ?>">
</div>
</div>

<div class="row">
<div class="col-sm-7">
<h5><?php _e('Box Position','motogdpr')?></h5>
</div>
<div class="col-sm-5">
<select style="width:100%" name="gdprcookieposition">
<option <?php if(get_option($pref.'cookie-position')=="top:0px;left:0px"){echo "selected";} ?> value="top:0px;left:0px"><?php _e('Top Left','motogdpr')?></option>
<option <?php if(get_option($pref.'cookie-position')=="top:0px;right:0px"){echo "selected";} ?> value="top:0px;right:0px"><?php _e('Top Right','motogdpr')?></option>
<option <?php if(get_option($pref.'cookie-position')=="bottom:0px;left:0px"){echo "selected";} ?> value="bottom:0px;left:0px"><?php _e('Bottom Left','motogdpr')?></option>
<option <?php if(get_option($pref.'cookie-position')=="bottom:0px;right:0px"){echo "selected";} ?> value="bottom:0px;right:0px"><?php _e('Bottom Right','motogdpr')?></option>
</select>
</div>
</div>

<div class="row">
<div class="col-sm-7">
<h5><?php _e('Distance From Border','motogdpr')?></h5>
</div>
<div class="col-sm-5">
<input type="text" style="width:100%" value="<?php echo get_option($pref.'cookie-distance'); ?>" name="wpgdrdistance">
</div>
</div>

<div class="row">
<div class="col-sm-7">
<h5><?php _e('Accept Button Text','motogdpr')?></h5>
</div>
<div class="col-sm-5">
<input type="text" style="width:100%" value="<?php echo get_option($pref.'cookie-accept-button'); ?>" name="wpgdracceptbuttontext">
</div>
</div>

<div class="row">
<div class="col-sm-7" title="<?php _e('If the user does not accept cookies, choose where to redirect him','motogdpr')?>">
<h5><?php _e('Redirect URL','motogdpr')?></h5>
</div>
<div class="col-sm-5">
<input type="text" style="width:100%" value="<?php echo get_option($pref.'dont-accept-cookie-url'); ?>" name="wpgdrdntacceptbuttonurl">
</div>
</div>


<div class="row">
<div class="col-sm-7">
<h5><?php _e('Show only to visitors from EU','motogdpr')?></h5>
</div>
<div class="col-sm-5">
<input type="checkbox" <?php if(get_option($pref.'cookie-eu')=='1'){echo "checked";} ?> name="wpgdprcookieeu">
</div>
</div>


<div class="row">
<div class="col-sm-7">
<h5><?php _e('Custom CSS','motogdpr');?></h5>
</div>
<div class="col-sm-5">
<textarea name="gdprcustomstyle" style="width:100%"><?php echo get_option($pref.'cookie-style'); ?></textarea>
</div>
</div>

<input type="submit" name="savegdprcookie" class="btn btn-warning" value="<?php _e('SAVE SETTINGS','motogdpr') ?>">
</div>
</div>
</div>



    </div> 
	
	
	<div class="row">
	<div class="col-sm-12">
	
<div class="panel panel-primary">
<div class="panel-heading"><h4 class="m0"><?php _e('Cookie Log','motogdpr')?></h4></div>
<div class="panel-body">
<table class="table table-striped table-hover gdprrqtable">
	<thead>
		<tr>
		<th>#</th>
		<th><?php _e('IP','motogdpr')?></th>
		<th><?php _e('Status','motogdpr')?></th>
		<th><?php _e('Time','motogdpr')?></th>
		<th><?php _e('Options','motogdpr')?></th>
	    </tr>
	</thead>
	<tbody>
	<?php showRequestToCookieConsent(); ?>
	</tbody>
	
 </table> 
</div>
   </form>
	</div>
	</div>
	</div>
	
	
	
	
	
	
	
	
   </div>
   
   </form>
   <style>select.selectcontrol{width:100%}
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
.h376{height:458px;}
iframe{
    width: 100%;
    height: 157px !important;
    display: block;
}
   </style>
</body>
</html>

<?php gdprteknikforce_display_logo(); ?>