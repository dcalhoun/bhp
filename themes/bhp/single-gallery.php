<?php
/**
 * The template for single gallery posts.
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
<div id="page" class="grid_11 textcenter">
  <div class="grid_1 alpha">&nbsp;</div>
  <div class="grid_10 omega">
  <?php get_post_images();?>
  </div>
</div>
<?php get_footer(); ?>