<?php
session_start();
$username = $_POST['username'];
$password = $_POST['password'];

if ($username == 'admin' && $password == 'admin') {
    $_SESSION['adminLogin'] = 'berhasil';
    header('location: ../daftarharga');
} else {
    header('location: ../login');
}
?>