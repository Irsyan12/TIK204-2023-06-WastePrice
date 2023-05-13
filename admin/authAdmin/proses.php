<?php
session_start();
include '../../auth/koneksi.php';

if (isset($_POST['aksi'])) {
    if ($_POST['aksi'] == "add") {

        $username = $_POST['username'];
        $password = $_POST['password'];
        $no_telepon = $_POST['no_telepon'];

        $query = "INSERT INTO tb_petugas (username, password, no_telepon) 
          VALUES ('$username', '$password', '$no_telepon')";
        $result = mysqli_query($conn, $query);

        if ($result) {
            $_SESSION['daftar_berhasil'] = 'Anda sudah berhasil mendaftarkan akun';
            header('Location: ../daftarpetugas.php');
        } else {
            echo 'gagal';
        }
    } else if ($_POST['aksi'] == "edit") {

        $id_petugas = $_POST['id_petugas'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $no_telepon = $_POST['no_telepon'];

        $query = "UPDATE tb_petugas SET username='$username', password ='$password', no_telepon='$no_telepon' WHERE id_petugas='$id_petugas';";
        $result = mysqli_query($conn, $query);

        if ($result) {
            $_SESSION['edit_berhasil'] = 'Data Berhasil diedit';
            header("location: ../daftarpetugas.php");
        } else {
            echo $result;
        }
    }
}

if (isset($_GET['hapus'])) {

    $id_petugas = $_GET['hapus'];

    $queryshow = "SELECT * FROM tb_petugas WHERE id_petugas = $id_petugas";
    $sqlshow = mysqli_query($conn, $queryshow);
    $result = mysqli_fetch_assoc($sqlshow);




    $query = "DELETE FROM tb_petugas WHERE id_petugas = '$id_petugas'";
    $sql = mysqli_query($conn, $query);


    if ($sql) {
        header("location: ../daftarpetugas.php");

    } else {
        echo $sql;
    }

}

?>