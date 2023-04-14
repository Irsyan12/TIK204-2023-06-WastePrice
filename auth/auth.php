<?php
include 'koneksi.php';
session_start();

$username = $_POST['username'];
$password = $_POST['password'];


$query = mysqli_query($conn, "SELECT * from tb_masyarakat where username = '$username' and password = '$password' ");
$result = mysqli_num_rows($query);

if ($result > 0) {
    header("location: ../home.html");
} else {
    header("location: ../login.php");
    $_SESSION['login_gagal'] = 'Username dan password salah';
    // header("location: ../login.php?pesan=error");
}






?>