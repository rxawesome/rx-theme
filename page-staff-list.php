<?php
/*
 Template Name: Staff List
 */

 get_header(); ?>
 
<div id="content">
	<div id="inner-content" class="wrap clearfix">

		<div id="main" class="eightcol first clearfix" role="main">
			<h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>
			<div id="trainer-list"><? 
			// Fetch All the Trainer Pages
			$index = 0;
			query_posts(array('post_type'=>'staff', 'orderby'=>'menu_order', 'order'=>'ASC'));
			while (have_posts()) : the_post();
			
			// Get Trainer Information
			$name = $post->post_title;
			$position = get_field("position");
			$qualifications = get_field("qualifications");
			$accomplishments = get_field("accomplishments");
			$photo = "";
			if (has_post_thumbnail($post->ID)) { 
				$photo = get_the_post_thumbnail($post->ID, 'medium');
			}
			?><div class="trainer preview clearfix">
				<div class="photo column"><?=$photo;?></div>
				<div class="details last column">
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
