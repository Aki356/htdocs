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
      
      window.addEventListener('load', function () {
        var preloader = document.getElementById('preloader');
        preloader.style.opacity = '0';
        preloader.style.transition = 'opacity 1s linear';
        preloader.style.display = 'none';
      });

if(JSON.parse(sessionStorage.getItem("cart")).length != 0){
  console.log(document.querySelector("div__empty_korz"));
  document.getElementById("div__empty_korz").style.display = 'none';
}


      const products = document.querySelector('.korz__order_container');
      var cart;
      var is_empty = 0;
      products.addEventListener('click', ({target}) =>
      {
        cart = new Map(JSON.parse(sessionStorage.getItem("cart")));
        //console.log("Массив перенесен в переменную");
        const product = target.closest('.korz__container');
         const form = target.closest('.korz__order');
        const clear = target.closest('.korz__order-clear');
        //console.log(products);
        
        //функция удаления товара из корзины
        if (target.classList.contains('clear'))
        {
          
          const countEl = form.querySelector('.calc-num');
          //console.log(parseInt(countEl.value));
          let id = parseInt(clear.dataset.id);
          const sumForm = document.querySelector('.sumAll');
          const sumAll = document.getElementById('sumAll');
          let   count1   = parseInt(countEl.value);
          const price   = parseInt(form.dataset.price) * count1;
          
          let sA = parseInt(sumForm.value) - parseInt(price);
          //console.log(sumForm.value);
          sumForm.setAttribute('value', sA);
          sumAll.textContent = "Итого: "+sA+" ₽";
          cart.delete(id);
          const total   = target.closest('.korz__order');
          const order_btn = document.querySelector(".order-btn__container");
          total.remove();
          //console.log(price.innerHTML);
          if(cart.size === 0){
            order_btn.remove();
            document.getElementById("div__empty_korz").style.display = "block";
              document.getElementById("empty_korz").innerHTML = "В корзине пусто.";
          }
          alert("Товар удален из корзины!");
        }
        
        //функция уменьшения количества товара
        if (target.classList.contains('minus'))
        {
          const countEl = product.querySelector('.calc-num');
          const sumForm = document.querySelector('.sumAll');
          const sumAll = document.getElementById('sumAll');
          //document.getElementById("calc-num"+key).innerText
          let   count1   = parseInt(countEl.value);
          let sA = parseInt(sumForm.value);
          if (count1 > 1)
          {
            --count1;
            sA = parseInt(sumForm.value) - parseInt(product.dataset.price);
          }
          countEl.value = count1;
          countEl.setAttribute('value', count1);
          //console.log(parseInt(product.dataset.keycart));
          const countForm = document.getElementById('calc-num_input'+product.dataset.keycart);
          countForm.setAttribute('value', count1);
          
          
          
          const total   = product.querySelector('.korz__order-price p span');
          total.textContent   = parseInt(product.dataset.price) * count1;
          
          sumForm.setAttribute('value', sA);
          sumAll.textContent = "Итого: "+sA+" ₽";
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
                //console.log(id);
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
        }//функция увеличения количества товара
        else if (target.classList.contains('plus'))
        {
          const countEl = product.querySelector('.calc-num');
          const sumForm = document.querySelector('.sumAll');
          const sumAll = document.getElementById('sumAll');
          let   count1   = parseInt(countEl.value);
          // if (count1 < 9)
          // {
            ++count1;
          // }
          countEl.value = count1;
          countEl.setAttribute('value', count1);
          const countForm = document.getElementById('calc-num_input'+product.dataset.keycart);
          countForm.setAttribute('value', count1);
          const total   = product.querySelector('.korz__order-price p span');
          total.textContent   = parseInt(product.dataset.price) * count1;
          let sA = parseInt(sumForm.value) + parseInt(product.dataset.price);
          sumForm.setAttribute('value', sA);
          sumAll.textContent = "Итого: "+sA+" ₽";
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
                //console.log(JSON.parse(cart.get(id))[5][1]);
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
          //console.log(products.querySelector('.calc-num'));
        }
        
        sessionStorage.setItem("cart", JSON.stringify(Array.from(cart.entries())));

        //console.log(JSON.parse(cart.get(9)));
      });