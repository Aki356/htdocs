<?php
if(isset($_POST['edit'])){
    ?>
    <?php include 'template/head.php'; ?>
<?php include 'template/nav.php'; ?>
    <main>
        <div class="auth">
            <div class="auth__container container">
                <div class="auth__title">
                    <div class="auth__title-image">
                        <img src="images/account.png" alt="">
                    </div>
                    <h2>Редактировать данные</h2>
                </div>
                <div class="auth__form">
                    <form action="profile.php" method="post">
                        <input class="" type="text" name="log" placeholder="Логин">
                        <button name="log-btn" type="submit">Изменить логин</button>
                    </form>
                    <form action="profile.php" method="post">
                    <input type="password" name="old_pass" placeholder="Старый пароль"><br>
                        <input class="" type="password" name="new_pass" placeholder="Новый пароль"><br>
                        <button name="pass-btn" type="submit">Изменить пароль</button>
                    </form>
                    <form action="profile.php" method="post">
                    <input class="" type="text" name="name" placeholder="Имя пользователя">
                        <button name="name-btn" type="submit">Изменить имя</button>
                    </form>
                    <form action="profile.php" method="post">
                    <input type="text" name="phone" class="mask-phone" placeholder="Номер телефона">
                        <button name="phone-btn" type="submit">Изменить телефон</button>
                    </form>
                        
                </div>
            </div>
        </div>
    </main>
<?php include 'template/footer.php'; ?>	
    
    <?php
}
else{
    header( 'Refresh:0; url=/' );
            die();
}
?>