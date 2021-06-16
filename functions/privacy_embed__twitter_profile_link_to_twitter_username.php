<?php

/**
 * Converts a link to a twitter profile into an username.
 * 
 * @param $twitter_link the link to the profile of a user
 * 
 * @return string the username the profile belongs to 
 */

// exit if accessed directly
if (!defined('ABSPATH')) {
  exit;
}

if (!function_exists('privacy_embed__twitter_profile_link_to_twitter_username')) {
  function privacy_embed__twitter_profile_link_to_twitter_username($twitter_link)
  {
    $url_parts = explode('/', $twitter_link);
    if (substr($twitter_link, -1) == '/') {
      $url_parts = array_slice($url_parts, 0, -1);
    }
    return end($url_parts);
  }
}
