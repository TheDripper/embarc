import $ from "jquery";
import "slick-carousel";
export default () => {
  $(".post-slider").slick({
    dots: false,
    arrows: true,
    autoplay: true,
    autoplaySpeed: 5000,
    slidesToShow: 3,
    prevArrow: '#prev',
    nextArrow: '#next'
  });
};
