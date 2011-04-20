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
    <?php
      //the_post_thumbnail(array(439,258), array('class' => 'thickborder'));
      $image_id = get_post_thumbnail_id();
      $featured_image = wp_get_attachment_url($image_id);
      $width = 439;
             
      if ($featured_image) {
        echo '<img src="' . get_bloginfo('template_directory') . '/phpthumb/phpThumb.php?src=' . $featured_image . '&w=' . $width . '&q=100&zc=1" class="thickborder" />';
      }
    ?>
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
