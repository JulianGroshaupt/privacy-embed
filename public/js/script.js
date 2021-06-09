jQuery(document).ready(function ($) {
  /* ---------- all services ---------- */
  $("span.privacy-embed-load").click(function () {
    let parentDiv = $(this).parent().parent();
    let iframe = parentDiv.find("iframe.privacy-embed-iframe");
    iframe.attr("src", iframe.data("src"));
    iframe.show();

    parentDiv.children(".privacy-embed-thumbnail").first().hide();
    parentDiv.children(".privacy-embed-notice").first().hide();
    parentDiv.children(".privacy-embed-scroll-notice").first().hide();
  });
});
