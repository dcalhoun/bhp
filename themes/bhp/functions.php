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
  global $wp_query;
  $args = array(
    'post_parent' => $wp_query->post->ID,
    'post_status' => 'attachment',
    'post_mime_type' => 'image',
    'order' => 'ASC',
    'orderby' => 'menu_order ID'
  );
  $images = get_children($args);
  foreach ($images as $image) {
    $image_url = wp_get_attachment_url($image->ID);
    $thumb_url = wp_get_attachment_thumb_url($image->ID);
    //print_r($image);
    echo '<div id="' . $image->post_name  . '" class="grid_3 photo"><a href="' . $image_url . '" title="' . $image->post_excerpt . '" rel="fancybox-gallery"><img src="' . $thumb_url . '" alt="' . $image->post_title . '"/></a></div>';
  }
};

/** 
 * Register Sidebars
 */
function register_widgets() {
	// Area 1, located at the top of the sidebar.
	register_sidebar( array(
		'name' => 'Primary Widget Area',
		'id' => 'primary-widget-area',
		'description' => 'The primary widget area.',
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 2, located below the Primary Widget Area in the sidebar. Empty by default.
	register_sidebar( array(
		'name' => 'Secondary Widget Area',
		'id' => 'secondary-widget-area',
		'description' => 'The secondary widget area.',
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}

/** Register sidebars by running twentyten_widgets_init() on the widgets_init hook. */
add_action( 'widgets_init', 'register_widgets' );

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
    'supports' => array( 'title', 'editor', 'thumbnail' ),
//    'register_meta_box_cb' => 'book_meta_box',
    'taxonomies' => array( 'style', 'client' )
  );
  
  register_post_type( 'gallery', $args);
}

/** 
 * Add Icon to Gallery Post Type
 */
add_action( 'admin_head', 'gallery_icon' );
function gallery_icon() { ?>
  <style type="text/css" media="screen">
      #menu-posts-gallery .wp-menu-image {
          background: url(<?php bloginfo('template_url') ?>/assets/images/images-stack.png) no-repeat 6px -17px !important;
      }
    	#menu-posts-gallery:hover .wp-menu-image, #menu-posts-gallery.wp-has-current-submenu .wp-menu-image {
          background-position:6px 7px!important;
      }
      /*.icon32-posts-gallery {
        background: url(<?php bloginfo('template_url') ?>/assets/images/images-stack.png) no-repeat 6px 7px !important;
      }*/
  </style>
<?php }

/** 
 * Add Columns to Manage Galleries
 */
/*add_filter('manage_edit-gallery_columns', 'add_new_gallery_columns');
function add_new_gallery_columns($gallery_columns) {
  $new_columns['cb'] = '<input type="checkbox" />';
  $new_columns['title'] = _x('Title', 'column name');
  $new_columns['images'] = __('Images');
  $new_columns['styles'] = __('Styles');
  $new_columns['clients'] = __('Client');  
  $new_columns['date'] = _x('Date', 'column name');
  
  return $new_columns;
}
// Add to admin_init function
add_action('manage_gallery_posts_custom_column', 'manage_gallery_columns', 10, 2);

function manage_gallery_columns($column_name, $id) {
  global $wpdb;
  switch ($column_name) {
  case 'id':
  	echo $id;
          break;
  
  case 'images':
  	// Get number of images in gallery
  	$num_images = $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) FROM $wpdb->posts WHERE post_parent = {$id};"));
  	echo $num_images; 
  	break;
  default:
  	break;
  } // end switch
}*/

/** 
 * Add Columns to Manage Galleries
 */
/*add_filter('manage_edit-gallery_columns', 'add_new_gallery_columns');
function add_new_gallery_columns($gallery_columns) {
 $new_columns['cb'] = '<input type="checkbox" />';
 $new_columns['title'] = _x('Title', 'column name');
 $new_columns['images'] = __('Images');
 $new_columns['styles'] = __('Styles');
 $new_columns['clients'] = __('Client');  
 $new_columns['date'] = _x('Date', 'column name');
 
 return $new_columns;
}
 
add_action( 'manage_gallery_posts_custom_column' , 'gallery_columns' );
function gallery_columns( $column ) {

	global $post;
	
	switch ( $column )
	{
		case 'gallery_image_count':
			// Get number of images in gallery
			$image_count = $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) FROM $wpdb->posts WHERE post_parent = {$id};"));
			echo $image_count; 
			break;
		default:
			break;
		case 'gallery_styles':
			$terms = get_the_term_list( $post->ID , 'gallery_styles' , '' , ',' , '' );
			if ( is_string( $terms ) ) {
				echo $terms;
			} else {
				echo 'Unable to get styles';
			}
			
			break;
		case 'gallery_clients':
			$terms = get_the_term_list( $post->ID , 'gallery_clients' , '' , ',' , '' );
			if ( is_string( $terms ) ) {
				echo $terms;
			} else {
				echo 'Unable to get client';
			}
			
			break;
	}
}*/
 
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
