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
      // if (!sessionStorage.getItem("cart")) {
      //   var korz = document.getElementById('korz__order');
      //   korz.style.display = 'none';
      // }
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
if (sessionStorage.getItem("cart")) {
  let cart = JSON.parse(sessionStorage.getItem("cart"));
  console.log("Массив перенесен в переменную");
  // $.POST('korzina.php', cart);
  console.log(JSON.parse(cart[0][1]));
  //цикл для items
  for(let key = 0; key < cart.length; key++){
    
    document.getElementById("korz__orders").innerHTML = "<div id='korz__order' class='korz__order' data-price='110'>";
    document.getElementById("korz__order").innerHTML = '<div id="korz__order-clear" class="korz__order-clear">';
    document.getElementById("korz__order-clear").innerHTML = "<button type='submit' name='itemClear{$key}'><img src='images/korz-clear.png' alt=''></button></div>";
    document.getElementById("korz__order").innerHTML = "<div id='korz__container' class='korz__container'>";
    document.getElementById("korz__container").innerHTML = "<div id='korz__order-image' class='korz__order-image'>";
    //цикл для item
    for(let key1 = 0; key1 < JSON.parse(cart[0][1]).length; key1++){
      console.log(JSON.parse(cart[key][1])[key1][1]);
      //фото
      if(key1 == 2){
        document.getElementById("korz__order-image").innerHTML = "<img src="+JSON.parse(cart[key][1])[key1][1]+" alt=''></div>";
      }
      document.getElementById("korz__container").innerHTML = "<div id='korz__order-title' class='korz__order-title'>";
      //имя
      if(key1 == 1){
        document.getElementById("korz__order-title").innerHTML = "<p>"+JSON.parse(cart[key][1])[key1][1]+" </p></div>";
      }
      //вес
      document.getElementById("korz__container").innerHTML = "<div id='korz__order-weight' class='korz__order-weight'>";
      if(key1 == 4){
        document.getElementById("korz__order-weight").innerHTML = "<p>"+JSON.parse(cart[key][1])[key1][1]+JSON.parse(cart[key][1])[5][1]+"</p></div>";
      }
      document.getElementById("korz__container").innerHTML = "<div id='calc' class='calc'>";
      //количество в корзине
      if(key1 == 6){
        document.getElementById("calc").innerHTML = "<button type='submit' onclick='this.nextElementSibling.stepDown(); this.nextElementSibling.onchange();' class='calc-count minus'>-</button><input name='num_product' class='calc-num' type='number' value='"+JSON.parse(cart[key][1])[key1][1]+"'><button type='submit' onclick='this.previousElementSibling.stepUp(); this.previousElementSibling.onchange();' class='calc-count plus'>+</button></div>";
      }
      document.getElementById("korz__container").innerHTML = "<div id='korz__order-price' class='korz__order-price'>";
      //цена
      if(key1 == 3){
        let price = JSON.parse(cart[key][1])[key1][1];
        let count = JSON.parse(cart[key][1])[6][1];
        let sum = price * count;
        console.log(sum);
        document.getElementById("korz__order-price").innerHTML = "<p>"+sum+" ₽</p></div></div>";
      }
      // continue;
    }
    document.getElementById("korz__orders").innerHTML = "</div>";
  }
}
else{
  //document.getElementById("korz__orders").innerHTML = a;
  document.getElementById("empty_korz").innerHTML = "В корзине пусто.";
}
