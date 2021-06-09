<?php

/**
 * YouTube (Privacy Embed)
 * Create a privacy-friendly Youtube-Embed.
 * Shortcode: privacy-embed_youtube
 */

// exit if accessed directly
if (!defined('ABSPATH')) {
  exit;
}

if (!class_exists('PrivacyEmbedYouTubeShortcode')) {
  class PrivacyEmbedYouTubeShortcode
  {
    function __construct()
    {
      add_action('init', array($this, 'create_shortcode'));
      add_shortcode('privacy-embed_youtube', array($this, 'render_shortcode'));
    }

    public function render_shortcode($attributes, $content, $tag)
    {
      $attributes = (shortcode_atts(array(
        'title' => '',
        'youtube_link' => ''
      ), $attributes));

      // extract title
      $title = esc_html($attributes['title']);

      // extract youtube link
      $youtube_link_url = esc_html($attributes['youtube_link']);

      // extract video id
      parse_str(parse_url($youtube_link_url, PHP_URL_QUERY), $query_output);
      $youtube_video = $query_output['v'];

      // generate embed url
      $youtube_embed_url = 'https://www.youtube.com/embed/' . $youtube_video;

      // check if thumbnail already exists
      $filename = $youtube_video . '.jpg';
      $media_id = privacy_embed__does_file_exists($filename);

      // thumbnail unknown -> create
      if ($media_id == 0) {
        // get thumbnail
        $thumbnail_url = 'https://i3.ytimg.com/vi/' . $youtube_video . '/hqdefault.jpg';
        $thumbnail_data = file_get_contents($thumbnail_url);

        // add media in wordpress
        $media_id = privacy_embed__add_jpg_to_wordpress_media($thumbnail_data, $filename, 'Thumbnail for YouTube Video ' . $youtube_video);
      }

      // get thumbnail from media
      $thumbnail_wordpress = wp_get_attachment_image_src($media_id);

      // get texts from settings
      $options = get_option('privacy-embed_settings-page', array());

      $embed_notice = esc_html($options['youtube_embed_notice']);
      $embed_notice_default = __('Here is hidden external content that would have to be loaded from YouTube. We have no influence on this external content and its provision. This means that we cannot say whether and to what extent your personal data is processed by YouTube (or, for example, whether so-called tracking takes place). You can find more information in YouTube\'s privacy policy. If you still want to load the content, this decision only applies to this individual content and only until the page is reloaded.', 'privacy-embed');
      $embed_notice = ($embed_notice == "" ? $embed_notice_default : $embed_notice);

      $embed_load = esc_html($options['youtube_embed_load']);
      $embed_load_default = __('Load content from YouTube anyway.', 'privacy-embed');
      $embed_load = ($embed_load == "" ? $embed_load_default : $embed_load);

      // generate and return output (html)
      $output = '';

      // add title (if not empty)
      if ($title != '') $output .= '<h2>' . $title . '</h2>';

      // create overall div
      $output .= '<div><div class="youtube privacy-embed">';

      // add iframe
      $output .= '<iframe class="youtube privacy-embed-iframe" data-src="' . $youtube_embed_url . '"></iframe>';

      // add thumbnail
      $output .= '<img src="' . $thumbnail_wordpress[0] . '" alt="YouTube Video Thumbnail" class="youtube privacy-embed-thumbnail" />';

      // add privacy-notice
      $output .= '<p class="youtube privacy-embed-notice">
      ' . $embed_notice . '<br><br>
      <span class="youtube privacy-embed-load">' . $embed_load . '</span>
      </p>';

      // close overall div
      $output .= '</div></div>';

      // return everything
      return $output;
    }
  }

  new PrivacyEmbedYouTubeShortcode();
}
