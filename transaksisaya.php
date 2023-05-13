<?php
session_start();
include 'homeheader.php';
include 'auth/koneksi.php';

// Ambil id_masyarakat dari session
$id_masyarakat = $_SESSION['session_id_masyarakat'];

// Query untuk mengambil data transaksi dari tabel tb_penjualan berdasarkan id_masyarakat
$query = "SELECT * FROM tb_penjualan WHERE id_masyarakat = '$id_masyarakat'";
$result = mysqli_query($conn, $query);

?>
<div class="container mt-5 pt-5">
    <h2 class="text-center">Transaksi Saya</h2>
    <?php
    if (mysqli_num_rows($result) == 0) {
        echo '<div class="text-center"> <h6 class="my-5">Anda Belum Melakukan Transaksi</h6></div>';
    } else {
        // Ambil semua data penjualan ke dalam array
        $data_penjualan = array();
        while ($data = mysqli_fetch_assoc($result)) {
            $data_penjualan[] = $data;
        }

        // Urutkan data penjualan berdasarkan tanggal penjualan secara descending
        usort($data_penjualan, function ($a, $b) {
            return strtotime($b['tanggal_penjualan']) - strtotime($a['tanggal_penjualan']);
        });

        // Tampilkan data penjualan
        foreach ($data_penjualan as $data) {
            echo '
            <div class="transaksisaya card my-4">
            <div class="card-body">
            <ul class="list-group list-group-flush">
            <li class="list-group-item">Alamat Penjemputan : ' . $data['alamat'] . '</li>
            <li class="list-group-item">Deskripsi : ' . $data['deskripsi'] . '</li>
            <li class="list-group-item">Total Harga : Rp. ' . number_format($data['total_harga'], 0, ',', '.') . '</li>
            <li class="list-group-item">Tanggal Penjualan : ' . date('d-m-Y', strtotime($data['tanggal_penjualan'])) . '</li>
            <li class="list-group-item">Status Penjualan : ' . $data['status_penjualan'] . '</li>
            </ul>
            <form action="detailpenjualan" method="POST" class="d-flex flex-row-reverse text-decoration-none text-dark">
                <input type="hidden" name="id_penjualan" value="' . $data["id"] . '">
                <button class="px-3 py-1 text-white" type="submit" style="background: #0A0A33; border: none; border-radius: 8px;">Lihat Detail Penjualan</button>
            </form>
            </div>
            </div>';
        }
    }
    ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>
<script src="alert/sweetalert2.all.min.js"></script>
<script src="js/alert.js"></script>
<script>
    <?php if (isset($_SESSION['batal_jual_berhasil'])):
        ?>
        batalJualBerhasil();
        <?php
        unset($_SESSION['batal_jual_berhasil']);
    endif;
    ?>
</script>