<?php
/**
 * The template for gallery posts.
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
<?php get_post_images();?>
<?php get_footer(); ?>