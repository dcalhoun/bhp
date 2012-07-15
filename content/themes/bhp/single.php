<?php
/**
 * The template for displaying single posts.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage By_Heart_Photography
 * @since By Heart Photography 1.0
 */

get_header(); ?>
<div class="grid_1">&nbsp;</div>
<div id="page" class="grid_11">
  <section class="grid_8 alpha">
  <?php get_template_part( 'loop', 'single' ); ?>
  </section>
  <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
