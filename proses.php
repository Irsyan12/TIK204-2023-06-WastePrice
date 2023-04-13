<?php
include 'fungsi.php';
session_start();

// Tambah data
if (isset($_POST['aksi'])) {
    if ($_POST['aksi'] == "add") {

        $berhasil = tambah_data($_POST, $_FILES);

        if ($berhasil) {
            $_SESSION['eksekusi'] = "Data Berhasil Ditambahkan";
            header("location: index.php");
        } else {
            echo $berhasil;
        }


        // echo $nisn . " | " . $nama_siswa . " | " . $foto . " | " . $alamat;

        // echo "<br>Tambah Data <a href='index.php'>[HOME]</a>";
    } else if ($_POST['aksi'] == "edit") {

        $berhasil = ubah_data($_POST, $_FILES);

        if ($berhasil) {
            header("location: index.php");
        } else {
            echo $berhasil;
        }
    }
}

if (isset($_GET['hapus'])) {

    $berhasil = hapus_data($_GET);

    if ($berhasil) {
        header("location: index.php");

    } else {
        echo $berhasil;
    }

}


?>