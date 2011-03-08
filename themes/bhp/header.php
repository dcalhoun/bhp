<!DOCTYPE html>
<html class="no-js">
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <title><?php bloginfo('site_title'); ?></title>
  <meta name="description" content="<?php bloginfo('description'); ?>" />
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
  
  <!-- ### Modernizr ### -->
  <script src="<?php bloginfo('template_directory'); ?>/assets/js/modernizr-1.7.min.js" type="text/javascript"></script>
  
  <!-- ### Stylesheets ### -->
  <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" media="all" />
  <link href='http://fonts.googleapis.com/css?family=Arvo:regular,italic,bold,bolditalic' rel='stylesheet' type='text/css'>
  <!--[if IE]>
  <link rel="stylesheet" href="<?php bloginfo('template_directory') ?>/assets/css/ie.css" type="all" />
  <![endif]-->
  <!--[if IE 7]>
  <link rel="stylesheet" href="<?php bloginfo('template_directory') ?>/assets/css/ie7.css" type="all" />
  <![endif]-->
  
  <!-- ### WordPress Head ### -->
  <?php wp_head(); ?>
  
</head>

<body <?php body_class(); ?>>
<div id="wrapper" class="container_12 clearfix">
  <header role="site" class="grid_12">
    <div class="grid_6 alpha">
      <h1 class="logo"><a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a></h1>
    </div>
    <?php wp_nav_menu( array( 'container' => 'nav', 'container_id' => 'primary-navigation', 'container_class' => 'grid_6 omega', 'theme_location' => 'primary_navigation' ) ); ?>
  </header>