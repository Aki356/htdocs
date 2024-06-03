<?php include 'template/head.php'; ?>
<?php include 'template/nav.php'; ?>
<?php include 'template/add_korz.php'; ?>
<?php
// if (isset($_SESSION['message'])){
//     echo '<div class="answear">
//     <div class="alert alert-primary" role="alert">'.$_SESSION['message'].'</div></div>';
//     unset($_SESSION['message']);
// }
?>

<?php
//выполним соединение с БД
//$mysqli=new mysqli ("localhost", "root", "","kurs");
// if ($mysqli->connect_error) {
//     die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
// }
//установим кодировку БД
//$mysqli->set_charset("utf8_general_ci");
?>

<?php
$textfile = "";
$textall = "";
$filename = "images/sale.dat";
if (!empty($_POST))
{
    //if ($_POST['value'] == 1){
            $handle=fopen($filename,'a+');
            fwrite($handle,"kat1"."\r\n");
            fclose($handle);
    //}
        //   $fio=$_POST['text1']; //a=10;
        //   $dolzhnost=$_POST['text2'];
        //   $oklad=$_POST['text3'];
        //   $handle=fopen($filename,'a+');
        //   fwrite($handle,$fio."\r\n");
        //   fwrite($handle,$dolzhnost."\r\n");
        //   fwrite($handle,$oklad);
        //   fclose($handle);
}
?>

    <main>
        <div class="slyder">
            <div class="container container-flex">
                <div class="slyder__info">
                    <h1>Ресторан <span>Le Fleur D'OR</span> – 16 лет гастрономического удовольствия!</h1>
                    <p>Вспомните все, что Вы знали о Франции. В ресторане Le Fleur D'OR Вы узнаете о ней чуть больше!</p>
                </div>
                <div class="slyder__photos">
                    <div class="slyder__photo">
                        <img src="images/slyd1.jpg" onclick="displayModal(this);" alt="Ресторан La Rose DOR">
                    </div>
                    <div class="slyder__photo">
                        <img src="images/slyd2.jpg" onclick="displayModal(this);" alt="Ресторан La Rose DOR">
                    </div>
                    <div class="slyder__photo">
                        <img src="images/slyd3.jpg" onclick="displayModal(this);" alt="Ресторан La Rose DOR">
                    </div>
                </div>
            </div>
        </div>
        <div class="popular">
            <div class="popular__top">
            </div>
            <div class="container">
                <div class="title">
                    <h2>Популярное меню</h2>
                </div>
                <div class="popular__items">
                    <?php 
                    include ("connect.php");
                    if (!$connection1) {
                        echo 'Не могу соединиться с БД. Код ошибки: ' . mysqli_connect_errno() . ', ошибка: ' . mysqli_connect_error();
                        exit;
                    }
                    
                    //$sql = mysqli_query($connection1, "SELECT * FROM product");
                    
                    //$srt = mysqli_query($connection1, "SELECT popular_product, id_product FROM product");
                    // $popular_p = array();
                    // $id_p = array();
                    // $photo_p = array();
                    // $name_p = array();
                    // $price_p = array();
                    // $weight_p = array();
                    // $units_p = array();
                    //$arr_data = $res->fetch_all();
                    //$rs = rsort($arr_data);
                    // while($res = mysqli_fetch_array($srt)){
                    //     $popular_p[] = array(
                    //         'id' => $res['id_product'],
                    //         'popular' => $res['popular_product']
                    //     );
                        
                        // $popular_p[] = $res['popular_product'];
                        // $id_p[] = $res['id_product'];
                    // }
                    // foreach($popular_p as $key => $item) {
                    //     // $sql = mysqli_query($connection1, "SELECT * FROM product WHERE id_product = '{$item['id_product']}'");
                    //     // while ($result = mysqli_fetch_array($sql)) {
                    //     rsort($popular_p[$item['popular']]);
                    // }
                    //print_r($popular_p);
                    //rsort($popular_p);
                    //for($i = 0; $i < 9; $i++){
                        $sql = mysqli_query($connection1, "SELECT * FROM product ORDER BY product.popular_product DESC LIMIT 9");
                        while ($result = mysqli_fetch_array($sql)) {
                            // $id_p[] = $result['id_product'];
                            // $photo_p[] = $result['photo_product'];
                            // $name_p[] = $result['name_product'];
                            // $price_p[] = $result['price_product'];
                            // $weight_p[] = $result['weight_product'];
                            // $units_p[] = $result['units_product'];
                            echo "<div class='popular__item'>
                            <div class='item-photo'>
                            <img src={$result['photo_product']} >
                            </div>
                            <div class='item-info'>
                            <div class='item-name'>
                            <h3>{$result['name_product']}</h3></div>
                            <div>
                            <div class='price-weight'>
                                <h4>{$result['price_product']} ₽</h4>
                                <p>{$result['weight_product']} {$result['units_product']}</p>
                            </div>
                            
                            <div class='add-korz'>
                                
                                <input type='hidden' name='id_product' value='{$result['id_product']}'>
                                <button id='{$result['id_product']}' onclick='addCart{$result['id_product']}()' class='add-korz-btn' type='submit' name='submit'>В корзину</button>
                                
                            </div>
                            </div>
                            </div></a>";
                            include 'template/add_korz.php';
                            echo "</div>";
                        }
                    //}
                    ?>    
                    <!-- <div id="item1" class="popular__item">
                        <div class="popular__item-photo">
                            <img src="images/menu_img/soups/product1.jpg" alt="">
                        </div>
                        <div class="popular__item-info">
                            <h3>Греческий салат с фетаксой</h3>
                            <div class="popular__price-weight">
                                <h4>{$price_p[$i]}</h4>
                                <p>{$weight_p[$i]}</p>
                            </div>
                            <div class="popular__calc">
                                <div class="popular__calc-count">
                                    -
                                </div>
                                <div class="popular__calc-num">
                                    1
                                </div>
                                <div class="popular__calc-count">
                                    +
                                </div>

                            </div>
                            
                            <div class="popular__add-korz">
                                <button type="submit" value="1" name="kat1">В корзину</button>
                            </div>
                        </div>
                    </div> -->
                    <!-- <div id="item2" class="popular__item">
                        <div class="popular__item-photo">
                            <img src="images/popular2.jpg" alt="">
                        </div>
                        <div class="popular__item-info">
                            <form action="menu_check.php" method="post">     
                                <h3 name="name_menu">Греческий салат с фетаксой</h3>
                                <div class="popular__calc">
                                    <button  class="popular__calc-count">
                                        -
                                    </button>
                                    <input type="number" name="calc-num" class="popular__calc-num" value="1">
                                    </input>
                                    <button class="popular__calc-count">
                                        +
                                    </button>

                                </div>
                                
                                <div class="popular__add-korz">
                                    <button type="submit" value="2" name="kat2">В корзину</button>
                                </div>
                            </form>
                        </div>
                    </div> -->
                    <!-- <div id="item3" class="popular__item">
                        <div class="popular__item-photo">
                            <img src="images/popular3.jpg" alt="">
                        </div>
                        <div class="popular__item-info">
                            <h3>Греческий салат с фетаксой</h3>
                            <div class="popular__calc">
                                <div class="popular__calc-count">
                                    -
                                </div>
                                <div class="popular__calc-num">
                                    1
                                </div>
                                <div class="popular__calc-count">
                                    +
                                </div>

                            </div>
                            
                            <div class="popular__add-korz">
                                <button type="submit" value="3" name="kat3">В корзину</button>
                            </div>
                        </div>
                    </div> -->
                    <!-- <div id="item4" class="popular__item">
                        <div class="popular__item-photo">
                            <img src="images/popular3.jpg" alt="">
                        </div>
                        <div class="popular__item-info">
                            <h3>Греческий салат с фетаксой</h3>
                            <div class="popular__calc">
                                <div class="popular__calc-count">
                                    -
                                </div>
                                <div class="popular__calc-num">
                                    1
                                </div>
                                <div class="popular__calc-count">
                                    +
                                </div>

                            </div>
                            
                            <div class="popular__add-korz">
                                <button type="submit" value="4" name="kat4">В корзину</button>  
                            </div>
                        </div>
                    </div> -->
                    <!-- <div class="popular__item">
                        <div class="popular__item-photo">
                            <img src="images/popular3.jpg" alt="">
                        </div>
                        <div id="item5" class="popular__item-info">
                            <h3>Греческий салат с фетаксой</h3>
                            <div class="popular__calc">
                                <div class="popular__calc-count">
                                    -
                                </div>
                                <div class="popular__calc-num">
                                    1
                                </div>
                                <div class="popular__calc-count">
                                    +
                                </div>
                            </div>
                            <div class="popular__add-korz">
                                <button type="submit" value="5" name="kat5">В корзину</button>
                            </div>
                        </div>
                    </div> -->
                    <!-- <div class="popular__item">
                        <div class="popular__item-photo">
                            <img src="images/popular3.jpg" alt="">
                        </div>
                        <div id="item6" class="popular__item-info">
                            <h3>Греческий салат с фетаксой</h3>
                            <div class="popular__calc">
                                <div class="popular__calc-count">
                                    -
                                </div>
                                <div class="popular__calc-num">
                                    1
                                </div>
                                <div class="popular__calc-count">
                                    +
                                </div>

                            </div>
                            
                            <div class="popular__add-korz">
                                <button type="submit" value="6" name="kat6">В корзину</button>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
        <div class="gallery">
            <div class="container">
                <div class="gift">
                    <div class="gift__title">
                        <h2>Подарочные сертификаты</h2>
                    </div>
                    <div class="gift__items"> 
                        <div class="gift__item">
                            <img src="images/gift.jpg" onclick="displayModal(this);" alt="Ресторан La Rose DOR">
                        </div>
                    </div>
                </div>
                <div class="events">
                    <div class="events__title">
                        <h2>События и Акции</h2>
                    </div>
                    <div class="events__items">
                        <div class="events__item">
                            <img src="images/event1.jpg" onclick="displayModal(this);" alt="Ресторан La Rose DOR">
                        </div>
                        <div class="events__item">
                            <img src="images/event2.jpg" onclick="displayModal(this);" alt="Ресторан La Rose DOR">
                        </div>
                        <div class="events__item">
                            <img src="images/event3.jpg" onclick="displayModal(this);" alt="Ресторан La Rose DOR">
                        </div>
                    </div>
                </div>
                <div class="main-hall">
                    <div class="main-hall__title">
                        <h2>ОСНОВНОЙ ЗАЛ</h2>
                    </div>
                    <div class="main-hall__items">
                        <div class="main-hall__item">
                            <img src="images/main-hall1.jpg" onclick="displayModal(this);" alt="Ресторан La Rose DOR">
                        </div>
                        <div class="main-hall__item">
                            <img src="images/main-hall2.jpg" onclick="displayModal(this);" alt="Ресторан La Rose DOR">
                        </div>
                        <div class="main-hall__item">
                            <img src="images/main-hall3.jpg" onclick="displayModal(this);" alt="Ресторан La Rose DOR">
                        </div>
                        <div class="main-hall__item">
                            <img src="images/main-hall4.jpg" onclick="displayModal(this);" alt="Ресторан La Rose DOR">
                        </div>
                        <div class="main-hall__item">
                            <img src="images/main-hall5.jpg" onclick="displayModal(this);" alt="Ресторан La Rose DOR">
                        </div>
                        <div class="main-hall__item">
                            <img src="images/main-hall6.jpg" onclick="displayModal(this);" alt="Ресторан La Rose DOR">
                        </div>
                        <div class="main-hall__item">
                            <img src="images/main-hall7.jpg" onclick="displayModal(this);" alt="Ресторан La Rose DOR">
                        </div>
                        <div class="main-hall__item">
                            <img src="images/main-hall8.jpg" onclick="displayModal(this);" alt="Ресторан La Rose DOR">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="index-contacts">
            <div class="container">
                <div class="index-contacts__title">
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
    <script>
    if(sessionStorage.getItem("message")){
        alert(sessionStorage.getItem("message"));
        sessionStorage.removeItem("message");
    }</script>
<?php include 'template/footer.php'; ?>