<?php
// function addToCart($productId, $quantity) {
    
// }
//if(!empty($_SESSION['login'])){
    if(isset($_POST['submit'])){
        // Проверяем, существует ли уже корзина
        if(isset($_SESSION['cart'])) {
            $cart = $_SESSION['cart'];
        }
    
        // Если корзина не существует, инициализируем массив
        if(!isset($cart)) {
            $cart = array();
        }
        //Если корзина существует и если она не пуста, 
        if(isset($cart)){
            if(!empty($cart)){
                // foreach($cart as $key => $item){
                    //if(!empty($item["id_product"])){
                        //if(in_array($_POST["id_product"], $cart[$key])){
                            
                        //}
                        
                   // }
                // }
                for($key=0;$key<count($cart);$key++){
                    if($cart[$key]["id_product"] == $_POST["id_product"]){
                        ++$cart[$key]["num_product"]/* = $cart[$key]["num_product"] + 1*/;
                        $_SESSION["message"] = 'Такой товар в корзине есть '.$cart[$key]["num_product"];
                        // Сохраняем корзину в сессии
                        $_SESSION['cart'] = $cart;
                        header( header: 'Location:'.$_SERVER['PHP_SELF']);
                        die();
                    }
                }
                for($key=0;$key<count($_SESSION['cart']);$key++){
                    if(!in_array($_POST["id_product"], $cart[$key])){
                        // Добавляем товар в корзину
                        $cart[] = array(
                            'id_product' => $_POST["id_product"],
                            'num_product' => 1
                        );
                        // Сохраняем корзину в сессии
                        $_SESSION['cart'] = $cart;
                        $_SESSION["message"] = 'Товар добавлен в корзину! 1';
                        header( header: 'Location:'.$_SERVER['PHP_SELF']);
                        die();
                    }
                }
                
                
            }
            else{
                // Добавляем товар в корзину
                $cart[] = array(
                    'id_product' => $_POST["id_product"],
                    'num_product' => 1
                );
                // Сохраняем корзину в сессии
                $_SESSION['cart'] = $cart;
                $_SESSION["message"] = 'Товар добавлен в корзину! 0';
                header( header: 'Location:'.$_SERVER['PHP_SELF']);
                die();
            }
        }
    }
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