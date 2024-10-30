<?php

global $wpdb;

$_POST = stripslashes_deep($_POST);
$_GET = stripslashes_deep($_GET);

$cc_ihs_snippetId = intval($_GET['snippetId']);
$cc_ihs_snippetStatus = intval($_GET['status']);
$cc_ihs_pageno = intval($_GET['pageno']);
if($cc_ihs_snippetId=="" || !is_numeric($cc_ihs_snippetId)){
	header("Location:".admin_url('admin.php?page=insert-html-snippet-manage'));
	exit();

}

$snippetCount = $wpdb->query( 'SELECT * FROM '.$wpdb->prefix.'cc_ihs_short_code WHERE id="'.$cc_ihs_snippetId.'" LIMIT 0,1' ) ;

if($snippetCount==0){
	header("Location:".admin_url('admin.php?page=insert-html-snippet-manage&cc_ihs_msg=2'));
	exit();
}else{
	
	$wpdb->update($wpdb->prefix.'cc_ihs_short_code', array('status'=>$cc_ihs_snippetStatus), array('id'=>$cc_ihs_snippetId));
	header("Location:".admin_url('admin.php?page=insert-html-snippet-manage&cc_ihs_msg=4&pagenum='.$cc_ihs_pageno));
	exit();
	
}
?>
