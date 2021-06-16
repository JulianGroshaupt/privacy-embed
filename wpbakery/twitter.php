<?php

/**
 * Twitter (Privacy Embed)
 * Visual Component for WPBakery.
 */

// exit if accessed directly
if (!defined('ABSPATH')) {
  exit;
}

if (!class_exists('VcPrivacyEmbedTwitter')) {
  class VcPrivacyEmbedTwitter extends WPBakeryShortCode
  {
    function __construct()
    {
      vc_map(array(
        'name' => __('Twitter (Privacy Embed)', 'privacy-embed'),
        'base' => 'privacy-embed_twitter',
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
            'heading' => __('Twitter Link', 'privacy-embed'),
            'param_name' => 'twitter_link',
            'description' => __('A link to a user, a hastag or a single tweet', 'privacy-embed'),
            'holder' => 'div'
          ),
          array(
            'type' => 'dropdown',
            'class' => '',
            'heading' => __('Twitter Type', 'privacy-embed'),
            'param_name' => 'twitter_type',
            'value' => array(
              __('choose value', 'privacy-embed') => 'n/a',
              __('single tweet', 'privacy-embed') => 'tweet',
              __('timeline of an user', 'privacy-embed') => 'timeline',
              __('follow button', 'privacy-embed') => 'follow-button',
              __('mention button', 'privacy-embed') => 'mention-button',
              __('hashtag button', 'privacy-embed') => 'hashtag-button',
            ),
            'description' => __('The type of the embed', 'privacy-embed'),
            'holder' => 'div',
          )
        )
      ));
    }
  }

  new  VcPrivacyEmbedTwitter();
}
