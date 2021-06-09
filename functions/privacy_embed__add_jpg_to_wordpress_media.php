<?php

/**
 * Function adding an image (jpg) to the wordpress media library.
 * 
 * @param $file_data the jpg-file to add to the media library
 * @param $filename the name of the file
 * @param $title the title of the image
 * 
 * @return int the id of the created media item
 */

// exit if accessed directly
if (!defined('ABSPATH')) {
  exit;
}

if (!function_exists('privacy_embed__add_jpg_to_wordpress_media')) {
  function privacy_embed__add_jpg_to_wordpress_media($file_data, $filename, $title)
  {
    // set file in upload directory
    $upload_dir = wp_upload_dir();
    if (wp_mkdir_p($upload_dir['path'])) {
      $file = $upload_dir['path'] . '/' . $filename;
    } else {
      $file = $upload_dir['basedir'] . '/' . $filename;
    }

    // upload file
    file_put_contents($file, $file_data);
    $wp_filetype = wp_check_filetype($filename, null);
    $attachment = array(
      'post_mime_type' => $wp_filetype['type'],
      'post_title' => $title,
      'post_content' => '',
      'post_status' => 'inherit'
    );
    $attach_id = wp_insert_attachment($attachment, $file);
    require_once(ABSPATH . 'wp-admin/includes/image.php');
    $attach_data = wp_generate_attachment_metadata($attach_id, $file);
    wp_update_attachment_metadata($attach_id, $attach_data);

    return $attach_id;
  }
}
