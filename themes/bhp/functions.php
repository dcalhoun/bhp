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

set_post_thumbnail_size( 198, 130, true );

/** 
 * Removed Post Types from Admin
 */
function remove_menus () {
global $menu;
	$restricted = array(__('Links'));
	end ($menu);
	while (prev($menu)){
		$value = explode(' ',$menu[key($menu)][0]);
		if(in_array($value[0] != NULL?$value[0]:"" , $restricted)){unset($menu[key($menu)]);}
	}
}
add_action('admin_menu', 'remove_menus');

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
  if ( $images ) {
    foreach ($images as $image) {
      $image_url = wp_get_attachment_url($image->ID);
      $thumb_url = wp_get_attachment_thumb_url($image->ID);
      //print_r($image);
      echo '<div class="photo-shadow"><div id="' . $image->post_name  . '" class="photo fancybox"><a href="' . $image_url . '" title="' . $image->post_excerpt . '" rel="fancybox-gallery"><img src="' . $thumb_url . '" alt="' . $image->post_title . '" width="198" height="130"/></a></div></div>';
    }
  } else {
    echo '<p>No images to display.</p>';
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
    'rewrite' => array( 'slug' => 'gallery', 'with_front' => false ),
    'capability_type' => 'post',
    'has_archive' => true, 
    'hierarchical' => false,
    'menu_position' => 4,
    'menu_icon' => null,
    'supports' => array( 'title', 'editor', 'thumbnail' ),
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
add_filter('manage_edit-gallery_columns', 'add_new_gallery_columns');
function add_new_gallery_columns($gallery_columns) {
  $new_columns['cb'] = '<input type="checkbox" />';
  $new_columns['title'] = _x('Title', 'column name');
  $new_columns['images'] = __('Images');
  $new_columns['styles'] = __('Styles');
  $new_columns['clients'] = __('Client');  
  $new_columns['date'] = _x('Date', 'column name');
  
  return $new_columns;
}
 
add_action( 'manage_gallery_posts_custom_column' , 'gallery_columns', 10, 2 );
function gallery_columns( $column, $id ) {

	global $post;
	global $wpdb;
	
	switch ( $column )
	{
    case 'id':
    	echo $id;
      break;
    case 'images':
    	$image_count = $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) FROM $wpdb->posts WHERE post_parent = {$id};"));
    	echo $image_count;
    	break;
		case 'styles':
			$terms = get_the_term_list( $post->ID , 'style' , '' , ',' , '' );
			if ( is_string( $terms ) ) {
				echo $terms;
			} else {
				echo 'Unable to get styles.';
			}
			
			break;
		case 'clients':
			$terms = get_the_term_list( $post->ID , 'client' , '' , ',' , '' );
			if ( is_string( $terms ) ) {
				echo $terms;
			} else {
				echo 'Unable to get clients.';
			}
			break;
		default:
			break;
	}
}

/** 
 * Taxonomy Term Listing with Featured Image
 */
function get_taxonomy_terms_featured_image($taxonomy, $post_type) {
  // Get list of taxonomy terms
  $terms = get_terms($taxonomy);
  
  // Get first post from each taxonomy term
  if ($terms) {
    foreach($terms as $term) {
      //print_r($term);
      $slug = $term->slug;
      $args = array(
      	'tax_query' => array(
        		array(
        			'taxonomy' => 'style',
        			'field'    => 'slug',
        			'terms'    => $slug
        		)
      		),
      		'posts_per_page' => 1      		    	  
      	);
      	
      // Loop to get post's featured image
      $custom_query = new WP_Query($args);
      if ( $custom_query->have_posts() ) : while ( $custom_query->have_posts() ) : $custom_query->the_post();
        $image_id = get_post_thumbnail_id();
        $thumb_url = wp_get_attachment_thumb_url($image_id);
        echo '<div class="photo-shadow"><div id="' . $term->slug  . '" class="photo"><a href="' . get_bloginfo('url') . '/' . $taxonomy . '/' . $term->slug . '" title="' . $term->name . '"><img src="' . $thumb_url . '" alt="' . $image->post_title . '" width="198" height="130"/><span class="label">' . $term->name . '</span></a></div></div>';        
      endwhile; endif;
    }
  } else {
    echo '<p>No galleries found.</p>';
  }
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

/** 
 * Add Taxonomy Filters to Gallery Admin Panel
 */
add_action( 'restrict_manage_posts', 'gallery_restrict_manage_posts' );
function gallery_restrict_manage_posts() {
	global $typenow;
	if( $typenow == 'gallery' ){
	  $args = array(
	    'public' => true,
	    '_builtin' => false
	  );
	  $output = 'names';
		$filters = get_taxonomies( $args, $output );
		foreach ($filters as $tax_slug) {
			$tax_obj = get_taxonomy($tax_slug);
			$tax_name = $tax_obj->labels->name;
			$terms = get_terms($tax_slug);
			echo "<select name='$tax_slug' id='$tax_slug' class='postform'>";
			echo "<option value=''>Show All $tax_name</option>";
			foreach ($terms as $term) { echo '<option value='. $term->slug, $_GET[$tax_slug] == $term->slug ? ' selected="selected"' : '','>' . $term->name .' (' . $term->count .')</option>'; }
			echo "</select>";
		}
	}
}

/** 
 * Gravity Forms Scripts
 */
if(!is_admin()){

    wp_enqueue_script("gforms_ui_datepicker", plugins_url("gravityforms/js/jquery-ui/ui.datepicker.js"), array("jquery"), "1.3.9", true);

    wp_enqueue_script("gforms_datepicker", plugins_url("gravityforms/js/datepicker.js"), array("gforms_ui_datepicker"), "1.3.9", true);

    wp_enqueue_script("gforms_conditional_logic_lib", plugins_url("gravityforms/js/conditional_logic.js"), array("gforms_ui_datepicker"), "1.3.9", true);

    wp_enqueue_style("gforms_css", plugins_url("gravityforms/css/forms.css"));
}