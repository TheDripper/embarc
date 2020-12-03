import $ from "jquery";
import "featherlight";
export default () => {
  $(".feather").on('click', function(e){
    if($(this).prop("tagName")=='figure') {
      $.featherlight($(this).find('img'));
    } else if ($(this).hasClass('post-slide')) {
      $.featherlight($(this).find('.modal'));
    } else {
      $.featherlight($(this));
    }
  });
};
