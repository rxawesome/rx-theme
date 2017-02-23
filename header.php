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

	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

	<!-- wordpress head functions -->
	<?php wp_head(); ?>
	<!-- end of wordpress head -->
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
				<div id="contact" class="first sevencol"><? echo do_shortcode("[smartblock id=11]"); ?></div>
				<div id="social" class="fivecol"><div class="icons clearfix"><? echo display_social_stickers(); ?></div></div>
			</div>
		</div>

		<div id="inner-header" class="clearfix">
			<div id="logo" class="threecol first">
				<div class="wrap">
					<a href="<?=$home_url; ?>" title="<?=$blog_name; ?>" rel="home"><? echo do_shortcode("[awesome_branding]"); ?></a>
				</div>
			</div>

			<nav role="navigation" class="ninecol last">
				<div class="inner-nav wrap">
					<? bones_main_nav(); ?>
				</div>
			</nav>
		</div> <!-- end #inner-header -->

	</header> <!-- end header -->
