<?php get_header(); ?>

<div id="content">
	<div id="inner-content" class="wrap clearfix">

		<div id="main" class="eightcol first clearfix" role="main">
		<? if (have_posts()) : while (have_posts()) : the_post(); ?>

			<article id="post-<? the_ID(); ?>" <? post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

				<header class="article-header">
					<h1 class="page-title" itemprop="headline"><? the_title(); ?></h1>
					<div class="featured"><? the_post_thumbnail('bones-thumb-600'); ?></div>
				</header> <!-- end article header -->

				<section class="entry-content clearfix" itemprop="articleBody">
					<? the_content(); ?>
				</section> <!-- end article section -->

			</article> <!-- end article -->

		<? endwhile; else : ?>

			<article id="post-not-found" class="hentry clearfix">
				<header class="article-header">
					<h1><? _e("Oops, Post Not Found!", "bonestheme"); ?></h1>
				</header>
				<section class="entry-content">
					<p><? _e("Uh Oh. Something is missing. Try double checking things.", "bonestheme"); ?></p>
				</section>
			</article>

		<? endif; ?>
		</div> <!-- end #main -->
		
		<div id="side" class="fourcol last">
			<? get_sidebar(); ?>
		</div>
			
	</div> <!-- end #inner-content -->
</div> <!-- end #content -->

<?php get_footer(); ?>
