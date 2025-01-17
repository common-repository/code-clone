<?php 

global $wpdb;
global $current_user;
get_currentuserinfo();

$cc_ihs_snippetId = $_GET['snippetId'];

if(isset($_POST) && isset($_POST['updateSubmit'])){

// 		echo '<pre>';
// 		print_r($_POST);
// 		die("JJJ");
	$_POST = stripslashes_deep($_POST);
	$_POST = cc_trim_deep($_POST);
	
	$cc_ihs_snippetId = $_GET['snippetId'];
	$cc_ihs_title = str_replace(' ', '-', $_POST['snippetTitle']);
	$cc_ihs_content = $_POST['snippetContent'];

	if($cc_ihs_title != "" && $cc_ihs_content != ""){
		
		if(ctype_alnum($cc_ihs_title))
		{
		$snippet_count = $wpdb->query( 'SELECT * FROM '.$wpdb->prefix.'cc_ihs_short_code WHERE id!="'.$cc_ihs_snippetId.'" AND title="'.$cc_ihs_title.'" LIMIT 0,1' ) ;
		
		if($snippet_count == 0){
			$cc_shortCode = '[xyz-ihs snippet="'.$cc_ihs_title.'"]';
			
			$wpdb->update($wpdb->prefix.'cc_ihs_short_code', array('title'=>$cc_ihs_title,'content'=>$cc_ihs_content,'short_code'=>$cc_shortCode,), array('id'=>$cc_ihs_snippetId));
			
			header("Location:".admin_url('admin.php?page=insert-html-snippet-manage&msg=5'));
	
		}else{
			?>
			<div class="system_notice_area_style0" id="system_notice_area">
			HTML Snippet already exists. &nbsp;&nbsp;&nbsp;<span id="system_notice_area_dismiss">Dismiss</span>
			</div>
			<?php	
	
		}
		}
		else
		{
			?>
		<div class="system_notice_area_style0" id="system_notice_area">
		HTML Snippet title must be alphanumeric. &nbsp;&nbsp;&nbsp;<span id="system_notice_area_dismiss">Dismiss</span>
		</div>
		<?php
		
		}
		
	
	}else{
?>		
		<div class="system_notice_area_style0" id="system_notice_area">
			Fill all mandatory fields. &nbsp;&nbsp;&nbsp;<span id="system_notice_area_dismiss">Dismiss</span>
		</div>
<?php 
	}

}


global $wpdb;


$snippetDetails = $wpdb->get_results( 'SELECT * FROM '.$wpdb->prefix.'cc_ihs_short_code WHERE id="'.$cc_ihs_snippetId.'" LIMIT 0,1' ) ;
$snippetDetails = $snippetDetails[0];

?>

<div >
	<fieldset
		style="width: 99%; border: 1px solid #F7F7F7; padding: 10px 0px;">
		<legend>
			<b>Edit HTML Code</b>
		</legend>
		<form name="frmmainForm" id="frmmainForm" method="post">
			<input type="hidden" id="snippetId" name="snippetId"
				value="<?php if(isset($_POST['snippetId'])){ echo esc_attr($_POST['snippetId']);}else{ echo esc_attr($snippetDetails->id); }?>">
			<div>
				<table
					style="width: 99%; background-color: #F9F9F9; border: 1px solid #E4E4E4; border-width: 1px;margin: 0 auto">
					<tr><td><br/>
					<div id="shortCode"></div>
					<br/></td></tr>
					<tr valign="top">
						<td style="border-bottom: none;width:20%;">&nbsp;&nbsp;&nbsp;Tracking Name&nbsp;<font color="red">*</font></td>
						<td style="border-bottom: none;width:1px;">&nbsp;:&nbsp;</td>
						<td><input style="width:80%;"
							type="text" name="snippetTitle" id="snippetTitle"
							value="<?php if(isset($_POST['snippetTitle'])){ echo esc_attr($_POST['snippetTitle']);}else{ echo esc_attr($snippetDetails->title); }?>"></td>
					</tr>
					<tr>
						<td style="border-bottom: none;width:20%; ">&nbsp;&nbsp;&nbsp;HTML code &nbsp;<font color="red">*</font></td>
						<td style="border-bottom: none;width:1px;">&nbsp;:&nbsp;</td>
						<td >
							<textarea name="snippetContent" style="width:80%;height:150px;"><?php if(isset($_POST['snippetContent'])){ echo esc_textarea($_POST['snippetContent']);}else{ echo esc_textarea($snippetDetails->content); }?></textarea>
						</td>
					</tr>				

				<tr>
				<td></td><td></td>
					<td><input class="button-primary" style="cursor: pointer;"
							type="submit" name="updateSubmit" value="Update"></td>
				</tr>
				<tr><td><br/></td></tr>
				</table>
			</div>

		</form>
	</fieldset>

</div>
