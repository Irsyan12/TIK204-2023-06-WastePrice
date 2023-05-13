<?php
session_start();
include '../auth/koneksi.php';
include 'header.php';

$username = '';
$no_telepon = '';
$password = '';

if (isset($_GET['ubah'])) {
    $id_petugas = $_GET['ubah'];

    $query = "SELECT * FROM tb_petugas WHERE id_petugas = '$id_petugas';";
    $sql = mysqli_query($conn, $query);

    $result = mysqli_fetch_assoc($sql);

    $username = $result['username'];
    $no_telepon = $result['no_telepon'];
    $password = $result['password'];


    // var_dump($result);

    // die();
}
?>

<div class="container mt-5 pt-5">
    <form method="POST" action="authAdmin/proses.php" class="col-md-6 mx-auto">
        <input type="hidden" value="<?php echo $id_petugas; ?>" name="id_petugas">
        <div class="mb-3 row">
            <label for="username" class="col-sm-2 col-form-label">Username</label>
            <div class="col-sm-10">
                <input required type="text" name="username" class="form-control" id="username"
                    value="<?php echo $username; ?>">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="no_telepon" class="col-sm-2 col-form-label">No Telepon</label>
            <div class="col-sm-10">
                <input required type="text" name="no_telepon" class="form-control" id="no_telepon"
                    value="<?php echo $no_telepon; ?>">
            </div>
        </div>


        <div class="mb-3 row">
            <label for="password" class="col-sm-2 col-form-label">Password</label>

            <div class="mb-3 col-sm-10">
                <input required type="password" class="form-control" name="password" id="password"
                    value="<?php echo $password; ?>">
            </div>
        </div>

        <div class="mb3 row">
            <div class="col">

                <?php
                if (isset($_GET['ubah'])) {
                    ?>
                    <button class="px-3 py-2 text-white border-0" name="aksi" value="edit" type="submit"
                        style="background: #0A0A33; border-radius: 8px;"><i class="bi bi-file-earmark-plus"></i> Simpan
                        Perubahan</button>
                    <?php
                } else {
                    ?>
                    <button type="submit" name="aksi" value="add" class="px-3 py-2 text-white border-0"
                        style="background: #0A0A33; border-radius: 8px;"><i class="bi bi-file-earmark-plus"></i>
                        Tambahkan</button>
                    <?php
                }
                ?>

                <a href="daftarpetugas" type="button" class="btn btn-danger"><i class="bi bi-reply-fill"></i>
                    Batal</a>
            </div>

        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>
</body>

</html>