<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">

		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
	<?php //do_action('masterui_before_header'); ?>
	<?php //do_action('masterui_after_header'); ?>
		<div id="main">
			<?php masterui_header(); ?>