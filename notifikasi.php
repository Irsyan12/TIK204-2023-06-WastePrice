<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Notifikasi</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css">
    <style>
        .col {
            height: 100vh;
            overflow-y: auto;
            padding: 0;
        }
        .col .card {
            margin-bottom: 15px;
        }
        .card-body {
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            height: 100%;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="text-center">
            <h1 class-"text-center">Notifikasi</h1>
        </div>
        
        <div class="row">
            <div class="col mx-3">
                <div class="card mt-5">
                    <div class="card-header text-center">
                    <i class="bi bi-arrow-repeat"></i> Perubahan Harga
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Harga Kardus Naik Menjadi Rp.500</li>
                            <li class="list-group-item">Harga Botol Plastik Turun Menjadi Rp.650</li>
                            <li class="list-group-item">Harga Gelas Plastik Aqua Naik Menjadi Rp.800</li>
                            <li class="list-group-item">Harga Kertas Buram Turun Menjadi Rp.200</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col mx-3">
                <div class="card mt-5">
                    <div class="card-header text-center">
                    <i class="bi bi-truck"></i> Status Penjemputan
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Horee!! Permintaan pickup sampah anda sudah diterima, Kurir sampah akan segera menjemput kealamatmu</li>
                            <li class="list-group-item">Hore!! Transaksi anda sudah berhasil</li>
                            <li class="list-group-item">Horee!! Permintaan pickup sampah anda sudah diterima, Kurir sampah akan segera menjemput kealamatmu</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>