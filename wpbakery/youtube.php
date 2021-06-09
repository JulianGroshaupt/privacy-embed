<?php

/**
 * Youtube (Privacy Embed)
 * Visual Component for WPBakery.
 */

// exit if accessed directly
if (!defined('ABSPATH')) {
  exit;
}

if (!class_exists('VcPrivacyEmbedYouTube')) {
  class VcPrivacyEmbedYouTube extends WPBakeryShortCode
  {
    function __construct()
    {
      vc_map(array(
        'name' => __('YouTube (Privacy Embed)', 'privacy-embed'),
        'base' => 'privacy-embed_youtube',
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
            'heading' => __('YouTube Link', 'privacy-embed'),
            'param_name' => 'youtube_link',
            'description' => __('The link to the youtube video', 'privacy-embed'),
            'holder' => 'div'
          )
        )
      ));
    }
  }

  new VcPrivacyEmbedYouTube();
}
