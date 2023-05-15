<?php
session_start();
include 'homeheader.php';
include 'auth/koneksi.php';
if (!isset($_SESSION['session_username'])) {
    header('location:login');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Notifikasi</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css">
    <style>
        .col {
            height: 100vh;
            overflow-y: auto;
            padding: 0;
        }

        .col .card {
            margin-bottom: 15px;
        }
    </style>
</head>

<body>
    <div class="container mt-5 pt-5">
        <div class="text-center">
            <h1 class-"text-center">Notifikasi</h1>
        </div>
        <div class="d-flex justify-content-center mt-5">
            <a href="#" class="px-3 py-1 text-white text-decoration-none mx-4 per-harga"
                style="background: #0A0A33; border: none; border-radius: 8px;"><i class="bi bi-arrow-repeat"></i>
                Perubahan Harga</a>
            <a href="#" class="px-3 py-1 text-dark text-decoration-none stat-jemputan"
                style="background: #adadadad; border: none; border-radius: 8px;"><i class="bi bi-truck"></i> Status
                Penjemputan</a>
        </div>

        <div class="row">
            <div class="col-12 mx-auto" id="perubahan-harga">
                <div class=" mt-5">
                    <div>
                        <ul class="list-group list-group-flush">
                            <?php
                            // Query untuk mengambil data dari tb_notifikasi
                            $query = "SELECT pesan, timestamp FROM tb_notifikasi WHERE id_masyarakat IS NULL ORDER BY timestamp DESC";

                            $result = mysqli_query($conn, $query);

                            // Periksa apakah ada data yang ditemukan
                            if (mysqli_num_rows($result) > 0) {
                                // Loop melalui data dan tampilkan dalam elemen <li>
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $pesan = $row['pesan'];
                                    $tanggal = date('d F Y', strtotime($row['timestamp']));
                                    $waktu = date('H:i', strtotime($row['timestamp']));

                                    echo '<li class="list-group-item">';
                                    echo '<div class="d-flex justify-content-between">';
                                    echo '<div class="text-start col-9">' . $pesan . '</div>';
                                    echo '<div class="text-muted">';
                                    echo '<span class="me-1 small">' . $tanggal . '</span>';
                                    echo '<span class="small">' . $waktu . '</span>';
                                    echo '</div>';
                                    echo '</div>';
                                    echo '</li>';
                                }
                            } else {
                                // Tampilkan pesan jika tidak ada data
                                echo '<li class="list-group-item">Belum ada Perubahan Harga</li>';
                            }

                            ?>
                        </ul>

                    </div>
                </div>
            </div>

            <div class="col-12 mx-auto d-none" id="status-penjemputan">
                <div class=" mt-5">
                    <div>
                        <ul class="list-group list-group-flush">
                            <?php
                            // Query untuk mengambil pesan dari tb_notifikasi berdasarkan id_masyarakat
                            $id_masyarakat = $_SESSION['session_id_masyarakat'];
                            $query_notifikasi = "SELECT pesan, timestamp FROM tb_notifikasi WHERE id_masyarakat = $id_masyarakat ORDER BY timestamp DESC";
                            $result_notifikasi = mysqli_query($conn, $query_notifikasi);

                            // Periksa apakah ada data yang ditemukan
                            if (mysqli_num_rows($result_notifikasi) > 0) {
                                // Loop melalui data dan tampilkan dalam elemen <li>
                                while ($row_notifikasi = mysqli_fetch_assoc($result_notifikasi)) {
                                    $pesan = $row_notifikasi['pesan'];
                                    $tanggal = date('d F Y', strtotime($row_notifikasi['timestamp']));
                                    $waktu = date('H:i', strtotime($row_notifikasi['timestamp']));

                                    // echo '<li class="list-group-item">' . $pesan . '</li>';
                                    // echo $pesan;
                            
                                    echo '<li class="list-group-item">';
                                    echo '<div class="d-flex justify-content-between">';
                                    echo '<div class="text-start col-9">' . $pesan . '</div>';
                                    echo '<div class="text-muted">';
                                    echo '<span class="me-1 small">' . $tanggal . '</span>';
                                    echo '<span class="small">' . $waktu . '</span>';
                                    echo '</div>';
                                    echo '</div>';
                                    echo '</li>';

                                }
                            } else {
                                // Tampilkan pesan jika tidak ada data
                                echo '<li class="list-group-item">Belum Ada Notifikasi</li>';
                            }
                            ?>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.bundle.min.js"></script>
    <script>
        const btnPerubahanHarga = document.querySelector('.per-harga');
        const btnStatPenjemputan = document.querySelector('.stat-jemputan');
        const perubahanharga = document.getElementById('perubahan-harga');
        const statusPenjemputan = document.getElementById('status-penjemputan');

        btnPerubahanHarga.addEventListener('click', function () {
            btnPerubahanHarga.classList.add('text-white');
            btnPerubahanHarga.style.background = '#0A0A33';
            btnPerubahanHarga.style.borderRadius = '8px';
            perubahanharga.classList.remove('d-none');
            statusPenjemputan.classList.add('d-none');

            btnStatPenjemputan.classList.add('text-dark');
            btnStatPenjemputan.classList.remove('text-white');
            btnStatPenjemputan.style.background = '#adadadad';

        });

        btnStatPenjemputan.addEventListener('click', function () {
            btnStatPenjemputan.classList.add('text-white');
            btnStatPenjemputan.style.background = '#0A0A33';
            btnStatPenjemputan.style.borderRadius = '8px';
            perubahanharga.classList.add('d-none');
            statusPenjemputan.classList.remove('d-none');

            btnPerubahanHarga.classList.add('text-dark');
            btnPerubahanHarga.classList.remove('text-white');
            btnPerubahanHarga.style.background = '#adadadad'

        });
    </script>

</body>

</html>