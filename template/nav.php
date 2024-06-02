<?php 

$ava = 'images/';
$avaFile = 'account.png';

if(empty($_SESSION['login'])){
    $account = "auth.php";
}
else{
    $account = "profile.php";
    if($_SESSION['login'] == 'admin'){
        $panel_a = '<li><a href="admin.php">Панель администратора</a></li>';
        $all_orders = '<li><a href="all_orders.php">Все заказы</a></li>';
    }
    else{
        $panel_a = '';
        $all_orders = '';
    }
}
if(!empty($_SESSION['photo'])){
    $photo_user = $_SESSION['photo'];
}
else{
    $photo_user = "images/account.png";
}
//$panel_a = '';

?>
<div class="mob-btn">
        <img src="images/mob-btn.png" alt="">
    </div>
    <div class="mob-menu">
        <div class="mob-menu__logo">
            <img src="images/logo.png" alt="">
        </div>
        <div class="mob-menu__top"></div>
        <div class="mob-menu__menu">
            <ul>
                <li><a href="menu.php">Меню</a></li>
                <li><a href="contacts.php">Контакты</a></li>
                <li><a href="menu.php">Меню</a></li>
                <li><a href="#">Отзывы</a></li>
                <li><a href="#">О нас</a></li>
                <li><a href="#">Контакты</a></li>
            </ul>
        </div>
    </div>
    <header>
        <div class="top container">
            <div class="top__logo">
                <a href="index.php"><img src="images/logo.png" alt=""></a>
            </div>
            <div class="top__menu">
                <ul>
                    <li><a href="menu.php">Меню</a></li>
                    <li><a href="contacts.php">Контакты</a></li>
                    <?php 
                    if(!empty($_SESSION['login'])){
                        if($_SESSION['login'] == 'admin'){
                            echo $panel_a;
                            echo $all_orders;
                        }
                    }
                    ?>
                </ul>
            </div>
            <div class="top__number">
                <div class="top__pict">
                    <img src="images/number.png" alt="">
                </div>
                <div class="top__text">
                    <p><a href="tel:+79939312004">+79939312004</a></p>
                </div>
            </div>
            <div class="top__korz-account">
                <a class="korz-img" href="korzina.php"><img src="images/korz.png" alt=""></a>                
                <a class="account-img" href="<?= $account?>"><img src="<?= $photo_user?>" alt=""></a>
                <!-- <a href="auth.php"><img src="images/account.png" alt=""></a> -->
            </div>
        </div>
        <?php
        error_reporting(E_ALL);
        ini_set('display_errors', 'On');
        ?>
    </header>