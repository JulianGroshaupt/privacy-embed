=== Privacy Embed ===
Contributors: juliangroshaupt
Tags: privacy, youtube-embed, youtube, spotify-embed, spotify, embed, twitter, twitter-embed, gdpr
Requires at least: 5.7
Tested up to: 5.7
Requires PHP: 5.1.2
Stable tag: 1.0.3
License: GPL v2 or later
License URI: License URI: https://www.gnu.org/licenses/gpl-2.0.html

Providing shortcodes to privacy-friendly embed external elements (like YouTube videos).

== Description ==
This plugin adds some shortcodes to let you embed external content like youtube videos on your wordpress pages. Nothing new so far - why another plugin?

Well, this plugin puts emphasis on data protection. Before the content is loaded from an external area of responsibility (a third-party provider), the user must explicitly agree to the data transfer. In this way, the site operator is supported in designing his website in a data protection-compliant manner (taking into account the GDPR, among other things).

For the WPBakery Page Builder plugin, prefabricated blocks are also provided so that the shortcodes can be used directly.

Currently, embeddings of the following services are supported:
* YouTube videos (Google)
* Spotify (Artists, Albums, Tracks, Podcast Episodes)
* Twitter (Single Tweet, User Timeline, Follow-Button, Mention-Button, Hashtag-Button)

== Screenshots ==
1. Settings Page: Updating the text shown on (or instead of) the embed elements
2. Sample YouTube Shortcode
3. YouTube Embed Element (before the user loads the content)
4. YouTube Embed Element (after the user loaded the content)
5. Sample Spotify Shortcodes
6. Spotify Embed Elements (before the user loads the content)
7. Spotify Embed Elements (after the user loaded the content)
8. Sample Twitter Shortcodes
9. Twitter Embed Elements (before the user loads the content)
10. Twitter Embed Elements (after the user loaded the content)

== Installation ==
1. Make sure that your WordPress installation meets the minimum requirements of this plugin.
2. Upload the plugin to the /wp-content/plugins/ directory or install it directly from the admin pages.
3. Use the shortcodes:
    - Spotify*: `[privacy-embed_spotify title="Title of embed" spotify_url="spotify:album:1DFixLWuPkv3KT3TnV35m3"]`
    - YouTube: `[privacy-embed_youtube title="Title of embed" youtube_link="https://www.youtube.com/watch?v=kV9sNmujCPk"]`
    - Twitter: `[privacy-embed_twitter title="Title of embed" twitter_type="timeline" twitter_link="https://twitter.com/WordPress"]`

= Notices = 
You can get the Spotify URI by clicking "Share" on the Spotify page of any artist, album or track and then selecting "Copy Spotify URI".

Getting the Spotify URL for a podcast episode requires a bit more steps: Click "Share" on the corresponding Spotify page and select "Copy episode link". From the copied link you now have to extract the part after ".../episode/" up to (excluding) the next question mark. Your Spotify URL is now composed of: `"spotify:episode:extracted-part"`.

For podcasts (shows) you have to click "Share" on the corresponding Spotify page and select "Copy show link" nad extract the part after ".../show/" up to (excluding) the next question mark. Your Spotify URL is now composed of: `"spotify:show:extracted-part"`.

The following examples can be values of the field `twitter_link`:
* single tweet: `https://twitter.com/WordPress/status/1402457431742074881`
* timeline, follow-button, mention-button: `https://twitter.com/WordPress`
* hashtag-button: `https://twitter.com/hashtag/WordPress`

== Changelog ==
= 1.0.3 =
* added: twitter embeds
* updated: description (especially structure)

= 1.0.2 =
* fixed: styling (again)
* added: translation support (currently only german)
* added/fixed: new displaying for spotify episodes and shows

= 1.0.1 =
* fixed: styling
* fixed: title on youtube embeds
* fixed: default notice if values on settings page are not set

= 1.0.0 = 
* inital version