<?php
define ( 'tlos-theme-version', '1.2.0' );

/*ENQUEUE STYLES*/
add_action('wp_enqueue_scripts',function(){
  wp_enqueue_style('sp-child-css', get_stylesheet_directory_uri().'/assets/css/tlos.css', array('sp-core-style'), '1.0' );
},99);

//OVERRIDE EMBEDS
/*
add_shortcode( 'embed', function ( $atts , $content ) {

	// Attributes
	$atts = shortcode_atts(
		array(
			'class' => 'name',
		), $atts, 'embed');

	return "<div class={$atts['class']}>$content</div>";

});*/

?>
