<?php
  if ( have_posts() ) : while ( have_posts() ) : the_post();
  echo wp_get_attachment_image($post->ID, large);
  endwhile; endif;
?>