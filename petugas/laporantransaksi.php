<?php
session_start();
include 'homeheader.php';
include '../auth/koneksi.php';
if (!isset($_SESSION['session_usernamepetugas'])) {
  header('location:login');
  exit();

}

$id_petugas = $_SESSION['session_id_petugas'];
?>

<div class="container mt-5 pt-4">
  <h1 class="text-center mt-3">Laporan Transaksi</h1>
  <div class="row">
    <div class="d-flex justify-content-center mt-5">
      <a href="#" class="px-3 py-1 text-white text-decoration-none mx-4 bulanan px-4"
        style="background: #0A0A33; border: none; border-radius: 8px;">
        Bulanan</a>
      <a href="#" class="px-3 py-1 text-dark text-decoration-none mingguan px-4"
        style="background: #adadadad; border: none; border-radius: 8px;"></i>Mingguan</a>
    </div>
    <div class="col-10 mx-auto" id="bulanan">
      <h2>Bulanan</h2>
      <table class="table">
        <thead>
          <tr>
            <th>Tanggal</th>
            <th>Total Harga</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <?php
          // Query untuk mengambil data bulanan dari tb_penjualan berdasarkan id_petugas
          $query = "SELECT tanggal_penjualan, total_harga, status_penjualan FROM tb_penjualan WHERE WEEK(tanggal_penjualan) = WEEK(CURRENT_DATE()) AND YEAR(tanggal_penjualan) = YEAR(CURRENT_DATE()) AND id_petugas = $id_petugas";

          // Eksekusi query
          $result = mysqli_query($conn, $query);
          $berhasil = 0;


          // Periksa apakah ada data yang ditemukan
          if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
              ++$berhasil;
              echo "<tr>";
              echo "<td>" . $row['tanggal_penjualan'] . "</td>";
              echo "<td>Rp " . number_format($row['total_harga'], 0, ',', '.') . "</td>";
              echo "<td>" . $row['status_penjualan'] . "</td>";
              echo "</tr>";
            }
          } else {
            echo "<tr><td colspan='3'>Tidak ada data transaksi bulan ini.</td></tr>";
          }
          ?>
        </tbody>
      </table>
      <?php
      // Query untuk menghitung total sampah berhasil, total sampah dibatalkan, dan total pengeluaran bulan ini
      $query_total = "SELECT SUM(CASE WHEN status_penjualan = 'Selesai' THEN total_harga ELSE 0 END) AS total_pengeluaran, COUNT(CASE WHEN status_penjualan = 'Ditolak' THEN 1 END) AS total_ditolak 
                FROM tb_penjualan 
                WHERE MONTH(tanggal_penjualan) = MONTH(CURRENT_DATE()) 
                AND YEAR(tanggal_penjualan) = YEAR(CURRENT_DATE()) 
                AND id_petugas = $id_petugas";
      // Eksekusi query total
      $result_total = mysqli_query($conn, $query_total);
      $row_total = mysqli_fetch_assoc($result_total);

      // Tampilkan total sampah berhasil, total sampah ditolak, dan total pengeluaran bulan ini
      echo "<h5>Berhasil: " . $berhasil . "</h5>";
      echo "<h5>Ditolak: " . $row_total['total_ditolak'] . "</h5>";
      echo "<h5>Total Pengeluaran Bulan Ini: Rp. " . number_format($row_total['total_pengeluaran'], 0, ',', '.') . "</h5>";
      ?>
    </div>


    <div class="col-10 d-none mx-auto" id="mingguan">
      <h2>Mingguan</h2>
      <table class="table">
        <thead>
          <tr>
            <th>Tanggal</th>
            <th>Total Harga</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <?php
          // Query untuk mengambil data bulanan dari tb_penjualan berdasarkan id_petugas
          $query = "SELECT tanggal_penjualan, total_harga, status_penjualan FROM tb_penjualan WHERE WEEK(tanggal_penjualan) = WEEK(CURRENT_DATE()) AND YEAR(tanggal_penjualan) = YEAR(CURRENT_DATE()) AND id_petugas = $id_petugas";

          // Eksekusi query
          $result = mysqli_query($conn, $query);
          $berhasil = 0;


          // Periksa apakah ada data yang ditemukan
          if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
              ++$berhasil;
              echo "<tr>";
              echo "<td>" . $row['tanggal_penjualan'] . "</td>";
              echo "<td>Rp " . number_format($row['total_harga'], 0, ',', '.') . "</td>";
              echo "<td>" . $row['status_penjualan'] . "</td>";
              echo "</tr>";
            }
          } else {
            echo "<tr><td colspan='3'>Tidak ada data transaksi bulan ini.</td></tr>";
          }
          ?>
        </tbody>
      </table>
      <?php
      // Query untuk menghitung total sampah berhasil, total sampah dibatalkan, dan total pengeluaran bulan ini
      $query_total = "SELECT SUM(CASE WHEN status_penjualan = 'Selesai' THEN total_harga ELSE 0 END) AS total_pengeluaran, COUNT(CASE WHEN status_penjualan = 'Ditolak' THEN 1 END) AS total_ditolak 
                FROM tb_penjualan 
                WHERE MONTH(tanggal_penjualan) = MONTH(CURRENT_DATE()) 
                AND YEAR(tanggal_penjualan) = YEAR(CURRENT_DATE()) 
                AND id_petugas = $id_petugas";
      // Eksekusi query total
      $result_total = mysqli_query($conn, $query_total);
      $row_total = mysqli_fetch_assoc($result_total);

      // Tampilkan total sampah berhasil, total sampah ditolak, dan total pengeluaran bulan ini
      echo "<h5>Berhasil: " . $berhasil . "</h5>";
      echo "<h5>Ditolak: " . $row_total['total_ditolak'] . "</h5>";
      echo "<h5>Total Pengeluaran Minggu Ini: Rp. " . number_format($row_total['total_pengeluaran'], 0, ',', '.') . "</h5>";
      ?>
    </div>
  </div>
</div>
<?php
include 'navbar.php';
?>
<!-- Include Bootstrap 5 JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.min.js"></script>
<script>
  const btnBulanan = document.querySelector('.bulanan');
  const btnMingguan = document.querySelector('.mingguan');
  const bulanan = document.getElementById('bulanan');
  const mingguan = document.getElementById('mingguan');

  btnBulanan.addEventListener('click', function () {
    btnBulanan.classList.add('text-white');
    btnBulanan.style.background = '#0A0A33';
    btnBulanan.style.borderRadius = '8px';
    bulanan.classList.remove('d-none');
    mingguan.classList.add('d-none');

    btnMingguan.classList.add('text-dark');
    btnMingguan.classList.remove('text-white');
    btnMingguan.style.background = '#adadadad';

  });

  btnMingguan.addEventListener('click', function () {
    btnMingguan.classList.add('text-white');
    btnMingguan.style.background = '#0A0A33';
    btnMingguan.style.borderRadius = '8px';
    bulanan.classList.add('d-none');
    mingguan.classList.remove('d-none');

    btnBulanan.classList.add('text-dark');
    btnBulanan.classList.remove('text-white');
    btnBulanan.style.background = '#adadadad'

  });
</script>
</body>

</html>