<?php
return;
?>

<div style="clear: both;"></div>

   
<p></p>

<div style="width: 100%">
		
    <div class="cc_feedback">

   
   <a target="_blank" href="http://xyzscripts.com/support/" class="cc_suggest">Suggestions</a> - 
   <a target="_blank" href="http://facebook.com/xyzscripts" class="cc_fbook">Like us on facebook</a> -   
   <a target="_blank" href="http://twitter.com/xyzscripts" class="cc_twitt">Follow us on twitter</a> -   
   <a target="_blank" href="https://plus.google.com/101215320403235276710/" class="cc_gplus">+1 us on Google+</a>
      
   
    </div>
    
   <p></p>
    
<div class="cc_subscribe">

<script language="javascript">
function check_email(emailString)
{
    var mailPattern = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
    var matchArray = emailString.match(mailPattern);
    if (emailString.length == 0)
    return false;
       
    if (matchArray == null)    {
    return false;
    }else{
    return true;
    }
}

   
function verify_lists(form)
{
   
    var total=0;
    var checkBox=form['chk[]'];
   
    if(checkBox.length){
   
    for(var i=0;i<checkBox.length;i++){
    checkBox[i].checked?total++:null;
    }
    }else{
       
    checkBox.checked?total++:null;
       
    }
    if(total>0){
    return true;
    }else{
    return false;
    }

}
   
function verify_fields()
{

    if(check_email(document.email_subscription.email.value) == false){
    alert("Please check whether the email is correct.");
    document.email_subscription.email.select();
    return false;
    }else if(verify_lists(document.email_subscription)==false){
    alert("Select atleast one list.");
    }
    else{
    document.email_subscription.submit();
    }

}
</script>
<?php global $current_user; get_currentuserinfo(); ?>
<form action="http://xyzscripts.com/newsletter/index.php?page=list/subscribe" method="post" name="email_subscription" id="email_subscription" >
<input type="hidden" name="fieldNameIds" value="1,">
<input type="hidden" name="redirActive" value="http://xyzscripts.com/subscription/pending/XYZWPIHSFRE">
<input type="hidden" name="redirPending" value="http://xyzscripts.com/subscription/active/XYZWPIHSFRE">
<input type="hidden" name="mode" value="1">
   
<b>Stay tuned to our updates :</b>  
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

Name  : 
<input style="border: 1px solid #3fafe3; margin-right:10px;" type="text" name="field1" value="<?php  
if ($current_user->user_firstname != "" || $current_user->user_lastname != "") 
{
	echo $current_user->user_firstname . " " . $current_user->user_lastname; 
} 
else if (strcasecmp($current_user->display_name, 'admin')!=0 && strcasecmp($current_user->display_name , "administrator")!=0 ) 
{
	echo $current_user->display_name;
} 
else if (strcasecmp($current_user->user_login ,"admin")!=0 && strcasecmp($current_user->user_login , "administrator")!=0 ) 
{
	echo $current_user->user_login;	
}
?>"  >

Email Address : 
<input style="border: 1px solid #3fafe3;" name="email"
type="text" value="<?php 	echo $current_user->user_email; ?>" /><span style="color:#FF0000">*</span>            

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input id="submit_ihs" style="color:#FFFFFF;border-radius:4px;border:1px solid #1A87B9;" type="submit" value="Subscribe" name="Submit"  onclick="javascript: if(!verify_fields()) return false; " />

<input type="hidden" name="listName" value="6,1,"/>
</form>
				


</div>   


    <div style="clear: both;"></div>
  <div style="width: 100%">

<div class="cc_our_plugins">
See Also : 
	
	<a target="_blank"	href="http://wordpress.org/extend/plugins/lightbox-pop/">Lightbox Pop</a> ★
	<a target="_blank"	href="http://wordpress.org/extend/plugins/full-screen-popup/">Full Screen Popup</a> ★
	<a target="_blank"	href="http://wordpress.org/extend/plugins/popup-dialog-box/">Popup Dialog Box</a> ★
	<a target="_blank"	href="http://wordpress.org/extend/plugins/quick-bar/">Quick Bar</a> ★
	<a target="_blank"	href="http://wordpress.org/extend/plugins/quick-box-popup/">Quick Box Popup</a> ★
	<a target="_blank"	href="http://wordpress.org/extend/plugins/contact-form-manager/">Contact Form Manager</a> ★
	<a target="_blank"	href="http://wordpress.org/extend/plugins/newsletter-manager/">Newsletter Manager</a> ★
	<a target="_blank"	href="http://wordpress.org/extend/plugins/social-media-auto-publish/">Social Media Auto Publish</a>

</div>
 </div>   
<div class="poweredBy">
Powered by <a href="http://xyzscripts.com" target="_blank">XYZScripts</a>
</div> 
    <div style="clear: both;"></div>

</div>
    <p style="clear: both;"></p>
