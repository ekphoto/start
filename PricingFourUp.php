<?php /*
Template Name: Pricing Four Up
*/

add_action( 'genesis_meta', 'kpm_price_genesis_meta' );

function kpm_price_genesis_meta() {
	if ( is_active_sidebar( 'price_header' ) || is_active_sidebar( 'price_one' ) || is_active_sidebar( 'price_two' ) || is_active_sidebar( 'price_three' )  || is_active_sidebar( 'price_four' ) || is_active_sidebar( 'price_footer' ) ) {
		remove_action( 'genesis_loop', 'genesis_do_loop' );
		add_action( 'genesis_loop', 'kpm_home_price_helper' );
		add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );
		add_filter( 'genesis_site_layout', '__genesis_return_full_width_content' );
	}
}
/* Display widget content for homepage sections. */
function kpm_home_price_helper() {
	if (is_active_sidebar( 'price_header' ) || is_active_sidebar( 'price_one' ) || is_active_sidebar( 'price_two' ) || is_active_sidebar( 'price_three' ) || is_active_sidebar( 'price_four' ) || is_active_sidebar( 'price_footer' ) ) {
		
		echo '<div class="featured-price">';
		
		echo '<div class="price_header">';
		dynamic_sidebar( 'price_header' );
		echo '</div><!-- end .price_header -->';
	
		echo '<div class="price_one">';
		dynamic_sidebar( 'price_one' );
		echo '</div><!-- end .price_one -->';
		
		echo '<div class="price_two">';
		dynamic_sidebar( 'price_two' );
		echo '</div><!-- end .price_two -->';

		echo '<div class="price_three">';
		dynamic_sidebar( 'price_three' );
		echo '</div><!-- end .price_three -->';
		
		echo '<div class="price_four">';
		dynamic_sidebar( 'price_four' );
		echo '</div><!-- end .price_four -->';
		
		echo '<div class="price_footer">';
		dynamic_sidebar( 'price_footer' );
		echo '</div><!-- end .price_footer -->';
		
		echo '</div><!-- end .featured-price -->';	
	}
}
genesis();