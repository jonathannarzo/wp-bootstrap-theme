<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta name="viewport" content="width=device-width">
		<title><?php bloginfo('name'); ?></title>
		<?php wp_head(); ?>
	</head>
<body <?php body_class(); ?>>

<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="<?php echo home_url(); ?>">Company</a>
		</div><!-- /.navbar-header -->
		<?php
			$args = array(
				'theme_location' => 'primary',
				'container' => 'div',
				'container_class' => 'navbar-collapse collapse',
				'container_id' => 'navbar',
				'menu_class' => 'nav navbar-nav',
				'menu_id' => '',
				'walker' => new Twbs_Walker()
			);
			wp_nav_menu($args);
		?>
	</div><!-- /.container -->
</nav><!-- /.navbar -->

<div class="container">