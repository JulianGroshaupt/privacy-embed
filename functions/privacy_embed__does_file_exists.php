<?php

/**
 * Function to check wheather a file with a given filename exists in the media library.
 * 
 * @param $filename the name of the file
 * 
 * @return int the id of the media item (0 if the item was not found)  
 */

// exit if accessed directly
if (!defined('ABSPATH')) {
  exit;
}

if (!function_exists('privacy_embed__does_file_exists')) {
  function privacy_embed__does_file_exists($filename)
  {
    global $wpdb;
    return intval($wpdb->get_var("SELECT post_id FROM {$wpdb->postmeta} WHERE meta_value LIKE '%/$filename'"));
  }
}
