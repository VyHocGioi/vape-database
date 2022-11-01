jQuery(document).ready(function () {
  jQuery("#button-toggle").on("click", function (e) {
    jQuery(".overlay").addClass("on");
    e.stopPropagation();
    jQuery(".block-menu-header").addClass("visible");
    jQuery(document.body).addClass("stop-scrolling");
  });
  jQuery(document).on("click", function (e) {
    if (
      jQuery(e.target).is("#button-toggle") == false &&
      jQuery(".overlay").hasClass("on")
    ) {
      jQuery(".overlay").removeClass("on");
      jQuery(".block-menu-header").removeClass("visible");
      jQuery(document.body).removeClass("stop-scrolling");
    }
  });
});
