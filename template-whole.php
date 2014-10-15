<?php 
/**
 * Template Name: Whole Page
 */

get_header(); ?>

<div id="content">
	<div id="inner-content" class="wrap clearfix">

		<div id="main" class="twelvecol first clearfix" role="main">
		<? if (have_posts()) : while (have_posts()) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

				<header class="article-header">
					<h1 class="page-title" itemprop="headline"><? the_title(); ?></h1>
					<p class="byline vcard"><?php
						printf(__('Posted <time class="updated" datetime="%1$s" pubdate>%2$s</time> by <span class="author">%3$s</span>.', 'bonestheme'), get_the_time('Y-m-j'), get_the_time(__('F jS, Y', 'bonestheme')), bones_get_the_author_posts_link());
					?></p>
				</header> <!-- end article header -->

				<section class="entry-content clearfix" itemprop="articleBody">
					<?php the_content(); ?>
				</section> <!-- end article section -->

			</article> <!-- end article -->

		<? endwhile; else : ?>

			<article id="post-not-found" class="hentry clearfix">
				<header class="article-header">
					<h1><?php _e("Oops, Post Not Found!", "bonestheme"); ?></h1>
				</header>
				<section class="entry-content">
					<p><?php _e("Uh Oh. Something is missing. Try double checking things.", "bonestheme"); ?></p>
				</section>
			</article>

		<? endif; ?>
		</div> <!-- end #main -->

	</div> <!-- end #inner-content -->
</div> <!-- end #content -->

<?php get_footer(); ?>
