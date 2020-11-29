import $ from "jquery";
// import "hoverintent";
import hoverintent from "hoverintent/dist/hoverintent.min";
export default {
  init() {
    // JavaScript to be fired on all pages
    $('.sub-menu .sub-menu').parent().parent().addClass('has-sub');
    var cats = document.getElementsByClassName(
      "menu-item-object-project_categories"
    );
    for (const cat of cats) {
      hoverintent(
        cat,
        function () {
          $(this).addClass('open');
        },
        function () {
          $(this).removeClass('open');
        }
      );
    }
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
