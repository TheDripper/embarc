import $ from "jquery";
import "slick-carousel";
export default () => {
  $(".post-slider").slick({
    dots: false,
    arrows: true,
    autoplay: true,
    autoplaySpeed: 8000,
    prevArrow: '#prev',
    nextArrow: '#next',
    slidesToShow: 3,
    responsive: [
      {
        breakpoint: 800,
        settings: {
          slidesToShow: 1,
          arrows: false
        }
      }
    ]
  });
};
