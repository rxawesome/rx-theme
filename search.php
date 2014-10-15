<?php get_header(); ?>

<div id="content">
	<div id="inner-content" class="wrap clearfix">

		<div id="main" class="eightcol first clearfix" role="main">
			<h1 class="page-title"><span><? _e('Search Results for:', 'bonestheme'); ?></span> <? echo esc_attr(get_search_query()); ?></h1>

			<div class="loop">
		<? if (have_posts()) : while (have_posts()) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">

					<header class="article-header">
						<h2 class="entry-title"><a href="<? the_permalink() ?>" rel="bookmark" title="<? the_title_attribute(); ?>"><? the_title(); ?></a></h2>
						<p class="byline vcard"><?php
							printf( __( 'Posted <time class="updated" datetime="%1$s" pubdate>%2$s</time> by <span class="author">%3$s</span> <span class="amp">&</span> filed under %4$s.', 'bonestheme' ), get_the_time( 'Y-m-j' ), get_the_time( __( 'F jS, Y', 'bonestheme' ) ), bones_get_the_author_posts_link(), get_the_category_list(', ') );
						?></p>
					</header> <!-- end article header -->

					<section class="entry-content">
						<?php the_excerpt('<span class="read-more">' . __('Read more &raquo;', 'bonestheme') . '</span>'); ?>
					</section> <!-- end article section -->

					<footer class="article-footer">
						<div class="entry-utility">
							<?php if (count(get_the_category())) : ?>
								<span class="cat-links">
									<?php printf(__('<span class="%1$s">Posted in</span> %2$s', 'twentyten'), 'entry-utility-prep entry-utility-prep-cat-links', get_the_category_list(', ')); ?>
								</span>
								<span class="meta-sep">|</span>
							<?php endif; ?>
							<?php
								$tags_list = get_the_tag_list('', ', ');
								if ($tags_list):
							?>
								<span class="tag-links">
									<?php printf(__('<span class="%1$s">Tagged</span> %2$s', 'twentyten'), 'entry-utility-prep entry-utility-prep-tag-links', $tags_list); ?>
								</span>
								<span class="meta-sep">|</span>
							<?php endif; ?>
							<span class="comments-link"><?php comments_popup_link(__('Leave a comment', 'twentyten'), __('1 Comment', 'twentyten'), __('% Comments', 'twentyten')); ?></span>
							<?php edit_post_link(__('Edit', 'twentyten'), '<span class="meta-sep">|</span> <span class="edit-link">', '</span>'); ?>
						</div><!-- /.entry-utility -->

					</footer> <!-- end article footer -->

				</article> <!-- end article -->

		<? endwhile; ?>
			</div>

			<? if (function_exists('bones_page_navi')) { ?>
				<? bones_page_navi(); ?>
			<? } else { ?>
				<nav class="wp-prev-next">
					<ul class="clearfix">
						<li class="prev-link"><?php next_posts_link(__('&laquo; Older Entries', "bonestheme")) ?></li>
						<li class="next-link"><?php previous_posts_link(__('Newer Entries &raquo;', "bonestheme")) ?></li>
					</ul>
				</nav>
			<? } ?>

		<? else : ?>

			<article id="post-not-found" class="hentry clearfix">
				<header class="article-header">
					<h1><? _e("Sorry, No Results.", "bonestheme"); ?></h1>
				</header>
				<section class="entry-content">
					<p><? _e("Try your search again.", "bonestheme"); ?></p>
				</section>
			</article>

		<? endif; ?>
		</div> <!-- end #main -->

		<div id="side" class="fourcol last">
			<?php get_sidebar(); ?>
		</div>

	</div> <!-- end #inner-content -->
</div> <!-- end #content -->

<?php get_footer(); ?>
