<?php
/*
Template Name: Program w/Children
*/

get_header(); ?>

<div id="content">
	<div id="inner-content" class="wrap clearfix Program">
		
		<? if (have_posts()) : while (have_posts()) : the_post(); ?>
		<? #$photo = has_post_thumbnail($post->ID) ? get_the_post_thumbnail($post->ID, 'large') : ""; ?>
		<div class="twelvecol first clearfix">
			<!--<div class="Photo"><div><?=$photo;?></div></div>-->
			<h1><? the_title();?></h1>
		</div>
		<? endwhile; endif; ?>
		
		<div id="main" class="eightcol first clearfix" role="main">
			<div class="entry-content">
				<? the_content(); ?>
			</div>
			&nbsp;
			<div class="page-children"><?
			
			$args = array(
				'post_type'      => 'page',
				'posts_per_page' => -1,
				'post_parent'    => $post->ID,
				'order'          => 'ASC',
				'orderby'        => 'menu_order'
			 );
			
			$parent = new WP_Query( $args );
			
			if ( $parent->have_posts() ) : while ( $parent->have_posts() ) : $parent->the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix child'); ?> role="article">

					<div class="entry-feature">
						<?php $image = wp_get_attachment_image_src(get_field('preview_image'), 'bones-thumb-300'); ?>
						<div class="Photo"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><div><?php /* the_post_thumbnail( 'bones-thumb-300' ); */ ?><img src="<?php echo $image[0]; ?>" /></div></a></div>
					</div>

					<div class="entry-preview">
						<header class="article-header">
							<h3 class="h2"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
						</header> <!-- end article header -->
	
						<section class="entry-content clearfix">
							<?php the_field("preview_text"); ?>
						</section> <!-- end article section -->

						<footer class="article-footer">
							<p class="More"><a href="<? the_permalink() ?>">Learn More &#187;</a></p>
						</footer>
					</div>
					<div class="Clear"></div>

				</article> <!-- end article -->
				
			<? endwhile; endif; ?>
			</div>
		</div> <!-- end #main -->
		
		<div id="side" class="fourcol last">
			<? get_sidebar(); ?>
		</div>

	</div> <!-- end #inner-content -->
</div> <!-- end #content -->

<?php get_footer(); ?>