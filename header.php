<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	<head>
		<meta charset="utf-8">

		<!-- Google Chrome Frame for IE -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title><?php wp_title(''); ?></title>

		<!-- mobile meta (hooray!) -->
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

		<!-- icons & favicons (for more: http://www.jonathantneal.com/blog/understand-the-favicon/) -->
		<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/library/images/apple-icon-touch.png">
		<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
		<!--[if IE]>
			<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
		<![endif]-->
		<!-- or, set /favicon.ico for IE10 win -->
		<meta name="msapplication-TileColor" content="#f01d4f">
		<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/library/images/win8-tile-icon.png">

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<!-- wordpress head functions -->
		<?php wp_head(); ?>
		<!-- end of wordpress head -->

		<!-- drop Google Analytics Here -->
		<!-- end analytics -->
<link rel="stylesheet/less" type="text/css" href="<?php echo get_template_directory_uri(); ?>/library/less/style.less" />
<script>
  less = {
    env: "development",
    async: false,
    fileAsync: false,
    poll: 1000,
    functions: {},
    dumpLineNumbers: "comments"
  };
</script>

<script src="//cdnjs.cloudflare.com/ajax/libs/less.js/1.7.0/less.min.js"></script>
	</head>
<?
$home_url = home_url('/');
$blog_name = esc_attr(get_bloginfo('name', 'display'));
?>

	<body <?php body_class(); ?>>

		<div id="container">

			<header class="header" role="banner">
				<div id="topbar">
					<div id="inner-topbar" class="wrap clearfix">
						<div id="contact" class="first sevencol"><? echo do_shortcode("[smartblock id=157]"); ?></div><!-- /#contact -->
						<div id="social" class="fivecol"><div class="icons clearfix"><?php echo display_social_stickers(); ?></div></div><!-- /#social -->
					</div><!-- /#inner-topbar -->
				</div>
				<div id="inner-header" class="clearfix">
					<div id="logo">
						<div class="wrap">
							<a href="<?=$home_url; ?>" title="<?=$blog_name; ?>" rel="home"><? echo do_shortcode("[awesome_branding]"); ?></a>
						</div>
					</div>

					<nav role="navigation" class="top-margin clearfix">
						<div class="inner-nav wrap">
							<?php bones_main_nav(); ?>
						</div>
					</nav>

				</div> <!-- end #inner-header -->

			</header> <!-- end header -->
