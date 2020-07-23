<?php
define ( 'tlos-theme-version', '1.1.1' );

/*ENQUEUE STYLES*/
add_action('wp_enqueue_scripts',function(){
  wp_enqueue_style('sp-child-css', get_stylesheet_directory_uri().'/assets/css/tlos.css', array('sp-core-style'), '1.0' );
},99);

?>
