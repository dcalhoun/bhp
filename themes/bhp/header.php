<!DOCTYPE html>
<html>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <title><?php wp_title('|', true, 'right'); ?></title>
  <meta name="description" content="<?php bloginfo('description'); ?>" />
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
  
  <!-- ### Modernizr ### -->
  <script src="<?php bloginfo('template_directory'); ?>/assets/js/modernizr-1.6.min.js" type="text/javascript"></script>
  
  <!-- ### Stylesheets ### -->
  <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" media="all" />
  <!--[if IE]>
  <link rel="stylesheet" href="<?php bloginf('template_directory') ?>/assets/css/ie.css" type="all" />
  <![endif]-->
  <!--[if IE 7]>
  <link rel="stylesheet" href="<?php bloginf('template_directory') ?>/assets/css/ie7.css" type="all" />
  <![endif]-->
  
  <!-- ### WordPress Head ### -->
  <?php wp_head(); ?>
  
</head>

<body <?php body_class(); ?>>
<div id="wrapper" class="container_12">
  <header id="site">
    <h1><a href="<?php home_url('/'); ?>" title="<?php wp_title(); ?>"><?php bloginfo('name'); ?></a></h1>
    <nav id="primary">
      <?php wp_nav_menu(); ?>
    </nav>
  </header>