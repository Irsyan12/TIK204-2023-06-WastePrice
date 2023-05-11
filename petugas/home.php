<?php
session_start();
include 'homeheader.php';
include '../auth/koneksi.php';
if (!isset($_SESSION['session_usernamepetugas'])) {
    header('location:login');
    exit();

}
$query = "SELECT * FROM tb_penjualan;";
$result = mysqli_query($conn, $query);
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

<body>
    <nav class="navbar bg-body-tertiary fixed-top">
        <div class="container d-flex">
            <a class="navbar-brand" style="cursor:pointer" onclick="location.reload();">
                <img src="../asset/Logo.svg" alt="Waste Price" draggable="false" width="48.81" height="41">
                Waste Price
            </a>
            <div class="ms-auto">
                <i class="bi bi-bell btn" style="font-size: 23px;"></i>
            </div>
        </div>
    </nav>


    <div class="container mt-5 pt-5">

        <h1> <img src="../asset/profile.svg" width="48.81"> Hai
            <?php echo ucfirst($_SESSION['session_usernamepetugas']); ?>
        </h1>
        <hr>
    </div>

    <div class="container mb-5 pb-5">

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
                    <div class="transaksisaya card mt-3">
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
                    <button type="submit" style="background: none; border: none;">Lihat Detail</button>
                </form>
            </div>
        </div>';
            }
        }
        ?>


    </div>
    <?php
    include 'navbar.php';
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
</body>

</html>