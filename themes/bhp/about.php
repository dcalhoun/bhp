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

<?php if ( has_post_thumbnail() ) { ?>
  <div class="grid_6 alpha">
    <div class="featured-image">
    <?php the_post_thumbnail(array(439,258), array('class' => 'thickborder')); ?>
    </div>
  </div>
  <div class="grid_5 omega">
  <?php get_template_part( 'loop', 'page' ); ?>
  </div>
<?php } else {
  get_template_part( 'loop', 'page' );
}
?>

</div>
<?php get_footer(); ?>
