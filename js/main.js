(function($){
    $(document).ready(function () {
        //mobile menu
        $('.mob-btn').click(function () {
          $('.mob-menu, .js-blackout').toggleClass('active');
        })
      });   
    }
    )(jQuery);

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

      const products = document.querySelector('.korz__order_container');
      var cart;
      // const productss = document.querySelector('.korz__order-clear');
      // productss.addEventListener('click', ({target}) =>
      // {
      //   cart = new Map(JSON.parse(sessionStorage.getItem("cart")));
      //   console.log("Массив перенесен в переменную");
      //   const product = target.closest('.korz__container');
        
      // });
      products.addEventListener('click', ({target}) =>
      {
        cart = new Map(JSON.parse(sessionStorage.getItem("cart")));
        console.log("Массив перенесен в переменную");
        const product = target.closest('.korz__container');
        const clear = target.closest('.korz__order-clear');
        console.log(product);
        
        // const price_div = target.closest('.korz__order-price');
        if (target.classList.contains('clear'))
        {
          
          let id = parseInt(clear.dataset.id);
          console.log(id);
            cart.delete(id);
            // const total   = product.querySelector('.korz__order');
            // total.textContent = "";
            alert("удалено");
            //console.log(product.dataset.id);
        }
        
        if (target.classList.contains('minus'))
        {
          const countEl = product.querySelector('.calc-num');
          let   count1   = parseInt(countEl.value);
          if (count1 > 1)
          {
            --count1;
          }
          countEl.value = count1;
          const total   = product.querySelector('.korz__order-price p span');
          total.textContent   = parseInt(product.dataset.price) * count1;
          let id = parseInt(product.dataset.id);
          var map = JSON.parse(cart.get(id));
          for (let pair of map) {
            // pair - это массив [key, values]
            // console.log(pair[0]); // ключ
            // console.log(pair[1]); // значение
            console.log(`Ключ = ${pair[0]}, значение = ${pair[1]}`);
            if(pair[0] == "count"){
                // console.log(pair[0]);
                // console.log(pair[1]);
                pair[1] = count1;
                console.log(id);
                var map = new Map([
                  ['id', JSON.parse(cart.get(id))[0][1]],
                  ['name', JSON.parse(cart.get(id))[1][1]],
                  ['photo', JSON.parse(cart.get(id))[2][1]],
                  ['price', JSON.parse(cart.get(id))[3][1]],
                  ['weight', JSON.parse(cart.get(id))[4][1]],
                  ['units', JSON.parse(cart.get(id))[5][1]],
                  ['count', pair[1]]
                  ]);
            }
            
        }
          cart = cart.set(id, JSON.stringify(Array.from(map.entries())));
        }
        else if (target.classList.contains('plus'))
        {
          const countEl = product.querySelector('.calc-num');
          let   count1   = parseInt(countEl.value);
          // if (count1 < 9)
          // {
            ++count1;
          // }
          countEl.value = count1;
          const total   = product.querySelector('.korz__order-price p span');
          total.textContent   = parseInt(product.dataset.price) * count1;
          let id = parseInt(product.dataset.id);
          var map = JSON.parse(cart.get(id));
          for (let pair of map) {
            // pair - это массив [key, values]
            // console.log(pair[0]); // ключ
            // console.log(pair[1]); // значение
            //console.log(`Ключ = ${pair[0]}, значение = ${pair[1]}`);
            if(pair[0] == "count"){
                // console.log(pair[0]);
                // console.log(pair[1]);
                pair[1] = count1;
                console.log(JSON.parse(cart.get(id))[5][1]);
                var map = new Map([
                  ['id', JSON.parse(cart.get(id))[0][1]],
                  ['name', JSON.parse(cart.get(id))[1][1]],
                  ['photo', JSON.parse(cart.get(id))[2][1]],
                  ['price', JSON.parse(cart.get(id))[3][1]],
                  ['weight', JSON.parse(cart.get(id))[4][1]],
                  ['units', JSON.parse(cart.get(id))[5][1]],
                  ['count', pair[1]]
                  ]);
            }
            
        }
          cart = cart.set(id, JSON.stringify(Array.from(map.entries())));
        }
        
        sessionStorage.setItem("cart", JSON.stringify(Array.from(cart.entries())));

        //console.log(JSON.parse(cart.get(9)));
      });
      // const productss = document.querySelector('.korz__order-clear');
      // productss.addEventListener('click', ({target}) =>
      // {
      //   cart = new Map(JSON.parse(sessionStorage.getItem("cart")));
      //   console.log("Массив перенесен в переменную");
      //   const product = target.closest('.korz__container');
        
      // });


      // счётчик количества без изменения цены
      // $(document).ready(function() {
      //   $('body').on('click', '.minus, .plus', function(){
      //     var $row = $(this).closest('.calc');
      //     var $input = $row.find('.calc-num');
      //     var $price_row = $(this).closest('.korz__order-price');
      //     var $price = $price_row.find('.price');
      //     var step = $row.data('step');
      //     var price = parseFloat($price.val());
      //     var val = parseFloat($input.val());
      //     if ($(this).hasClass('minus')) {
      //       val -= step;
      //       price = price * val;
      //     } else {
      //       val += step;
      //       price = price * val;
      //     }
      //     $input.val(val);
      //     $input.change();
      //     $price.val(price);
      //     $price.change();
      //     return false;
      //   });
       
      //   $('body').on('change', '.calc-num, .price', function(){
      //     var $input = $(this);
      //     var $row = $input.closest('.calc');
      //     var step = $row.data('step');
      //     var $price = $(this);
      //     // var $price_row = $price.closest('.korz__order-price');
      //     var min = parseInt($row.data('min'));
      //     var max = parseInt($row.data('max'));
      //     var val = parseFloat($input.val());
      //     if (isNaN(val)) {
      //       val = step;
      //       price = price * val;
      //     } else if (min && val < min) {
      //       val = min;	
      //       price = price * val;
      //     } else if (max && val > max) {
      //       val = max;	
      //       price = price * val;
      //     }
      //     $input.val(val);
      //     $price.val(price);
      //   });
      // });

      
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

