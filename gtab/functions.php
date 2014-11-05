<?php

// The height and width of your custom header. You can hook into the theme's own filters to change these values.
	// Add a filter to twentyten_header_image_width and twentyten_header_image_height to change these values.
	define( 'HEADER_IMAGE_WIDTH', apply_filters( 'twentyten_header_image_width', 940 ) );
	define( 'HEADER_IMAGE_HEIGHT', apply_filters( 'twentyten_header_image_height', 270 ) );
	// The End
	
	// Show Wp-PageNavi when it's active - change twentyeleven_content_nav in index.php to twentyeleven_child_content_nav
function twentyeleven_child_content_nav( $nav_id ) {
	global $wp_query;
	if ( $wp_query->max_num_pages > 1 ) : ?>
				<?php /* add wp-pagenavi support for posts */ ?>
		<?php if(function_exists('wp_pagenavi') ) : ?>
			<?php wp_pagenavi(); ?>
			<br />
				<?php else: ?>
		<nav id="<?php echo $nav_id; ?>">
				<h3 class="assistive-text"><?php _e( 'Post navigation', 'twentyeleven' ); ?></h3>
				<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav-character">&larr;</span> <span class="meta-nav">Previous</span>', 'twentyeleven' ) ); ?></div>
				<div class="nav-next"><?php previous_posts_link( __( '<span class="meta-nav">Next</span> <span class="meta-nav-character">&rarr;</span>', 'twentyeleven' ) ); ?></div>
		</nav>
	<?php endif; ?>
	<?php endif;
}

// Add Post Formats
add_action( 'after_setup_theme', 'childtheme_post_formats', 11 );
function childtheme_post_formats(){
add_theme_support('post-formats',array('aside','chat','gallery','image','link','quote','status','audio','video'));
}

add_filter('body_class', 'blacklist_body_class', 20, 2);
function blacklist_body_class($wp_classes, $extra_classes) {
if( is_single() || is_page() ) :
// List of the classes to remove from the WP generated classes
$blacklist = array('singular');
// Filter the body classes
  foreach( $blacklist as $val ) {
    if (!in_array($val, $wp_classes)) : continue;
    else:
      foreach($wp_classes as $key => $value) {
      if ($value == $val) unset($wp_classes[$key]);
      }
    endif;
  }
endif;   // Add the extra classes back untouched
return array_merge($wp_classes, (array) $extra_classes);
}

?>