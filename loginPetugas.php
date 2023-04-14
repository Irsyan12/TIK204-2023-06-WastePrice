<!doctype html>
<?php
session_start();
?>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@200&family=Montserrat:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <title>Waste Price</title>
    <link rel="icon" href="asset/Logo.png" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar bg-body-tertiary">
        <div class="container ">
            <a class="navbar-brand " href="index.php">
                <img src="asset/Logo.svg" alt="Waste Price" draggable="false" width="48.81" height="41">
                Waste Price
            </a>
        </div>
    </nav>

    <div class="container">


        <?php if (isset($_SESSION['login_gagal'])):
            ?>
            <div class="alert alert-danger mt-4 alert-dismissible fade show" role="alert">

                <?php
                echo $_SESSION['login_gagal'];
                ?>

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            <?php
            session_destroy();
        endif;
        ?>
        <?php if (isset($_SESSION['daftar_berhasil'])):
            ?>
            <div class="alert alert-success mt-4 alert-dismissible fade show" role="alert">

                <?php
                echo $_SESSION['daftar_berhasil'];
                ?>

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            <?php
            session_destroy();
        endif;
        ?>
        <div class="text-center">
            <img src="asset/Logo.svg" draggable="false" width="105" class="py-5">
            <h2>Masuk Petugas</h2>

        </div>
        <div class="d-flex justify-content-center">
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
            <form action="auth/auth.php" method="post">
                <div class="form-group my-3">
                    <label for="username" class="label-username">Nama Pengguna:</label>
                    <input type="text" class="form-control username" id="username" placeholder="" name="username"
                        required />
                </div>
                <div class="form-group mb-3">

                    <div class="pw">
                        <label for="password" class="label-password">Kata Sandi:</label>
                        <input type="password" class="form-control password" id="password" name="password" required />

                    </div>

                </div>



                <div class="col-sm-12 pt-1 regist">
                    <p>Belum Punya Akun? <a href="daftar.php">Daftar Disini</a></p>
                </div>


                <button type="submit" class="btn-submit m-5"> Submit</button>

            </form>

        </div>
    </div>



    <script src="script.js"></script>
</body>

</html>