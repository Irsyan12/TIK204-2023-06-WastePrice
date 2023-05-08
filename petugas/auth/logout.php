<?php
session_start();
$_SESSION['session_usernamepetugas'] = "";
$_SESSION['session_passwordpetugas'] = "";
$_SESSION['session_no_telepon_petugas'] = "";

session_destroy();

$cookie_name = "cookie_username_petugas";
$cookie_value = "";
$cookie_time = time() - (60 * 60);
setcookie($cookie_name, $cookie_value, $cookie_time, "/");

$cookie_name = "cookie_password";
$cookie_value = "";
$cookie_time = time() - (60 * 60);
setcookie($cookie_name, $cookie_value, $cookie_time, "/");

header("location:../login")
    ?>