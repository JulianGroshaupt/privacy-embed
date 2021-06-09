<?php

/**
 * Spotify (Privacy Embed)
 * Visual Component for WPBakery.
 */

// exit if accessed directly
if (!defined('ABSPATH')) {
  exit;
}

if (!class_exists('VcPrivacyEmbedSpotify')) {
  class VcPrivacyEmbedSpotify extends WPBakeryShortCode
  {
    function __construct()
    {
      vc_map(array(
        'name' => __('Spotify (Privacy Embed)', 'privacy-embed'),
        'base' => 'privacy-embed_spotify',
        'category' => __('Privacy Modules', 'privacy-embed'),
        'params' => array(
          array(
            'type' => 'textfield',
            'class' => '',
            'heading' => __('Title', 'privacy-embed'),
            'param_name' => 'title',
            'description' => __('The title above the embed', 'privacy-embed'),
            'holder' => 'div'
          ),
          array(
            'type' => 'textfield',
            'class' => '',
            'heading' => __('Spotify Code (URL)', 'privacy-embed'),
            'param_name' => 'spotify_url',
            'description' => __('Something like "spotify:album:1DFixLWuPkv3KT3TnV35m3"', 'privacy-embed'),
            'holder' => 'div'
          )
        )
      ));
    }
  }

  new  VcPrivacyEmbedSpotify();
}
