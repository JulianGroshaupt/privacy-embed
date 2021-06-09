<?php

// exit if accessed directly
if (!defined('ABSPATH')) {
  exit;
}

// require library
require_once('includes/PrivacyEmbedRationalOptionPages.php');

$pages = array(
  'privacy-embed_settings-page' => array(
    'page_title' => __('Privacy Embed Settings', 'privacy-embed'),
    'icon_url' => 'dashicons-shield',
    'sections' => array(
      'privacy-embed_youtube-section' => array(
        'title' => __('YouTube', 'privacy-embed'),
        'fields' => array(
          'youtube_embed_notice' => array(
            'title' => __('Embed Notice Message', 'privacy-embed'),
            'id' => 'youtube_embed_notice',
            'type' => 'textarea',
            'value' => __('Here is hidden external content that would have to be loaded from YouTube. We have no influence on this external content and its provision. This means that we cannot say whether and to what extent your personal data is processed by YouTube (or, for example, whether so-called tracking takes place). You can find more information in YouTube\'s privacy policy. If you still want to load the content, this decision only applies to this individual content and only until the page is reloaded.', 'privacy-embed')
          ),
          'youtube_embed_load' => array(
            'title' => __('Embed Load Text', 'privacy-embed'),
            'id' => 'youtube_embed_load',
            'type' => 'text',
            'value' => __('Load content from YouTube anyway.', 'privacy-embed')
          ),
        ),
      ),
      'privacy-embed_spotify-section' => array(
        'title' => __('Spotify', 'privacy-embed'),
        'fields' => array(
          'spotify_embed_notice' => array(
            'title' => __('Embed Notice Message', 'privacy-embed'),
            'id' => 'spotify_embed_notice',
            'type' => 'textarea',
            'value' => __('There is external content hidden here that would have to be loaded by Spotify. We have no influence on this external content and its provision. This means that we cannot say whether and to what extent your personal data is processed by Spotify (or, for example, whether so-called tracking takes place). You could find more information in Spotify\'s privacy policy. If you still want to load the content, this decision only applies to this individual content and only until the page is reloaded.', 'privacy-embed')
          ),
          'spotify_embed_load' => array(
            'title' => __('Embed Load Text', 'privacy-embed'),
            'id' => 'spotify_embed_load',
            'type' => 'text',
            'value' => __('Load content from Spotify anyway.', 'privacy-embed')
          ),
        ),
      ),
    ),
  ),
);

$option_page = new PrivacyEmbedRationalOptionPages($pages);
