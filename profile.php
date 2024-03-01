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
        </div>
    </main>
    <?php include 'auth_check.php'; ?>
<?php include 'template/footer.php'; ?>	