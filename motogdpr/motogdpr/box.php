<?php $gdprpref='Moto-GDPR-Compliance-'; ?>
<?php
if(isset($_POST['dontacceptgdprcookie']))
{
	
	
	
	global $wpdb;
	 $table=$wpdb->prefix."gdpr_request_records";
	 $in=$wpdb->query($wpdb->prepare("insert into ".$table."(id,user,email,login, type,ip,value,updatedvalue,recorded,action, actiontime)values(%d,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s)",array('','','','','cookie',$_SERVER['REMOTE_ADDR'],'0','',date('d-M-Y h:iA'),'','')));
	 echo "<script>window.location='".get_option($gdprpref.'dont-accept-cookie-url')."'</script>";
}
	
	
	


?>
  <script type="text/javascript">
  function gdprDisplayPopup()
	{
		//document.getElementByID("myModalgdrp").style.display = "block";
		alert("ok");
	}
	
	function tekGdprSetCookie(cname, cvalue, exdays)
	{//create js cookie
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }
	
	function gdrpSetCookie()
	{//ajax and js cookie function call
		var set=2;
		
		 var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) 
	{
		set=this.responseText;
		
		
    }
    };
  xhttp.open("POST", "<?php echo plugins_url( 'update.php', __FILE__ ); ?>", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("gdrpset=1");
  
      
	  tekGdprSetCookie('TEKGDRP','created',3650);
	  
    document.getElementById("myModalgdrp").style.display = "none";
	
	}
  </script>
  
  <style>
.wpgdpr-modal-dialogg{<?php echo get_option($gdprpref.'cookie-position'); ?>;margin:<?php echo get_option($gdprpref.'cookie-distance'); ?>;position:fixed;}
</style>
 

<div id="myModalgdrp" class="wpgdpr-modal-dialogg gdprboxcolor" style="padding:10px;border-radius:5px;max-width:60%;min-width:20%;border:1px solid 	#DCDCDC;"><br /><h4 class="gdprtxt">
<?php echo get_option('Moto-GDPR-Compliance-notice') ?></h4>
   <div>
   
		
        <button name="gdprcookieaccept" class="btn btn-primary pull-right" onclick="gdrpSetCookie()" style="float:right;margin-top:5px; margin-right:10px;" id="yes"><?php echo get_option($gdprpref.'cookie-accept-button'); ?></button>
		<form action="" method="post"><button type="submit" name="dontacceptgdprcookie" class="btn btn-default pull-right" style="float:right;margin-top:5px;margin-left:5px;" onclick="WPGdprClearListCookies()" value="">
			<?php _e('Don\'t Accept','motogdpr'); ?>
	
	</button>
		</form>
		
       
   
   </div> 
    </div>





<style>
.gdprboxcolor{background-color:<?php echo get_option($gdprpref.'cookie-bg-color'); ?>;}.gdprtxt{color:<?php echo get_option($gdprpref.'cookie-text-color'); ?>;}
.wpgdpr-modal-dialogg{z-index:10000;}
</style>
<style><?php echo get_option($gdprpref.'cookie-style'); ?></style>