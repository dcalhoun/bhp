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

/** 
 * Retrieve Images Attached to a Post
 */
function get_post_images() {
  $images = get_children( array(
                    'post_parent' => $post->ID,
                    'post_status' => 'attachment',
                    'post_mime_type' => 'image',
                    'order' => 'ASC',
                    'orderby' => 'menu_order ID'));
  foreach ($images as $image) {
    $full_img_url = wp_get_attachment_url($image->ID);
    $split_pos = strpos($full_img_url, 'wp-content');
    $split_len = (strlen($full_img_url) - $split_pos);
    $abs_img_url = substr($full_img_url, $split_pos, $split_len);
    $full_info = @getimagesize(ABSPATH.$abs_img_url);
    echo '<img src="' . '/' . $abs_img_url . '" title="Image"/>';
  }
};

/** 
 * Register Gallery Post Type
 */
add_action('init', 'create_galleries');
function create_galleries() {
  $labels = array(
    'name' => __( 'Galleries' ),
    'singular_name' => __( 'Gallery' ),
    'add_new' => __( 'Add New' ),
    'add_new_item' => __( 'Add New Gallery' ),
    'edit_item' => __( 'Edit Gallery' ),
    'new_item' => __( 'New Gallery' ),
    'view_item' => __( 'View Gallery' ),
    'search_items' => __( 'Search Gallery' ),
    'not_found' => __( 'No galleries found' ),
    'not_found_in_trash' => __( 'No galleries found in Trash' ), 
    'parent_item_colon' => __( 'Parent Gallery:' ),
    'menu_name' => __( 'Galleries' )
  );
  
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => array( 'slug' => 'gallery' ),
    'capability_type' => 'post',
    'has_archive' => true, 
    'hierarchical' => false,
    'menu_position' => 4,
    'menu_icon' => null,
    'supports' => array( 'title', 'editor', 'thumbnail', 'comments' ),
//    'register_meta_box_cb' => 'book_meta_box',
    'taxonomies' => array( 'style', 'client' )
  );
  
  register_post_type( 'gallery', $args);
}

/** 
 * Register Client Taxonomy
 */
add_action('init', 'create_client_taxonomies');
function create_client_taxonomies() {
 $labels = array(
   'name' => __( 'Clients' ),
   'singular_name' => __( 'Client' ),
   'search_items' => __( 'Search Clients' ),
   'all_items' => __( 'All Clients' ),
   'parent_item' => __( 'Parent Client' ),
   'parent_item_colon' => __( 'Parent Client:' ),
   'edit_item' => __( 'Edit Client' ), 
   'update_item' => __( 'Update Client' ),
   'add_new_item' => __( 'Add New Client' ),
   'new_item_name' => __( 'New Client Name' ),
   'menu_name' => __( 'Clients' ),
 );
 
 register_taxonomy( 'client', array( 'gallery' ), array(
   'labels' => $labels,
   'hierarchical' => true,
   'show_ui' => true,
   'query_var' => true,
   'rewrite' => array( 'slug' => 'client' )
 ) );
}

/** 
 * Register Style Taxonomy
 */
add_action('init', 'create_style_taxonomies');
function create_style_taxonomies() {
  $labels = array(
    'name' => __( 'Styles' ),
    'singular_name' => __( 'Style' ),
    'search_items' => __( 'Search Styles' ),
    'all_items' => __( 'All Styles' ),
    'parent_item' => __( 'Parent Style' ),
    'parent_item_colon' => __( 'Parent Style:' ),
    'edit_item' => __( 'Edit Style' ), 
    'update_item' => __( 'Update Style' ),
    'add_new_item' => __( 'Add New Style' ),
    'new_item_name' => __( 'New Style Name' ),
    'menu_name' => __( 'Styles' ),
  );
  
  register_taxonomy( 'style', array( 'gallery' ), array(
    'labels' => $labels,
    'hierarchical' => true,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'style' )
  ) );
}
