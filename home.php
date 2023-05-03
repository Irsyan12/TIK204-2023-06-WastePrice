<?php
session_start();
if (!isset($_SESSION['session_username'])) {
    header('location:login.php');
    exit();
}
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <title>Waste Price</title>
    <link rel="icon" href="asset/Logo.png" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
        @media only screen and (max-width: 767px) {
            body {
                overflow-y: hidden;
            }

            .sampah-saya {
                display: flex;
                flex-direction: row;
            }

            .card-img {
                max-width: 100px;
            }
        }
    </style>
</head>

<body>
    <nav class="navbar bg-body-tertiary fixed-top">
        <div class="container d-flex">
            <a class="navbar-brand" href="index.php" onclick="location.reload();">
                <img src="asset/Logo.svg" alt="Waste Price" draggable="false" width="48.81" height="41">
                Waste Price
            </a>
            <div class="ms-auto">
                <i class="bi bi-bell btn" style="font-size: 23px;"></i>
            </div>
        </div>
    </nav>


    <div class="container mt-5 pt-5">

        <h1> <img src="asset/profile.svg" width="48.81"> Hai
            <?php echo ucfirst($_SESSION['session_username']); ?>
        </h1>
        <hr>
    </div>

    <div class="container">
        <div class="d-flex flex-column">
            <div class="col mb-4 mx-4">
                <div class="card">
                    <h5 class="card-title m-3">Sampah Saya</h5>
                    <div class="d-flex flex-row sampah-saya">
                        <div class="col-md-auto">
                            <img src="asset/kardus.jpg" width="10" draggable="false"
                                class="card-img mb-3 ms-3 img-fluid" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <ul>
                                    <li>Jenis Sampah: Plastik</li>
                                    <li>Berat Sampah: 5 kg</li>
                                    <li>Status Penjemputan: Belum dijemput</li>
                                    <li>Estimasi Penjemputan: 12 April 2023</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex flex-row text-center mx-4">
                <div class="card h-100 mx-4 my-2 text-center w-50">
                    <div class="card-body h-100 d-flex flex-column justify-content-center">
                        <i class="bi bi-card-checklist btn-logo"></i> <br>
                        Transaksi Saya
                    </div>
                </div>
                <a href="hargasampah.php" class="card h-100 mx-4 my-2 text-center w-50 text-decoration-none text-dark">
                    <div class="card-body h-100 d-flex flex-column justify-content-center">
                        <i class="bi bi-currency-dollar btn-logo"></i> <br>
                        Harga Sampah
                    </div>
                </a>
            </div>
        </div>
    </div>


    <nav class="navbar navbar-expand navbar-dark bg-utama fixed-bottom" style="background-color: #0A0A33;">
        <ul class="navbar-nav nav-justified w-100 d-flex align-items-center">
            <li class="nav-item">
                <a href="#" class="nav-link mt-2"><i class="bi bi-house-door" style="font-size: 20px;"></i></a>
            </li>
            <li class="nav-item jual-sampah">
                <a href="#" class="nav-link"><i class="bi bi-cart" style="font-size: 20px;"></i><br>Jual Sampah</a>
            </li>
            <li class="nav-item">
                <a href="profil.php" class="nav-link mt-2"><i class="bi bi-person" style="font-size: 20px;"></i></a>
            </li>
        </ul>
    </nav>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
</body>

</html>