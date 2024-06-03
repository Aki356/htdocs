<?php include 'template/head.php'; ?>
<?php include 'template/nav.php'; ?>

    <main>
        <div class="menu-container container">
            <div class="title">
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
                $sql = mysqli_query($connection1, "SELECT * FROM kategory WHERE id_kategory = 1");
                while ($result = mysqli_fetch_array($sql)) {
                echo "<h2>{$result['name_kategory']}</h2>";}
                ?>
            </div>
            <div class="items">
            <?php 
            //$connection1 = mysqli_connect ("127.0.0.1:3306","root","","kurs");
            include ("connect.php");
            if (!$connection1) {
                echo 'Не могу соединиться с БД. Код ошибки: ' . mysqli_connect_errno() . ', ошибка: ' . mysqli_connect_error();
                exit;
            }
            
            $sql = mysqli_query($connection1, "SELECT * FROM product WHERE name_kategory = 1");
            $rowCount = mysqli_num_rows($sql);
            //echo $rowCount;
            while ($result = mysqli_fetch_array($sql)) {
                echo "<div class='item'>
                <div class='item-photo'>
                <img src={$result['photo_product']} alt=''>
            </div>
            <div class='item-info'>
                <h3>{$result['name_product']}</h3>
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
            </div>";
            include 'template/add_korz.php';
            echo "</div>";
            }
            ?>   
            </div>
        </div>
    </main>
    
    

<?php include 'template/footer.php'; ?>	