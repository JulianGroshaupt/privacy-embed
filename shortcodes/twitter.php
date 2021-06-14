<?php

/**
 * Twitter (Privacy Embed)
 * Create a privacy-friendly Twitter-Embed.
 * Shortcode: privacy-embed_twitter
 */

// exit if accessed directly
if (!defined('ABSPATH')) {
  exit;
}

if (!class_exists('PrivacyEmbedTwitterShortcode')) {
  class PrivacyEmbedTwitterShortcode
  {
    function __construct()
    {
      add_action('init', array($this, 'create_shortcode'));
      add_shortcode('privacy-embed_twitter', array($this, 'render_shortcode'));
    }

    public function render_shortcode($attributes, $content, $tag)
    {
      $attributes = (shortcode_atts(array(
        'title' => '',
        'twitter_link' => '',
        'twitter_type' => ''
      ), $attributes));

      // get title
      $title = esc_html($attributes['title']);

      // get twitter specific attributes
      $twitter_link = esc_html($attributes['twitter_link']);
      $twitter_type = esc_html($attributes['twitter_type']);

      // validate type
      if ($twitter_type == '') {
        $error_message = __('error: no type for this twitter embed specified', 'privacy-embed');
        return '<p>' . $error_message . '</p>';
      }

      // get preview image (thumbnail)
      $thumbnail_src = plugins_url('public/images/twitter_thumbnail.jpg', dirname(__FILE__));

      // get texts from settings
      $options = get_option('privacy-embed_settings-page', array());

      $embed_notice = esc_html($options['twitter_embed_notice']);
      $embed_notice_default = __('There is external content hidden here that would have to be loaded by Twitter. We have no influence on this external content and its provision. This means that we cannot say whether and to what extent your personal data is processed by Twitter (or, for example, whether so-called tracking takes place). You could find more information in Twitter\'s privacy policy. If you still want to load the content, this decision only applies until the page is reloaded.', 'privacy-embed');
      $embed_notice = ($embed_notice == "" ? $embed_notice_default : $embed_notice);

      $embed_load = esc_html($options['twitter_embed_load']);
      $embed_load_default = __('Load content from Twitter anyway.', 'privacy-embed');
      $embed_load = ($embed_load == "" ? $embed_load_default : $embed_load);

      $twitter_follow_button = esc_html($options['twitter_follow_button']);
      $twitter_follow_button_default = __('Follow @', 'privacy-embed');
      $twitter_follow_button = ($twitter_follow_button == "" ? $twitter_follow_button_default : $twitter_follow_button);

      $twitter_mention_button = esc_html($options['twitter_mention_button']);
      $twitter_mention_button_default = __('Tweet to @', 'privacy-embed');
      $twitter_mention_button = ($twitter_mention_button == "" ? $twitter_mention_button_default : $twitter_mention_button);

      $twitter_hashtag_button = esc_html($options['twitter_hashtag_button']);
      $twitter_hashtag_button_default = __('Tweet #', 'privacy-embed');
      $twitter_hashtag_button = ($twitter_hashtag_button == "" ? $twitter_hashtag_button_default : $twitter_hashtag_button);

      // generate twitter_html depending on twitter_type
      $twitter_html = '';
      $show_embed = true;
      switch ($twitter_type) {
        case 'tweet':
          $twitter_html = '<blockquote class="twitter-tweet"><a href="' . $twitter_link . '"></a></blockquote>';
          break;
        case 'timeline':
          $twitter_username = privacy_embed__twitter_profile_link_to_twitter_username($twitter_link);
          $twitter_html = '<a class="twitter-timeline" href="https://twitter.com/' . $twitter_username . '"></a>';
          break;
        case 'follow-button':
          $show_embed = false;
          $twitter_username = privacy_embed__twitter_profile_link_to_twitter_username($twitter_link);
          $twitter_html = '<a href="https://twitter.com/' . $twitter_username . '" target="_blank" class="twitter-follow-button" data-show-count="false">' . $twitter_follow_button . $twitter_username . '</a>';
          break;
        case 'mention-button':
          $show_embed = false;
          $twitter_username = privacy_embed__twitter_profile_link_to_twitter_username($twitter_link);
          $twitter_html = '<a href="https://twitter.com/intent/tweet?screen_name=' . $twitter_username . '" target="_blank" class="twitter-mention-button" data-show-count="false">' . $twitter_mention_button . $twitter_username . '</a>';
          break;
        case 'hashtag-button':
          $show_embed = false;
          $twitter_hashtag = privacy_embed__twitter_hashtag_link_to_twitter_hashtag($twitter_link);
          $twitter_html = '<a href="https://twitter.com/intent/tweet?button_hashtag=' . $twitter_hashtag . '" target="_blank" class="twitter-hashtag-button" data-show-count="false">' . $twitter_hashtag_button . $twitter_hashtag . '</a>';
          break;
        default:
          return '';
      }

      // generate and return output (html)
      $output = '';

      // add title (if not empty)
      if ($title != '') $output .= '<h2>' . $title . '</h2>';

      // add twitter html
      $output .= $twitter_html;

      if ($show_embed) {
        // create overall div
        $output .= '<div><div class="twitter privacy-embed">';

        // add thumbnail
        $output .= '<img src="' . $thumbnail_src . '" alt="Twitter Thumbnail" class="twitter privacy-embed-thumbnail" />';

        // add privacy-notice
        $output .= '<p class="twitter privacy-embed-notice">
        ' . $embed_notice . '<br><br>
        <span class="twitter privacy-embed-load">' . $embed_load . '</span>
        </p>';

        // close overall div
        $output .= '</div></div>';
      }

      // return everything
      return $output;
    }
  }

  new PrivacyEmbedTwitterShortcode();
}
