	<footer class="footer" role="contentinfo">
		<div id="inner-footer" class="wrap clearfix">
			<div class="eightcol">
				<? dynamic_sidebar('first-footer-widget-area'); ?>
			</div><!-- /.column -->

			<div class="fourcol right">
				<? dynamic_sidebar('second-footer-widget-area'); ?>
			</div><!-- /.column -->
		</div> <!-- end #inner-footer -->
	</footer> <!-- end footer -->

	<div id="bottombar">
		<div id="inner-bottombar" class="wrap">
			<a href="http://crossfit.com" target="_blank"><img src="<? echo get_bloginfo('template_directory'); ?>/library/images/logo-crossfit.jpg" alt="CrossFit" /></a>
			<a href="http://journal.crossfit.com/start.tpl?version=CFJ-graphic123x63" target="_blank" title="CrossFit Journal: The Performance-Based Lifestyle Resource"><img src="http://journal.crossfit.com/templates/images/graphic-125x63.jpg" width="125px" height="63px" alt="CrossFit Journal: The Performance-Based Lifestyle Resource" /></a>
			<a href="http://poweredbyawesome.com" target="_blank" title="Powered by Awesome - Website Design for CrossFit&reg; Affiliates"><img src="http://poweredbyawesome.com/wp-content/uploads/logo-poweredbyawesome-footer.png" alt="Powered by Awesome - Website Design for CrossFit&reg; Affiliates" /></a>
		</div><!-- end #inner-bottombar -->
	</div><!-- end #bottombar -->
</div> <!-- end #container -->

<!-- all js scripts are loaded in library/bones.php -->
<? wp_footer(); ?>

</body>
</html> <!-- end page. what a ride! -->
