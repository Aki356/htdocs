<?php include 'template/head.php'; ?>
<?php include 'template/nav.php'; ?>
    <main>
        <div class="auth">
            <div class="auth__container container">
                <div class="auth__title">
                    <div class="auth__title-image">
                        <img src="images/account.png" alt="">
                    </div>
                    <h2>Регистрация</h2>
                </div>
                <div class="auth__form">
                    <form method="post" enctype="multipart/form-data">
                        <input type="text" name="log" placeholder="Логин"><br>
                        <input type="text" name="pass" placeholder="Пароль"><br>
                        <input type="text" name="fio" placeholder="Имя пользователя"><br>
                        <!-- <input type="tel" pattern="[+]{1}[0-9]{11,14}" name="phone" placeholder="Телефон"><br> -->
                        <input type="text" name="phone" class="mask-phone" placeholder="Номер телефона">
                        <!-- <input type="file" class="form-control" id="image" name="Image" placeholder="Ваша фотография"/> -->
                        <button name="submit" type="submit">Зарегистрироваться</button>
                    </form>
                    <div class="auth__form-reg">
                        <p>Уже есть аккаунт? <a href="auth.php">Войти</a></p>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <div class="answear"><?php include 'reg_check.php'; ?></div>
    
<?php include 'template/footer.php'; ?>	