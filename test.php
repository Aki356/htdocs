<?php
if(isset($_POST["submit"])){
    $cart = $_SESSION['cart'];
    $month_list = array(
        1  => 'января',
        2  => 'февраля',
        3  => 'марта',
        4  => 'апреля',
        5  => 'мая', 
        6  => 'июня',
        7  => 'июля',
        8  => 'августа',
        9  => 'сентября',
        10 => 'октября',
        11 => 'ноября',
        12 => 'декабря'
    );
    $date = date('d') . ' ' . $month_list[date('n')] . ' ' . date('Y');
    date_default_timezone_set("Europe/Moscow");
    $time = date('H:i', time());
    $sum = '';
    $numbers = range(1, 214748);
    shuffle($numbers);
    $num = reset($numbers);
    $numRow = mysqli_query($connection1, "SELECT * FROM orders WHERE numId_order = '{$num}' AND date_order = '{$date}' AND time_order = '{$time}' AND id_user = '{$_SESSION['id_user']}'");
    $rowCount = mysqli_num_rows($numRow);
    if($rowCount > 0){
        $numbers = range(1, 214748);
        shuffle($numbers);
        $num = reset($numbers);
    }
    foreach($cart as $key => $item) {
        $totalPrise = mysqli_query($connection1, "SELECT * FROM product WHERE id_product = '{$item['id_product']}'");
        while ($result = mysqli_fetch_array($totalPrise)) {
            $price = $result['price_product'];
            $num_product = $item['num_product'];
            $sum = $price*$num_product;
            
            if($rowCount == 0){
                if(!empty($num) && !empty($_SESSION['id_user']) && !empty($item["id_product"]) && !empty($item["num_product"]) && !empty($date) && !empty($time) && !empty($sum)){
                    echo $num.' '.$_SESSION['id_user'].' '.$item["id_product"].' '.$item["num_product"].' '.$date.' '.$time.' '.$sum;
                    $order = mysqli_query($connection1, "INSERT INTO orders (numId_order, id_user, id_products, count_order, date_order, time_order, totalPrise_order) VALUES('{$num}', '{$_SESSION['id_user']}', '{$item["id_product"]}', '{$item["num_product"]}', '{$date}', '{$time}', '{$sum}')");
                    if($order == "TRUE"){
                        $popular = mysqli_query($connection1, "SELECT * FROM product WHERE id_product = '{$item["id_product"]}'");
                        while($res = mysqli_fetch_array($popular)){
                            if($item["id_product"] == $res["id_product"]){
                                $popular_product = $res["popular_product"] + $item["num_product"];
                                mysqli_query($connection1, "UPDATE product SET popular_product = '{$popular_product}' WHERE product.id_product = {$item["id_product"]}");
                            }
                        }
                        
                        $_SESSION["messege"] = "Заказ успешно оформлен!";
                        unset($_SESSION['cart'][$key]);
                    }
                    else{
                        $_SESSION["messege"] = "Возникла ошибка. Заказ не был оформлен.";
                        header( header: 'Location: /korzina.php');
                        die();
                    }
                }
                else{
                    $_SESSION["messege"] = "Возникла ошибка.";
                    header( header: 'Location: /korzina.php');
                    die();
                }
            }
        }
        
    }
    header( header: 'Location: /korzina.php');
    die();
}

?>