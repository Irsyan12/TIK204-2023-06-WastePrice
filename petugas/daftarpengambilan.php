<?php
session_start();
if (!isset($_SESSION['session_usernamepetugas'])) {
    header('location:login');
    exit();
}

$id_petugas = $_SESSION['session_id_petugas'];

include '../auth/koneksi.php';
include 'homeheader.php';
$query = "SELECT * FROM tb_penjualan where status_penjualan = 'Belum Diproses' OR status_penjualan = 'Diperjalanan' AND id_petugas = $id_petugas ORDER BY tanggal_penjualan DESC";
$result = mysqli_query($conn, $query);


?>
<div class="container mt-5 pt-5">
    <div class="text-center mb-5">
        <h1>Daftar Pengambilan</h1>
    </div>
    <?php
    if (mysqli_num_rows($result) == 0) {
        echo '<div class="text-center"> <h6 class="my-5">Belum Ada Transaksi yang tersedia</h6></div>';
    } else {
        // Tampilkan data penjualan
        while ($data = mysqli_fetch_assoc($result)) {
            $id_masyarakat = $data['id_masyarakat'];

            // Query untuk mendapatkan username masyarakat
            $query_masyarakat = "SELECT username FROM tb_masyarakat WHERE id_masyarakat = '$id_masyarakat'";
            $result_masyarakat = mysqli_query($conn, $query_masyarakat);
            $data_masyarakat = mysqli_fetch_assoc($result_masyarakat);
            $username_masyarakat = $data_masyarakat['username'];

            echo '
                    <div class="transaksisaya card border-0 mt-3">
                        <div class="card-body">
                        <ul class="list-group">
                        <li class="ms-3" style="list-style-type: none;" >Penjual: ' . $username_masyarakat . '</li>
                        <li class="ms-3" style="list-style-type: none;">Alamat Penjemputan: ' . $data['alamat'] . '</li>
                        <li class="ms-3" style="list-style-type: none;">Deskripsi: ' . $data['deskripsi'] . '</li>
                        <li class="ms-3" style="list-style-type: none;">Tanggal Penjualan: ' . date('d-m-Y', strtotime($data['tanggal_penjualan'])) . '</li>
                        <li class="ms-3" style="list-style-type: none;">Total Harga: Rp. ' . number_format($data['total_harga'], 0, ',', '.') . '</li>
                        <li class="ms-3" style="list-style-type: none;">Status Penjualan: ' . $data['status_penjualan'] . '</li>
                    </ul>
        

                <form action="detailpengambilan" method="POST" class="d-flex flex-row-reverse text-decoration-none text-dark">
                    <input type="hidden" name="id_penjualan" value="' . $data["id"] . '">
                    <button class="px-3 py-1 text-white" type="submit" style="background: #0A0A33; border: none; border-radius: 8px;">Lihat Detail</button>
                </form>
            </div>
        </div>';
        }
    }
    ?>

</div>