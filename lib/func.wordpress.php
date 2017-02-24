<?php

add_action('genesis_meta', 'gn_attribute_archive');
function gn_attribute_archive() {

	if ( ! is_archive() ) {
		return;
	}

	// Enlever les titre d'Archive
	//Removes Title and Description on Blog Archive
	remove_action( 'genesis_before_loop', 'genesis_do_posts_page_heading' );
	//Removes Title and Description on Date Archive
	remove_action( 'genesis_before_loop', 'genesis_do_date_archive_title' );
	//Removes Title and Description on Archive, Taxonomy, Category, Tag
	remove_action( 'genesis_before_loop', 'genesis_do_taxonomy_title_description', 15 );
	//Removes Title and Description on Author Archive
	remove_action( 'genesis_before_loop', 'genesis_do_author_title_description', 15 );
	
	// Forcer la plein largeur
	add_filter( 'genesis_site_layout', '__genesis_return_full_width_content' );	

	//* Enlever le fil d'Ariane
	remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );

	// Balise responsive pour masonry
	add_action( 'genesis_loop', 'gn_masony_responsive', 9);
	function gn_masony_responsive() {
		  echo '<div class="grid-sizer"></div>';
  		  echo '<div class="gutter-sizer"></div>';
	}

	// Attribute pour masonry
	add_filter( 'genesis_attr_content', 'gn_add_masonry_att' );
	/**
	 * Callback for dynamic Genesis 'genesis_attr_$context' filter.
	 * 
	 * Add custom attributes for the custom filter.
	 * 
	 * @param array $attributes The element attributes
	 * @return array $attributes The element attributes
	 */
	function gn_add_masonry_att( $attributes ) {
	        
	    // add itemscope
	    $attributes['data-masonry'] = '{ "itemSelector": ".entry", "columnWidth": 350 }';	    

	    // return the attributes
	    return $attributes;
	        
	}	
}




// ajoute le script sur l'accueil
add_action( 'wp_footer', 'wp4masonry_appel_script', 9000 );
function wp4masonry_appel_script() {
	// Si ce n'est pas l'accueil, le script s'arrête
	if ( ! is_home() ) {
		return;
	}
?>	
  <script type="text/javascript">
    jQuery(document).ready(function(){
		jQuery('.content').masonry({
		  // options
		  itemSelector: '.entry',
		  columnWidth: 350
		  isFitWidth: true
		});
    });
  </script>


<?php } // FIN function wp4masonry_appel_script()


