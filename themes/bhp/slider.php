<?php
/**
 * Template Name: Home
 *
 * The template for displaying the contact page.
 *
 * @package WordPress
 * @subpackage By_Heart_Photography
 * @since By Heart Photography 1.0
 */

get_header(); ?>
<div class="grid_1">&nbsp;
  <div class="floating-hearts"></div>
</div>
<div id="page" class="grid_11">
  <div id="client-testimonials" class="grid_8 alpha">
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>      
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <?php the_content(''); ?>
    </article>
  <?php endwhile; endif; ?>
  </div>
  <nav id="social-links" class="grid_3 omega">
    <ul>
      <li><a href="http://twitter.com/ha1eyrobin" title="Follow me on Twitter" class="twitter">Twitter</a></li>
      <li><a href="http://www.facebook.com/photosbyheart" title="Like me on Facebook" class="facebook">Facebook</a></li>
      <li><a href="http://www.flickr.com/photos/haleyrobin" title="Follow me on Flickr" class="flickr">Flickr</a></li>
    </ul>
  </nav>
  <div id="slider-wrapper" class="grid_11 alpha omega">
    <div id="slider">
      <ul id="slides">
        <li><img src="<?php bloginfo('template_directory'); ?>/assets/images/temp/slide_01.jpg" /></li>
        <li><img src="<?php bloginfo('template_directory'); ?>/assets/images/temp/slide_01.jpg" /></li>
        <li><img src="<?php bloginfo('template_directory'); ?>/assets/images/temp/slide_01.jpg" /></li>
        <li><img src="<?php bloginfo('template_directory'); ?>/assets/images/temp/slide_01.jpg" /></li>
        <li><img src="<?php bloginfo('template_directory'); ?>/assets/images/temp/slide_01.jpg" /></li>
      </ul>
    </div>
  </div>
</div>
<?php get_footer(); ?>
