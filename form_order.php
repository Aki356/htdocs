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
    <div class="auth set-order">
        <div class="auth__container container">
            <div class="auth__title">
                <h2>Оформление заказа</h2>
            </div>
            <div id="set-order__table" class="set-order__table auth__form">
                <div class="set-order__items">
                    <div class="title set-order__items-title">
                        <h3>Ваш заказ</h3>
                    </div>
                    <div class="set-order__item table_top">
                        <div class="set-order__item_title">
                            <p>Название</p>
                        </div>
                        <div class="set-order__item_weight">
                            <p>Вес</p>
                        </div>
                        <div class="set-order__item_count-price">
                            <p>Количество<br> и цена</p>
                        </div>
                    </div>
                    <?php 
                    for($key=0; $key<(int)$_POST["sizeForm"]; $key++){
                        //$cart[(int)$_POST["idForm".$key]] = (int)$_POST["num_product".$key];
                        $sql = mysqli_query($connection1, "SELECT * FROM product WHERE id_product = '{$_POST["idForm".$key]}'");
                        while($result = mysqli_fetch_array($sql)){
                            echo '<div class="set-order__item">
                            <div class="set-order__item_title">
                                <p>'.$result["name_product"].'</p>
                            </div>
                            <div class="set-order__item_weight">
                                <p>'.$result["weight_product"].' '.$result["units_product"].'
                            </div>
                            <div class="set-order__item_count-price">
                                <p>'.$_POST["num_product".$key].' x '.$result["price_product"].' ₽</p>
                            </div>
                        </div>';
                        }
                    }
                    //echo $_POST["name"];
                    ?>
                    <div class="title set-order__items-title-price">
                        <h3>Итого к оплате: <?php echo $_POST["sumAll"];?> ₽</h3>
                    </div>
                </div>

                <form method="post">
                    <?php
                    for($key=0; $key<(int)$_POST["sizeForm"]; $key++){
                        echo '<input hidden id="idForm'.$key.'" name="idForm'.$key.'" type="number" value="'.$_POST["idForm".$key].'">
                        <input id="calc-num_input'.$key.'" name="num_product'.$key.'" class="calc-num" type="number" step="1" value="'.$_POST["num_product".$key].'" hidden>';
                    }
                    echo '<input name="sizeForm" type="hidden" value="'.$_POST["sizeForm"].'"><input class="sumAll" name="sumAll" type="hidden" value="'.$_POST["sumAll"].'">';
                    ?>
                    <input required type="text" name="phone" placeholder="Номер телефона"><br>
                    <input required type="email" name="email" placeholder="Почта"><br>
                    <div required class="order-info__inputs">
                        <p><input type="radio" name="payment" value="Наличный" checked> Наличный расчёт</p>
                        <p><input type="radio" name="payment" value="Картой"> Картой через терминал</p>
                    </div>
                    <button class="set-order__btn" name="form_order" type="submit">Заказать</button>
                </form>
            </div>
        </div>
    </div>
</main>

<?php include 'test.php'; ?>
<?php include 'template/footer.php'; ?>	