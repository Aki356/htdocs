<?php

include ("connect.php");
//    $user_log1 = "admin";
//    $user_pass1 = "_admin";
if (!$connection1) {
        echo 'Не могу соединиться с БД. Код ошибки: ' . mysqli_connect_errno() . ', ошибка: ' . mysqli_connect_error();
        exit;
      }
      
?>
        <div class="answear">
        <?php
        // if (!empty($_POST)){
        //     $log = $_POST['log']; 
        //     $pass = $_POST['pass'];

        //    if($user_log1 == $log && $user_pass1 == $pass)
        //     echo "<script> alert('Авторизованы')</script>";
        //    else{
                        
            //         echo "<div>Не верно";
        //         echo "<h1>Логин:$log</h1> <br>";
        //         echo "<h1>Пароль:$pass</h1> <br>";
        //         echo "</div>";
        //    }
        // }
        
        $_login = "";
        $_password = "";
        if(isset($_POST["submit"])) {
            $password = $_POST["pass"];
            $login = $_POST["log"];
            if(!empty($password) || !empty($login)){
                if(!is_null($password) || !is_null($login)){
                $pwd = hash('sha256', $password);
                $sql_hash = mysqli_query($connection1, "SELECT * FROM users WHERE log_user = '{$login}'");
                $hash_arr = mysqli_fetch_array($sql_hash);
                $hash_db = $hash_arr['pass_user'];
                
                if(/*password_verify(*/$pwd/*,*/== $hash_db)/*)*/{
                    $sql = mysqli_query($connection1, "SELECT * FROM users WHERE log_user = '{$login}'");
                    $rowCount = mysqli_num_rows($sql);
                    $result = mysqli_fetch_array($sql);
                        if($rowCount > 0) {
                                $_SESSION['id_user'] = $result['id_user'];
                                $_SESSION['login'] = $result['log_user'];
                                $_SESSION['name'] = $result['name_user'];
                                $_SESSION['photo'] = $result['photo_user'];
                                $_SESSION['phone'] = $result['phone_user'];
                                //setcookie('login', $login, time()+60*60, "/");
                                /*echo '<div class="alert alert-secondary" role="alert">
                                Авторизованы<br>
                                Здравствуй, '.$result['name_user'].'</div>';*/
                                /*echo "<img src='{$result['photo_user']}'></div>';*/
                                header("Location: /");
                                die();
                            } 
                            else {
                                $_password = mysqli_real_escape_string($connection1, $password);
                                $_login = mysqli_real_escape_string($connection1, $login);
                            //         $url1 = "auth.php";
                            //         function redirect($url) {
                            //           header('Location: '.$url);
                            //           die();
                            //       }
                            //       redirect($url1);
                        
                                echo '<div class="alert alert-secondary" role="alert">
                                Проверьте введенные данные</div>';
                            //header( "refresh:3;url=auth.php" );
                            }
                        }
                        else {
                            if(empty($login) || empty($password)){
                                
                                echo '<div class="alert alert-secondary" role="alert">Проверьте введенные данные</br>';
                                echo "Или <a href='reg.php'>Зарегистрироваться</a></div>";
                            }
                        }
                }
                else{
                    echo '<div class="alert alert-secondary" role="alert">
                    Не верный пароль!</div>';
                }
            }
        }
        
?>
        </div>