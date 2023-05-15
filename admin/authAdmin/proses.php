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
            header("location: ../daftarpetugas");
        } else {
            echo $result;
        }
    }
}

if (isset($_POST['sampah'])) {
    if ($_POST['sampah'] == "edit") {
        $id_sampah = $_POST['id_sampah'];
        $harga = $_POST['harga_sampah'];

        // Query untuk mendapatkan harga sebelum perubahan
        $query_harga_sebelum = "SELECT jenis_sampah, harga_sampah FROM tb_sampah WHERE id_sampah = '$id_sampah'";
        $result_harga_sebelum = mysqli_query($conn, $query_harga_sebelum);
        $data_harga_sebelum = mysqli_fetch_assoc($result_harga_sebelum);
        $harga_sebelum = $data_harga_sebelum['harga_sampah'];
        $jenis_sampah = $data_harga_sebelum['jenis_sampah'];

        // Periksa apakah ada perubahan harga
        if ($harga != $harga_sebelum) {
            $perubahan = $harga > $harga_sebelum ? 'naik' : 'turun';

            $query = "UPDATE tb_sampah SET harga_sampah = '$harga' WHERE id_sampah = '$id_sampah'";
            $result = mysqli_query($conn, $query);

            if ($result) {
                // Tambahkan pesan ke tb_notifikasi
                $pesan = "Harga $jenis_sampah $perubahan menjadi Rp. " . number_format($harga, 0, ',', '.');
                $query_notifikasi = "INSERT INTO tb_notifikasi (timestamp, pesan) VALUES (NOW(), '$pesan')";
                mysqli_query($conn, $query_notifikasi);

                $_SESSION['edit_harga_berhasil'] = 'Data berhasil diedit';
                header("location: ../daftarharga");
            } else {
                echo $result;
            }
        } else {
            // Tidak ada perubahan harga, tidak perlu menambahkan pesan notifikasi
            header("location: ../daftarharga");
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
        header("location: ../daftarpetugas");

    } else {
        echo $sql;
    }

}

?>