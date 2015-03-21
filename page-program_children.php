<?php
/*
Template Name: Program w/Children
*/

get_header(); ?>

<div id="content">
	<div id="inner-content" class="wrap clearfix Program">
		
		<div id="main" class="eightcol first clearfix" role="main">
		<? if (have_posts()) : while (have_posts()) : the_post(); ?>

			<article id="post-<? the_ID(); ?>" <? post_class('clearfix'); ?> role="article">
				<header class="article-header">
					<h1 class="page-title" itemprop="headline"><? the_title(); ?></h1>
					<div class="featured"><? the_post_thumbnail('bones-thumb-600'); ?></div>
				</header> <!-- end article header -->

				<section class="entry-content clearfix" itemprop="articleBody">
					<? the_content(); ?>
				</section> <!-- end article section -->
			</article> <!-- end article -->

		<? endwhile; endif; ?>

			<div class="page-children loop"><?
			
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
						<? $image = wp_get_attachment_image_src(get_field('preview_image'), 'bones-thumb-300'); ?>
						<div class="Photo">
							<a href="<? the_permalink() ?>" title="<? the_title_attribute(); ?>"><img src="<? echo $image[0]; ?>" /></a>
						</div>
					</div>

					<div class="entry-preview">
						<header class="article-header">
							<h2 class="entry-title"><a href="<? the_permalink() ?>" rel="bookmark" title="<? the_title_attribute(); ?>"><? the_title(); ?></a></h2>
						</header>
	
						<section class="entry-content">
							<? the_field("preview_text"); ?>
						</section>

						<footer class="article-footer">
							<p class="More"><a href="<? the_permalink() ?>" class="button">Learn More <span>&#187;</span></a></p>
						</footer>
					</div>

				</article>
				
			<? endwhile; endif; ?>
			</div>
		</div>
		
		<div id="side" class="fourcol last">
			<? get_sidebar(); ?>
		</div>

	</div> <!-- end #inner-content -->
</div> <!-- end #content -->

<?php get_footer(); ?>