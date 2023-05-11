<!doctype html>
<?php
include '../auth/koneksi.php';
session_start();

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@200&family=Montserrat:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    <title>Waste Price</title>
    <link rel="icon" href="asset/Logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../asset/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <div class="text-center">
            <img src="../asset/Logo.svg" draggable="false" width="105" class="py-5">
            <h2>Masuk</h2>

        </div>
        <div class="d-flex justify-content-center">
            <form action="authAdmin/auth.php" method="post">
                <div class="form-group my-3">
                    <label for="username" class="label-username">Nama Pengguna:</label>
                    <input type="text" class="form-control username" id="username" placeholder="" name="username" value="<?php if (isset($cookie_username)) {
                        echo $cookie_username;
                    } ?>" />
                </div>
                <div class="form-group mb-3">

                    <div class="pw">
                        <label for="password" class="label-password">Kata Sandi:</label>
                        <input type="password" class="form-control password" id="password" name="password" />

                    </div>

                </div>
                <div class="ingat-saya">
                    <input id="login-remember" type="checkbox" name="ingatsaya" value="ingatsaya">
                    <label for="login-remember">Ingat Saya</label>
                </div>

                <button type="submit" class="btn-submit m-5">Submit</button>
            </form>

        </div>
    </div>



    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
        integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
        integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ"
        crossorigin="anonymous"></script>
    <script src="alert/sweetalert2.all.min.js"></script>
    <script src="js/alert.js"></script>
    <script>
        <?php if (isset($_SESSION['login_gagal'])):
            ?>
            passwordSalah();
            session_destroy();
            <?php
            session_destroy();
        endif;
        ?>

        <?php if (isset($_SESSION['daftar_berhasil'])):
            ?>
            daftarBerhasil();
            <?php
            session_destroy();
        endif;
        ?>
    </script>
</body>

</html>