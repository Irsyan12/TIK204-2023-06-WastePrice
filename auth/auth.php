<?php
include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];


$query = mysqli_query($conn, "SELECT * from tb_masyarakat where username = '$username' and password = '$password' ");
$result = mysqli_num_rows($query);

if ($result > 0) {
    header("location: ../home.html");
} else {
    header("location: ../login.php?pesan=error");
}






?>