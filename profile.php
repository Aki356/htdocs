<?php include 'template/head.php'; ?>
<?php include 'template/nav.php'; ?>
<?php include 'connect.php';?>
<?php include 'edit_check.php'; ?>	
<?php
// if(empty($_SESSION['login'])){
//     header( header: 'Location: /');
//     die();
// }

$photo_user = '';
if(!empty($_SESSION['photo'])){
    if(is_null($_SESSION['photo'])){
        $photo_user = "images/account.png";
    }
    else{
        $photo_user = $_SESSION['photo'];
    }
    
}
else{
    $photo_user = "images/account.png";
}
// if(!empty($_SESSION['photo'])){
//     $photo_user = $_SESSION['photo'];
// }
// else{
//     $photo_user = "images/account.png";
// }
$log = $_SESSION['login'];
if(!empty($_SESSION['name'])){
    $name = $_SESSION['name'];
}
else{
    $name = "Имя Пользователя";
}
if(!empty($_SESSION['phone'])){
    $phone = $_SESSION['phone'];
}
else{
    $phone = "Номер телефона";
}
?>
<?php
if(isset($_POST['exit'])){
    session_unset();
    session_destroy();
    header("Location: /");
    exit;
}
?>
    <main>
        <div class="auth">
            <div class="container">
                <div class="auth__title">
                    <div class="auth__title-image">
                        <img src="images/account.png" alt="">
                    </div>
                    <h2>Аккаунт</h2>
                </div>
                <div class="profile__container">
                    <div class="profile__image">
                        <img src="<?= $photo_user?>" alt="Ваше фото">
                    </div>
                    <div class="profile__info">
                        <h2><?= $name?></h2>
                        <div class="profile__info-phone">
                            <div class="profile__info-phone-img"><img src="images/phone-acc.png" alt=""></div>
                            <h4><?= $phone?></h4>
                        </div>
                        <div class="profile__btn">
                            <form action="edit.php" method="post">
                                <button class="profile__btn-edit" name="edit" type="submit">Редактировать</button>
                            </form>
                            <form action="" method="post">
                                <button class="profile__btn-exit" name="exit" type="submit">Выход</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="orders-user">
                    <div class="orders-user title">
                        <h3>История заказов</h3>
                    </div>
                    <div id="orders-user__items" class="orders-user__items">
                        <?php 
                                $sql = mysqli_query($connection1, "SELECT * FROM orders INNER JOIN status ON orders.id_status=status.id_status WHERE id_user='".$_SESSION['id_user']."' ORDER BY id_order DESC");
                                $numId = array();
                                $status = array();
                                $all = array();
                                //var_dump($sql);
                                if($sql){
                                //     $num_rows = mysqli_num_rows($sql);
                                // if($num_rows > 0){
                                    while ($result = mysqli_fetch_array($sql)) {
                                    $numId[] = $result['numId_order'];
                                    $status[] = array("id"=>$result['numId_order'], "id_status" => $result['id_status'], "name_status" => $result['name_status'],"sumAll" => $result['sumAll_order'], "date" => $result['date_order'], "time" => $result['time_order']);
                                    
                                    
                                    // echo "<h2>{$result['numId_order']}</h2>";
                                }
                                $res = array_unique($numId);
                                //echo count($res);
                                //print_r($status);
                                //echo"<br>";
                                //print_r($res);
                                //print_r($all);
                                foreach($res as $k_i => $item_i){
                                    //echo $item_i;
                                    
                                    //echo $k_s;
                                    $sql1 = mysqli_query($connection1,"SELECT * FROM `orders` INNER JOIN product ON orders.id_products=product.id_product INNER JOIN status ON orders.id_status=status.id_status WHERE numId_order = '$item_i'");
                                    $num_row = mysqli_num_rows($sql1);
                                    
                                    $img_order = "";
                                    foreach($status as $k_s => $item_s){
                                        //print_r($item_s["id"]);
                                        if($item_s["id"] == $item_i){
                                            
                                            if($item_s["id_status"] == 1){
                                                $img_order = "images/processing_orders.png";
                                            }
                                            else if($item_s["id_status"] == 2 || $item_s["id_status"] == 3){
                                                $img_order = "images/accept_orders.png";
                                            }
                                            else if($item_s["id_status"] == 4 || $item_s["id_status"] == 5 || $item_s["id_status"] == 6){
                                                $img_order = "images/true_orders.png";
                                            }
                                            else if($item_s["id_status"] == 7){
                                                $img_order = "images/false_orders.png";
                                            }
                                            else{
                                                $img_order = "images/error_orders.png";
                                            }
                                            
                                            echo '<div class="orders-user__item">
                                    <div class="item__container-flex">
                                        <div class="item__img">
                                        <img src="'.$img_order.'" alt="Статус заказа">
                                        </div>
                                        <div class="item__container">
                                        <div class="item__info">
                                        <div class="item__num-order">
                                                    <h4>№ '.$item_i.'</h4>
                                                    </div>
                                                    <div class="item__date_time_status"><p>'.$item_s["name_status"].'</p>
                                                    <p>'.$item_s["date"].' в '.$item_s["time"].'</p>
                                                    </div>
                                                <div class="item__price">
                                                    <h4>'.$item_s["sumAll"].' ₽</h4>
                                                    </div>
                                                    </div>
                                                    <details class="item__more">
                                                    <summary>Подробнее</summary>
                                                <ul>';
                                                while($results = mysqli_fetch_array($sql1)){
                                                echo '<li class="item__more-li"><p class="item__more-p">'.$results["name_product"].'</p> <p>'.$results["count_order"].' x '.$results["price_product"].' ₽</p></li>';}
                                                echo '</ul>
                                            </details>
                                            </div>
                                            </div>
                                            </div>';
                                            break;
                                        }
                                        else{
                                            $img_order = "images/error_orders.png";
                                        }
                                    }

                                    
                                    // while($results = mysqli_fetch_array($sql1)){
                                        

                                    //     /*echo '<div class="orders-user__item"><div class="item__container"><div class="item__img"><img src="" alt="Статус заказа"></div>
                                    //     <div class="item__num-order">
                                    //         <h4>№ </h4>
                                    //     </div>
                                    //     <div class="item__date_time_status">
                                    //         <p>Статус</p>
                                    //         <p>01 января 2024 в 10:00</p>
                                    //     </div>
                                    //     <div class="item__price">
                                    //         <h4>299 ₽</h4>
                                    //     </div>
                                        
                                    // </div></div>';*/
                                    // }
                                }
                                // }
                                }
                                
                                ?>
                                <div id="orders__gradient" class="orders__gradient"></div>
                            <a class="orders__link-show_more" id="button">Показать больше</a>
                    </div>
                </div>
            </div>
        </div>
        
    </main>
    <script>
        window.onload = function () {
        var box=document.getElementsByClassName('orders-user__item');
        var btn=document.getElementById('button');
        var div=document.getElementById('orders__gradient');
        if(box.length > 0){
            for (let i=3;i<box.length;i++) {
                box[i].style.display = "none";
            }
            var countD = 3;
            btn.addEventListener("click", function() {
                var box=document.getElementsByClassName('orders-user__item');
                
                if (countD < box.length){
                    for(let i=0;i<countD;i++){
                        box[i].style.display = "block";
                    }
                }
                else{
                    for(let i=0;i<countD;i++){
                        box[i].style.display = "block";
                    }
                    btn.style.display = "none";
                    div.style.display = "none";
                }
                countD += 3;

            })
        }
        else{
            btn.style.display = "none";
            div.style.display = "none";
            document.getElementById("orders-user__items").innerHTML += "<div class='orders-user__empty'>Вы ещё не совершили ни одного заказа.</div>";
        }
    }
    </script>
    <?php include 'auth_check.php'; ?>
<?php include 'template/footer.php'; ?>