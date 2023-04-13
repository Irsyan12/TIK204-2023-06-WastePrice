<?php
include 'koneksi.php';
session_start();


$query = "SELECT * FROM tb_siswa;";
$sql = mysqli_query($conn, $query);
$no = 0;

?>

<!DOCTYPE html>
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
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">CRUD</span>
        </div>
    </nav>

    <div class="container pt-4">
        <h1>Data Siswa</h1>
        <figure>
            <blockquote class="blockquote">
                <p>Berisi data yang disimpan di Database. </p>
            </blockquote>
            <figcaption class="blockquote-footer">
                CRUD <cite title="Source Title">Create Read Update Delete</cite>
            </figcaption>
        </figure>
        <a href="kelola.php" type="button" class="btn btn-primary">Tambah Data</a>

        <?php if (isset($_SESSION['eksekusi'])):
            ?>
            <div class="alert alert-success mt-4 alert-dismissible fade show" role="alert">

                <?php
                echo $_SESSION['eksekusi'];
                ?>

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            <?php
            session_destroy();
        endif;
        ?>

        <div class="table-responsive text-center">
            <table class="table align-middle table-bordered mt-2 table-hover">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>NISN</th>
                        <th>Nama Siswa</th>
                        <th>Jenis Kelamin</th>
                        <th>Foto</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($result = mysqli_fetch_assoc($sql)) {
                        ?>
                        <tr>
                            <td>
                                <?php echo ++$no; ?>.
                            </td>
                            <td>
                                <?php echo $result['nisn']; ?>
                            </td>
                            <td>
                                <?php echo $result['nama_siswa']; ?>
                            </td>
                            <td>
                                <?php echo $result['jenis_kelamin']; ?>
                            </td>
                            <td>
                                <img src="img/<?php echo $result['foto_siswa']; ?>" style="width: 100px;">
                            </td>
                            <td>
                                <?php echo $result['alamat']; ?>
                            </td>
                            <td>
                                <a href="proses.php?hapus=<?php echo $result['id_siswa']; ?>" type="button"
                                    class="btn btn-danger btn-sm my-2" onClick="return confirm('yakin hapus?')"><i
                                        class="bi bi-trash"></i></a>
                                <a href="kelola.php?ubah=<?php echo $result['id_siswa']; ?>" type="button"
                                    class="btn btn-success btn-sm"><i class="bi bi-pencil-fill"></i></a>


                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>