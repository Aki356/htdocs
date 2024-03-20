(function($){
    $(document).ready(function () {
        //mobile menu
        $('.mob-btn').click(function () {
          $('.mob-menu, .js-blackout').toggleClass('active');
        })
      });   
    })(jQuery);

    (function($){
      $(document).ready(function () {
          //mobile menu
          $('.popular__calc-count').click(function () {
            $('.mob-menu, .js-blackout').toggleClass('active');
          })
        });   
      })(jQuery);
      window.addEventListener('load', function () {
        var preloader = document.getElementById('preloader');
        preloader.style.opacity = '0';
        preloader.style.transition = 'opacity 1s linear';
        preloader.style.display = 'none';
      });
// const products = document.querySelector('.korz__orders');

// products.addEventListener('click', ({target}) =>
// {
//   const product = target.closest('.korz__order');
//   const total   = product.querySelector('.korz__order-price p');
//   const countEl = product.querySelector('.calc-num');
//   let   count   = parseInt(countEl.textContent);
  
//   if (target.classList.contains('calc-count minus'))
//   {
//     if (count > 1)
//     {
//       count--;
//     }
//   }
//   else if (target.classList.contains('calc-count plus'))
//   {
//     if (count < 9)
//     {
//       count++;
//     }
//   }
  
//   countEl.textContent = count;
//   total.textContent   = parseInt(product.dataset.price) * count;
// });

// var cart;
// if (typeof sessionStorage === 'undefined') {
// 	alert("sessionStorage не работает!");
// }
// var input_r;
// var input_p;
// var id = 0;
// function addToCart(){
//   input_r = document.getElementById("rows");
//   while (id < input_r){
//     input_p = document.getElementById("id_p" + id);
//     id++;
//   }
//   // input_p = document.getElementById("id_p");
//   function add() {
//   console.log(input_p.value);
//   if (sessionStorage.getItem("cart")) {
//     console.log(JSON.parse(sessionStorage.getItem("cart")));
//     cart = new Map(JSON.parse(sessionStorage.getItem("cart"))); //sessionStorage.setItem("cart", input.val());
//     console.log("Массив перенесен в переменную");
//     console.log(cart);
//   }
//   if (typeof cart === 'undefined') {
//     cart = new Map();
//     console.log("Массив создан");
//   }
//   if (sessionStorage.getItem("cart")) {
//     // if(cart.size > 0){
//       //for(let key = 0; key < cart.size; key++){
//         console.log(cart.get(input_p.value));
//         if(cart.has(input_p.value)){
//           let item = cart.get(input_p.value);
//           ++item;
//           cart = cart.set(input_p.value, item);
//           alert("Такой товар в корзине есть!");
//           sessionStorage.setItem("cart", JSON.stringify(Array.from(cart.entries())));
//         }
//       //}
//       //for(let key = 0; key < cart.size; key++){
//         if(!cart.has(input_p.value)){
//           cart = cart.set(input_p.value, 1);
//           // cart = {
//           //   'id_product' : input.value,
//           //   'num_product' : 1
//           // };
//           sessionStorage.setItem("cart", JSON.stringify(Array.from(cart.entries())));
//           alert("Товар добавлен в корзину! 1");
//         }
//       //}
//     // }
//     // else{
//     //   cart = cart.set(input.value, 1);
//     //   sessionStorage.setItem("cart", JSON.stringify(cart));
//     //   alert("Товар добавлен в корзину! 0");
//     //   // console.log(cart.get(input.value));
//     // }
//   }
//   else{
//     cart = cart.set(input_p.value, 1);
//     sessionStorage.setItem("cart", JSON.stringify(Array.from(cart.entries())));
//     alert("Товар добавлен в корзину! 0");
//   }
//   // if (cart && cart.size>0) {
//   //   for(let key = 0; key < cart.size; key++){
//   //     console.log(cart.get(key));
//   //     if(cart.get(key) == input.value){
//   //       ++cart[key][1];
//   //       alert("Такой товар в корзине есть!");
//   //       sessionStorage.setItem("cart", JSON.stringify(cart));
//   //     }
//   //   }
//   //   for(let key = 0; key < cart.size; key++){
//   //     if(cart.get(key) != input.value){
//   //       cart.set(input.value, 1);
//   //       // cart = {
//   //       //   'id_product' : input.value,
//   //       //   'num_product' : 1
//   //       // };
//   //       sessionStorage.setItem("cart", JSON.stringify(cart));
//   //       alert("Товар добавлен в корзину! 1");
//   //     }
//   //   }
//   // }
  
//   console.log(cart);
//   console.log(cart.size);
//   console.log(cart.get('12'));
//   }
//  add();
// }
// var a = document.getElementById("title").innerText;
// if (sessionStorage.getItem("cart")) {
//   let cart = JSON.parse(sessionStorage.getItem("cart"));
//   console.log("Массив перенесен в переменную");
//   // $.POST('korzina.php', cart);

// }
// else{
//   document.getElementById("korz__orders").innerHTML = a;
//   document.getElementById("empty_korz").innerHTML = "В корзине пусто.";
// }
