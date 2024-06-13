<?php include 'template/head.php'; ?>
<?php include 'template/nav.php'; ?>

<?php
include ("connect.php");
if (!$connection1) {
        echo 'Не могу соединиться с БД. Код ошибки: ' . mysqli_connect_errno() . ', ошибка: ' . mysqli_connect_error();
        exit;
      }
      
?>
<?php

?>
    <main>
        <div class="korz">
            <div class="container">
                <div class="korz__title">
                    <div class="korz__title-image">
                        <img src="images/korz.png" alt="">
                    </div>
                    <h2 id="title">Корзина</h2>
                </div>
                <div id="korz__orders" class="korz__orders">
                    <div class="title">
                        <h3>Ваш заказ</h3>
                    </div>
                    <?php //include 'test.php'; ?>
                    
                    <div id="korz__order_container" class="korz__order_container"></div>
                    <div id="div__empty_korz" class="empty_korz">
                        <p id="empty_korz"></p>
                    </div>
                </div>
            </div>
            
        </div>
    </main>
    <script>
        var sumAll = 0;
    console.log(JSON.parse(sessionStorage.getItem("cart")));
    // document.getElementById("korz__order_container").innerHTML = 'Ghbdd';
    if (sessionStorage.getItem("cart")) {
    var cart = JSON.parse(sessionStorage.getItem("cart"));
    console.log(cart.length);
    console.log("Массив перенесен в переменную");
    // $.POST('korzina.php', cart);
    
    //console.log(JSON.parse(cart[0][1]));
    //цикл для items
    // var i = 0;
    if(cart.length !== 0){
        document.getElementById("korz__order_container").innerHTML += "<div class='order-btn__container'><form id='orderForm' method='post' action='form_order.php'></form></div>";
        for(let key = 0; key < cart.length; key++){
            
            
            //цикл для item
            // if(key == i){
                // for(let key1 = 0; key1 < JSON.parse(cart[key][1]).length; key1++){
                    document.getElementById("korz__order_container").innerHTML += "<div id='korz__order"+key+"' class='korz__order' data-keycart='"+key+"' data-price='"+JSON.parse(cart[key][1])[3][1]+"' data-id='"+JSON.parse(cart[key][1])[0][1]+"'></div>";
                    // document.getElementById("korz__order"+key).innerHTML = '';
                    // document.getElementById("korz__order-clear"+key).innerHTML = "<button type='submit'><img src='images/korz-clear.png' alt=''></button>";
                    document.getElementById("korz__order"+key).innerHTML += "<div id='korz__order-clear"+key+"' class='korz__order-clear' data-id='"+JSON.parse(cart[key][1])[0][1]+"'><button class='clear' type='submit'>X</button></div><div id='korz__container"+key+"' class='korz__container' data-keycart='"+key+"' data-price='"+JSON.parse(cart[key][1])[3][1]+"' data-id='"+JSON.parse(cart[key][1])[0][1]+"'></div>";
                    document.getElementById("korz__container"+key).innerHTML += "<div id='korz__order-image"+key+"' class='korz__order-image'></div><div class='korz__order-container'><div id='korz__order-title"+key+"' class='korz__order-title'></div><div id='korz__order-weight"+key+"' class='korz__order-weight'></div><div id='calc"+key+"' class='calc' data-step='1' data-min='1' data-max='100'></div><div id='korz__order-price"+key+"' class='korz__order-price'></div></div>";
                    // document.getElementById("korz__container").innerHTML = "<div id='korz__order-title' class='korz__order-title'></div>";
                    // document.getElementById("korz__container").innerHTML = "<div id='korz__order-weight' class='korz__order-weight'></div>";
                    // document.getElementById("korz__container").innerHTML = "<div id='calc' class='calc'></div>";
                    // document.getElementById("korz__container").innerHTML = "<div id='korz__order-price' class='korz__order-price'></div>";
                    
                    // console.log(JSON.parse(cart[key][1])[key1][1]);
                    
                    //имя
                    // if(key1 == 1){
                        // console.log(JSON.parse(cart[key][1])[key1][1]);
                        document.getElementById("korz__order-title"+key).innerHTML += "<p>"+JSON.parse(cart[key][1])[1][1]+"</p>";
                    // }
                    //фото
                    // if(key1 == 2){
                        // console.log(JSON.parse(cart[key][1])[key1][1]);
                        document.getElementById("korz__order-image"+key).innerHTML += "<img src='"+JSON.parse(cart[key][1])[2][1]+"' alt=''>";
                    // }
                    //цена
                    // if(key1 == 3){
                        console.log(JSON.parse(cart[key][1])[3][1]);
                        var price = JSON.parse(cart[key][1])[3][1];
                        var count = JSON.parse(cart[key][1])[6][1];
                        let sum = price * count;
                        sumAll += sum;
                        console.log(sum);
                        document.getElementById("korz__order-price"+key).innerHTML += "<p class='price'><span>"+sum+"</span> ₽</p>";
                    // }
                    //вес
                    
                    // if(key1 == 4){
                        // console.log(JSON.parse(cart[key][1])[key1][1]);
                        document.getElementById("korz__order-weight"+key).innerHTML += "<p>"+JSON.parse(cart[key][1])[4][1]+JSON.parse(cart[key][1])[5][1]+"</p>";
                    // }
                    
                    //количество в корзине
                    // if(key1 == 6){
                    //     console.log(JSON.parse(cart[key][1])[key1][1]);
                        document.getElementById("calc"+key).innerHTML += "<button type='submit' class='calc-count minus'>-</button><div id='calc-num"+key+"'><input id='calc-num_input"+key+"' name='num_product"+key+"' class='calc-num' type='number' step='1' value='"+JSON.parse(cart[key][1])[6][1]+"'></div><button type='submit' class='calc-count plus'>+</button>";
                    // }
                    
                // document.getElementById("korz__order_container").innerHTML = "</div>";
                // }
            // }
            // i++;
            

            

            // function minus0(){
            //     if (sessionStorage.getItem("cart")) {
            //         console.log(JSON.parse(sessionStorage.getItem("cart")));
            //         cart = new Map(JSON.parse(sessionStorage.getItem("cart"))); //sessionStorage.setItem("cart", input.val());
            //         console.log("Массив перенесен в переменную");
            //         console.log(cart);
            //         let num = JSON.parse(cart[key][1])[6][1];
            //         --num;
            //         var map = new Map([
            //             ['id', JSON.parse(cart[key][1])[0][1]],
            //             ['name', JSON.parse(cart[key][1])[1][1]],
            //             ['photo', JSON.parse(cart[key][1])[2][1]],
            //             ['price', JSON.parse(cart[key][1])[3][1]],
            //             ['weight', JSON.parse(cart[key][1])[4][1]],
            //             ['units', JSON.parse(cart[key][1])[5][1]],
            //             ['count', num]
            //         ]);
            //         cart = cart.set(JSON.parse(cart[key][1])[0][1], JSON.stringify(Array.from(map.entries())));
            //         alert("Количество уменьшено");
            //         sessionStorage.setItem("cart", JSON.stringify(Array.from(cart.entries())));
            //     }
            // }
            // function plus(){
            //     if (sessionStorage.getItem("cart")) {
            //         console.log(JSON.parse(sessionStorage.getItem("cart")));
            //         cart = new Map(JSON.parse(sessionStorage.getItem("cart"))); //sessionStorage.setItem("cart", input.val());
            //         console.log("Массив перенесен в переменную");
            //         console.log(cart);
            //         let num = JSON.parse(cart[key][1])[6][1];
            //         ++num;
            //         var map = new Map([
            //             ['id', JSON.parse(cart[key][1])[0][1]],
            //             ['name', JSON.parse(cart[key][1])[1][1]],
            //             ['photo', JSON.parse(cart[key][1])[2][1]],
            //             ['price', JSON.parse(cart[key][1])[3][1]],
            //             ['weight', JSON.parse(cart[key][1])[4][1]],
            //             ['units', JSON.parse(cart[key][1])[5][1]],
            //             ['count', num]
            //         ]);
            //         cart = cart.set(JSON.parse(cart[key][1])[0][1], JSON.stringify(Array.from(map.entries())));
            //         alert("Количество увеличено");
            //         sessionStorage.setItem("cart", JSON.stringify(Array.from(cart.entries())));
            //     }
            // }


            // cart = new Map(JSON.parse(sessionStorage.getItem("cart")));
            //console.log(document.getElementById("calc-num"+key).value);
            document.getElementById("orderForm").innerHTML += '<input id="idForm'+key+'" name="idForm'+key+'" type="number" value="'+JSON.parse(cart[key][1])[0][1]+'">';
            document.getElementById("orderForm").innerHTML += document.getElementById("calc-num"+key).innerHTML;
            //document.getElementById("idForm"+key).hidden = true;
            //document.getElementById("calc-num_input"+key).hidden = true;
        }
        document.getElementById("orderForm").innerHTML += '<input name="sizeForm" type="hidden" value="'+cart.length+'"><input class="sumAll" name="sumAll" type="hidden" value="'+sumAll+'"><h5 class="order-sumAll" id="sumAll">Итого: '+sumAll+' ₽</h5><button class="order-btn" name="submit" type="submit">Оформить заказ</button>';
        
    }
        if(cart.length === 0){
            document.getElementById("empty_korz").innerHTML = "В корзине пусто.";
        }
}
    else{
    //document.getElementById("korz__orders").innerHTML = a;
    document.getElementById("empty_korz").innerHTML = "В корзине пусто.";
    }
    
    </script>
    
        <?php include 'template/footer.php'; ?>	