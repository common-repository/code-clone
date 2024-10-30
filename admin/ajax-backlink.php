<?php
add_action('wp_ajax_ajax_backlink', 'cc_ihs_ajax_backlink');
function cc_ihs_ajax_backlink() {

	global $wpdb;
	
	if($_POST){
		update_option('cc_credit_link','ihs');
		
	}
}


?>
