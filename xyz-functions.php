<?php

if(!function_exists('cc_ihs_plugin_get_version'))
{
	function cc_ihs_plugin_get_version() 
	{
		if ( ! function_exists( 'get_plugins' ) )
			require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		$plugin_folder = get_plugins( '/' . plugin_basename( dirname( CC_INSERT_HTML_PLUGIN_FILE ) ) );
		// 		print_r($plugin_folder);
		return $plugin_folder['insert-html-snippet.php']['Version'];
	}
}

if(!function_exists('cc_trim_deep'))
{

	function cc_trim_deep($value) {
		if ( is_array($value) ) {
			$value = array_map('cc_trim_deep', $value);
		} elseif ( is_object($value) ) {
			$vars = get_object_vars( $value );
			foreach ($vars as $key=>$data) {
				$value->{$key} = cc_trim_deep( $data );
			}
		} else {
			$value = trim($value);
		}

		return $value;
	}

}


if(!function_exists('cc_ihs_links')){
function cc_ihs_links($links, $file) {
	$base = plugin_basename(cc_INSERT_HTML_PLUGIN_FILE);
	if ($file == $base) {

		$links[] = '<a href="http://xyzscripts.com/support/" class="cc_support" title="Support"></a>';
		$links[] = '<a href="http://twitter.com/xyzscripts" class="cc_twitt" title="Follow us on twitter"></a>';
		$links[] = '<a href="https://www.facebook.com/xyzscripts" class="cc_fbook" title="Facebook"></a>';
		$links[] = '<a href="https://plus.google.com/101215320403235276710/" class="cc_gplus" title="+1"></a>';
	}
	return $links;
}
}
//add_filter( 'plugin_row_meta','cc_ihs_links',10,2);

?>
