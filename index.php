<?php get_header(); ?>
	<div id="top-content">
		<div id="inner-top-content" class="wrap clearfix">
			<div class="first eightcol slideshow top-margin">	
				<? echo do_shortcode("[SlideDeck2 id=130 ress=1]"); ?>
			</div>
			<div class="last fourcol call_block top-margin">
				<? echo do_shortcode("[smartblock id=129]");  ?>
			</div>
		</div> <!-- end #inner-top-content -->
	</div> <!-- end #top-content -->
	<div id="bottom-content">
		<div id="inner-bottom-content" class="wrap clearfix">
			<?
			$index=1;
			query_posts(array('post_type'=>'promotion', 'posts_per_page'=>3, 'orderby'=>'menu_order', 'order'=>'ASC'));
			while (have_posts()) : the_post();
				// Get Promo Information
				$promo_title = $post->post_title;
				$promo_excerpt = get_post_meta($post->ID, 'promo_excerpt', true);
				$learn_more_url = get_post_meta($post->ID, 'learn_more_url', true);
				$promo_photo = "";
				if (has_post_thumbnail($post->ID)) { 
					$promo_photo = get_the_post_thumbnail($post->ID, 'promo-thumb');
				}

			?><div class="promotion column fourcol top-margin">
				<a href="<?=$learn_more_url; ?>">
					<div class="story">
						<div class="photo"><?=$promo_photo;?></div>
						<div class="title"><h2><?=$promo_title;?></h2></div>
						<div class="go">
							<p>GO<span class="arrow">&#9654;</span></p>
						</div>
					</div>
				</a>
				<div class="info">
					<div class="excerpt">
						<p><?=$promo_excerpt;?></p>
					</div>
				</div>
			</div>
			<?endwhile; wp_reset_query(); ?>
		</div> <!-- end #inner-bottom-content -->
	</div> <!-- end #bottom-content -->
<?php get_footer(); ?>