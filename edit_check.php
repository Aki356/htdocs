
<?php
include ("connect.php");
if (!$connection1) {
  echo '<div class="alert alert-danger d-flex align-items-center" role="alert">
  <div class="alert_photo"><img src="images/danger.png"></div>
  <div>
  Не могу соединиться с БД. Код ошибки: ' . mysqli_connect_errno() . ', ошибка: ' . mysqli_connect_error();'</div>
  </div>';
}
if(isset($_POST['log-btn'])){
    $log = $_POST["log"];
    if(!empty($log)){
        if(!preg_match("/^[a-zA-Z0-9]+$/",$log))
        {
            echo '<script>
            sessionStorage.setItem("message", "Логин может состоять только из букв английского алфавита и цифр");
            </script>';
        }
        else if(strlen($log) < 3 or strlen($log) > 30)
        {
            echo '<script>
            sessionStorage.setItem("message", "Логин должен быть не меньше 3-х символов и не больше 30.");
            </script>';
        }
        else{
            $sql = mysqli_query($connection1, "SELECT id_user FROM users WHERE log_user='$log'");
            if($sql){
                $rowCount = mysqli_num_rows($sql);
                //$result = mysqli_fetch_array($sql);
                $myrow = mysqli_fetch_array($sql);
                if (!empty($myrow['id_user'])) {
                echo '<script>
                sessionStorage.setItem("message", "Извините, пользователь с таким логином уже зарегистрирован в системе. Введите другой логин.");
                </script>';
                }
                else{
                    if(!empty($log)){
                        $result2 = mysqli_query ($connection1, "UPDATE users SET log_user = '".$log."' WHERE `users`.`id_user` = '".$_SESSION['id_user']."'");
                        // Проверяем, есть ли ошибки
                        $_SESSION['login'] = $log;
                        if ($result2=='TRUE')
                        {
                            echo '<script>
                            sessionStorage.setItem("message", "Успешно изменено!");
                            </script>';
                        }
                        else {
                            echo '<script>
                            sessionStorage.setItem("message", "Ошибка! Данные не изменены.");
                            </script>';
                        }
                    }
                    else{
                        echo '<script>
                        sessionStorage.setItem("message", "Проверьте введенные данные!");
                        </script>';
                    }
                }
            }
        }
    }
    else{
        echo '<script>
        sessionStorage.setItem("message", "Проверьте введенные данные!");
        </script>';
    }
}
if(isset($_POST['pass-btn'])){
    $old_pass = $_POST["old_pass"];
    $new_pass = $_POST["new_pass"];
    if(!empty($old_pass) || !empty($new_pass)){
        $pwd_hash = hash('sha256', $old_pass);
        $new_pass_hash = hash('sha256', $new_pass);
        $sql_pass = mysqli_query($connection1, "SELECT * FROM users WHERE log_user = '".$_SESSION['login']."'");
        $hash_arr = mysqli_fetch_array($sql_pass);
        $num_row = mysqli_num_rows($sql_pass);
        if($num_row > 0){
            $hash_db = $hash_arr['pass_user'];
        }
        else{
            $hash_db = "";
        }
        echo $_SESSION['login'];
        if($pwd_hash == $hash_db){
            if(!preg_match("/^[a-zA-Z0-9]+$/",$new_pass))
            {
                echo '<script>
                sessionStorage.setItem("message", "Пароль может состоять только из букв английского алфавита и цифр.");
                </script>';
            }
            else if(strlen($new_pass) < 6 or strlen($new_pass) > 30)
            {
                echo '<script>
                sessionStorage.setItem("message", "Пароль должен быть не меньше 6-х символов и не больше 30");
                </script>';
            }
            else{
                
                $sql = mysqli_query($connection1, "SELECT id_user FROM users WHERE log_user = '".$_SESSION['login']."' and pass_user='".$new_pass_hash."'");
                if($sql){
                    $rowCount = mysqli_num_rows($sql);
                    //$result = mysqli_fetch_array($sql);
                    $myrow = mysqli_fetch_array($sql);
                    if (!empty($myrow['id_user'])) {
                    echo '<script>
                    sessionStorage.setItem("message", "Извините, пользователь с таким логином и паролем уже зарегистрирован в системе. Введите другой пароль.");
                    </script>';
                    }
                    else{
                        if(!empty($new_pass) || !empty($old_pass)){
                            $result2 = mysqli_query ($connection1, "UPDATE users SET pass_user = '".$new_pass_hash."' WHERE `users`.`id_user` = '".$_SESSION['id_user']."'");
                            // Проверяем, есть ли ошибки
                            if ($result2=='TRUE')
                            {
                                echo '<script>
                                sessionStorage.setItem("message", "Успешно изменено!");
                                </script>';
                            }
                            else {
                                echo '<script>
                                sessionStorage.setItem("message", "Ошибка! Данные не изменены.");
                                </script>';
                            }
                        }
                        else{
                            echo '<script>
                            sessionStorage.setItem("message", "Проверьте введенные данные!");
                            </script>';
                        }
                    }
                }
                else{
                    echo '<script>
                    sessionStorage.setItem("message", "Ошибка! Данные не изменены.");
                    </script>';
                }
            }
        }
        else{
            echo '<script>
            sessionStorage.setItem("message", "Старый пароль не верный!");
            </script>';
        }
    }
    else{
        echo '<script>
        sessionStorage.setItem("message", "Проверьте введенные данные!");
        </script>';
    }
}
if(isset($_POST['name-btn'])){
    $log = $_POST["name"];
    if(!empty($log)){
        $result2 = mysqli_query ($connection1, "UPDATE users SET name_user = '".$log."' WHERE `users`.`id_user` = '".$_SESSION['id_user']."'");
        // Проверяем, есть ли ошибки
        $_SESSION['name'] = $log;
        if ($result2=='TRUE')
        {
            echo '<script>
            sessionStorage.setItem("message", "Успешно изменено!");
            </script>';
            header( 'Refresh:0; url=' . $_SERVER['PHP_SELF'] );
            die();
        }
        else {
            echo '<script>
            sessionStorage.setItem("message", "Ошибка! Данные не изменены.");
            </script>';
        }
    }
    else{
        echo '<script>
        sessionStorage.setItem("message", "Проверьте введенные данные!");
        </script>';
    }
}
if(isset($_POST['phone-btn'])){
    $log = $_POST["phone"];
    if(!empty($log)){
        $result2 = mysqli_query ($connection1, "UPDATE users SET phone_user = '".$log."' WHERE `users`.`id_user` = '".$_SESSION['id_user']."'");
        // Проверяем, есть ли ошибки
        $_SESSION['phone'] = $log;
        if ($result2=='TRUE')
        {
            echo '<script>
            sessionStorage.setItem("message", "Успешно изменено!");
            </script>';
            header( 'Refresh:0; url=' . $_SERVER['PHP_SELF'] );
            die();
        }
        else {
            echo '<script>
            sessionStorage.setItem("message", "Ошибка! Данные не изменены.");
            </script>';
        }
    }
    else{
        echo '<script>
        sessionStorage.setItem("message", "Проверьте введенные данные!");
        </script>';
    }
}
?>