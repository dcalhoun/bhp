<?php
/*
Plugin Name: Image Resize
Author: David Calhoun
Author URI:: http://davidcalhoun.me
Description: Simple phpThumb image resize plugin.
Version: 1.0
*/

/* When plugin is activated */
register_activation_hook(__FILE__,'install_image_resize');

/* When plugin is deactivation*/
register_deactivation_hook( __FILE__, 'remove_image_resize' );


/* Creates new database field */
function install_image_resize() {
  add_option("image_resize_data", 'Testing !! My Plugin is Working Fine.', 'This is my first plugin panel data.', 'yes');
}

/* Deletes the database field */
function remove_image_resize() {
  delete_option('image_resize_data');
}

/* Call the html code */
if ( is_admin() ){
  add_action('admin_menu', 'image_resize_admin_menu');

  function image_resize_admin_menu() {
    add_options_page('My First', 'My First Settings', 'administrator',
    'image-resize', 'image_resize_plugin_page');
  }
}

/* Call the Plugin Interface Page Code */
add_action('admin_menu', 'image_resize_admin_menu');

function image_resize_admin_menu() {
add_options_page('My First', 'My First Settings', 'administrator',
'image-resize', 'image_resize_plugin_page');
}

function image_resize_plugin_page() { ?>
  <div>
    <h2>My First Plugin Options Page</h2>
    <form method="post" action="options.php">
      <?php wp_nonce_field('update-options'); ?>
      <table width="510">
        <tr valign="top">
          <th width="92" scope="row">Enter Text:</th>
          <td width="406">
            <input name="image_resize_data" type="text" id="image_resize_data" value="<?php echo get_option('image_resize_data'); ?>" />(ex. Hello World)
          </td>
        </tr>
      </table>
      <input type="hidden" name="action" value="update" />
      <input type="hidden" name="page_options" value="image_resize_data" />
      <p><input type="submit" value="<?php _e('Save Changes') ?>" /></p>
    </form>
  </div>
<?php }

/* This calls image_resize() function when wordpress initializes.*/
function image_resize() {
  echo get_option('image_resize_data');
}

function getThumb($image, $width = null, $height = null) {
  if($width && $height) {
    $img = '<img style="height:'. $height .'px; width:'. $width .'px"src="'. home_url( '/' ) .'wp-content/plugins/image-resize/phpthumb/phpThumb.php?src='. $image . '&w='. $width .'&h='. $height .'&q=90&zc=1" />';
  } elseif ($width) {
    $img = '<img style="width:'. $width .'px"src="'. home_url( '/' ) .'wp-content/plugins/image-resize/phpthumb/phpThumb.php?src='. $image . '&w='. $width .'&q=90" />';    
  } elseif($height) {
    $img = '<img style="height:'. $height .'px; width:'. $width .'px"src="'. home_url( '/' ) .'wp-content/plugins/image-resize/phpthumb/phpThumb.php?src='. $image . '&h='. $height .'&q=90&" />';     
  }
  return $img;
}

?>