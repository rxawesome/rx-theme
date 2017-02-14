<?php
/*
 Template Name: Staff Popup
 */

 get_header(); ?>
 
<div id="content">
	<div id="inner-content" class="wrap clearfix">
		
		<div id="main" class="eightcol first clearfix" role="main">
			<h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>
			<div id="trainer-list"><? 
			// Fetch All the Trainer Pages
			$index = 0;
			query_posts(array('post_type'=>'staff', 'orderby'=>'menu_order', 'order'=>'ASC', 'posts_per_page'=>50));
			while (have_posts()) : the_post();
			
			// Get Trainer Information
			$name = $post->post_title;
			$position = get_field("position");
			$qualifications = get_field("qualifications");
			$accomplishments = get_field("accomplishments");
			$photo = "";
			if (has_post_thumbnail($post->ID)) { 
				$photo = get_the_post_thumbnail($post->ID, 'staff-thumb');
			}
			?>
			
			<div class="column fourcol">
				<div class="photo"><a id="inline" class="fancybox-inline" href="#<?the_ID();?>"><?=$photo;?></a></div>
				<div class="info">
					<h3><a id="inline" class="fancybox-inline" href="#<?the_ID();?>"><?=$name;?> <span>&#187;</span></a></h3>
					<p><?=$position;?></p>
				</div>
			</div>

			<div style="display: none;"><div id="<?the_ID();?>" class="trainer preview">
				<div class="photo fourcol"><?=$photo;?></div>
				<div class="details eightcol">
					<div class="title">
						<h2><?=$name;?></h2>
						<?
						if ( !empty($position) ) {
							?><h3><?=$position;?></h3><?
						}
					?></div><?
					
					echo apply_filters('the_content', $post->post_content); 
					
					if ( !empty($qualifications) ) {
						?><h4>Qualifications:</h4><?
						echo $qualifications;
					}
					if ( !empty($accomplishments) ) {
						?><h4>Accomplishments:</h4><?
						echo $accomplishments;
					}

					?>
				</div><!-- /.details -->
				<div class="clear"></div>
			</div><!-- /.trainer -->
			</div>
			<?
			$index++;
			endwhile;
			wp_reset_query();
			// End Trainers 
			?>
			</div><!-- /#trainer-list -->
		</div> <!-- end #main -->
		
		<div id="side" class="last fourcol">
			<? get_sidebar(); ?>
		</div>

	</div> <!-- end #inner-content -->
</div> <!-- end #content -->

<?php get_footer(); ?>
