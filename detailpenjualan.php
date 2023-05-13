<?php
include 'auth/koneksi.php';
include 'homeheader.php';



$id_penjualan = $_POST['id_penjualan'];
$query = "SELECT * FROM tb_penjualan_item WHERE penjualan_id = '$id_penjualan'";
$result = mysqli_query($conn, $query);
?>

<div class="container mt-5 pt-5">
    <h2 class="text-center">Detail Transaksi</h2>
    <div class="transaksisaya">
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Jenis Sampah</th>
                    <th>Jumlah</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($data = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td>
                            <?php echo $data['jenis_sampah']; ?>
                        </td>
                        <td>
                            <?php echo $data['jumlah']; ?>
                        </td>
                        <td>
                            <?php echo 'Rp. ' . number_format($data['subtotal'], 0, ',', '.'); ?>
                        </td>
                    </tr>
                <?php } ?>
                <?php
                // Tampilkan total harga dari tb_penjualan
                $query_penjualan = "SELECT * FROM tb_penjualan WHERE id = '$id_penjualan'";
                $result_penjualan = mysqli_query($conn, $query_penjualan);
                $data_penjualan = mysqli_fetch_assoc($result_penjualan);
                if ($data_penjualan['total_harga'] == null) {
                    header('location: transaksisaya');
                }
                ?>
                <tr>
                    <td colspan="2" class="text-right font-weight-bold">Total Harga :</td>
                    <td>
                        <?php echo 'Rp. ' . number_format($data_penjualan['total_harga'], 0, ',', '.'); ?>
                    </td>
                </tr>
            </tbody>
        </table>

        <table class="table">
            <tbody>
                <tr>
                    <td>
                        <h6>Alamat Penjemputan</h6>
                    </td>
                    <td>
                        <?php echo $data_penjualan['alamat']; ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h6>Deskripsi Sampah</h6>
                    </td>
                    <td>
                        <?php echo $data_penjualan['deskripsi']; ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h6>Status Penjualan</h6>
                    </td>
                    <td>
                        <?php echo $data_penjualan['status_penjualan']; ?>
                    </td>
                </tr>
            </tbody>
        </table>

        <?php if ($data_penjualan['status_penjualan'] != 'Selesai' && $data_penjualan['status_penjualan'] != 'Diperjalanan' && $data_penjualan['status_penjualan'] != 'Ditolak'): ?>
            <div class="d-flex justify-content-center my-5 fixed-bottom">
                <button class="btn btn-danger btn-hapusjual px-5 py-3">Batalkan Penjualan</button>
            </div>
        <?php endif; ?>

    </div>
</div>
<script src="alert/sweetalert2.all.min.js"></script>
<script src="js/alert.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>

    const btnHapus = document.querySelector('.btn-hapusjual');

    // tambahkan event listener
    btnHapus.addEventListener('click', function (event) {
        // mencegah tindakan default tombol submit
        event.preventDefault();

        // tampilkan sweetalert2 konfirmasi
        Swal.fire({
            title: 'Anda yakin ingin membatalkan penjualan?',
            text: 'Data transaksi yang sudah diinputkan akan dihapus',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#dc3545',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, Batalkan',
            cancelButtonText: 'Batal'
        }).then((result) => {
            // jika user klik tombol "Ya, hapus"
            if (result.isConfirmed) {
                // Redirect ke halaman auth/batalJual.php dengan mengirimkan id_penjualan sebagai parameter
                window.location.href = "auth/batalJual_proses?id_penjualan=<?php echo $id_penjualan; ?>";
            }
        });
    });

</script>

</script>