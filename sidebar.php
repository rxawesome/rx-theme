<?php 
/**
 * The Sidebar containing the primary and secondary widget areas.
 *
 * @package WordPress
 */

// Show Home Page Side Widgets
if (is_home()) {
	dynamic_sidebar('home-side-widget-area');
}
// Show Interior Page Side Widgets
elseif (is_page()) {
	dynamic_sidebar('interior-side-widget-area');
}
// Show Blog Page Side Widgets
else {
	?>
	<div class="wod widget-container">
		<h3 class="widget-title">Today's WOD</h3>
		<?
		query_posts(array('cat'=>'wod', 'posts_per_page'=>1));
			
		$do_not_duplicate = array();
		while (have_posts()) : the_post();
		
			if (!in_array($post->ID, $do_not_duplicate)) { 
				$do_not_duplicate[] = $post->ID; // remember ID's in loop
			?>
		
			<div id="post-<? the_ID(); ?>" <? post_class(); ?>>
				<h2 class="entry-title"><a href="<? the_permalink(); ?>" title="<? printf(esc_attr__('Permalink to %s', 'twentyten'), the_title_attribute('echo=0')); ?>" rel="bookmark"><? the_title(); ?></a></h2>
				<? if (has_post_thumbnail()) {
					?><div class="featured"><? the_post_thumbnail('large'); ?></div><!-- /.featured --><?
				} ?>
						
				<div class="entry-content">
					<? the_content(__('Continue reading <span class="meta-nav">&rarr;</span>', 'twentyten'));?>
					<? wp_link_pages(array('before' => '<div class="page-link">' . __('Pages:', 'twentyten'), 'after' => '</div>')); ?>
				</div><!-- /.entry-content -->
		
				<div class="entry-utility">
					<? if (count(get_the_category())) : ?>
						<span class="cat-links">
							<? printf(__('<span class="%1$s">Posted in</span> %2$s', 'twentyten'), 'entry-utility-prep entry-utility-prep-cat-links', get_the_category_list(', ')); ?>
						</span>
						<span class="meta-sep">|</span>
					<? endif; ?>
					<?
					$tags_list = get_the_tag_list('', ', ');
					if ($tags_list):
						?><span class="tag-links">
							<? printf(__('<span class="%1$s">Tagged</span> %2$s', 'twentyten'), 'entry-utility-prep entry-utility-prep-tag-links', $tags_list); ?>
						</span>
						<span class="meta-sep">|</span>
					<? endif; ?>
					<span class="comments-link"><?php comments_popup_link(__('Comment', 'twentyten'), __('1 Comment', 'twentyten'), __('% Comments', 'twentyten')); ?></span>
					<? edit_post_link(__('Edit', 'twentyten'), '<span class="meta-sep">|</span> <span class="edit-link">', '</span>'); ?>
				</div><!-- /.entry-utility -->
			</div><!-- /#post-## -->
		
			<? } ?>
		
			<? comments_template('', true); ?>
		<? endwhile; ?>			
		<? wp_reset_query(); ?>
	</div>
	<?
	dynamic_sidebar('blog-side-widget-area');
}

#if (!is_home()) {
	dynamic_sidebar('global-side-widget-area');
#}
?>