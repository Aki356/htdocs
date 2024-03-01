<?php include 'template/head.php'; ?>
<?php include 'template/nav.php'; ?>

<main>
        <div class="answear">
<?php
        if (!empty($_POST)){
            $name_menu = $_POST['name_menu']; 
            $pass = $_POST['pass'];
                        
                echo "<div>Не верно";
                echo "<h1>Логин:$log</h1> <br>";
                echo "<h1>Пароль:$pass</h1> <br>";
                echo "</div>";
           }
        }
       
        ?>
        
        </div>
</main>
        <?php include 'template/footer.php'; ?>	