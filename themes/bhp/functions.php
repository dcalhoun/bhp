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