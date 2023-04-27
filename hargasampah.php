<?php
include 'homeheader.php';
include 'auth/koneksi.php';
// Select data from table
$sql = "SELECT kategori_sampah, jenis_sampah, keterangan, harga_sampah FROM tb_sampah";
$result = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html>

<head>
    <title>Harga Sampah</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Load Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-3">
        <h1 class="mb-3">Harga Sampah</h1>
        <div class="align-items-center">
            <form id="searchTask">
                <div class="col-auto mb-3">
                    <label for="inputSearch" class="form-label">Cari Sampah</label>
                    <input type="text" id="inputSearch" class="form-control" placeholder="Masukkan Nama Sampah">
                </div>
            </form>
        </div>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Kategori Sampah</th>
                    <th>Jenis Sampah</th>
                    <th>Keterangan</th>
                    <th>Harga Sampah</th>
                </tr>
            </thead>
            <tbody>

                <!-- Loop through database query results and output table rows -->

                <?php
                // Output table rows
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td class='item_sampah kategori'>" . $row["kategori_sampah"] . "</td>";
                        echo "<td class='item_sampah jenis'>" . $row["jenis_sampah"] . "</td>";
                        echo "<td class='item_sampah keterangan'>" . $row["keterangan"] . "</td>";
                        echo "<td class='harga'>" . $row["harga_sampah"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>Tidak ada data yang ditemukan</td></tr>";
                }

                // Close database connection
                mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </div>
    <!-- Load Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.min.js"></script>
    <script>
        const searchTask = document.getElementById('inputSearch');
        searchTask.addEventListener('keyup', function (e) {
            const searchString = e.target.value.toLowerCase();
            const tableRows = document.querySelectorAll('.table tbody tr');

            tableRows.forEach((row) => {
                const kategori = row.querySelector('.kategori').textContent.toLowerCase();
                const jenis = row.querySelector('.jenis').textContent.toLowerCase();
                const keterangan = row.querySelector('.keterangan').textContent.toLowerCase();
                const harga = row.querySelector('.harga').textContent.toLowerCase();

                if (kategori.indexOf(searchString) !== -1 || jenis.indexOf(searchString) !== -1 || keterangan.indexOf(searchString) !== -1 || harga.indexOf(searchString) !== -1) {
                    row.classList.remove('d-none');
                    foundRows = true;
                } else {
                    row.classList.add('d-none');
                }
            });

            const noDataMessage = document.getElementById('noDataMessage');
            if (foundRows) {
                noDataMessage.classList.add('d-none');
            } else {
                noDataMessage.classList.remove('d-none');
            }
        });


    </script>
    <script src="script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.min.js"></script>
</body>

</html>