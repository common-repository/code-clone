<?php

if ( is_admin() ){

	add_action('admin_menu', 'cc_ihs_menu');
}

function cc_ihs_menu(){
	
	add_menu_page('insert-html-snippet', 'Code Clone', 'manage_options', 'insert-html-snippet-manage','cc_ihs_snippets',plugins_url('code-clone/images/logo.png'));

	add_submenu_page('insert-html-snippet-manage', 'HTML Codes', 'HTML Codes', 'manage_options', 'insert-html-snippet-manage','cc_ihs_snippets');
	add_submenu_page('insert-html-snippet-manage', 'HTML Codes - Manage settings', 'Settings', 'manage_options', 'insert-html-snippet-settings' ,'cc_ihs_settings');	
	//add_submenu_page('insert-html-snippet-manage', 'HTML Snippets - About', 'About', 'manage_options', 'insert-html-snippet-about' ,'cc_ihs_about');
	
}

function cc_ihs_snippets(){
	$formflag = 0;
	if(isset($_GET['action']) && $_GET['action']=='snippet-delete' )
	{
		include(dirname( __FILE__ ) . '/snippet-delete.php');
		$formflag=1;
	}
	if(isset($_GET['action']) && $_GET['action']=='snippet-edit' )
	{
		require( dirname( __FILE__ ) . '/header.php' );
		include(dirname( __FILE__ ) . '/snippet-edit.php');
		require( dirname( __FILE__ ) . '/footer.php' );
		$formflag=1;
	}
	if(isset($_GET['action']) && $_GET['action']=='snippet-add' )
	{
		require( dirname( __FILE__ ) . '/header.php' );
		require( dirname( __FILE__ ) . '/snippet-add.php' );
		require( dirname( __FILE__ ) . '/footer.php' );
		$formflag=1;
	}
	if(isset($_GET['action']) && $_GET['action']=='snippet-status' )
	{
		require( dirname( __FILE__ ) . '/snippet-status.php' );
		$formflag=1;
	}
	if($formflag == 0){
		require( dirname( __FILE__ ) . '/header.php' );
		require( dirname( __FILE__ ) . '/snippets.php' );
		require( dirname( __FILE__ ) . '/footer.php' );
	}
}

function cc_ihs_settings()
{
	require( dirname( __FILE__ ) . '/header.php' );
	require( dirname( __FILE__ ) . '/settings.php' );
	require( dirname( __FILE__ ) . '/footer.php' );
	
}

function cc_ihs_about(){
	require( dirname( __FILE__ ) . '/header.php' );
	require( dirname( __FILE__ ) . '/about.php' );
	require( dirname( __FILE__ ) . '/footer.php' );
}

if(is_admin()){
	
	wp_enqueue_script('jquery');
	
	wp_register_script( 'cc_notice_script', plugins_url('code-clone/js/notice.js') );
	wp_enqueue_script( 'cc_notice_script' );

// 	wp_register_style( 'cc_ihs_style', plugins_url('insert-html-snippet/css/cc_ihs_styles.css'));
// 	wp_enqueue_style( 'cc_ihs_style');
	function cc_ihs_add_style(){
		// Register stylesheets
		wp_register_style('cc_ihs_style', plugins_url('code-clone/css/cc_ihs_styles.css'));
		wp_enqueue_style('cc_ihs_style');
	}
	add_action('init', 'cc_ihs_add_style');

}


?>
