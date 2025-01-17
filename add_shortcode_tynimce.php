<?php

if(!class_exists('cc_Insert_Html_TinyMCESelector')):

class cc_Insert_Html_TinyMCESelector{
	var $buttonName = 'cc_ihs_snippet_selecter';
	function addSelector(){
		// Don't bother doing this stuff if the current user lacks permissions
		if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') )
			return;
	 
	   // Add only in Rich Editor mode
	    if ( get_user_option('rich_editing') == 'true') {
	      add_filter('mce_external_plugins', array($this, 'registerTmcePlugin'));
	      //you can use the filters mce_buttons_2, mce_buttons_3 and mce_buttons_4 
	      //to add your button to other toolbars of your tinymce
	      add_filter('mce_buttons', array($this, 'registerButton'));
	    }
	}
	
	function registerButton($buttons){
		array_push($buttons, "separator", $this->buttonName);
		return $buttons;
	}
	
	function registerTmcePlugin($plugin_array){
		
		
		//$cc_em_confLink = get_site_url()."/index.php?wp_nlm=confirmation&eId=".$cc_em_emailLastId."&lId=".$listId."&both=".$combineValue."&appurl=".$cc_em_appendUrl;
		
		$plugin_array[$this->buttonName] =get_site_url() . '/index.php?wp_ihs=editor_plugin_js';
		
		//$plugin_array[$this->buttonName] = plugins_url() . '/insert-html-snippet/editor_plugin.js.php';
		
		if ( get_user_option('rich_editing') == 'true') 
		 	//var_dump($plugin_array);
		return $plugin_array;
	}
}

endif;

if(!isset($shortcodesXYZEH)){
	$shortcodesXYZEH = new cc_Insert_Html_TinyMCESelector();
	add_action('admin_head', array($shortcodesXYZEH, 'addSelector'));
}

