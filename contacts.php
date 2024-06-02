<?php include 'template/head.php'; ?>
<?php include 'template/nav.php'; ?>
<?php
include ("connect.php");
if (!$connection1) {
    echo 'Не могу соединиться с БД. Код ошибки: ' . mysqli_connect_errno() . ', ошибка: ' . mysqli_connect_error();
    exit;
}
if (isset($_SESSION['message'])){
    echo '<div class="answear">
    <div class="alert alert-primary" role="alert">'.$_SESSION['message'].'</div></div>';
    unset($_SESSION['message']);
}
?>
<main>
<div class="contacts">
    <div class="container">
        <div class="title">
            <h2>Контакты</h2>
        </div>
        <div class="contacts__items">
            <div class="contacts__map">
            <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Ace4c0c694a01e130c9b1e3b4099f29e6185a8399a0650d99c9e8cc174fa3ccba&amp;width=590&amp;height=340&amp;lang=ru_RU&amp;scroll=true"></script>
            </div>
            <div class="contacts__info">
                <h5>Лесопарковая улица, 15, Челябинск</h5>
                <div class="contacts__info_phone-close"><a class="contacts__info_phone" href="tel:+79939312004">+79939312004</a><p class="contacts__info_close">Закроется в 23:00</p></div>
            </div>
        </div>
    </div>
</div>
</main>

<?php include 'template/footer.php'; ?>	