<?php
/**
 * Template Name: Contact
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
  <div class="grid_5 alpha">
  <?php get_template_part( 'loop', 'page' ); ?>
  </div>
  <div class="grid_6 omega">
  <?php gravity_form(1, false, false, false, '', true); ?>
  </div>
</div>
<?php get_footer(); ?>
