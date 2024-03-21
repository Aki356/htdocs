(function($){
$('.popular__items').slick({
    slidesToShow: 3,
    slidesToScroll: 3,
    autoplay: false,
    autoplaySpeed: 2000,
  });

  $('.gift__items').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    autoplay: false,
    autoplaySpeed: 2000,
  });

  $('.slyder__photos').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: false,
    fade: true,
    cssEase: 'linear',
    dots: true,
    autoplaySpeed: 2000,
  });
  // function addCart(){
    
  // }
})(jQuery);