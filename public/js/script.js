jQuery(document).ready(function ($) {
  /* ---------- youtube, spotify ---------- */
  $("span.youtube.privacy-embed-load, span.spotify.privacy-embed-load").click(
    function () {
      let parentDiv = $(this).parent().parent();
      let iframe = parentDiv.find("iframe.privacy-embed-iframe");
      iframe.attr("src", iframe.data("src"));
      iframe.show();

      parentDiv.children(".privacy-embed-thumbnail").first().hide();
      parentDiv.children(".privacy-embed-notice").first().hide();
      parentDiv.children(".privacy-embed-scroll-notice").first().hide();
    }
  );

  /* ---------- twitter ---------- */
  let twitter_loaded = false;
  $("span.twitter.privacy-embed-load").click(function () {
    if (!twitter_loaded) {
      $.getScript("https://platform.twitter.com/widgets.js")
        .done(function (_, _) {
          twitter_loaded = true;
          $("div.twitter.privacy-embed").hide();
        })
        .fail(function (_, _, _) {
          // todo: error
          alert("error!");
        });
    }
  });
});
