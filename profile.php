<?php include 'connect.php';?>
<?php include 'template/head.php'; ?>
<?php include 'template/nav.php'; ?>
<?php
if(empty($_SESSION['login'])){
    header( header: 'Location: /');
    die();
}
$photo_user = '';
// if(!empty($_SESSION['photo'])){
//     if(is_null($_SESSION['photo'])){
//         $photo_user = "images/account.png";
//     }
//     else{
//         $photo_user = $_SESSION['photo'];
//     }
    
// }
if(!empty($_SESSION['photo'])){
    $photo_user = $_SESSION['photo'];
}
else{
    $photo_user = "images/account.png";
}
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
                            <form action="" method="post">
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
                    <div class="orders-user__items">
                        <div class="orders-user__item">
                            <div class="item__container">
                                <div class="item__img">
                                    <img src="images/true_orders.png" alt="Статус заказа">
                                </div>
                                <div class="item__num-order">
                                    <h4>№ 01</h4>
                                </div>
                                <div class="item__date_time_status">
                                    <p>Статус</p>
                                    <p>01 января 2024 в 10:00</p>
                                </div>
                                <div class="item__price">
                                    <h4>299 ₽</h4>
                                </div>
                                
                            </div>
                        </div>
                        <?php 
                                $sql = mysqli_query($connection1, "SELECT numId_order FROM orders WHERE id_user='{$_SESSION['id_user']}'");
                                $numId = array();
                                while ($result = mysqli_fetch_array($sql)) {
                                    $numId[] = $result['numId_order'];
                                    // echo "<h2>{$result['numId_order']}</h2>";
                                }
                                $res = array_unique($numId);
                                foreach($res as $key => $item){
                                    $sql1 = mysqli_query($connection1,"SELECT * FROM orders WHERE numId_order = '$res[$key]'");
                                    $num_row = mysqli_num_rows($sql1);
                                    while($results = mysqli_fetch_array($sql1)){
                                        $img_order = "";
                                        if($results["id_status"] == 1){
                                            $img_order = "images/processing_orders.png";
                                        }
                                        else if($results["id_status"] == 2 || $results["id_status"] == 3){
                                            $img_order = "images/accept_orders.png";
                                        }
                                        else if($results["id_status"] == 4 || $results["id_status"] == 5 || $results["id_status"] == 6){
                                            $img_order = "images/true_orders.png";
                                        }
                                        else if($results["id_status"] == 7){
                                            $img_order = "images/false_orders.png";
                                        }
                                        else{
                                            $img_order = "images/error_orders.png";
                                        }

                                        echo '<div class="orders-user__item"><div class="item__container"><div class="item__img"><img src="'.$img_order.'" alt="Статус заказа"></div>
                                        <div class="item__num-order">
                                            <h4>№ '.$res[$key].'</h4>
                                        </div>
                                        <div class="item__date_time_status">
                                            <p>Статус</p>
                                            <p>01 января 2024 в 10:00</p>
                                        </div>
                                        <div class="item__price">
                                            <h4>299 ₽</h4>
                                        </div>
                                        
                                    </div>{$results["numId_order"]}</div>';
                                    }
                                }
                                ?>
                    </div>
                </div>
            </div>
        </div>
        
    </main>
    <?php include 'auth_check.php'; ?>
<?php include 'template/footer.php'; ?>	