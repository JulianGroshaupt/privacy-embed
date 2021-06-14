<?php

/**
 * Converts a link to a twitter hashtag into an hashtag.
 * 
 * @param $twitter_link the link to the hashtag
 * 
 * @return string the hashtag 
 */

// exit if accessed directly
if (!defined('ABSPATH')) {
  exit;
}

if (!function_exists('privacy_embed__twitter_hashtag_link_to_twitter_hashtag')) {
  function privacy_embed__twitter_hashtag_link_to_twitter_hashtag($twitter_link)
  {
    $url_parts = explode('/', $twitter_link);
    if (substr($twitter_link, -1) == '/') {
      $url_parts = array_slice($url_parts, 0, -1);
    }
    return end($url_parts);
  }
}
