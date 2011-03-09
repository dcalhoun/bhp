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
    <p class="info"><?php the_time(); ?> by <?php the_author(); ?></p>
    <?php the_content('Read More &raquo;'); ?>
    
  </article>
  
  <?php endwhile; ?>
  
  <nav class="posts-nav">
    <span class="next-posts"><?php next_posts_link( 'Older Posts' ) ?></span>
    <span class="previous-posts"><?php previous_posts_link( 'Newer Posts' ) ?></span>
  </nav>
  
<?php else : ?>

  <h2>Sorry...</h2>
  <p>No posts were found.</p>
  
<?php endif; ?>