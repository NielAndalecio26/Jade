<?php
session_start();
include 'service/account.php';
if (isset($_POST['login'])) {
    $auth = is_credentials_correct($_POST['username'], $_POST['password']);
    if ($auth == true) {
        $_SESSION['login'] = "access";
    } else {
        $_SESSION['login'] = "wrong";
    }
}
if (isset($_POST['register'])) {
    $auth = checkUsername($_POST['username'], $_POST['password']);
    if ($auth == true) {
        $_SESSION['login'] = "access";
    } else {
        $_SESSION['login'] = "duplicate";
    }
}
if(isset($_GET['logout'])){
    $_SESSION['login'] = "out";
    $_SESSION['user_id'] = null;
}
include 'service/routing.php';

?>