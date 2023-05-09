<?php
session_start();
include 'koneksi.php';

$alamat = $_POST['alamat'];
$deskripsi = $_POST['deskripsi'];
$totalHarga = $_SESSION['totalHarga'] + 00;
$id_masyarakat = $_SESSION['session_id_masyarakat'];
// ambil data dari session cart item
$cartItems = $_SESSION['cartItems'];

// query untuk menyimpan data ke database
$sql = "INSERT INTO tb_penjualan (id_masyarakat, alamat, deskripsi, total_harga) VALUES ('$id_masyarakat' ,'$alamat', '$deskripsi', '$totalHarga')";

if (mysqli_query($conn, $sql)) {
    $penjualan_id = mysqli_insert_id($conn);
    // loop untuk menyimpan data item ke database
    foreach ($cartItems as $item) {
        $jenis_sampah = $item['jenis_sampah'];
        $harga_sampah = $item['harga_sampah'];
        $jumlah = $item['jumlah'];
        $subtotal = $item['subtotal'];
        $sql = "INSERT INTO tb_penjualan_item (penjualan_id, jenis_sampah, harga_sampah, jumlah, subtotal) VALUES ('$penjualan_id', '$jenis_sampah', '$harga_sampah', '$jumlah', '$subtotal')";
        mysqli_query($conn, $sql);
    }
    // hapus data dari session cart item setelah disimpan ke database
    unset($_SESSION['cartItems']);
    // echo "Data berhasil disimpan ke database.";
    $_SESSION['jualBerhasil'] = 'berhasil';
    header('Location: ../home');
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
unset($_SESSION['totalHarga']);
mysqli_close($conn);
?>