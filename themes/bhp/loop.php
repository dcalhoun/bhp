<?php
/**
 * The default loop for displaying content.
 *
 * The loop displays the posts and the post content.  See
 * http://codex.wordpress.org/The_Loop to understand it and
 * http://codex.wordpress.org/Template_Tags to understand
 * the tags used in it.
 *
 * This can be overridden in child themes with loop-single.php.
 *
 * @package WordPress
 * @subpackage By_Heart_Photography
 * @since By Heart Photography 1.0
 */
?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  
    <h1><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
    <div class="date">
      <span class="month"><?php the_time('M'); ?></span>
      <span class="day"><?php the_time('d'); ?></span>
    </div>
    <a href="<?php the_permalink(); ?>#comments" title="Leave a comment" class="comment-count"><?php comments_number('Leave a comment', '1 Comment', '% Comments'); ?></a>
    <?php
      $image_id = get_post_thumbnail_id();  
      $image_url = wp_get_attachment_image_src($image_id,'large');
      $image_url = $image_url[0];
      echo getThumb($image_url, 620, 275);
    ?>
    <?php the_content('Read the rest...'); ?>  
    
  </article>
  
  <?php endwhile; ?>
  
  <nav class="posts-nav">
    <?php wp_pagenavi(); ?>
  </nav>
  
<?php else : ?>

  <h2>Sorry...</h2>
  <p>No posts were found.</p>
  
<?php endif; ?>