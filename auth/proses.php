<?php
include 'koneksi.php';
session_start();

$username = $_POST['username'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];
$no_telepon = $_POST['no_telepon'];


$query = "INSERT INTO tb_masyarakat (id_masyarakat, username, password, no_telepon) 
          VALUES ('', '$username', '$password', '$no_telepon')";

$result = mysqli_query($conn, $query);

if ($result) {
    // Jika berhasil, maka tampilkan pesan sukses dan redirect ke halaman login
    $_SESSION['daftar_berhasil'] = ' Anda sudah berhasil mendaftar akun, <strong>Silahkan Login</strong>';
    header('Location: ../login.php');
} else {
    // Jika gagal, maka tampilkan pesan error
    // header('Location: daftar.php');
    echo 'gagal';
}
?>