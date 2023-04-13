<!DOCTYPE html>

<?php
include 'koneksi.php';

session_start();

$id_siswa = '';
$nisn = '';
$nama_siswa = '';
$jenis_kelamin = '';
$alamat = '';


if (isset($_GET['ubah'])) {
    $id_siswa = $_GET['ubah'];

    $query = "SELECT * FROM tb_siswa WHERE id_siswa = '$id_siswa';";
    $sql = mysqli_query($conn, $query);

    $result = mysqli_fetch_assoc($sql);

    $nisn = $result['nisn'];
    $nama_siswa = $result['nama_siswa'];
    $jenis_kelamin = $result['jenis_kelamin'];
    $alamat = $result['alamat'];


    // var_dump($result);

    // die();
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
</head>

<body>
    <nav class="navbar bg-body-tertiary mb-4">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">CRUD</span>
        </div>
    </nav>
    <div class="container">
        <form method="POST" action="proses.php" enctype="multipart/form-data">
            <input type="hidden" value="<?php echo $id_siswa;  ?>" name="id_siswa">
            <div class="mb-3 row">
                <label for="nisn" class="col-sm-2 col-form-label">NISN</label>
                <div class="col-sm-10">
                    <input required type="text" name="nisn" class="form-control" id="nisn"
                        placeholder="Ex: 2104111010040" value="<?php echo $nisn; ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Nama Siswa</label>
                <div class="col-sm-10">
                    <input required type="text" name="nama_siswa" class="form-control" id="nama"
                        placeholder="Ex: Muhammad Azzam" value="<?php echo $nama_siswa; ?>">
                </div>
            </div>

            <div class=" mb-3 row">
                <label for="jkel" class="col-sm-2 col-form-label">Jenis Kelamin</label>

                <div class="col-sm-10">
                    <select required class=" form-select" name="jenis_kelamin" id="jkel">
                        <option <?php if ($jenis_kelamin == 'Laki-laki') {
                            echo "selected";
                        } ?> value="Laki-laki">Laki-laki
                        </option>
                        <option <?php if ($jenis_kelamin == 'Perempuan') {
                            echo "selected";
                        } ?> value="Perempuan">Perempuan
                        </option>
                    </select>

                </div>

            </div>

            <div class="mb-3 row">
                <label required for="foto" class="col-sm-2 col-form-label">Foto Siswa</label>

                <div class="mb-3 col-sm-10">
                    <input <?php if(!isset($_GET['ubah'])){echo "required";} ?> class="form-control" type="file" name="foto" id="foto" accept="image/*">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="alamat" class="col-sm-2 col-form-label">Alamat Lengkap</label>

                <div class="mb-3 col-sm-10">
                    <textarea required class="form-control" name="alamat" id="alamat"
                        rows="3"><?php echo $alamat; ?></textarea>
                </div>
            </div>

            <div class="mb3 row">
                <div class="col">

                    <?php
                    if (isset($_GET['ubah'])) {
                        ?>
                        <button type="submit" name="aksi" value="edit" class="btn btn-primary"><i
                                class="bi bi-file-earmark-plus"></i> Simpan Perubahan</button>
                        <?php
                    } else {
                        ?>
                        <button type="submit" name="aksi" value="add" class="btn btn-primary"><i
                                class="bi bi-file-earmark-plus"></i> Tambahkan</button>
                        <?php
                    }
                    ?>

                    <a href="index.php" type="button" class="btn btn-danger"><i class="bi bi-reply-fill"></i>
                        Batal</a>
                </div>

            </div>
        </form>
    </div>

    
</body>

</html>