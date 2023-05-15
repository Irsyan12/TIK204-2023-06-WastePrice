<?php
session_start();
include '../../auth/koneksi.php';
$id_penjualan = $_GET['id_penjualan'];

$newStatus = "Ditolak";
$id_petugas = $_SESSION['session_id_petugas'];


// Query untuk mengubah nilai status_penjualan dan tanggal_selesai
$query = "UPDATE tb_penjualan SET status_penjualan = '$newStatus', id_petugas='$id_petugas' WHERE id = $id_penjualan";

// Eksekusi query
$result = mysqli_query($conn, $query);

// Cek apakah query berhasil dijalankan
if ($result) {
    $query_masyarakat = "SELECT id_masyarakat FROM tb_penjualan WHERE id = $id_penjualan";
    $result_masyarakat = mysqli_query($conn, $query_masyarakat);
    $data_masyarakat = mysqli_fetch_assoc($result_masyarakat);
    $id_masyarakat = $data_masyarakat['id_masyarakat'];

    // Tambahkan pesan ke tb_notifikasi dengan id_masyarakat yang sesuai
    $pesan = "Yahh!! Penjualan anda ditolak.";
    $query_notifikasi = "INSERT INTO tb_notifikasi (timestamp, pesan, id_masyarakat) VALUES (NOW(), '$pesan', $id_masyarakat)";
    $result_notifikasi = mysqli_query($conn, $query_notifikasi);

    if ($result_notifikasi) {
        header('location: ../detailpengambilan');
    } else {
        echo "Terjadi kesalahan saat menambahkan pesan ke tb_notifikasi.";
    }
} else {
    echo "Terjadi kesalahan saat mengubah status_penjualan.";
}

?>