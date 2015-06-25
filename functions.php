<?php
/*
Author: Eddie Machado
URL: htp://themble.com/bones/

This is where you can drop your custom functions or
just edit things like thumbnail sizes, header images,
sidebars, comments, ect.
*/

/************* INCLUDE NEEDED FILES ***************/

/*
1. library/bones.php
	- head cleanup (remove rsd, uri links, junk css, ect)
	- enqueueing scripts & styles
	- theme support functions
	- custom menu output & fallbacks
	- related post function
	- page-navi function
	- removing <p> from around images
	- customizing the post excerpt
	- custom google+ integration
	- adding custom fields to user profiles
*/
require_once('library/bones.php'); // if you remove this, bones will break
/*
2. library/custom-post-type.php
	- an example custom post type
	- example custom taxonomy (like categories)
	- example custom taxonomy (like tags)
*/
#require_once('library/custom-post-type.php'); // you can disable this if you like
/*
3. library/admin.php
	- removing some default WordPress dashboard widgets
	- an example custom dashboard widget
	- adding custom login css
	- changing text in footer of admin
*/
// require_once('library/admin.php'); // this comes turned off by default


/************* THUMBNAIL SIZE OPTIONS *************/

// Thumbnail sizes
add_image_size( 'bones-thumb-600', 700, 460, true );
add_image_size( 'bones-thumb-300', 300, 225, true );


/************* ACTIVE SIDEBARS ********************/

// Sidebars & Widgetizes Areas
function bones_register_sidebars() {
	
	register_sidebar(array(
		'name' => __('Interior Page - Side Widget Area', 'bonestheme'),
		'id' => 'interior-side-widget-area',
		'description' => __('The primary widget area', 'bonestheme'),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));
	register_sidebar(array(
		'name' => __('Blog Page - Side Widget Area', 'bonestheme'),
		'id' => 'blog-side-widget-area',
		'description' => __('The primary widget area', 'bonestheme'),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));
	register_sidebar(array(
		'name' => __('Global Side Widget Area', 'bonestheme'),
		'id' => 'global-side-widget-area',
		'description' => __('The primary widget area', 'bonestheme'),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));

	// Area 3, located in the footer. Empty by default.
	register_sidebar(array(
		'name' => __('First Footer Widget Area', 'bonestheme'),
		'id' => 'first-footer-widget-area',
		'description' => __('The first footer widget area', 'bonestheme'),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));

	// Area 4, located in the footer. Empty by default.
	register_sidebar(array(
		'name' => __('Second Footer Widget Area', 'bonestheme'),
		'id' => 'second-footer-widget-area',
		'description' => __('The second footer widget area', 'bonestheme'),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));

	// Area 5, located in the footer. Empty by default.
	register_sidebar(array(
		'name' => __('Third Footer Widget Area', 'bonestheme'),
		'id' => 'third-footer-widget-area',
		'description' => __('The third footer widget area', 'bonestheme'),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));
} // don't remove this bracket!

/************* COMMENT LAYOUT *********************/

// Comment Layout
function bones_comments($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?>>
		<article id="comment-<?php comment_ID(); ?>" class="clearfix">
			<header class="comment-author vcard">
				<?php
				/*
					this is the new responsive optimized comment image. It used the new HTML5 data-attribute to display comment gravatars on larger screens only. What this means is that on larger posts, mobile sites don't have a ton of requests for comment images. This makes load time incredibly fast! If you'd like to change it back, just replace it with the regular wordpress gravatar call:
					echo get_avatar($comment,$size='32',$default='<path_to_url>' );
				*/
				?>
				<!-- custom gravatar call -->
				<?php
					// create variable
					$bgauthemail = get_comment_author_email();
				?>
				<img data-gravatar="http://www.gravatar.com/avatar/<?php echo md5($bgauthemail); ?>?s=32" class="load-gravatar avatar avatar-48 photo" height="32" width="32" src="<?php echo get_template_directory_uri(); ?>/library/images/nothing.gif" />
				<!-- end custom gravatar call -->
				<?php printf(__('<cite class="fn">%s</cite>', 'bonestheme'), get_comment_author_link()) ?>
				<time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time(__('F jS, Y', 'bonestheme')); ?> </a></time>
				<?php edit_comment_link(__('(Edit)', 'bonestheme'),'  ','') ?>
			</header>
			<?php if ($comment->comment_approved == '0') : ?>
				<div class="alert alert-info">
					<p><?php _e('Your comment is awaiting moderation.', 'bonestheme') ?></p>
				</div>
			<?php endif; ?>
			<section class="comment_content clearfix">
				<?php comment_text() ?>
			</section>
			<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
		</article>
	<!-- </li> is added by WordPress automatically -->
<?php
} // don't remove this bracket!

/************* SEARCH FORM LAYOUT *****************/

// Search Form
function bones_wpsearch($form) {
	$form = '<form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
	<input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="'.esc_attr__('','bonestheme').'" />
	<input type="submit" id="searchsubmit" value="'. esc_attr__('Search') .'" />
	</form>';
	return $form;
} // don't remove this bracket!

/****** SINGLE POST CATEGORY TEMPLATE **************/

add_filter('single_template', create_function('$t', 'foreach( (array) get_the_category() as $cat ) { if ( file_exists(TEMPLATEPATH . "/single-{$cat->slug}.php") ) return TEMPLATEPATH . "/single-{$cat->slug}.php"; } return $t;' ));

/****** STAFF CUSTOM POST TYPE **************/

include 'functions-promotions.php';

$labels = array(
	'name' => _x( 'Staff', 'post type general name' ),
	'singular_name' => _x( 'Staff Member', 'post type singular name' ),
	'add_new' => __( 'Add New Staff Member' ),
	'add_new_item' => __( 'Add New Staff Member' ),
	'edit_item' => __( 'Edit Staff Member' ),
	'new_item' => __( 'New Staff Member' ),
	'view_item' => __( 'View Staff Member' ),
	'search_items' => __( 'Search Staff' ),
	'not_found' => __( 'No staff found.' ),
	'not_found_in_trash' => __( 'No staff found in Trash.' ),
	'menu_name' => __( 'Staff' ),
);
$args = array(
	'labels' => $labels,
	'description' => '',
	'public' => true,
	'publicly_queryable' => true,
	'exclude_from_search' => true,
	'show_ui' => true,
	'menu_position' => 20,
	'menu_icon' => null,
	'capability_type' => post,
	'hierarchical' => false,
	'supports' => array('title', 'editor', 'author', 'thumbnail','page-attributes' ),
	'taxonomies' => array(),
	'rewrite' => true,
	'query_var' => true,
	'can_export' => true,
	'show_in_nav_menus' => true,
);
register_post_type('Staff', $args);
?>
