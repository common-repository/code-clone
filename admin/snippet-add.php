<?php 

global $wpdb;

$_POST = stripslashes_deep($_POST);
$_POST = cc_trim_deep($_POST);

if(isset($_POST) && isset($_POST['addSubmit'])){

// 		echo '<pre>';
// 		print_r($_POST);
// 		die("JJJ");

	$cc_ihs_title = str_replace(' ', '-', $_POST['snippetTitle']);
	$cc_ihs_content = $_POST['snippetContent'];

	if($cc_ihs_title != "" && $cc_ihs_content != ""){
		if(ctype_alnum($cc_ihs_title))
		{
		
		$snippet_count = $wpdb->query( 'SELECT * FROM '.$wpdb->prefix.'cc_ihs_short_code WHERE title="'.$cc_ihs_title.'"' ) ;
		if($snippet_count == 0){
			$cc_shortCode = '[xyz-ihs snippet="'.$cc_ihs_title.'"]';
			$wpdb->insert($wpdb->prefix.'cc_ihs_short_code', array('title' =>$cc_ihs_title,'content'=>$cc_ihs_content,'short_code'=>$cc_shortCode,'status'=>'1'),array('%s','%s','%s','%d'));
			
			header("Location:".admin_url('admin.php?page=insert-html-snippet-manage&cc_ihs_msg=1'));
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

?>
<p style="margin-top:-40px;">
<br/>
*Here you can add the Tracking Name, which is a way of uniquely identifying
each piece of code you want to clone.
<br/>
*In the HTML code section, you can add whatever HTML code, text, or short
codes you want to clone across the site. You can also easily add an
accordion style FAQ easily by using the following code:
<br/>

<b>**How to insert accordion style FAQ</b>
<br/>
Sample FAQ Accordion with 2 FAQS with the title background color black and title text color white:
<br/>
<code> [faq-accordion color="black"  titlecolor="white"]<br/>&lt;faq>&lt;title&gt; First faq title&lt;/title&gt; &lt;content>First faq description&lt;/content&gt; &lt;/faq&gt; <br/> &lt;faq>&lt;title&gt; Second faq title&lt;/title&gt; &lt;content>Second faq description&lt;/content&gt; &lt;/faq&gt;<br/> [/faq-accordion] </code>
<br/>

</p>
<div >
	<fieldset
		style="width: 99%; border: 1px solid #F7F7F7; padding: 10px 0px;">
		<legend>
			<b>Add HTML Code</b>
		</legend>
		<form name="frmmainForm" id="frmmainForm" method="post">
			
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
							value="<?php if(isset($_POST['snippetTitle'])){ echo esc_attr($_POST['snippetTitle']);}?>"></td>
					</tr>
					<tr>
						<td style="border-bottom: none;width:20%; ">&nbsp;&nbsp;&nbsp;HTML code &nbsp;<font color="red">*</font></td>
						<td style="border-bottom: none;width:1px;">&nbsp;:&nbsp;</td>
						<td >
							<textarea name="snippetContent" style="width:80%;height:150px;"><?php if(isset($_POST['snippetContent'])){ echo esc_textarea($_POST['snippetContent']);}?></textarea>
						</td>
					</tr>				

				<tr>
				<td></td><td></td>
					<td><input class="button-primary" style="cursor: pointer;"
							type="submit" name="addSubmit" value="Create"></td>
				</tr>
				<tr><td><br/></td></tr>
				</table>
			</div>

		</form>
	</fieldset>

</div>
