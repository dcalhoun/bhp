<?php
/**
 * Template Name: About
 *
 * The template for displaying the contact page.
 *
 * @package WordPress
 * @subpackage By_Heart_Photography
 * @since By Heart Photography 1.0
 */

get_header(); ?>
<div class="grid_1">&nbsp;</div>
<div id="page" class="grid_11">
  <div class="grid_6 alpha">
  <?php the_post_thumbnail(); ?>
  </div>
  <div class="grid_5 omega">
  <?php get_template_part( 'loop', 'page' ); ?>
  </div>
</div>
<?php get_footer(); ?>
