=== Privacy Embed ===
Contributors: juliangroshaupt
Tags: privacy, youtube-embed, youtube, spotify-embed, spotify, embed
Requires at least: 5.7
Tested up to: 5.7
Requires PHP: 5.1.2
Stable tag: 1.0.1
License: GPL v2 or later
License URI: License URI: https://www.gnu.org/licenses/gpl-2.0.html

Providing shortcodes to privacy-friendly embed external elements (like YouTube videos).

== Description ==
This plugin adds some shortcodes to let you embed external content like youtube videos on your wordpress pages. Nothing new so far - why another plugin?

Well, this plugin puts emphasis on data protection. Before the content is loaded from an external area of responsibility (a third-party provider), the user must explicitly agree to the data transfer. In this way, the site operator is supported in designing his website in a data protection-compliant manner (taking into account the GDPR, among other things).

For the WPBakery Page Builder plugin, prefabricated blocks are also provided so that the shortcodes can be used directly.

Currently, embeddings of the following services are supported:
* YouTube videos (Google)
* Spotify (Artists, Albums, Tracks)

== Screenshots ==
1. Adding the shortcodes on a page
2. Spotify and YouTube Embed on a page
3. Settings Page: Updating the text shown on the embed elements

== Installation ==
1. Make sure that your WordPress installation meets the minimum requirements of this plugin.
2. Upload the plugin to the /wp-content/plugins/ directory or install it directly from the admin pages.
3. Use the shortcodes:
    - Spotify*: `[privacy-embed_spotify title="Title of embed" spotify_url="spotify:album:1DFixLWuPkv3KT3TnV35m3"]`
    - YouTube: `[privacy-embed_youtube title="Title of embed" youtube_link="https://www.youtube.com/watch?v=kV9sNmujCPk"]`

\* You can get the Spotify URI by clicking "Share" on the Spotify page of any artist, album or track and then selecting "Copy Spotify URI".

== Changelog ==
= 1.0.1 =
* fixed: styling
* fixed: title on youtube embeds
* fixed: default notice if values on settings page are not set

= 1.0.0 = 
* inital version