<?php get_header(); ?>

<div id="content">
	<div id="Slideshow">
		<? echo do_shortcode("[SlideDeck2 id=16 ress=1]"); ?>
	</div>

	<div id="FreeTrial" class="Section">
		<div class="wrap clearfix">
			<div class="first twelvecol">
				<h1 class="page-title">Schedule Your Free Trial</h1>
				<p>Come and see what it’s all about. Contact us to schedule a time to come by and see our facility, 
					learn more about us, and even get a 1-on-1 training session!</p>
				<a href="" class="button black large" target="_blank">Sign Up Now <span>&#187;</span></a>
			</div>
		</div>
	</div>

	<div id="Promotions" class="Section">
		<div class="wrap clearfix">
			<div class="first twelvecol">
				<h1 class="page-title">Fitness Programs to Fit Your Needs</h1>
				<p>Not ready for CrossFit but still want to get in shape and have fun? Take a look at the different 
					fitness classes we offer and check out the one that fits you best.</p>
			</div>
			<div>
				<div class="onecol top-margin empty"></div>
				<?
				$index=1;
				query_posts(array('post_type'=>'promotion', 'posts_per_page'=>2, 'orderby'=>'menu_order', 'order'=>'ASC'));
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
		
				?><div class="promotion column fivecol top-margin">
					<div class="title">
						<h2 class="entry-title"><?=$promo_title;?></h2>
					</div>
					<div class="excerpt">
						<p><?=$promo_excerpt;?></p>
					</div>
					<a href="<?=$learn_more_url; ?>" class="button white"><?=$learn_more_label;?> <span>&#187;</span></a>
				</div>
				<?endwhile; wp_reset_query(); ?>
				<div class="onecol top-margin empty"></div>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>