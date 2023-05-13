<?php
session_start();
include '../../auth/koneksi.php';
$id_penjualan = $_GET['id_penjualan'];

$newStatus = "Ditolak";

// Query untuk mengubah nilai status_penjualan dan tanggal_selesai
$query = "UPDATE tb_penjualan SET status_penjualan = '$newStatus', tanggal_selesai = NOW() WHERE id = $id_penjualan";

// Eksekusi query
$result = mysqli_query($conn, $query);

// Cek apakah query berhasil dijalankan
if ($result) {
    header('location: ../detailpengambilan');
    // echo "Perubahan status_penjualan berhasil.";
} else {
    echo "Terjadi kesalahan saat mengubah status_penjualan.";
}

?>