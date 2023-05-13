<?php
include '../auth/koneksi.php';
include 'homeheader.php';

$id_penjualan = $_POST['id_penjualan'];

// Query untuk mendapatkan data dari tb_penjualan_item
$query = "SELECT * FROM tb_penjualan_item WHERE penjualan_id = '$id_penjualan'";
$result = mysqli_query($conn, $query);

// Query untuk mendapatkan data dari tb_penjualan
$query_penjualan = "SELECT * FROM tb_penjualan WHERE id = '$id_penjualan'";
$result_penjualan = mysqli_query($conn, $query_penjualan);
$data_penjualan = mysqli_fetch_assoc($result_penjualan);

$id_masyarakat = $data_penjualan['id_masyarakat'];

// Query untuk mendapatkan username masyarakat
$query_masyarakat = "SELECT username FROM tb_masyarakat WHERE id_masyarakat = '$id_masyarakat'";
$result_masyarakat = mysqli_query($conn, $query_masyarakat);
$data_masyarakat = mysqli_fetch_assoc($result_masyarakat);
$username_masyarakat = $data_masyarakat['username'];

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
            <h6>Penjual</h6>
          </td>
          <td>
            <?php echo $username_masyarakat; ?>
          </td>
        </tr>
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
            <h6>Tanggal Selesai</h6>
          </td>
          <td>
            <?php
            $tanggal_selesai = $data_penjualan['tanggal_selesai'];
            echo $tanggal_selesai ? date('d - m - Y', strtotime($tanggal_selesai)) : "-";
            ?>
          </td>
        </tr>
        <tr>
          <td>
            <h6>Pukul</h6>
          </td>
          <td>
            <?php
            echo $tanggal_selesai ? date('h : i', strtotime($tanggal_selesai)) : "-";
            ?>
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

    <div class="d-flex flex-column justify-content-center my-2 col-md-3 col-lg- mx-auto mt-5">
      <?php if ($data_penjualan['status_penjualan'] != "Selesai"): ?>
        <button class="py-3 text-white mb-2"
          style="border:0; background-color:#0A0A33; border-radius: 10px;">Edit</button>
        <button class="btn btn-danger py-2 mb-2" onclick="tolakSekarang()">Tolak</button>
      <?php endif; ?>
      <?php if ($data_penjualan['status_penjualan'] == "Belum Diproses"): ?>
        <button class="btn btn-success py-3 mb-2" onclick="ambilSekarang()">Ambil Sekarang</button>
      <?php elseif ($data_penjualan['status_penjualan'] == "Diperjalanan"): ?>
        <button class="btn btn-success py-3 mb-2" onclick="tandaiSelesai()">Tandai Selesai</button>
      <?php endif; ?>
    </div>
  </div>
</div>
<script src="../alert/sweetalert2.all.min.js"></script>
<script src="../js/alert.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>

  function ambilSekarang() {
    event.preventDefault();

    Swal.fire({
      title: 'Ambil Sampah Sekarang?',
      text: 'Pengambilan akan ditandai diperjalanan',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#0A0A33',
      cancelButtonColor: '#6c757d',
      confirmButtonText: 'Ya, Tandai diperjalanan',
      cancelButtonText: 'Batal'
    }).then((result) => {
      if (result.isConfirmed) {

        // Redirect ke halaman auth/batalJual.php dengan mengirimkan id_penjualan sebagai parameter
        window.location.href = "auth/ambil_proses?id_penjualan=<?php echo $id_penjualan; ?>";
      }
    });
  };

  function tandaiSelesai() {
    event.preventDefault();

    // Tampilkan sweetalert2 konfirmasi
    Swal.fire({
      title: 'Tandai Selesai?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#0A0A33',
      cancelButtonColor: '#6c757d',
      confirmButtonText: 'Ya, Tandai Selesai',
      cancelButtonText: 'Batal'
    }).then((result) => {
      if (result.isConfirmed) {
        // Redirect ke halaman auth/batalJual.php dengan mengirimkan id_penjualan sebagai parameter
        window.location.href = "auth/selesai_proses?id_penjualan=<?php echo $id_penjualan; ?>";
      }
    });
  };

  function tolakSekarang() {
    event.preventDefault();

    // Tampilkan sweetalert2 konfirmasi
    Swal.fire({
      title: 'Yakin ingin tolak?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#0A0A33',
      cancelButtonColor: '#6c757d',
      confirmButtonText: 'Ya, Tandai Selesai',
      cancelButtonText: 'Batal'
    }).then((result) => {
      if (result.isConfirmed) {
        // Redirect ke halaman auth/batalJual.php dengan mengirimkan id_penjualan sebagai parameter
        window.location.href = "auth/tolak_proses?id_penjualan=<?php echo $id_penjualan; ?>";
      }
    });
  };
</script>