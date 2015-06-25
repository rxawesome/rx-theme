<?php get_header(); ?>

<div id="content">
	<div id="inner-content" class="wrap clearfix">

		<div id="main" class="eightcol first clearfix" role="main">

			<article id="post-not-found" class="hentry clearfix">
				<header class="article-header">
					<h1 class="page-title"><? _e("Epic 404 - Article Not Found", "bonestheme"); ?></h1>
				</header> <!-- end article header -->

				<section class="entry-content">
					<p><? _e("The article you were looking for was not found, but maybe try looking again!", "bonestheme"); ?></p>
				</section> <!-- end article section -->

				<section class="search">
					<p><? get_search_form(); ?></p>
				</section> <!-- end search section -->
			</article> <!-- end article -->

		</div> <!-- end #main -->
		
		<div id="side" class="fourcol last">
			<? get_sidebar(); ?>
		</div>

	</div> <!-- end #inner-content -->
</div> <!-- end #content -->

<?php get_footer(); ?>
