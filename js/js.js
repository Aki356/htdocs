(function($){

  $('.slyder__photos').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    fade: true,
    cssEase: 'linear',
    dots: true,
    autoplaySpeed: 2000,
  });
  var width = document.body.clientWidth; // ширина
  console.log(width);

  //var variable = false; // переменная, которую будем изменять

  if(width >= 768){
    $('.popular__items').slick({
      slidesToShow: 3,
      slidesToScroll: 3,
      autoplay: false,
      autoplaySpeed: 2000,
    });
    $('.main-hall__items').slick({
      slidesToShow: 3,
      slidesToScroll: 1,
      autoplay: false,
      autoplaySpeed: 2000,
    });
  }
  
  if(width < 600) {
    $('.popular__items').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      autoplay: false,
      autoplaySpeed: 2000,
    });
    $('.main-hall__items').slick({
      slidesToShow: 2,
      slidesToScroll: 1,
      autoplay: false,
      autoplaySpeed: 2000,
    });
  }
  if(width < 768) { // если ширина меньше 768...
    $('.popular__items').slick({
      slidesToShow: 2,
      slidesToScroll: 1,
      autoplay: false,
      autoplaySpeed: 2000,
    });
    $('.main-hall__items').slick({
      slidesToShow: 2,
      slidesToScroll: 1,
      autoplay: false,
      autoplaySpeed: 2000,
    });
  }
  

})(jQuery);