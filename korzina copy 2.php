<?php include 'template/head.php'; ?>
<?php include 'template/nav.php'; ?>
<?php
if (isset($_SESSION['message'])){
    echo '<div class="answear">
    <div class="alert alert-primary" role="alert">'.$_SESSION['message'].'</div></div>';
    unset($_SESSION['message']);
}
?>
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
            <div class="korz__title">
                <div class="korz__title-image">
                    <img src="images/korz.png" alt="">
                </div>
                <h2 id="title">Корзина</h2>
            </div>
            <div id="korz__orders" class="korz__orders">
                <h3>Ваш заказ</h3>
                <?php //include 'test.php'; ?>
                
                <div id="korz__order_container" class="korz__order_container"></div>
                <div class='empty_korz'>
                    <p id="empty_korz"></p>
                </div>
            </div>
                
        </div>
    </main>
    <script>
    console.log(JSON.parse(sessionStorage.getItem("cart")));
    // document.getElementById("korz__order_container").innerHTML = 'Ghbdd';
    if (sessionStorage.getItem("cart")) {
    let cart = JSON.parse(sessionStorage.getItem("cart"));
    console.log("Массив перенесен в переменную");
    // $.POST('korzina.php', cart);
    
    console.log(JSON.parse(cart[0][1]));
    //цикл для items
    // var i = 0;
    for(let key = 0; key < cart.length; key++){
        
        
        //цикл для item
        // if(key == i){
            // for(let key1 = 0; key1 < JSON.parse(cart[key][1]).length; key1++){
                document.getElementById("korz__order_container").innerHTML += "<div id='korz__order"+key+"' class='korz__order' data-price='110'></div>";
                // document.getElementById("korz__order"+key).innerHTML = '';
                // document.getElementById("korz__order-clear"+key).innerHTML = "<button type='submit'><img src='images/korz-clear.png' alt=''></button>";
                document.getElementById("korz__order"+key).innerHTML += "<div id='korz__order-clear"+key+"' class='korz__order-clear'><button type='submit'><img src='images/korz-clear.png' alt='Удалить'></button></div><div id='korz__container"+key+"' class='korz__container'></div>";
                document.getElementById("korz__container"+key).innerHTML += "<div id='korz__order-image"+key+"' class='korz__order-image'></div><div id='korz__order-title"+key+"' class='korz__order-title'></div><div id='korz__order-weight"+key+"' class='korz__order-weight'></div><div id='calc"+key+"' class='calc'></div><div id='korz__order-price"+key+"' class='korz__order-price'></div>";
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
                    let price = JSON.parse(cart[key][1])[3][1];
                    let count = JSON.parse(cart[key][1])[6][1];
                    let sum = price * count;
                    console.log(sum);
                    document.getElementById("korz__order-price"+key).innerHTML += "<p>"+sum+" ₽</p>";
                // }
                //вес
                
                // if(key1 == 4){
                    // console.log(JSON.parse(cart[key][1])[key1][1]);
                    document.getElementById("korz__order-weight"+key).innerHTML += "<p>"+JSON.parse(cart[key][1])[4][1]+JSON.parse(cart[key][1])[5][1]+"</p>";
                // }
                
                //количество в корзине
                // if(key1 == 6){
                //     console.log(JSON.parse(cart[key][1])[key1][1]);
                    document.getElementById("calc"+key).innerHTML += "<button type='submit' onclick='this.nextElementSibling.stepDown(); this.nextElementSibling.onchange(); minus"+key+"();' class='calc-count minus'>-</button><input name='num_product' class='calc-num' type='number' value='"+JSON.parse(cart[key][1])[6][1]+"'><button type='submit' onclick='this.previousElementSibling.stepUp(); this.previousElementSibling.onchange(); plus();' class='calc-count plus'>+</button>";
                // }
                
            // document.getElementById("korz__order_container").innerHTML = "</div>";
            // }
        // }
        // i++;
        function minus0(){
            if (sessionStorage.getItem("cart")) {
                console.log(JSON.parse(sessionStorage.getItem("cart")));
                cart = new Map(JSON.parse(sessionStorage.getItem("cart"))); //sessionStorage.setItem("cart", input.val());
                console.log("Массив перенесен в переменную");
                console.log(cart);
                let num = JSON.parse(cart[key][1])[6][1];
                --num;
                var map = new Map([
                    ['id', JSON.parse(cart[key][1])[0][1]],
                    ['name', JSON.parse(cart[key][1])[1][1]],
                    ['photo', JSON.parse(cart[key][1])[2][1]],
                    ['price', JSON.parse(cart[key][1])[3][1]],
                    ['weight', JSON.parse(cart[key][1])[4][1]],
                    ['units', JSON.parse(cart[key][1])[5][1]],
                    ['count', num]
                ]);
                cart = cart.set(JSON.parse(cart[key][1])[0][1], JSON.stringify(Array.from(map.entries())));
                alert("Количество уменьшено");
                sessionStorage.setItem("cart", JSON.stringify(Array.from(cart.entries())));
            }
        }
        function plus(){
            if (sessionStorage.getItem("cart")) {
                console.log(JSON.parse(sessionStorage.getItem("cart")));
                cart = new Map(JSON.parse(sessionStorage.getItem("cart"))); //sessionStorage.setItem("cart", input.val());
                console.log("Массив перенесен в переменную");
                console.log(cart);
                let num = JSON.parse(cart[key][1])[6][1];
                ++num;
                var map = new Map([
                    ['id', JSON.parse(cart[key][1])[0][1]],
                    ['name', JSON.parse(cart[key][1])[1][1]],
                    ['photo', JSON.parse(cart[key][1])[2][1]],
                    ['price', JSON.parse(cart[key][1])[3][1]],
                    ['weight', JSON.parse(cart[key][1])[4][1]],
                    ['units', JSON.parse(cart[key][1])[5][1]],
                    ['count', num]
                ]);
                cart = cart.set(JSON.parse(cart[key][1])[0][1], JSON.stringify(Array.from(map.entries())));
                alert("Количество увеличено");
                sessionStorage.setItem("cart", JSON.stringify(Array.from(cart.entries())));
            }
        }
    }
    }
    else{
    //document.getElementById("korz__orders").innerHTML = a;
    document.getElementById("empty_korz").innerHTML = "В корзине пусто.";
    }
    </script>
<?php include 'template/footer.php'; ?>	