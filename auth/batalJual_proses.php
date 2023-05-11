<?php
session_start();
include 'koneksi.php';
$id_penjualan = $_GET['id_penjualan'];

// Hapus data pada tabel tb_penjualan_item terlebih dahulu
$query_delete_item = "DELETE FROM tb_penjualan_item WHERE penjualan_id = '$id_penjualan'";
mysqli_query($conn, $query_delete_item);

// Hapus data pada tabel tb_penjualan
$query_delete = "DELETE FROM tb_penjualan WHERE id = '$id_penjualan'";
mysqli_query($conn, $query_delete);
$_SESSION['batal_jual_berhasil'] = 'berhasil batal';
header('location: ../transaksisaya');
// echo 'data berhasil dihapus!';
?>