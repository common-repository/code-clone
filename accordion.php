<?php

//add accordion support

add_action('wp_enqueue_scripts', 'accs_enqueue_necess');

function accs_enqueue_necess() {
    if (is_admin())
        return;

    wp_register_style('wpba-jquery-ui-style', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.21/themes/south-street/jquery-ui.css', false, null);
    wp_enqueue_style('wpba-jquery-ui-style');
    wp_register_script('wpba-custom-js', plugins_url('js/accordion.js', __FILE__), array('jquery-ui-accordion'), '', true);
    wp_enqueue_script('wpba-custom-js');
}

function accordion_sc($atts, $cont) {
	
	//var_dump($atts);

    preg_match_all('/<faq>(.*?)<\/faq>/ms', $cont, $matches);
    //var_dump($matches);
    $faqs = array();

    foreach ($matches[1] as $k => $v) {
        $title = preg_match('/<title>(.*?)<\/title>/ms', $v, $match);
        //var_dump($match);
        $des = preg_match('/<content>(.*?)<\/content>/ms', $v, $match1);
        //var_dump($match1);
        $faqs[] = array($match[1], $match1[1]);
    }

    //var_dump($faqs);
//render content for faqs
//var_dump($cont);
//return $cont;
// Registering the scripts and style
// Getting FAQs from WordPress FAQ Manager plugin's custom post type questions
// Generating Output 
    $div = 'accordion-' . rand();
    $faq .= "<div id=\"$div\">"; //Open the container

    foreach ($faqs as $single) {
        $faq .= '<h3><a href="">' . $single[0] . '</a></h3>';
        $faq .= '<div>' . $single[1] . '</div>';
    }

    $faq .= "</div> <script type=\"text/javascript\"> jQuery(document).ready(function(){ jQuery('#$div').accordion(); jQuery('.ui-accordion-header-icon').removeClass('ui-icon') })  </script> "; //Close the container
    
    //
    if(is_array($atts)):
    if(array_key_exists('color', $atts)){
		
		$faq .= "<style type=\"text/css\"> .ui-accordion-header{
   background: {$atts['color']};
}</style>";	
		}
	if(array_key_exists('titlecolor', $atts)){
				$faq .= "<style type=\"text/css\"> .ui-state-active a, .ui-state-active a:link{
   color : {$atts['titlecolor']} !important;
}</style>";	
		
		}
	endif;
    return $faq; //Return the HTML.
}

add_shortcode('faq-accordion', 'accordion_sc');
