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
    <link rel="icon" href="../asset/Logo.png" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
        <div class="container">
            <a class="navbar-brand" href="daftarharga">
                <img src="../asset/Logo.svg" draggable="false" alt="Waste Price" width="48.81" height="41">
                Waste Price
            </a>

            <?php if (!isset($_SESSION['adminLogin'])) { ?>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto mx-5">
                        <li class="nav-item">
                            <a class="nav-link" href="../landingpage">Landing Page</a>
                        </li>
                    </ul>
                <?php } ?>



                <?php if (isset($_SESSION['adminLogin'])) { ?>
                    <!-- Dropdown -->
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto mx-5">
                            <li class="nav-item">
                                <a class="nav-link" href="daftarpetugas">Daftar Petugas</a>
                            </li>
                            <li class="nav-item mx-4">
                                <a class="nav-link" href="daftarharga">Daftar Harga Sampah</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="authAdmin/logout.php">Keluar</a>
                            </li>
                        </ul>
                    </div>
                <?php } ?>

    </nav>