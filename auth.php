<?php include 'template/head.php'; ?>
<?php include 'template/nav.php'; ?>
<?php
if(!empty($_SESSION['login'])){
    header( header: 'Location: /');
    die();
}
?>
<?php include 'auth_check.php'; ?>
    <main>
        <div class="auth">
            <div class="auth__container container">
                <div class="auth__title">
                    <div class="auth__title-image">
                        <img src="images/account.png" alt="">
                    </div>
                    <h2>Вход</h2>
                </div>
                <div class="auth__form">
                    <form action="" method="post">
                        <input class="" type="text" name="log" placeholder="Логин"><br>
                        <input type="password" name="pass" placeholder="Пароль"><br>
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
