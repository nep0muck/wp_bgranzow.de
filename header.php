<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!--<meta name="description" content="<?php bloginfo('description'); ?>">-->

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
		<div id="wrapper" class="wrapper">

			<!-- header -->
			<header id="sidebar-wrapper" class="" role="banner">

        <div class="sidebar-nav">
          <div class="sitebrand-header">
            <a href="<?php echo home_url(); ?>">
              <img class="alignnone size-full wp-image-185 portrait" title="Benjamin Granzow" src="<?php echo get_template_directory_uri(); ?>/img/anhaenger.png" alt="" width="170" height="170">
            </a>
            <h2 class="sidebar-brand">
              <a href="<?php echo home_url(); ?>">
                <?php bloginfo('name'); ?>
              </a>
            </h2>
          </div>
          <ul class="" role="navigation">
            <?php html5blank_nav(); ?>
          </ul>
        </div>

			</header>
			<!-- /header -->

      <div id="page-content-wrapper">
        <div class="container-fluid">
          <div class="row visible-sm-block visible-xs-block visible-md-block">
            <div class="col-lg-12 cards-vertical2">
              <div class="menu-toggle-icon">
                <a href="#menu-toggle" id="menu-toggle">
                  <span id="navicon"></span>
                </a>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="content col-lg-12">