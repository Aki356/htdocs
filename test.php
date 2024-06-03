<?php
include ("connect.php");

if(isset($_POST["form_order"])){
    if(!empty($_SESSION['login'])){
    $cart = array();
    for($key=0; $key<(int)$_POST["sizeForm"]; $key++){
        $cart[(int)$_POST["idForm".$key]] = (int)$_POST["num_product".$key];
    }
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
        $totalPrise = mysqli_query($connection1, "SELECT * FROM product WHERE id_product = '{$key}'");
        while ($result = mysqli_fetch_array($totalPrise)) {
            $price = $result['price_product'];
            $num_product = $item;
            $sum = $price*$num_product;
            $sumAll = $_POST["sumAll"];
            if($rowCount == 0){
                if(!empty($num) && !empty($_SESSION['id_user']) && !empty($key) && !empty($item) && !empty($date) && !empty($time) && !empty($sum) && !empty($sumAll) && !empty($_POST['phone']) && !empty($_POST['email']) && !empty($_POST['payment'])){
                    $order = mysqli_query($connection1, "INSERT INTO orders (numId_order, id_user, phoneUser_order, emailUser_order, id_products, count_order, date_order, time_order, totalPrise_order, sumAll_order, payment_order) VALUES('{$num}', '{$_SESSION['id_user']}', '{$_POST['phone']}', '{$_POST['email']}', '{$key}', '{$item}', '{$date}', '{$time}', '{$sum}', '{$sumAll}', '{$_POST['payment']}')");
                    if($order == "TRUE"){
                        $popular = mysqli_query($connection1, "SELECT * FROM product WHERE id_product = '{$key}'");
                        while($res = mysqli_fetch_array($popular)){
                            if($key == $res["id_product"]){
                                $popular_product = $res["popular_product"] + $item;
                                mysqli_query($connection1, "UPDATE product SET popular_product = '{$popular_product}' WHERE product.id_product = {$key}");
                            }
                        }
                        
                        // $_SESSION["messege"] = "Заказ успешно оформлен!";
                        ?>
                        <script>
                            //sessionStorage.setItem("message", "Успешно оформлен");
                            document.getElementById("set-order__table").innerHTML = "<h3>Заказ успешно оформлен!</h3>";
                            sessionStorage.removeItem("cart");
                            </script>
                        <?php
                    }
                    else{
                        ?>
                        <script>
                            sessionStorage.setItem("message", "Возникла ошибка. Заказ не был оформлен.");
                        </script>
                        <?php
                        
                        // header( header: 'Location: /korzina.php');
                        // die();
                    }
                }
                else{
                    ?>
                        <script>
                            sessionStorage.setItem("message", "Возникла ошибка.");
                        </script>
                        <?php
                    // header( header: 'Location: /korzina.php');
                    // die();
                }
            }
        }
        
    }
}
else {
    ?>
    <script>
        sessionStorage.setItem("message", "Сначала войдите в аккаунт, чтобы оформить заказ.");
    </script>
    <?php
                    }
}

?>
