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
    <article>
      <span class="quote">“I’d work with Haley again in a heartbeat. She captured so many awesome moments. Now I’ll be able to remember them forever.”</span>
      <span class="author">— Jane Doe</span>
    </article>
  </div>
  <nav id="social-links" class="grid_3 omega">
    <ul>
      <li><a href="http://twitter.com/photosbyheart" title="Follow me on Twitter" class="twitter">Twitter</a></li>
      <li><a href="http://www.facebook.com/photosbyheart" title="Like me on Facebook" class="facebook">Facebook</a></li>
      <li><a href="http://www.flickr.com/photos/byheartphotos" title="Follow me on Flickr" class="flickr">Flickr</a></li>
    </ul>
  </nav>
  <div id="slider-wrapper" class="grid_11 alpha omega">
    <div id="slider">
      <img src="<?php bloginfo('template_directory'); ?>/assets/images/temp/slide_01.jpg" />
    </div>
  </div>
  <?php get_template_part( 'loop', 'page' ); ?>
</div>
<?php get_footer(); ?>
