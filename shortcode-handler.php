<?php 
global $wpdb;

// $totalDetails = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."cc_ihs_short_code WHERE status='1'" );
// if(count($totalDetails)>0){
// 	foreach ($totalDetails as $total){
		add_shortcode('code-clone','cc_ihs_display_content');		
// 	}
// }

function cc_ihs_display_content($cc_snippet_name){
	global $wpdb;

	if(is_array($cc_snippet_name)){
		$snippet_name = $cc_snippet_name['code'];
		
		$query = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."cc_ihs_short_code WHERE title='$snippet_name'" );
		
		if(count($query)>0){
			
			foreach ($query as $sippetdetails){
// 				return stripslashes($sippetdetails->content);
			if($sippetdetails->status==1)
				return do_shortcode( $sippetdetails->content);
			else 
				return '';
				break;
			}
			
		}else{

			return "<div style='padding:20px; font-size:16px; color:#FA5A6A; width:93%;text-align:center;background:lightyellow;border:1px solid #3FAFE3; margin:20px 0 20px 0'>
			
			Please use a valid short code to call snippet.
			
			
			</div>";
			
		}
		
	}
}


add_filter('widget_text', 'do_shortcode');
