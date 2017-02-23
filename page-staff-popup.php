<?php
/*
 Template Name: Staff Popup
 */

 get_header(); global $post; ?>
 
<div id="content">
	<div id="inner-content" class="wrap clearfix">

		<?php
		$hideSidebar = get_field('hide_sidebar', $post->ID) == 'yes' ? TRUE : FALSE;
		$mainClass = $hideSidebar ? 'twelvecol' : 'eightcol'; ?>
		<div id="main" class="<?php echo $mainClass; ?> first clearfix" role="main">

			<h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>
			<div id="trainer-list"><? 
			$columns = get_field('columns', $post->ID);
			$columnClasses = array(
				1 => 'onecol',
				2 => 'twocol',
				5 => 'twocol twohalfcol', // five columns layout
				3 => 'threecol',
				4 => 'fourcol',
				6 => 'sixcol',
				12 => 'twelvecol'				
			);
			$columnClass = $columns == 5 ? $columnClasses[5] : $columnClasses[12 / $columns];

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
				$photo = get_the_post_thumbnail_url($post->ID, 'staff-thumb');
			}
			?>
			
			<div class="column <?php echo $columnClass; ?>" style="<?php echo $index%$columns == 0 ? 'margin-left: 0px; clear: left;' : ''; ?>">
				<div class="photo"><a id="inline" class="fancybox" href="#<?the_ID();?>"><img src="<?=$photo;?>" width="100%"></a></div>
				<div class="info">
					<h3><a id="inline" class="fancybox" href="#<?the_ID();?>"><?=$name;?> <span>&#187;</span></a></h3>
					<p><?=$position;?></p>
				</div>
			</div>
			
			<div style="display: none;"><div id="<?the_ID();?>" class="trainer preview">
				<div class="fourcol">
					<div class="photo"><img src="<?=$photo?>" width="300"></div>
					<? if ( !empty($qualifications) ):?>
						<div class="qualifications">
							<h4>Qualifications:</h4>
							<? echo $qualifications; ?>
						</div>
					<? endif; ?>
					<? if ( !empty($accomplishments) ):?>
						<div class="accomplishments">
							<h4>Accomplishments</h4>
							<? echo $accomplishments; ?>
						</div>
					<? endif; ?>
				</div>
				<div class="details eightcol">
					<div class="title">
						<h2><?=$name;?></h2>
						<?
						if ( !empty($position) ) {
							?><h3><?=$position;?></h3><?
						}
					?></div><?
					
					echo apply_filters('the_content', $post->post_content); 

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

		<? if (!$hideSidebar): ?>
		<div id="side" class="fourcol last">
			<? get_sidebar(); ?>
		</div>
		<? endif; ?>

	</div> <!-- end #inner-content -->
</div> <!-- end #content -->

<?php get_footer(); ?>
