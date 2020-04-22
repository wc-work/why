<!doctype html>
<html <?php language_attributes(); ?> class="no-js">

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

	<link href="//www.google-analytics.com" rel="dns-prefetch">
	<link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
	<link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">

	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<meta name="description" content="<?php bloginfo('description'); ?>">

	<?php wp_head(); ?>
	<script>
		// conditionizr.com
		// configure environment tests
		conditionizr.config({
			assets: '<?php echo get_template_directory_uri(); ?>',
			tests: {}
		});

	</script>

</head>

<body <?php body_class(); ?>>

	<!-- wrapper -->
	<div class="wrapper container-fluid">

		<!-- header -->
		<header class="header clear">
			<div class="custom-logo-big">
				<!-- Dynamic Logo -->
				<?php
				if ( function_exists( 'the_custom_logo' ) ) {
					the_custom_logo(); 
				}
				?>
			</div>
			<nav class="navbar navbar-expand-md navbar-light custom-nav" role="navigation">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="custom-logo-small">
					<!-- Dynamic Logo -->
					<?php
					if ( function_exists( 'the_custom_logo' ) ) {
						the_custom_logo(); 
					}
					?>
				</div>
				<button class="navbar-toggler" type="button" data-toggle="collapse"
					data-target="#navbar-collapse-1" aria-controls="navbar-collapse-1"
					aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<?php
					wp_nav_menu( array(
						'theme_location'    => 'primary',
						'depth'             => 1,
						'container'         => 'div',
						'container_class'   => 'collapse navbar-collapse',
						'container_id'      => 'navbar-collapse-1',
						'menu_class'        => 'navbar-nav',
						'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
						'walker'            => new WP_Bootstrap_Navwalker(),
					) );
				?>
			</nav>
		</header>
		<!-- /header -->