<?php
/* Add widget support for homepage. If no widgets active, display the default loop. */
add_action( 'genesis_meta', 'kpm_home_genesis_meta' );

function kpm_home_genesis_meta() {
	if ( is_active_sidebar( 'slider' ) || is_active_sidebar( 'welcome' ) || is_active_sidebar( 'featured-bottom-left' ) || is_active_sidebar( 'featured-bottom-middle' ) || is_active_sidebar( 'featured-bottom-right' )  || is_active_sidebar( 'mobile_menu' ) ) {
		remove_action( 'genesis_loop', 'genesis_do_loop' );
		add_action( 'genesis_loop', 'kpm_home_loop_helper' );
		add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );
		add_filter( 'genesis_site_layout', '__genesis_return_full_width_content' );
	}
}
/* Display widget content for homepage sections. */
function kpm_home_loop_helper() {
	if ( is_active_sidebar( 'slider' ) ) {
		echo '<div class="featured-top">';
		echo '<div class="slider">';
		dynamic_sidebar( 'slider' );
		echo '</div><!-- end .slider -->';
		echo '</div><!-- end .featured-top -->';	
	}
	if ( is_active_sidebar( 'welcome' ) ) {
		echo '<div class="welcome">';
		genesis_structural_wrap( 'welcome' );
		dynamic_sidebar( 'welcome' );
		genesis_structural_wrap( 'welcome', 'close' );
		echo '</div><!-- end .welcome -->';
	}
	if ( is_active_sidebar( 'featured-bottom-left' ) || is_active_sidebar( 'featured-bottom-middle' ) || is_active_sidebar( 'featured-bottom-right' ) ) {
		echo '<div class="featured-bottom">';
		
		echo '<div class="featured-bottom-left">';
		dynamic_sidebar( 'featured-bottom-left' );
		echo '</div><!-- end .featured-bottom-left -->';
		
		echo '<div class="featured-bottom-middle">';
		dynamic_sidebar( 'featured-bottom-middle' );
		echo '</div><!-- end .featured-bottom-middle -->';

		echo '<div class="featured-bottom-right">';
		dynamic_sidebar( 'featured-bottom-right' );
		echo '</div><!-- end .featured-bottom-right -->';
		
		echo '</div><!-- end .featured-bottom -->';	
	}
}
genesis();