<?
// CUSTOM POST TYPE = PROMOTIONS
if (function_exists('add_image_size')) {
	add_image_size('promo-thumb', 330, 180, true); // fixed size, cropped - CHANGE CROP SIZE HERE
}

function get_promo_image($id, $size = "promo-thumb", $default = "") {
	$img = '<img src="'. get_template_directory_uri() .'/images/'. $default .'" />';
	if ( has_post_thumbnail($id) ) { 
		$img = get_the_post_thumbnail($id, $size);
	}
	
	return $img;
}

add_action("admin_init", "admin_init");
function admin_init() {
	//add_meta_box("promo_subtitle", "Subtitle", "promo_subtitle", "promotion", "normal", "high");
	add_meta_box("promo_excerpt", "Excerpt", "promo_excerpt", "promotion", "normal", "high");
	add_meta_box("learn_more_box", "Learn More Button", "learn_more_box", "promotion", "normal", "high");
	add_meta_box("promo_notes", "Notes", "promo_notes", "promotion", "normal", "high");
}

add_action('save_post', 'save_details');
function save_details() {
	global $post;
	//update_post_meta($post->ID, "promo_subtitle", $_POST["promo_subtitle"]);
	update_post_meta($post->ID, "promo_excerpt", $_POST["promo_excerpt"]);
	update_post_meta($post->ID, "learn_more_label", $_POST["learn_more_label"]);
	update_post_meta($post->ID, "learn_more_url", $_POST["learn_more_url"]);
}

add_action('init', 'promotion_register');
function promotion_register() {
	$labels = array(
		'name' => _x('Promotions', 'post type general name'),
		'singular_name' => _x('Promotion', 'post type singular name'),
		'add_new' => _x('Add New', 'Promotion'),
		'add_new_item' => __('Add New Promotion'),
		'edit_item' => __('Edit Promotion'),
		'new_item' => __('New Promotion'),
		'view_item' => __('View Promotion'),
		'search_items' => __('Search Promotions'),
		'not_found' =>  __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash'),
		'parent_item_colon' => ''
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'menu_icon' => null,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => true,
		'menu_position' => 5,
		'supports' => array('title','thumbnail', 'page-attributes')
	  );

	register_post_type('promotion', $args);
	flush_rewrite_rules();
}

function promo_notes() {
	?><p><label><b>DISPLAY ORDER:</b></label><br>The top 3 promotions (with "Order" value over '0'), will display on the homepage, in Ascending order.<br>For ease-of-reordering, a 10-20-30 ordering scheme is recommended.</p>

	<p><label><b>FEATURED PHOTO SIZE:</b></label><br>The Featured photo should be 244px wide, and 266px tall. If the image is larger than those dimensions, it will be automatically resized and cropped to fit those dimensions.</p>

	<style>#wpseo_meta,#slidedeck-sidebar{display:none !important;}</style>
	<?php
}

function promo_subtitle() {
	global $post;
	$custom = get_post_custom($post->ID);
	$subtitle = $custom["promo_subtitle"][0];
	?><p><label>Phrase to describe the type of content:</label><br><input name="promo_subtitle" value="<?php echo $subtitle; ?>" size="34" maxlength="30"/></p><?php
}

function promo_excerpt() {
	global $post;
	$custom = get_post_custom($post->ID);
	$promo_excerpt = $custom["promo_excerpt"][0];
	?><table>
  	<td><textarea name="promo_excerpt" rows="6" cols="34" style="overflow:hidden;"><?php echo $promo_excerpt; ?></textarea></td>
	  <td valign="top"><label>Excerpts are hand-crafted summaries of the content<br>you are promoting on the homepage:</label><br><br><small>Design accommodates 6 lines of text, or roughly 30 words.</small></td>
	</table><?php
}

function learn_more_box() {
	global $post;
	$custom = get_post_custom($post->ID);
	$learn_more_url = $custom["learn_more_url"][0];
	$learn_more_label = $custom["learn_more_label"][0];
	if ( empty($learn_more_label) ) $learn_more_label = "Learn More";
	?><p><label>Url:</label> <i>Include http://</i><br><input name="learn_more_url" value="<?php echo $learn_more_url; ?>" size="80"/></p>

	<p><label>Label:</label> <i>Example: 'Learn More'</i><br><input name="learn_more_label" value="<?php echo $learn_more_label; ?>" size="25" maxlength="25"/></p>
	<?php
}

function set_custom_post_types_admin_order($wp_query) {
	if (is_admin()) {
		// Get the post type from the query
		$post_type = $wp_query->query['post_type'];

		if ($post_type == 'promotion') {
			// 'orderby' value can be any column name
			$wp_query->set('orderby', 'menu_order');

			// 'order' value can be ASC or DESC
			$wp_query->set('order', 'ASC');
		}
	}
}
add_filter('pre_get_posts', 'set_custom_post_types_admin_order');
?>