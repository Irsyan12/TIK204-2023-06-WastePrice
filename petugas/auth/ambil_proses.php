<?php
session_start();
include '../../auth/koneksi.php';
$id_penjualan = $_GET['id_penjualan'];

$newStatus = "Diperjalanan";
$id_petugas = $_SESSION['session_id_petugas'];

// Query untuk mengubah nilai status_penjualan
$query = "UPDATE tb_penjualan SET status_penjualan = '$newStatus', id_petugas='$id_petugas' WHERE id = $id_penjualan";

// Eksekusi query
$result = mysqli_query($conn, $query);

// Cek apakah query berhasil dijalankan
if ($result) {
    // Tambahkan pesan ke tb_notifikasi
    $query_masyarakat = "SELECT id_masyarakat FROM tb_penjualan WHERE id = $id_penjualan";
    $result_masyarakat = mysqli_query($conn, $query_masyarakat);
    $data_masyarakat = mysqli_fetch_assoc($result_masyarakat);
    $id_masyarakat = $data_masyarakat['id_masyarakat'];

    // Tambahkan pesan ke tb_notifikasi dengan id_masyarakat yang sesuai
    $pesan = "Horee!! Permintaan pickup sampah anda sudah diterima, Kurir sampah akan segera menjemput kealamatmu";
    $query_notifikasi = "INSERT INTO tb_notifikasi (timestamp, pesan, id_masyarakat) VALUES (NOW(), '$pesan', $id_masyarakat)";
    mysqli_query($conn, $query_notifikasi);

    header('location: ../detailpengambilan');
    // echo "Perubahan status_penjualan berhasil.";
} else {
    echo "Terjadi kesalahan saat mengubah status_penjualan.";
}
?>