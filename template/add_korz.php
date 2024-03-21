
<?php
// function addToCart($productId, $quantity) {
    
// }
//if(!empty($_SESSION['login'])){


    // от сюда
    // if(isset($_POST['submit'])){
    //     // Проверяем, существует ли уже корзина
    //     if(isset($_SESSION['cart'])) {
    //         $cart = $_SESSION['cart'];
    //     }
    
    //     // Если корзина не существует, инициализируем массив
    //     if(!isset($cart)) {
    //         $cart = array();
    //     }
    //     //Если корзина существует и если она не пуста, 
    //     if(isset($cart)){
    //         if(!empty($cart)){
    //             // foreach($cart as $key => $item){
    //                 //if(!empty($item["id_product"])){
    //                     //if(in_array($_POST["id_product"], $cart[$key])){
                            
    //                     //}
                        
    //                // }
    //             // }
    //             for($key=0;$key<count($cart);$key++){
    //                 if($cart[$key]["id_product"] == $_POST["id_product"]){
    //                     ++$cart[$key]["num_product"]/* = $cart[$key]["num_product"] + 1*/;
    //                     $_SESSION["message"] = 'Такой товар в корзине есть '.$cart[$key]["num_product"];
    //                     // Сохраняем корзину в сессии
    //                     $_SESSION['cart'] = $cart;
    //                     header( header: 'Location:'.$_SERVER['PHP_SELF']);
    //                     die();
    //                 }
    //             }
    //             for($key=0;$key<count($_SESSION['cart']);$key++){
    //                 if(!in_array($_POST["id_product"], $cart[$key])){
    //                     // Добавляем товар в корзину
    //                     $cart[] = array(
    //                         'id_product' => $_POST["id_product"],
    //                         'num_product' => 1
    //                     );
    //                     // Сохраняем корзину в сессии
    //                     $_SESSION['cart'] = $cart;
    //                     $_SESSION["message"] = 'Товар добавлен в корзину! 1';
    //                     header( header: 'Location:'.$_SERVER['PHP_SELF']);
    //                     die();
    //                 }
    //             }
                
                
    //         }
    //         else{
    //             // Добавляем товар в корзину
    //             $cart[] = array(
    //                 'id_product' => $_POST["id_product"],
    //                 'num_product' => 1
    //             );
    //             // Сохраняем корзину в сессии
    //             $_SESSION['cart'] = $cart;
    //             $_SESSION["message"] = 'Товар добавлен в корзину! 0';
    //             header( header: 'Location:'.$_SERVER['PHP_SELF']);
    //             die();
    //         }
    //     }
    // }
    // до сюда


// }
// else{
//     if(isset($_POST['submit'])){
//         echo '<div class="answear">
//         <div class="alert alert-secondary" role="alert">
//         Перед тем, как добавлять товары, войдите в аккаунт.<br>
//         <a href="auth.php">Войти</a></div></div>';
//     }
// }
?>
<script>
    // var key_cart = 0;
    
    function addCart<?php echo $result['id_product'];?>(){
        //var map = new Map();
        if (sessionStorage.getItem("cart")) {
            console.log(JSON.parse(sessionStorage.getItem("cart")));
            cart = new Map(JSON.parse(sessionStorage.getItem("cart"))); //sessionStorage.setItem("cart", input.val());
            console.log("Массив перенесен в переменную");
            console.log(cart);
        }
        if (typeof cart === 'undefined') {
            cart = new Map();
            console.log("Массив создан");
        }
        //console.log(map.entries());
        
        if (sessionStorage.getItem("cart")) {
            
            if(cart.has(<?php echo $result['id_product'];?>)){
                map = JSON.parse(cart.get(<?php echo $result['id_product'];?>));
                console.log(map[6][0]);
                for (let pair of map) {
                    // pair - это массив [key, values]
                    // console.log(pair[0]); // ключ
                    // console.log(pair[1]); // значение
                    console.log(`Ключ = ${pair[0]}, значение = ${pair[1]}`);
                    if(pair[0] == "count"){
                        console.log(pair[0]);
                        console.log(pair[1]);
                        let item = pair[1];
                        ++item;
                        map = new Map([
                        ['id', <?php echo $result['id_product'];?>],
                        ['name', '<?php echo $result['name_product'];?>'],
                        ['photo', '<?php echo $result['photo_product'];?>'],
                        ['price', '<?php echo $result['price_product'];?>'],
                        ['weight', '<?php echo $result['weight_product'];?>'],
                        ['units', '<?php echo $result['units_product'];?>'],
                        ['count', item]
                        ]);
                    }
                }

                // map1 = cart.get(2);
                // let item = map.get("count");
                // ++item;
                
                console.log(map.get("count"));
                
                // console.log(cart.get(2));
                cart = cart.set(<?php echo $result['id_product'];?>, JSON.stringify(Array.from(map.entries())));
                alert("Такой товар в корзине есть!");
                sessionStorage.setItem("cart", JSON.stringify(Array.from(cart.entries())));
            }
            if(!cart.has(<?php echo $result['id_product'];?>)){
                map = new Map([
                ['id', <?php echo $result['id_product'];?>],
                ['name', '<?php echo $result['name_product'];?>'],
                ['photo', '<?php echo $result['photo_product'];?>'],
                ['price', '<?php echo $result['price_product'];?>'],
                ['weight', '<?php echo $result['weight_product'];?>'],
                ['units', '<?php echo $result['units_product'];?>'],
                ['count', 1]
                ]);
                
                // for (let pair of map.entries()) {
                // // pair - это массив [key, values]
                // // console.log(pair[0]); // ключ
                // // console.log(pair[1]); // значение
                // console.log(`Ключ = ${pair[0]}, значение = ${pair[1]}`);
                // }
                cart = cart.set(<?php echo $result['id_product'];?>, JSON.stringify(Array.from(map.entries())));
                // ++key_cart;
                sessionStorage.setItem("cart", JSON.stringify(Array.from(cart.entries())));
                alert("Товар добавлен в корзину! 1");
            }
        }
        else{
            if(!cart.has(<?php echo $result['id_product'];?>)){
                map = new Map([
                ['id', <?php echo $result['id_product'];?>],
                ['name', '<?php echo $result['name_product'];?>'],
                ['photo', '<?php echo $result['photo_product'];?>'],
                ['price', '<?php echo $result['price_product'];?>'],
                ['weight', '<?php echo $result['weight_product'];?>'],
                ['units', '<?php echo $result['units_product'];?>'],
                ['count', 1]
                ]);
                console.log(map.get("count"));
                // for (let pair of map.entries()) {
                // // pair - это массив [key, values]
                // // console.log(pair[0]); // ключ
                // // console.log(pair[1]); // значение
                // console.log(`Ключ = ${pair[0]}, значение = ${pair[1]}`);
                // }
                cart = cart.set(<?php echo $result['id_product'];?>, JSON.stringify(Array.from(map.entries())));
                // ++key_cart;
                sessionStorage.setItem("cart", JSON.stringify(Array.from(cart.entries())));
                alert("Товар добавлен в корзину! 0");
            }
        }
    }
</script>