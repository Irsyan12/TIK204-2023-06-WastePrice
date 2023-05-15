<!DOCTYPE html>

<?php
include '../auth/koneksi.php';
include 'header.php';

session_start();

if (isset($_GET['ubah'])) {
    $id_sampah = $_GET['ubah'];

    $query = "SELECT * FROM tb_sampah WHERE id_sampah = '$id_sampah';";
    $sql = mysqli_query($conn, $query);

    $result = mysqli_fetch_assoc($sql);

    $kategori_sampah = $result['kategori_sampah'];
    $jenis_sampah = $result['jenis_sampah'];
    $keterangan = $result['keterangan'];
    $harga_sampah = $result['harga_sampah'];


    // var_dump($result);

    // die();
}
?>
<div class="container mt-5 pt-5">
    <form method="POST" action="authAdmin/proses.php" enctype="multipart/form-data" class="col-md-6 mx-auto">
        <input type="hidden" value="<?php echo $id_sampah; ?>" name="id_sampah">
        <div class="mb-3 row">
            <label for="kategori_sampah" class="col-sm-2 col-form-label">Kategori Sampah</label>
            <div class="col-sm-10">
                <input required type="text" name="kategori_sampah" class="form-control" id="kategori_sampah"
                    value="<?php echo $kategori_sampah; ?>" disabled>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="jenis_sampah" class="col-sm-2 col-form-label">Jenis Sampah</label>
            <div class="col-sm-10">
                <input required type="text" name="jenis_sampah" class="form-control" id="jenis_sampah"
                    value="<?php echo $jenis_sampah; ?>" disabled>
            </div>
        </div>

        <div class=" mb-3 row">
            <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>

            <div class="col-sm-10">
                <input required type="text" name="jenis_sampah" class="form-control" id="jenis_sampah"
                    value="<?php echo $keterangan; ?>" disabled>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="harga_sampah" class="col-sm-2 col-form-label">Harga Sampah</label>

            <div class="mb-3 col-sm-10">
                <input required type="number" class="form-control" name="harga_sampah" id="harga_sampah"
                    value="<?php echo $harga_sampah; ?>">
            </div>
        </div>

        <div class="mb3 row">
            <div class="col">
                <button class="px-3 py-2 text-white border-0" type="submit" name="sampah" value="edit"
                    style="background: #0A0A33; border-radius: 8px;"><i class="bi bi-file-earmark-plus"></i> Simpan
                    Perubahan</button>
                <a href="daftarharga" type="button" class="btn btn-danger"><i class="bi bi-reply-fill"></i>
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