<?php include 'template/head.php'; ?>
<?php include 'template/nav.php'; ?>
    <main>
        <div class="menu">
            <div class="title">
                <h2>Категории</h2>
            </div>
            <div class="menu__items">
            <?php 
            //$connection1 = mysqli_connect ("127.0.0.1:3306","root","","kurs");
            include ("connect.php");
            if (!$connection1) {
                echo 'Не могу соединиться с БД. Код ошибки: ' . mysqli_connect_errno() . ', ошибка: ' . mysqli_connect_error();
                exit;
            }
            
            $sql = mysqli_query($connection1, "SELECT * FROM kategory");
            while ($result = mysqli_fetch_array($sql)) {
                echo "<div class='menu__item'>
                <a href={$result['link_kategory']}><div class='menu__item-photo'>
                <img src={$result['photo_kategory']} alt=''>
            </div>
            <div class='menu__item-info'>
                <h3>{$result['name_kategory']}</h3>
            </div></a>
            </div>";
            }
            ?>    
            </div>
        </div>
    </main>
<?php include 'template/footer.php'; ?>	
