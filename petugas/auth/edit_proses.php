<?php
include '../../auth/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Tangkap data yang dikirimkan melalui form
    $id = $_POST["id"];
    $jumlah = $_POST["jumlah"];
    $subtotal = $_POST["subtotal"];
    $total_harga = $_POST["total_harga"];

    $query = "UPDATE tb_penjualan SET status_penjualan = '$newStatus', id_petugas='$id_petugas', tanggal_selesai = NOW() WHERE id = $id_penjualan";

    // Eksekusi query
    $result = mysqli_query($conn, $query);




}
?>