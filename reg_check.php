<?php
//$connection1 = mysqli_connect ("127.0.0.1:3306","root","","kurs_3");
include ("connect.php");
if (!$connection1) {
  echo '<div class="alert alert-danger d-flex align-items-center" role="alert">
  <div class="alert_photo"><img src="images/danger.png"></div>
  <div>
  Не могу соединиться с БД. Код ошибки: ' . mysqli_connect_errno() . ', ошибка: ' . mysqli_connect_error();'</div>
  </div>';
}
      
?>
<?php
$_login = "";
$_password = "";
$_photo = "";
$_name = "";
$_phone = "";
if(isset($_POST["submit"])) {
  $password      = $_POST["pass"];
  $login      = $_POST["log"];
  // указание директории и имени нового файла на сервере
  if(isset($_POST["Image"])){
    if(!is_null($_POST["Image"])){
      $photo = 'images/users/'.$_FILES['Image']['name'];
    }
    else{
      $photo = null;
    }
  }
  $name      = $_POST["fio"];
  $phone      = $_POST["phone"];

  $pwd_hash = hash('sha256', $password);
  //$hash = password_hash($pwd_hash, PASSWORD_DEFAULT);
  if(!preg_match("/^[a-zA-Z0-9]+$/",$login))
  {
    echo '<div class="alert alert-danger d-flex align-items-center" role="alert">
    <div class="alert_photo"><img src="images/danger.png"></div>
    <div>
    Логин может состоять только из букв английского алфавита и цифр
    </div>
    </div>';
  }
  if(strlen($login) < 3 or strlen($login) > 30)
  {
    echo '<div class="alert alert-danger d-flex align-items-center" role="alert">
    <div class="alert_photo"><img src="images/danger.png"></div>
    <div>
    Логин должен быть не меньше 3-х символов и не больше 30
    </div>
    </div>';
  }
  $sql = mysqli_query($connection1, "SELECT id_user FROM users WHERE log_user='$login'");
  $rowCount = mysqli_num_rows($sql);
  //$result = mysqli_fetch_array($sql);
  $myrow = mysqli_fetch_array($sql);
  if (!empty($myrow['id_user'])) {
    echo '<div class="alert alert-danger d-flex align-items-center" role="alert">
    <div class="alert_photo"><img src="images/danger.png"></div>
    <div>
    Извините, введённый вами логин уже зарегистрирован. Введите другой логин.
    </div>
    </div>';
  }
  else{
    if(!empty($login) && !empty($password) /*&& !empty($photo)*/ && !empty($name) && !empty($phone)){
      //$password = password_hash($_POST['pass'], PASSWORD_DEFAULT);
      $result2 = mysqli_query ($connection1, "INSERT INTO users (log_user, pass_user, name_user, phone_user) VALUES('$login','$pwd_hash','$name','$phone')");
      // Проверяем, есть ли ошибки
      if ($result2=='TRUE')
      {
        echo '<div class="alert alert-primary" role="alert">Вы успешно зарегистрированы! <a href="index.php">На главную страницу</a></div>';
        // копирование файла
        // if (copy($_FILES['Image']['tmp_name'], $photo)) {
        //   echo "Файл загружен на сервер";
        // }
        // else {
        //   echo "Ошибка при загрузке файла";
        // }
      }
      else {
        echo '<div class="alert alert-danger d-flex align-items-center" role="alert">
        <div class="alert_photo"><img src="images/danger.png"></div>
        <div>
        Ошибка! Вы не зарегистрированы.
        </div>
        </div>';
      }
    }
    else{
      echo '<div class="alert alert-danger d-flex align-items-center" role="alert">
      <div class="alert_photo"><img src="images/danger.png"></div>
      <div>
      Проверьте введенные данные
      </div>
      </div>';
    }
  }
}
?>