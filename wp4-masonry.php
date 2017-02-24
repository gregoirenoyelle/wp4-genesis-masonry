<?php
/*
Plugin Name: Masonry pour les Archives
Plugin URI: http://wwww.gregoirenoyelle.com
Description: Appliquer Masonry aux archives d'articles
Version: 1.0
Author: Grégoire Noyelle
Author URI: http://wwww.gregoirenoyelle.com
License: GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Domain Path: /languages
Text Domain: wp-plugin-name
*/


//* If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
    die;
}

// Regarde si un thème Genesis est activé
// Hook pour lancer les actions une fois que le thème est chargé
add_action( 'after_setup_theme', 'gn_function_theme', 15 );
function gn_function_theme() {
	//* Vérifier que Genesis est actif
	if( ! function_exists( 'genesis_get_option' ) ) {
		add_action('admin_notices','gn_warning_admin_missing_acf');
		function gn_warning_admin_missing_acf() {
		   $output = '<div id="my-custom-warning" class="error fade">';
		   $output .= '<p><strong>Attention</strong>, l\'extension Genesis Masonry ne fonctionne qu\'avec un thème Genesis.</p>';
		   $output .= '</div>';
		   echo $output;
	 	}		
	} else {

		/**************************
		* LIENS FICHIER PHP
		**************************/

		//* Appel autres fichiers PHP
		// Fichier de functions pour WordPress
		include_once(plugin_dir_path( __FILE__ ) . '/lib/func.wordpress.php');
		// Fichier de functions pour Genesis
		// include_once(plugin_dir_path( __FILE__ ) . '/lib/func.genesis.php');
		// Fichier de functions pour intégrer des CSS et JS
		include_once(plugin_dir_path( __FILE__ ) . '/lib/func.enqueue.php');

	}
		


} // add_action( 'after_setup_theme', 'gn_function_theme', 15 );




