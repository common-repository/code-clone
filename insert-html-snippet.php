<?php 
/*
Plugin Name: Code Clone
Plugin URI: EcommerceUncovered.com
Description: Add HTML code to your pages and posts easily using shortcodes. This plugin lets you create a shortcode corresponding to any random HTML code such as ad codes, javascript, video embedding, etc. and use the same in your posts, pages or widgets. Supports Shortcodes too. You can also add an accordion style faq using format like <code> [faq-accordion]&lt;faq>&lt;title&gt; First faq title&lt;/title&gt; &lt;content>First faq description&lt;/content&gt; &lt;/faq&gt; &lt;faq>&lt;title&gt; Second faq title&lt;/title&gt; &lt;content>Second faq description&lt;/content&gt; &lt;/faq&gt; [/faq-accordion] </code> 
   
Version: 0.9 
Author: EcommerceUncovered.com 
Author URI: EcommerceUncovered.com
Text Domain: Code Clone
License: GPLv2 or later
*/

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

// if ( !function_exists( 'add_action' ) ) {
// 	echo "Hi there!  I'm just a plugin, not much I can do when called directly.";
// 	exit;
// }

ob_start();

// error_reporting(E_ALL);

define('CC_INSERT_HTML_PLUGIN_FILE',__FILE__);

require( dirname( __FILE__ ) . '/xyz-functions.php' );

require( dirname( __FILE__ ) . '/add_shortcode_tynimce.php' );

require( dirname( __FILE__ ) . '/admin/install.php' );

require( dirname( __FILE__ ) . '/admin/menu.php' );

require( dirname( __FILE__ ) . '/shortcode-handler.php' );

require( dirname( __FILE__ ) . '/ajax-handler.php' );

require( dirname( __FILE__ ) . '/admin/uninstall.php' );

require( dirname( __FILE__ ) . '/widget.php' );

require( dirname( __FILE__ ) . '/direct_call.php' );

require( dirname( __FILE__ ) . '/accordion.php' );



if(get_option('cc_credit_link')=="ihs"){

	add_action('wp_footer', 'cc_ihs_credit');

}
function cc_ihs_credit() {	
	$content = '<div style="width:100%;text-align:center; font-size:11px; clear:both"><a target="_blank" title="Code Clone Wordpress Plugin" href="http://EcommerceUncovered.com">HTML Snippets</a> Powered By : <a target="_blank" title="PHP Scripts & Programs" href="http://www.ecommerceuncovered.com" >EcommerceUncovered.com</a></div>';
	$content = '';
	echo $content;
}


?>
