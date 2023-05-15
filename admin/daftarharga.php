<?php
session_start();
include '../auth/koneksi.php';
include 'header.php';
if (!isset($_SESSION['adminLogin'])) {
    header('location:login');
    exit();
}

$sql = "SELECT * FROM tb_sampah";
$result = mysqli_query($conn, $sql);
$no = 0;
?>
<div class="container">
    <h1 class="mb-3 mt-5 my-5 pt-5">Harga Sampah</h1>
    <div class="align-items-center">
        <form id="searchTask">
            <div class="col-auto mb-3">
                <label for="inputSearch" class="form-label">Cari Sampah</label>
                <input type="text" id="inputSearch" class="form-control" placeholder="Masukkan Nama Sampah">
            </div>
        </form>
    </div>
    <table class="table table-striped mb-5 pb-5">
        <thead>
            <tr>
                <th>No.</th>
                <th>Kategori Sampah</th>
                <th>Jenis Sampah</th>
                <th>Keterangan</th>
                <th>Harga Sampah / kg</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>

            <!-- Loop through database query results and output table rows -->

            <?php
            // Output table rows
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . ++$no . ".</td>";
                    echo "<td class='item_sampah kategori'>" . $row["kategori_sampah"] . "</td>";
                    echo "<td class='item_sampah jenis'>" . $row["jenis_sampah"] . "</td>";
                    echo "<td class='item_sampah keterangan'>" . $row["keterangan"] . "</td>";
                    echo "<td class='harga'>" . number_format($row["harga_sampah"], 0, ',', '.') . "</td>";
                    echo "<td>";
                    echo '<a href="kelola.php?ubah=' . $row["id_sampah"] . '" type="button" class="btn btn-success btn-sm"><i class="bi bi-pencil-fill"></i></a>';
                    echo '</td>';
                    echo "</tr>";
                }
            } else {
                echo '<tr><td colspan="5" id="noDataMessage" class="text-center">Sampah tidak ditemukan</td></tr>';
            }

            // Close database connection
            mysqli_close($conn);
            ?>
        </tbody>
    </table>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>
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
                // foundRows = true;
            } else {
                row.classList.add('d-none');
            }
        });


    });

    <?php if (isset($_SESSION['edit_harga_berhasil'])):
        ?>
        alert('Harga Sampah berhasil diperbarui');
        <?php
        unset($_SESSION['edit_harga_berhasil']);
    endif;
    ?>
</script>

</body>