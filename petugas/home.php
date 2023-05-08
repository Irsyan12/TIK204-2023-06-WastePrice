<?php
session_start();
include 'homeheader.php';
if (!isset($_SESSION['session_usernamepetugas'])) {
    header('location:login');
    exit();
}
?>

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
            <a class="navbar-brand" style="cursor:pointer" onclick="location.reload();">
                <img src="../asset/Logo.svg" alt="Waste Price" draggable="false" width="48.81" height="41">
                Waste Price
            </a>
            <div class="ms-auto">
                <i class="bi bi-bell btn" style="font-size: 23px;"></i>
            </div>
        </div>
    </nav>


    <div class="container mt-5 pt-5">

        <h1> <img src="../asset/profile.svg" width="48.81"> Hai
            <?php echo ucfirst($_SESSION['session_usernamepetugas']); ?>
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
                            <img src="../asset/kardus.jpg" width="10" draggable="false"
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
            <div class="col mb-4 mx-4">
                <div class="card">
                    <h5 class="card-title m-3">Sampah Saya</h5>
                    <div class="d-flex flex-row sampah-saya">
                        <div class="col-md-auto">
                            <img src="../asset/kardus.jpg" width="10" draggable="false"
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
            <div class="col mb-4 mx-4">
                <div class="card">
                    <h5 class="card-title m-3">Sampah Saya</h5>
                    <div class="d-flex flex-row sampah-saya">
                        <div class="col-md-auto">
                            <img src="../asset/kardus.jpg" width="10" draggable="false"
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
            <div class="col mb-4 mx-4">
                <div class="card">
                    <h5 class="card-title m-3">Sampah Saya</h5>
                    <div class="d-flex flex-row sampah-saya">
                        <div class="col-md-auto">
                            <img src="../asset/kardus.jpg" width="10" draggable="false"
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
            <div class="col mb-4 mx-4">
                <div class="card">
                    <h5 class="card-title m-3">Sampah Saya</h5>
                    <div class="d-flex flex-row sampah-saya">
                        <div class="col-md-auto">
                            <img src="../asset/kardus.jpg" width="10" draggable="false"
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
            <div class="col mb-4 mx-4">
                <div class="card">
                    <h5 class="card-title m-3">Sampah Saya</h5>
                    <div class="d-flex flex-row sampah-saya">
                        <div class="col-md-auto">
                            <img src="../asset/kardus.jpg" width="10" draggable="false"
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
        </div>
    </div>
    <?php
    include 'navbar.php';
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
</body>

</html>