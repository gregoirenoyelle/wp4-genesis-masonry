<?php

//* Générateur en ligne pour les script et les css
// https://generatewp.com/register_script/

/**************************
* ENQUEUE POUR LE FRONT
**************************/

//* enqueue style front
add_action('wp_enqueue_scripts','masonry_styles_front', 99);
function masonry_styles_front() {
	wp_register_style('masonry-css', plugins_url( 'css/genesis-mazonry.css', dirname(__FILE__) ), array(), '1.0', 'all' );
	if ( is_archive() ) {
		wp_enqueue_style('masonry-css');
	}
	
}

//* enqueue script front
add_action('wp_enqueue_scripts','masonry_scripts_front');
function masonry_scripts_front() {
	wp_register_script('masonry-js',plugins_url( 'js/masonry.pkgd.min.js', dirname(__FILE__) ), array('jquery'),'1.0',true);
	if ( is_archive() ) {
		wp_enqueue_script('masonry-js');
	}
	
}
