<?php
include("permission.php");

$LOC = $_SERVER["PHP_SELF"];

if (str_contains($LOC, "index.php")) {
    if ($_SESSION['login'] == 'access') {
        if (isset($_GET['logout'])) {
            $_SESSION['login'] = 'out';
            header("location: web/login.php");
        } else {
            header("Location: web/");
        }
    } else if ($_SESSION['login'] == 'wrong') {
        header("Location: web/login.php");
    } else if ($_SESSION['login'] == 'duplicate') {
        header("Location: web/signup.php");
    } else {
        $_SESSION['login'] = "null";
        header("Location: web/");
    }
} else if (str_contains($LOC, "login.php") || str_contains($LOC, "signup.php")) {
    if ($_SESSION['login'] == 'access') {
        header("Location: ../index.php");
    }
}

?>