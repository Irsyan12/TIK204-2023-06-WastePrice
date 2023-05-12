<?php
include '../auth/koneksi.php';
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
          header('location: daftarpengambilan');
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

    <div class="d-flex flex-column justify-content-center my-2 col-5 mx-auto mt-5">
      <?php if ($data_penjualan['status_penjualan'] != "Selesai"): ?>
        <button class="py-3 text-white mb-2"
          style="border:0; background-color:#0A0A33; border-radius: 10px;">Edit</button>
        <button class="btn btn-danger py-3 mb-2 btn-tolak">Tolak</button>
      <?php endif; ?>
      <?php if ($data_penjualan['status_penjualan'] == "Belum Diproses"): ?>
        <button class="btn btn-success py-3 mb-2 btn-ambil" onclick="ambilSekarang()">Ambil Sekarang</button>
      <?php elseif ($data_penjualan['status_penjualan'] == "Diperjalanan"): ?>
        <button class="btn btn-success py-3 mb-2 btn-selesai" onclick="tandaiSelesai()">Tandai Selesai</button>
      <?php endif; ?>
    </div>

  </div>
</div>
<script src="../alert/sweetalert2.all.min.js"></script>
<script src="../js/alert.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>