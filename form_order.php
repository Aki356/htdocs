<?php include 'template/head.php'; ?>
<?php include 'template/nav.php'; ?>
<?php include 'test.php'; ?>
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
    <div class="auth">
        <div class="auth__container">
            <div class="title">
                <h2>Оформление заказа</h2>
            </div>
            <div class="auth__form">
                <form action="" method="post">
                    <input class="" type="text" name="log" placeholder="Номер телефона"><br>
                    <input type="password" name="pass" placeholder="Почта"><br>
                    <button name="submit" type="submit">Войти</button>
                </form>
                <div class="auth__form-reg">
                    <p>Нет аккаунта? <a href="reg.php">Зарегистрируйтесь!</a></p>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include 'template/footer.php'; ?>	