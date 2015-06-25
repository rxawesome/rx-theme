<?php get_header(); ?>

<div id="content">
	<div id="Slideshow" class="Section">
		<? echo do_shortcode("[SlideDeck2 id=16 ress=1]"); ?>
	</div>

	<div id="FreeTrial" class="Section">
		<div class="wrap clearfix">
			<div class="first twelvecol">
				<h1 class="section-title">Schedule Your Free Trial</h1>
				<p>Come and see what it’s all about. Contact us to schedule a time to come by and see our facility, 
					learn more about us, and even get a 1-on-1 training session!</p>
				<a href="/start-here/free-intro/" class="button black large">Sign Up Now <span>&#187;</span></a>
			</div>
		</div>
	</div>

	<div id="Promotions" class="Section">
		<div class="wrap clearfix">
			<div class="first twelvecol">
				<h1 class="section-title">Fitness Programs to Fit Your Needs</h1>
				<p>Not ready for CrossFit but still want to get in shape and have fun? Take a look at the different 
					fitness classes we offer and check out the one that fits you best.</p>
			</div>
			<div>
				<?
				$index=1;
				query_posts(array('post_type'=>'promotion', 'posts_per_page'=>3, 'orderby'=>'menu_order', 'order'=>'ASC'));
				while (have_posts()) : the_post();
					// Get Promo Information
					$promo_title = $post->post_title;
					$promo_excerpt = get_post_meta($post->ID, 'promo_excerpt', true);
					$learn_more_url = get_post_meta($post->ID, 'learn_more_url', true);
					$learn_more_label = get_post_meta($post->ID, 'learn_more_label', true);
					$promo_photo = "";
					if (has_post_thumbnail($post->ID)) { 
						$promo_photo = get_the_post_thumbnail($post->ID, 'promo-thumb');
					}
		
				?><div class="promotion column fourcol top-margin">
					<div class="title">
						<h2 class="entry-title"><?=$promo_title;?></h2>
					</div>
					<div class="excerpt">
						<p><?=$promo_excerpt;?></p>
					</div>
					<a href="<?=$learn_more_url; ?>" class="button white"><?=$learn_more_label;?> <span>&#187;</span></a>
				</div>
				<?endwhile; wp_reset_query(); ?>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>