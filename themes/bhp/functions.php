<?php
/** 
 * By Heart Photography 1.0 Functions
 *
 * @author David Calhoun
 */

/** 
 * Register Navigation Menus
 */
if ( function_exists( 'register_nav_menus' ) ) {
	register_nav_menus(
		array(
		  'primary_navigation' => 'Primary Navigation',		  
		)
	);
}

/** 
 * Enable Post Thumbnails
 */
if ( function_exists( 'add_theme_support' ) ) { 
  add_theme_support( 'post-thumbnails' ); 
}