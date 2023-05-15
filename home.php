<?php
session_start();
include 'auth/koneksi.php';
include 'homeheader.php';
if (!isset($_SESSION['session_username'])) {
    header('location:login');
    exit();
}
// Dapatkan id terakhir yang di-generate
// Ambil ID masyarakat dari session
$id_masyarakat = $_SESSION['session_id_masyarakat'];

// Query untuk mendapatkan ID penjualan terakhir dari masyarakat
$query_last_id = "SELECT MAX(id) AS last_id FROM tb_penjualan WHERE id_masyarakat = '$id_masyarakat'";
$result_last_id = mysqli_query($conn, $query_last_id);
$data_last_id = mysqli_fetch_assoc($result_last_id);
$last_id = $data_last_id['last_id'];

// Query untuk mendapatkan data dari id terakhir
$query_detail = "SELECT * FROM tb_penjualan WHERE id = '$last_id'";
$result_detail = mysqli_query($conn, $query_detail);
$data_detail = mysqli_fetch_assoc($result_detail);
?>

<style>
    @media only screen and (max-width: 767px) {
        body {
            overflow-y: hidden;
        }

        .sampah-saya {
            display: flex;
            flex-direction: row;
        }

        .card-img {
            max-width: 100px;
        }
    }
</style>
</head>


<div class="container mt-5 pt-5">
    <h1> <a href="profil"><img src="asset/profile.svg" width="48.81"></a> Hai
        <?php echo ucfirst($_SESSION['session_username']); ?>
    </h1>
    <hr>
</div>

<div class="container">
    <div class="d-flex flex-column">
        <div class="col mb-4 mx-4">
            <div class="transaksisaya card border-0 mt-1">
                <div class="card-body">
                    <h5 class="fw-bold ms-3 mb-3">Sampah Saya</h5>
                    <?php if ($data_detail) { ?>
                        <ul class="list-group">
                            <li class="ms-3 mb-1" style="list-style-type: none;">Alamat Penjemputan:
                                <?php echo $data_detail['alamat']; ?>
                            </li>
                            <li class="ms-3 mb-1" style="list-style-type: none;">Deskripsi:
                                <?php echo $data_detail['deskripsi']; ?>
                            </li>
                            <li class="ms-3 mb-1" style="list-style-type: none;">Total Harga: Rp.
                                <?php echo number_format($data_detail['total_harga'], 0, ',', '.'); ?>
                            </li>
                            <li class="ms-3 mb-1" style="list-style-type: none;">Tanggal Penjualan:
                                <?php echo date('d-m-Y', strtotime($data_detail['tanggal_penjualan'])); ?>
                            </li>
                            <li class="ms-3 mb-1" style="list-style-type: none;">Status Penjualan:
                                <?php echo $data_detail['status_penjualan']; ?>
                            </li>
                        </ul>

                        <form action="detailpenjualan" method="POST"
                            class="d-flex flex-row-reverse text-decoration-none text-dark">
                            <input type="hidden" name="id_penjualan" value="<?php echo $data_detail['id']; ?>">
                            <button type="submit" style="background: none; border: none;">Lihat Detail</button>
                        </form>
                    <?php } else { ?>
                        <p class="ms-3 mb-1">Anda belum melakukan penjualan <a
                                class="text-decoration-none ms-auto fw-semibold text-dark" href="jualsampah">Jual Sampah
                                Sekarang</a> </p>
                    <?php } ?>
                </div>

            </div>
        </div>
        <div class="d-flex flex-row text-center mx-4">
            <a href="transaksisaya"
                class="card border-0 h-100 mx-4 my-2 text-center w-50 text-decoration-none text-dark">
                <div class="card-body h-100 d-flex flex-column justify-content-center">
                    <i class="bi bi-card-checklist btn-logo"></i> <br>
                    Transaksi Saya
                </div>
            </a>
            <a href="hargasampah" class="card border-0 h-100 mx-4 my-2 text-center w-50 text-decoration-none text-dark">
                <div class="card-body h-100 d-flex flex-column justify-content-center">
                    <i class="bi bi-currency-dollar btn-logo"></i> <br>
                    Harga Sampah
                </div>
            </a>
        </div>
    </div>
</div>
<?php
include 'navbar.php';
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>
<script src="alert/sweetalert2.all.min.js"></script>
<script src="js/alert.js"></script>
<script>
    <?php if (isset($_SESSION['jualBerhasil'])):
        ?>
        jualSampahBerhasil();
        <?php
        unset($_SESSION['jualBerhasil']);
    endif;
    ?>
</script>
</body>

</html>