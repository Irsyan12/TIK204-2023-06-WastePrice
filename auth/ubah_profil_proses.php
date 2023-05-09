<?php
include 'koneksi.php';
session_start();

$err = "";
$username = $_SESSION['session_username'];
$username_baru = $_POST['username_baru'];
$no_telepon = $_POST['no_telepon'];
$kata_sandi_lama = $_POST['kata_sandi_lama'];
$kata_sandi_baru = $_POST['kata_sandi_baru'];

// cek apakah username baru sudah dipakai oleh pengguna lain
$cek_username = mysqli_query($conn, "SELECT * from tb_masyarakat where username = '$username_baru' AND username != '$username'");

if (mysqli_num_rows($cek_username) > 0) {
    $_SESSION['username_sudah_dipakai'] = "Username sudah dipakai!";
} else if ($username_baru != "" && $username_baru != $_SESSION['session_username']) {
    $query = mysqli_query($conn, "UPDATE tb_masyarakat SET username = '$username_baru' WHERE username = '$username'");
    // update data ke database
    $_SESSION['session_username'] = $username_baru;
    $_SESSION['update_berhasil'] = 'Perubahan disimpan';
}

// update data ke database
if ($no_telepon != "" && $no_telepon != $_SESSION['session_no_telepon']) {
    $query = mysqli_query($conn, "UPDATE tb_masyarakat SET no_telepon = '$no_telepon' WHERE username = '$username'");
    $_SESSION['session_no_telepon'] = $no_telepon;
    $_SESSION['update_berhasil'] = 'Perubahan disimpan';
}


// check apakah kata sandi lama sesuai dengan yang ada di database
$query = mysqli_query($conn, "SELECT * from tb_masyarakat where username = '$username'");
$data = mysqli_fetch_assoc($query);
$password_db = $data['password'];
if ($kata_sandi_lama != "") {
    if (md5($kata_sandi_lama) != $password_db) {
        $_SESSION['kata_sandi_lama_salah'] = "Kata sandi lama salah!";
    }
}
if ($kata_sandi_baru != "") {
    $kata_sandi_baru = md5($kata_sandi_baru);
    $query = mysqli_query($conn, "UPDATE tb_masyarakat SET password = '$kata_sandi_baru' WHERE username = '$username'");
    $_SESSION['session_password'] = $kata_sandi_baru;
    $_SESSION['update_berhasil'] = 'Perubahan disimpan';
}

header("location: ../profil");

?>