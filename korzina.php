<?php include 'template/head.php'; ?>
<?php include 'template/nav.php'; ?>
<?php
if (isset($_SESSION['message'])){
    echo '<div class="answear">
    <div class="alert alert-primary" role="alert">'.$_SESSION['message'].'</div></div>';
    unset($_SESSION['message']);
}
?>
<?php
include ("connect.php");
if (!$connection1) {
        echo 'Не могу соединиться с БД. Код ошибки: ' . mysqli_connect_errno() . ', ошибка: ' . mysqli_connect_error();
        exit;
      }
      
?>
<?php

?>
    <main>
        <div class="korz">
            <div class="korz__title">
                <div class="korz__title-image">
                    <img src="images/korz.png" alt="">
                </div>
                <h2 id="title">Корзина</h2>
            </div>
            <div id="korz__orders" class="korz__orders">
                <h3>Ваш заказ</h3>
                <?php include 'test.php'; ?>
                
                
                <div id='korz__order' class='korz__order' data-price='110'>
                    <div id="korz__order-clear" class='korz__order-clear'>
                    <!-- <form method='post'>
                        <button type='submit' name='itemClear{$key}'><img src='images/korz-clear.png' alt=''></button>
                    </form> -->
                </div>
                <div class='korz__container'>
                    <div id="korz__order-image" class='korz__order-image'>
                        <!-- <img src={$result['photo_product']} alt=''> -->
                    </div>
                        <div id="korz__order-title" class='korz__order-title'>
                            <p><!--{$result['name_product']}--></p>
                        </div>
                        <div class='korz__order-weight'>
                            <p><!--{$result['weight_product']} {$result['units_product']}--></p>
                        </div>
                        <div class='calc'>
                                            <!-- <button type='submit' onclick='addCart(); this.nextElementSibling.stepDown(); this.nextElementSibling.onchange();' class='calc-count minus'>-</button>
                                            <input name='id_product' type='hidden' value='{$item["id_product"]}'>
                                            <input name='num_product' class='calc-num' type='number' value='{$item["num_product"]}'>
                                            <button type='submit' onclick='addCart(); this.previousElementSibling.stepUp(); this.previousElementSibling.onchange();' class='calc-count plus'>+</button> -->
                                        </div>
                                        <div class='korz__order-price'>
                                            <p><!--₽--></p>
                                        </div>
                                    </div>
                                </div>
                                
                                
                <?php
                if(isset($_SESSION['cart'])) {
                    $cart = $_SESSION['cart'];
                    // $cart = 0;?><?php
                    print_r($cart);
                    //$product_data_new = array();
                    ?>
                    <script>
                        var pausecontent = new Array();
                    </script>
                    <?php
                    foreach($cart as $key => $item) {
                        $sql = mysqli_query($connection1, "SELECT * FROM product WHERE id_product = '{$item["id_product"]}'");
                        while ($result = mysqli_fetch_array($sql)) {
                            // if (!isset($product_data_new[$result['name_product']])) {
                            //     $product_data_new[$result['name_product']] = $result;
                            // }
                            // else {
                            //     $product_data_new[$result['name_product']]['num_product'] += $item['num_product'];
                            // }
                            echo "<div class='korz__order' data-price='110'>
                                    <div class='korz__order-clear'>
                                        <form method='post'>
                                            <button type='submit' name='itemClear{$key}'><img src='images/korz-clear.png' alt=''></button>
                                        </form>
                                    </div>
                                    <div class='korz__container'>
                                        <div class='korz__order-image'>
                                            <img src={$result['photo_product']} alt=''>
                                        </div>
                                        <div class='korz__order-title'>
                                            <p>{$result['name_product']}</p>
                                        </div>
                                        <div class='korz__order-weight'>
                                            <p>{$result['weight_product']} {$result['units_product']}</p>
                                        </div>
                                        <div class='calc'>
                                            <button type='submit' onclick='addCart(); this.nextElementSibling.stepDown(); this.nextElementSibling.onchange();' class='calc-count minus'>-</button>
                                            <input name='id_product' type='hidden' value='{$item["id_product"]}'>
                                            <input name='num_product' class='calc-num' type='number' value='{$item["num_product"]}'>
                                            <button type='submit' onclick='addCart(); this.previousElementSibling.stepUp(); this.previousElementSibling.onchange();' class='calc-count plus'>+</button>
                                        </div>
                                        <div class='korz__order-price'>
                                            <p>";
                                                $price = $result['price_product'];
                                                $num_product = $item["num_product"];
                                                $sum = $price*$num_product;
                                                echo "{$sum} ₽</p>
                                        </div>
                                    </div>
                                </div>";
                        if(isset($_POST['itemClear'.$key])){
                            unset($_SESSION['cart'][$key]);
                            $_SESSION['message'] = 'Товар успешно удален из корзины!';
                            header( header: 'Location: /korzina.php');
                            die();
                        }
                        // if ($_SESSION['message']){
                        //     echo '<div class="answear">
                        //     <div class="alert alert-primary" role="alert">'.$_SESSION['message'].'</div></div>';
                        //     unset($_SESSION['message']);
                        // }
                        }
                    }
                    
                    if(empty($_SESSION['cart'])){
                        echo "<div class='empty_korz'>
                        В корзине пусто.
                        </div>";
                    }
                    else{
                        ?>
                        <form class="order-form" method="post">
                            <?php
                            // foreach($cart as $key => $item) {
                            //     $sql = mysqli_query($connection1, "SELECT * FROM product WHERE id_product = '{$item['id_product']}'");
                            //     while ($result = mysqli_fetch_array($sql)) {
                            //     echo '<input type="hidden" name="id'.$result["id_product"].'" value="'.$result["id_product"].'">';
                            //     }
                            // }
                            ?>
                            <button class="order-btn" name="submit" type="submit">Оформить заказ</button>
                        </form>
                        <?php
                    }
                    // if ($_SESSION['message']){
                    //     echo '<div class="answear">
                    //     <div class="alert alert-primary" role="alert">'.$_SESSION['message'].'</div></div>';
                    //     unset($_SESSION['message']);
                    // }
                    ?>
                    

                    </form>
                    
                    <?php
                }
                else{
                    ?>
                    <?php 
                    //echo "В корзине пусто."; ?><?php
                }
                ?>
            </div>
            <div class='empty_korz'><p id="empty_korz"></p>
                    </div>
        </div>
    </main>
    <!-- <script>console.log(JSON.parse(sessionStorage.getItem("cart")));</script> -->
<?php include 'template/footer.php'; ?>	