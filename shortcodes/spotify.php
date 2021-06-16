<?php

/**
 * Spotify (Privacy Embed)
 * Create a privacy-friendly Spotify-Embed.
 * Shortcode: privacy-embed_spotify
 */

// exit if accessed directly
if (!defined('ABSPATH')) {
  exit;
}

if (!class_exists('PrivacyEmbedSpotifyShortcode')) {
  class PrivacyEmbedSpotifyShortcode
  {
    function __construct()
    {
      add_action('init', array($this, 'create_shortcode'));
      add_shortcode('privacy-embed_spotify', array($this, 'render_shortcode'));
    }

    public function render_shortcode($attributes, $content, $tag)
    {
      $attributes = (shortcode_atts(array(
        'title' => '',
        'spotify_url' => ''
      ), $attributes));

      // get title
      $title = esc_html($attributes['title']);

      // split spotify url and extract data
      $spotify_url = esc_html($attributes['spotify_url']);
      $spotify_url_parts = explode(":", $spotify_url);
      $spotify_type = $spotify_url_parts[1];
      $spotify_id = $spotify_url_parts[2];
      $spotify_embed_url = 'https://open.spotify.com/embed/' . $spotify_type . '/' . $spotify_id;

      // get preview image (thumbnail)
      $thumbnail_src = plugins_url('public/images/spotify_thumbnail.png', dirname(__FILE__));

      // get texts from settings
      $options = get_option('privacy-embed_settings-page', array());

      $embed_notice = esc_html($options['spotify_embed_notice']);
      $embed_notice_default = __('There is external content hidden here that would have to be loaded by Spotify. We have no influence on this external content and its provision. This means that we cannot say whether and to what extent your personal data is processed by Spotify (or, for example, whether so-called tracking takes place). You could find more information in Spotify\'s privacy policy. If you still want to load the content, this decision only applies to this individual content and only until the page is reloaded.', 'privacy-embed');
      $embed_notice = ($embed_notice == "" ? $embed_notice_default : $embed_notice);

      $embed_load = esc_html($options['spotify_embed_load']);
      $embed_load_default = __('Load content from Spotify anyway.', 'privacy-embed');
      $embed_load = ($embed_load == "" ? $embed_load_default : $embed_load);

      // set additional css class for episodes (other format)
      $additional_css_class = (in_array($spotify_type, array('episode', 'show')) ? 'spotify-episode' : '');

      // generate and return output (html)
      $output = '';

      // add title (if not empty)
      if ($title != '') $output .= '<h2>' . $title . '</h2>';

      // create overall div
      $output .= '<div><div class="spotify privacy-embed ' . $additional_css_class . '">';

      // add iframe
      $output .= '<iframe class="spotify privacy-embed-iframe" data-src="' . $spotify_embed_url . '"></iframe>';

      // add thumbnail
      $output .= '<img src="' . $thumbnail_src . '" alt="Spotify Thumbnail" class="spotify privacy-embed-thumbnail" />';

      // add privacy-notice
      $output .= '<p class="spotify privacy-embed-notice">
      ' . $embed_notice . '<br><br>
      <span class="spotify privacy-embed-load">' . $embed_load . '</span>
      </p>';

      // close overall div
      $output .= '</div></div>';

      // return everything
      return $output;
    }
  }

  new PrivacyEmbedSpotifyShortcode();
}
