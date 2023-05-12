<!DOCTYPE html>
<html>
<head>
  <title>Laporan Transaksi</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Include Bootstrap 5 CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <h1 class="text-center mt-3">Laporan Transaksi</h1>
    <div class="row mt-4">
      <div class="col-md-6">
        <h2>Bulanan</h2>
        <table class="table">
          <thead>
            <tr>
              <th>Tanggal</th>
              <th>Berat Sampah (kg)</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>01/05/2023</td>
              <td>50</td>
              <td>Selesai</td>
            </tr>
            <tr>
              <td>15/05/2023</td>
              <td>35</td>
              <td>Dibatalkan</td>
            </tr>
            <!-- Add more rows here -->
          </tbody>
        </table>
        <h4>Total Sampah Berhasil: 50 kg</h4>
        <h4>Total Sampah Dibatalkan: 35 kg</h4>
        <h4>Total Pengeluaran Bulan Ini: Rp 2.500.000</h4>
      </div>
      <div class="col-md-6">
        <h2>Mingguan</h2>
        <table class="table">
          <thead>
            <tr>
              <th>Tanggal</th>
              <th>Berat Sampah (kg)</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>01/05/2023</td>
              <td>20</td>
              <td>Selesai</td>
            </tr>
            <tr>
              <td>08/05/2023</td>
              <td>15</td>
              <td>Selesai</td>
            </tr>
            <tr>
              <td>15/05/2023</td>
              <td>10</td>
              <td>Dibatalkan</td>
            </tr>
            <!-- Add more rows here -->
          </tbody>
        </table>
        <h4>Total Sampah Berhasil: 35 kg</h4>
        <h4>Total Sampah Dibatalkan: 10 kg</h4>
        <h4>Total Pengeluaran Minggu Ini: Rp 1.000.000</h4>
      </div>
    </div>
  </div>
  <!-- Include Bootstrap 5 JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.min.js"></script>
</body>
</html>
