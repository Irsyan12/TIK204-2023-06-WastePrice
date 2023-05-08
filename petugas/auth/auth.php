<?php
include '../../auth/koneksi.php';
session_start();

$err = "";
$username = $_POST['username'];
$password = $_POST['password'];
$password = md5($password);

if ($username == "" or $password == "") {
    header("location: ../login");
    $_SESSION['formkosong'] = "Silahkan masukkan username dan password";
    $err .= $_SESSION['formkosong'];
} else {
    $query = mysqli_query($conn, "SELECT * from tb_petugas where username = '$username' and password = '$password'");
    $result = mysqli_num_rows($query);

    if ($result > 0) {
        if (empty($err)) {
            $_SESSION['session_usernamepetugas'] = $username;
            // $_SESSION['session_password'] = $password;

            $data = mysqli_fetch_assoc($query);
            $no_telp = $data['no_telepon'];

            // buat session nomor telepon
            $_SESSION['session_no_telepon_petugas'] = $no_telp;

            if (isset($_POST['ingatsaya'])) {
                $cookie_name = "cookie_username_petugas";
                $cookie_value = $username;
                $cookie_time = time() + (60 * 60 * 24 * 30);
                setcookie($cookie_name, $cookie_value, $cookie_time, "/");

                // $cookie_name = "cookie_password";
                // $cookie_value = $password;
                // $cookie_time = time() + (60 * 60 * 24 * 30);
                // setcookie($cookie_name, $cookie_value, $cookie_time, "/");
            } else {
                setcookie("cookie_username_petugas", "", time() - 3600, "/");
                // setcookie("cookie_password", "", time() - 3600, "/");
            }
            header("location: ../home");

        }
    } else {
        header("location: ../login.php");
        $_SESSION['login_gagal'] = 'Username dan password salah';
        // header("location: ../login.php?pesan=error");
    }
}
?>