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
  // $( document ).ready(function(){
	//   $( "calc" ).submit(function(){
  //     var formData = $( this ).serialize(); // создаем переменную, которая содержит закодированный набор элементов формы в виде строки
      
	//     $.post( "template/add_korz.php", formData, function() { //  передаем и загружаем данные с сервера с помощью HTTP запроса методом POST
	//       alert("Удачно"); // вставляем в элемент <div> данные, полученные от сервера
	//     })
	//   });
	// });
  function addCart(){
    
  }
})(jQuery);