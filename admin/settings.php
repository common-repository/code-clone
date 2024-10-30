<?php

global $wpdb;
// Load the options


if($_POST){
	
$_POST=cc_trim_deep($_POST);
$_POST = stripslashes_deep($_POST);

			
			
			$cc_ihs_limit = abs(intval($_POST['cc_ihs_limit']));
			if($cc_ihs_limit==0)$cc_ihs_limit=20;
			
			$cc_ihs_credit = $_POST['cc_ihs_credit'];
			
			
			update_option('cc_ihs_limit',$cc_ihs_limit);
			update_option('cc_credit_link',$cc_ihs_credit);

?>


<div class="system_notice_area_style1" id="system_notice_area">
	Settings updated successfully. &nbsp;&nbsp;&nbsp;<span id="system_notice_area_dismiss">Dismiss</span>
</div>


<?php
}


?>

<div>

	
	<form method="post">
	<div style="float: left;width: 98%">
	<fieldset style=" width:100%; border:1px solid #F7F7F7; padding:10px 0px 15px 10px;">
	<legend ><h3>Settings</h3></legend>
	<table class="widefat"  style="width:99%;">
		<!--
						<tr valign="top">
				<td scope="row" ><label for="cc_ihs_credit">Credit link to author</label>
				</td>
				<td><select name="cc_ihs_credit" id="cc_ihs_credit">
						<option value="ihs"
						<?php if(isset($_POST['cc_ihs_credit']) && $_POST['cc_ihs_credit']=='ihs') { echo 'selected';}elseif(get_option('cc_credit_link')=="ihs"){echo 'selected';} ?>>Enable</option>
						<option value="0"
						<?php if(isset($_POST['cc_ihs_credit']) && $_POST['cc_ihs_credit']!='ihs') { echo 'selected';}elseif(get_option('cc_credit_link')!="ihs"){echo 'selected';} ?>>Disable</option>

				</select>
				</td>
			</tr>
			-->
			<tr valign="top">
				<td scope="row" class=" settingInput" id=""><label for="cc_ihs_limit">Pagination limit</label></td>
				<td id=""><input  name="cc_ihs_limit" type="text"
					id="cc_ihs_limit" value="<?php if(isset($_POST['cc_ihs_limit']) ){echo abs(intval($_POST['cc_ihs_limit']));}else{print(get_option('cc_ihs_limit'));} ?>" />
				</td>
			</tr>
			
			<tr valign="top">
				<td scope="row" class=" settingInput" id="bottomBorderNone">
				</td>
				<td id="bottomBorderNone"><input style="margin:10px 0 20px 0;" id="submit" class="button-primary bottonWidth" type="submit" value=" Update Settings " />
				</td>
			</tr>
			
	</table>
	</fieldset>
	
	</div>

	</form>
