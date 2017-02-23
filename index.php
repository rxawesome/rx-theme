<?php get_header(); ?>

<div id="content">
	<div id="Slideshow" class="Section">
		<? echo do_shortcode('[rev_slider alias="homepage"]'); ?>
	</div>

	<div id="FreeTrial" class="Section">
		<div class="wrap clearfix">
			<div class="first twelvecol">
				<h1 class="section-title">Start With A “No Sweat” Intro!</h1>
				<p>Your success matters a lot to us. Start by coming in for a free “no sweat” intro where you’ll be able to share your fitness goals to us, and we’ll give you our expert recommendation on how we can partner together to get you there.</p>
				<a href="/start-here/free-intro/" class="button black large">Sign Up Now <span>&#187;</span></a>
			</div>
		</div>
	</div>

	<div id="Promotions" class="Section">
		<div class="wrap clearfix">
			<div class="first twelvecol">
				<h1 class="section-title">A WIDE SELECTION OF PROGRAMS</h1>
				<p>Designed to help you meet your short term and long term goals.</p>
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
						$promo_photo = get_the_post_thumbnail_url($post->ID, 'full');
					}
		
				?><div class="promotion column fourcol top-margin" style="background-image: url(<?php echo $promo_photo; ?>); ">
					<h2><a href="<?=$learn_more_url; ?>"><?=$promo_title;?></a></h2>
				</div>
				<?endwhile; wp_reset_query(); ?>
			</div>
		</div>
	</div>

	<div id="Testimonials" class="Section">
		<div class="wrap clearfix">
			<div class="first twelvecol">
				<h1 class="section-title">It’s Time to Change Your Life</h1>
				<p>We aren’t just a gym, we are coaches, friends and family - here to support you in your fitness journey.</p>
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
					if ($count > 4) break;?>
					<div class="story column sixcol top-margin">
						<p><div class="Photo"><? echo $a_author[$o["author"]];?></div> <?=$o["text"];?><br><strong>- <?=$o["author"];?></strong></p>
					</div>
					<? $count++;
				} wp_reset_query(); ?>
			</div>
		</div>
	</div>

</div>

<?php get_footer(); ?>