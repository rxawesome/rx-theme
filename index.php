<?php get_header(); ?>

<div id="content">
	<div id="Slideshow" class="Section">
		<? echo do_shortcode("[SlideDeck2 id=16 ress=1]"); ?>
	</div>

	<div id="FreeIntro" class="Section">
		<div class="wrap clearfix">
			<div class="first twelvecol">
				<h1 class="section-title">Schedule Your Free Trial</h1>
				<p>Come and see what it's all about. Contact us to schedule a time to come by and see our facility, 
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
					$promo_url = get_post_meta($post->ID, 'learn_more_url', true);
					$promo_label = get_post_meta($post->ID, 'learn_more_label', true);
					$promo_photo = get_promo_image($post->ID, "", "");
		
				?><div class="promotion column top-margin">
					<a href="<?=$promo_url;?>">
					<div class="Box">
						<div class="Photo"><?=$promo_photo;?></div>
						<div class="Overlay">
							<h2 class="entry-title"><b><?=$promo_title;?></b> <span>&#187;</span></h2>
						</div>
					</div>
					</a>
				</div>
				<?endwhile; wp_reset_query(); ?>
			</div>
		</div>
	</div>
	
	<div id="Testimonials" class="Section">
		<div class="wrap clearfix">
			<div class="first twelvecol">
				<h1 class="section-title">What Our Members Are Saying</h1>
			</div>
			<div>
				<?
				$a_author = array();
				query_posts(array('post_type'=>'story'));
				while (have_posts()) : the_post();
					$a_author[$post->post_title] = get_the_post_thumbnail($post->ID, 'thumbnail');
					if ( get_post_meta($post->ID, 'reason_for_joining', true) <> "" )
						$oStory[] = array("author"=>$post->post_title, "text"=>get_post_meta($post->ID, 'reason_for_joining', true));
					if ( get_post_meta($post->ID, 'enjoy_about_membership', true) <> "" )
						$oStory[] = array("author"=>$post->post_title, "text"=>get_post_meta($post->ID, 'enjoy_about_membership', true));
					if ( get_post_meta($post->ID, 'learn_about_yourself', true) <> "" )
						$oStory[] = array("author"=>$post->post_title, "text"=>get_post_meta($post->ID, 'learn_about_yourself', true));
					if ( get_post_meta($post->ID, 'advice_to_prospect', true) <> "" )
						$oStory[] = array("author"=>$post->post_title, "text"=>get_post_meta($post->ID, 'advice_to_prospect', true));
				endwhile;
				
				$count = 1; shuffle($oStory);
				foreach ( $oStory as $o ) {
					if ($count > 3) break;?>
					<div class="story column fourcol top-margin">
						<p><div class="Photo"><? echo $a_author[$o["author"]];?></div> <b><?=$o["author"];?> -</b> <?=$o["text"];?></p>
					</div>
					<? $count++;
				} wp_reset_query(); ?>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>