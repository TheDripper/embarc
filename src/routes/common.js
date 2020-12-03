import $ from "jquery";
// import "hoverintent";
import hoverintent from "hoverintent/dist/hoverintent.min";
export default {
  init() {
    // JavaScript to be fired on all pages
    if ($(".cat-drop").length) {
      $(".cat-drop").on("click", function (e) {
        $(this).find(".grey-bar").toggleClass("open");
        $(this).next().toggleClass("open");
      });
    }
    let colors = JSON.parse($("body").attr("data-colors"));
    for (let color in colors) {
      let hex = colors[color];
      $("#menu-main > li > a").each(function () {
        if ($(this).attr("href").includes(color)) {
          $(this).parent().find(".sub-menu").css("background", hex);
          $(this)
            .parent()
            .css("borderBottom", "5px solid " + hex);
        }
      });
      // $('#menu-main-navigation > li a').each(function(){
      //   if($(this).attr('href').includes(color)) {
      //     $(this).parent().find('.sub-menu').css('background',hex);
      //   }
      // });
    }
    $(".sub-menu .sub-menu").parent().parent().addClass("has-sub");
    var cats = document.getElementsByClassName(
      "menu-item-object-project_categories"
    );
    if ($(window).width() > 1000) {
      for (const cat of cats) {
        hoverintent(
          cat,
          function () {
            $(this).addClass("open");
          },
          function () {
            $(this).removeClass("open");
          }
        );
      }
    }
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
