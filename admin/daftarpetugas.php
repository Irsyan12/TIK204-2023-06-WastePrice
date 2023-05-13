<?php
session_start();
include '../auth/koneksi.php';
include 'header.php';
if (!isset($_SESSION['adminLogin'])) {
    header('location:login');
    exit();
}

$sql = "SELECT * FROM tb_petugas";
$result = mysqli_query($conn, $sql);
$no = 0;
?>




<div class="container">
    <h1 class="mb-3 mt-5 my-5 pt-5">Daftar Petugas</h1>
    <a href="kelolapetugas.php" class="px-3 py-2 text-white text-decoration-none" type="button"
        style="background: #0A0A33; border: none; border-radius: 8px;">Tambah Petugas</a>
    <table class="table table-striped mb-5 pb-5 text-center">
        <thead>
            <tr>
                <th>No.</th>
                <th>Username</th>
                <th>No Telepon</th>
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
                    echo "<td class='item_petugas username'>" . $row["username"] . "</td>";
                    echo "<td class='item_petugas no_telepon'>" . $row["no_telepon"] . "</td>";
                    echo "<td>";
                    echo '<a href="authAdmin/proses.php?hapus=' . $row["id_petugas"] . '" type="button"
                    class="btn btn-danger btn-sm my-2 " onclick="return confirm(\'yakin hapus?\')"><i
                        class="bi bi-trash"></i></a>';
                    echo '<a href="kelolapetugas.php?ubah=' . $row["id_petugas"] . '" type="button" class="btn btn-success btn-sm mx-2"><i class="bi bi-pencil-fill"></i></a>';
                    echo '</td>';
                    echo "</tr>";
                }
            } else {
                echo '<tr><td colspan="5" id="noDataMessage" class="text-center">petugas tidak ditemukan</td></tr>';
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
<script src="../alert/sweetalert2.all.min.js"></script>
<script src="../js/alert.js"></script>

<script>
    <?php if (isset($_SESSION['daftar_berhasil'])):
        ?>
        alert('Anda berhasil menambahkan akun petugas');
        <?php
        unset($_SESSION['daftar_berhasil']);
    endif;
    ?>
    <?php if (isset($_SESSION['edit_berhasil'])):
        ?>
        alert('Anda berhasil mengedit akun petugas');
        <?php
        unset($_SESSION['edit_berhasil']);
    endif;
    ?>
</script>