<?php
session_start();
include 'homeheader.php';
include '../auth/koneksi.php';
if (!isset($_SESSION['session_usernamepetugas'])) {
    header('location:login');
    exit();

}
$id_petugas = $_SESSION['session_id_petugas'];

// Query untuk mendapatkan ID penjualan terakhir dari masyarakat
$query_last_id = "SELECT MAX(id) AS last_id FROM tb_penjualan WHERE status_penjualan = 'Belum Diproses' OR status_penjualan = 'Diperjalanan' AND id_petugas = $id_petugas ORDER BY tanggal_penjualan DESC";
$result_last_id = mysqli_query($conn, $query_last_id);
$data_last_id = mysqli_fetch_assoc($result_last_id);
$last_id = $data_last_id['last_id'];

// Query untuk mendapatkan data dari id terakhir
$query_detail = "SELECT * FROM tb_penjualan WHERE id = '$last_id'";
$result_detail = mysqli_query($conn, $query_detail);
$data_detail = mysqli_fetch_assoc($result_detail);


if ($data_detail) {

    $id_masyarakat = $data_detail['id_masyarakat'];

    $query_masyarakat = "SELECT username FROM tb_masyarakat WHERE id_masyarakat = '$id_masyarakat'";
    $result_masyarakat = mysqli_query($conn, $query_masyarakat);
    $data_masyarakat = mysqli_fetch_assoc($result_masyarakat);
    $username_masyarakat = $data_masyarakat['username'];
    // Query untuk mendapatkan username masyarakat
}
?>



<div class="container mt-5 pt-5">
    <h1> <a href="profil"><img src="../asset/profile.svg" width="48.81"></a> Hai
        <?php echo ucfirst($_SESSION['session_usernamepetugas']); ?>
    </h1>
    <hr>
</div>

<div class="container d-lg-flex justify-content-center mb-5 pb-5">

    <div class="card border-0 mx-lg-3 col-md-5">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <h5 class="mb-3">Daftar Pengambilan</h5>
                <a class="text-decoration-none text-dark fw-semibold" href="daftarpengambilan">Lihat
                    Semua</a>
            </div>
            <?php if ($data_detail) { ?>
                <div class="text-white">
                    <div class="card-body" style="background-color:#0A0A33; border-radius:15px;">
                        <div class="d-flex">
                            <h5 class="ms-2">
                                <?php echo $username_masyarakat ?>
                            </h5>
                            <form action="detailpengambilan" method="post" class="ms-auto">
                                <input type="hidden" name="id_penjualan" value="<?php echo $data_detail['id']; ?>">
                                <button type="submit" class="ms-auto text-white"
                                    style="background: none; border: none;">Lihat
                                    Detail</button>
                            </form>
                        </div>
                        <p class="mt-4 ms-3">Alamat Penjemputan:
                            <?php echo $data_detail['alamat'] ?>
                        </p>
                        <hr style="background-color: white; height: 3px;">
                        <div class="daftarPengambilan">
                            <div class="">
                                <ul class="list-group">
                                    <li class="ms-3" style="list-style-type: none;">Deskripsi:
                                        <?php echo $data_detail['deskripsi'] ?>
                                    </li>
                                    <li class="ms-3" style="list-style-type: none;">Tanggal Penjualan:
                                        <?php echo date('d-m-Y', strtotime($data_detail['tanggal_penjualan'])) ?>
                                    </li>
                                    <li class="ms-3" style="list-style-type: none;">Status Penjualan:
                                        <?php echo $data_detail['status_penjualan'] ?>
                                    </li>
                                    <hr style="background-color: white; height: 3px;">
                                    <li class="ms-3" style="list-style-type: none;">Total Harga: Rp.
                                        <?php echo number_format($data_detail['total_harga'], 0, ',', '.') ?>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } else { ?>
                <div class="card-body d-flex justify-content-center align-items-center h-75"
                    style="background-color:#0A0A33; border-radius:15px;">
                    <p class="ms-3 mb-1 text-center fw-bold text-white">Belum Ada Pengambilan yang harus dilakukan</p>
                </div>

            <?php } ?>
        </div>
    </div>
    <?php
    $query_last_id_riwayat = "SELECT MAX(id) AS last_id FROM tb_penjualan WHERE (status_penjualan = 'Selesai' OR status_penjualan = 'Ditolak') AND id_petugas = $id_petugas ORDER BY tanggal_penjualan DESC";

    $query = "SELECT MAX(id) AS last_id FROM tb_penjualan WHERE status_penjualan = 'Selesai' OR status_penjualan = 'Ditolak' ORDER BY tanggal_penjualan DESC";
    $result_last_id_riwayat = mysqli_query($conn, $query_last_id_riwayat);
    $data_last_id = mysqli_fetch_assoc($result_last_id_riwayat);
    $last_id = $data_last_id['last_id'];

    // Query untuk mendapatkan data dari id terakhir
    $query_detail_riwayat = "SELECT * FROM tb_penjualan WHERE id = '$last_id'";
    $result_detail_riwayat = mysqli_query($conn, $query_detail_riwayat);
    $data_detail_riwayat = mysqli_fetch_assoc($result_detail_riwayat);

    if ($data_detail_riwayat) {

        $id_masyarakat = $data_detail_riwayat['id_masyarakat'];

        $query_masyarakat_riwayat = "SELECT username FROM tb_masyarakat WHERE id_masyarakat = '$id_masyarakat'";
        $result_masyarakat_riwayat = mysqli_query($conn, $query_masyarakat_riwayat);
        $data_masyarakat_riwayat = mysqli_fetch_assoc($result_masyarakat_riwayat);
        $username_masyarakat_riwayat = $data_masyarakat_riwayat['username'];
        // Query untuk mendapatkan username masyarakat
    }
    ?>

    <div class="card border-0 mt-3 mt-md-0 mx-lg-3 col-md-5">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <h5 class="mb-3">Riwayat Pengambilan</h5>
                <a class="text-decoration-none text-dark fw-semibold" href="riwayat">Lihat Semua</a>
            </div>
            <?php if ($data_detail_riwayat) { ?>
                <div class="text-white">
                    <div class="card-body" style="background-color:#0A0A33; border-radius:15px;">
                        <div class="d-flex">
                            <h5 class=" ms-2">
                                <?php echo $username_masyarakat_riwayat ?>
                            </h5>
                            <form action="detailpengambilan" method="post" class="ms-auto">
                                <input type="hidden" name="id_penjualan" value="<?php echo $data_detail_riwayat['id']; ?>">
                                <button type="submit" class="ms-auto text-white"
                                    style="background: none; border: none;">Lihat
                                    Detail</button>
                            </form>
                        </div>
                        <p class="mt-4 ms-3">Alamat Penjemputan:
                            <?php echo $data_detail_riwayat['alamat']; ?>
                        </p>
                        <hr style="background-color: white; height: 3px;">
                        <div class="daftarPengambilan">
                            <div class="">
                                <ul class="list-group">
                                    <li class="ms-3" style="list-style-type: none;">Deskripsi:
                                        <?php echo $data_detail_riwayat['deskripsi']; ?>
                                    </li>
                                    <li class="ms-3" style="list-style-type: none;">Tanggal Selesai:
                                        <?php echo date('d : m : Y', strtotime($data_detail_riwayat['tanggal_selesai'])); ?>
                                    </li>
                                    <li class="ms-3" style="list-style-type: none;">Status Penjualan:
                                        <?php echo $data_detail_riwayat['status_penjualan']; ?>
                                    </li>
                                    <hr style="background-color: white; height: 3px;">
                                    <li class="ms-3" style="list-style-type: none;">Total Harga: Rp.
                                        <?php echo number_format($data_detail_riwayat['total_harga'], 0, ',', '.') ?>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            <?php } else { ?>
                <div class="card-body d-flex justify-content-center align-items-center h-75 mb-5"
                    style="background-color:#0A0A33; border-radius:15px;">
                    <p class="ms-3 mb-1 text-center fw-bold text-white">Belum Ada Pengambilan yang selesai</p>
                </div>

            <?php } ?>
        </div>
    </div>
    <?php
    include 'navbar.php';
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    </body>

    </html>