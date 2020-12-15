import $ from "jquery";
// import "hoverintent";
import hoverintent from "hoverintent/dist/hoverintent.min";
export default {
  init() {
    // JavaScript to be fired on all pages
    if ($(".term-development-systems").length) {
      $(".system").click(function (e) {
        window.location.replace($(this).attr('data-url'));
      });
    }
    if ($(".cat-drop").length) {
      $(".cat-drop").on("click", function (e) {
        $(this).find(".grey-bar").toggleClass("open");
        $(this).next().toggleClass("open");
      });
    }
    let colors = JSON.parse($("body").attr("data-colors"));
    for (let color in colors) {
      let hex = colors[color];
      $("#menu-main-navigation > li > a").each(function () {
        if ($(this).attr("href").includes(color)) {
          $(this).parent().find(".sub-menu").css("background", hex);
          $(this)
            .parent()
            .css("borderBottom", "5px solid " + hex);
        }
        let target = window.location.href.split("/").reverse()[1];
        if (
          $(".tax-project_categories").length &&
          $(this).attr("href").includes(target)
        ) {
          $(this).parent().css("background", colors[target]);
          $(this).parent().css("borderBottom", "5px solid #777777");
        }
        if (
          window.location.href.includes("resources") &&
          $(this).attr("href").includes("resources")
        ) {
          $(this).parent().css("background", colors["resources"]);
          $(this).parent().css("borderBottom", "5px solid #777777");
        }
        if ($(this).closest(".current-project_categories-ancestor").length) {
          let parent = $(this)
            .closest(".current-project_categories-ancestor")
            .find("a")
            .attr("href")
            .split("/")
            .reverse()[1];
          console.log(parent);
          $(this)
            .closest(".current-project_categories-ancestor")
            .css("background", colors[parent]);
          $(this)
            .closest(".current-project_categories-ancestor")
            .css("borderBottom", "5px solid #777777");
        }
        if ($(this).closest(".current-project-parent").length) {
          let parent = $(this)
            .closest(".current-project-parent")
            .find("a")
            .attr("href")
            .split("/")
            .reverse()[1];
          console.log(parent);
          $(this)
            .closest(".current-project-parent")
            .css("background", colors[parent]);
          $(this)
            .closest(".current-project-parent")
            .css("borderBottom", "5px solid #777777");
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
