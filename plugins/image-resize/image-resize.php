<?php
/*
Plugin Name: Image Resize
Author: David Calhoun
Author URI:: http://davidcalhoun.me
Description: Simple phpThumb image resize plugin.
Version: 1.0
*/

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