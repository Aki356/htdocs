<?php include 'template/head.php'; ?>
<?php include 'template/nav.php'; ?>
<?php
include ("connect.php");
if (!$connection1) {
    echo 'Не могу соединиться с БД. Код ошибки: ' . mysqli_connect_errno() . ', ошибка: ' . mysqli_connect_error();
    exit;
}
if ($_SESSION['message']){
    echo '<div class="answear">
    <div class="alert alert-primary" role="alert">'.$_SESSION['message'].'</div></div>';
    unset($_SESSION['message']);
}
?>
<main>
    <div class="container">
        <div class="all-orders">
            <div class="title">
                <h2>Все заказы</h2>
            </div>
            <div class="table-orders">
                <div class="row">
                    <div class="row-head">
                        <div class="row-head-cell">Код заказа</div>
                        <div class="row-head-cell">Имя пользователя</div>
                        <div class="row-head-cell">Телефон пользователя</div>
                        <div class="row-head-cell">Наименование блюда</div>
                        <div class="row-head-cell">Количество блюда, в шт.</div>
                        <div class="row-head-cell">Дата заказа</div>
                        <div class="row-head-cell">Время заказа, по МСК</div>
                        <div class="row-head-cell">Сумма блюда в заказе</div>
                        <div class="row-head-cell">Статус заказа</div>
                    </div>
                    <?php
                    $array_order = array();
                    $select_all_orders = mysqli_query($connection1, "SELECT orders.numId_order, users.name_user, users.phone_user, product.name_product, orders.count_order, orders.date_order, orders.time_order, orders.totalPrise_order, status.name_status FROM `orders` JOIN users ON orders.id_user = users.id_user JOIN status ON orders.id_status = status.id_status JOIN product ON orders.id_products = product.id_product;");
                    while($result = mysqli_fetch_array($select_all_orders)){
                        $numId_order = $result["numId_order"];
                        $name_user = $result["name_user"];
                        $phone_user = $result["phone_user"];
                        $name_product = $result["name_product"];
                        $count_order = $result["count_order"];
                        $date_order = $result["date_order"];
                        $time_order = $result["time_order"];
                        $totalPrise_order = $result["totalPrise_order"];
                        $name_status = $result["name_status"];
                        
                        $array_order[] = array(
                            $numId_order, $name_user, $phone_user, $name_product, $count_order, $date_order, $time_order, $totalPrise_order, $name_status);
                        }
                        ?>
                        
                        
                        <?php
                        foreach($array_order as $key => $cell){
                            ?>
                        <div class="row-order">
                        <?php
                        for($i = 0; $i < count($cell); $i++){
                            
                            // print_r($array_order[$key]);
                            echo '<div class="cell">'.$array_order[$key][$i].'</div>';
                        }
                        ?>
                        </div>
                        <?php
                    }
                    
                    ?>
                    
                    
                </div>
            </div>
        </div>
    </div>
</main>
                
<?php include 'template/footer.php'; ?>	