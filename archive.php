<?php get_header(); ?>

<div id="content">
	<div id="inner-content" class="wrap clearfix">

		<div id="main" class="eightcol first clearfix" role="main">
				
			<? if (is_category()) { ?>
				<h1 class="page-title"><? single_cat_title(); ?></h1>

			<? } elseif (is_tag()) { ?>
				<h1 class="page-title"><? single_tag_title(); ?></h1>

			<? } elseif (is_author()) {
				global $post;
				$author_id = $post->post_author; ?>
				<h1 class="page-title"><? the_author_meta('display_name', $author_id); ?></h1>

			<? } elseif (is_day()) { ?>
				<h1 class="page-title"><? the_time('l, F j, Y'); ?></h1>

			<? } elseif (is_month()) { ?>
				<h1 class="page-title"><? the_time('F Y'); ?></h1>

			<? } elseif (is_year()) { ?>
				<h1 class="page-title"><? the_time('Y'); ?></h1>

			<? } ?>

				
			<div class="loop">	
			<? if (have_posts()) : while (have_posts()) : the_post(); ?>

				<article id="post-<? the_ID(); ?>" <? post_class('clearfix'); ?> role="article">

					<header class="article-header">
						<h2 class="entry-title"><a href="<? the_permalink() ?>" rel="bookmark" title="<? the_title_attribute(); ?>"><? the_title(); ?></a></h3>
						<p class="byline vcard"><?
							printf(__( 'Posted <time class="updated" datetime="%1$s" pubdate>%2$s</time> by <span class="author">%3$s</span> <span class="amp">&</span> filed under %4$s.', 'bonestheme' ), get_the_time('Y-m-j'), get_the_time(__( 'F jS, Y', 'bonestheme' )), bones_get_the_author_posts_link(), get_the_category_list(', '));
						?></p>
					</header> <!-- end article header -->

					<section class="entry-content clearfix">
						<? the_post_thumbnail( 'full' ); ?>
						<? the_excerpt(); ?>
					</section> <!-- end article section -->

					<footer class="article-footer">
						<div class="entry-utility">
							<? if (count(get_the_category())) : ?>
								<span class="cat-links">
									<? printf(__('<span class="%1$s">Posted in</span> %2$s', 'twentyten'), 'entry-utility-prep entry-utility-prep-cat-links', get_the_category_list(', ')); ?>
								</span>
								<span class="meta-sep">|</span>
							<? endif; ?>
							<?
								$tags_list = get_the_tag_list('', ', ');
								if ($tags_list):
							?>
								<span class="tag-links">
									<? printf(__('<span class="%1$s">Tagged</span> %2$s', 'twentyten'), 'entry-utility-prep entry-utility-prep-tag-links', $tags_list); ?>
								</span>
								<span class="meta-sep">|</span>
							<? endif; ?>
							<span class="comments-link"><? comments_popup_link(__('Leave a comment', 'twentyten'), __('1 Comment', 'twentyten'), __('% Comments', 'twentyten')); ?></span>
							<? edit_post_link(__('Edit', 'twentyten'), '<span class="meta-sep">|</span> <span class="edit-link">', '</span>'); ?>
						</div><!-- /.entry-utility -->
					</footer> <!-- end article footer -->

				</article> <!-- end article -->
				
			<? endwhile; ?>
				
				<? if (function_exists('bones_page_navi')) { ?>
					<? bones_page_navi(); ?>
				<? } else { ?>
					<nav class="wp-prev-next">
						<ul class="clearfix">
							<li class="prev-link"><? next_posts_link(__('&laquo; Older Entries', "bonestheme")) ?></li>
							<li class="next-link"><? previous_posts_link(__('Newer Entries &raquo;', "bonestheme")) ?></li>
						</ul>
					</nav>
				<? } ?>

			<? else : ?>

				<article id="post-not-found" class="hentry clearfix">
					<header class="article-header">
						<h1><? _e("Oops, Post Not Found!", "bonestheme"); ?></h1>
					</header>
					<section class="entry-content">
						<p><? _e("Uh Oh. Something is missing. Try double checking things.", "bonestheme"); ?></p>
					</section>
				</article>

			<? endif; ?>
			</div> <!-- end .loop -->

		</div> <!-- end #main -->

		<div id="side" class="fourcol last">
			<? get_sidebar(); ?>
		</div>

	</div> <!-- end #inner-content -->
</div> <!-- end #content -->

<?php get_footer(); ?>
