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

</main>

<?php include 'template/footer.php'; ?>	