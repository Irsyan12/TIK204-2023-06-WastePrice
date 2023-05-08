<?php
session_start();
include 'homeheader.php';
include 'auth/koneksi.php';
if (!isset($_SESSION['session_username'])) {
    header('location:login.php');
    exit();
}
// Select data from table
$sql = "SELECT id_sampah, kategori_sampah, jenis_sampah, keterangan, harga_sampah FROM tb_sampah";
$result = mysqli_query($conn, $sql);
// --------------------------------------------------------
$cartItems = array();

// Ambil data dari form dan tambahkan ke array
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (isset($_POST['add_to_cart'])) {
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];
    $product_name = $_POST['product_name'];
    $price = $_POST['price'];

    $item = [
        'product_id' => $product_id,
        'product_name' => $product_name,
        'price' => $price,
        'quantity' => $quantity
    ];

    array_push($_SESSION['cart'], $item);
}
// ----------------------------------------------------------
?>
<!DOCTYPE html>
<html>

<head>
    <title>Jual Sampah</title>
    <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>
</head>

<body>
    <div class="container mt-5 pt-4 mb-5">
        <h1 class="mb-3">Jual Sampah</h1>
        <div class="align-items-center">
            <form id="searchTask">
                <div class="col-auto mb-4">
                    <label for="inputSearch" class="form-label">Cari Sampah</label>
                    <input type="text" id="inputSearch" class="form-control" placeholder="Masukkan Nama Sampah">
                </div>
            </form>
        </div>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 mb-5 pb-5">
            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <div class="col card-sampah position-relative">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title jenis">
                                    <?php echo ucfirst($row["jenis_sampah"]) ?>
                                </h5>
                                <p class="card-text keterangan">
                                    <?php echo $row["keterangan"] ?>
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <small class="kategori">
                                        <?php echo $row["kategori_sampah"] ?>
                                    </small>
                                    <h6 class="card-subtitle mb-2 text-muted harga">
                                        <?php echo "Rp " . number_format($row["harga_sampah"], 0, ',', '.') . "/ kg" ?>
                                    </h6>
                                </div>
                                <form method="POST">
                                    <div class="form-group">
                                        <label for="jumlah">Jumlah (kg):</label>
                                        <input type="number" class="form-control form-jumlah" name="jumlah" min="0" value="0"
                                            id="jumlah<?php echo $row["id_sampah"]; ?>">
                                    </div>
                                    <div class="form-group text-end">
                                        <button type="button" class="btn btn-danger mt-2 btn-decrease"
                                            data-target="#jumlah<?php echo $row["id_sampah"]; ?>">
                                            <i class="bi bi-dash"></i>
                                        </button>
                                        <button type="button" class="btn btn-success mt-2 btn-increase"
                                            data-target="#jumlah<?php echo $row["id_sampah"]; ?>">
                                            <i class="bi bi-plus"></i>
                                        </button>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo "<p>Tidak ada data yang ditemukan</p>";
            }
            mysqli_close($conn);
            ?>
        </div>
        <div id="noDataMessage" class="mt-3 text-center d-none">Sampah tidak ditemukan</div>
        <div class="card cart fixed-bottom p-2 d-none" id="cart">
            <div class="row align-items-center">
                <div class="col mx-3">
                    <p class="m-0">Total Harga</p>
                    <h5 class="m-0" id="totalHarga">Rp 0</h5>
                </div>
                <div class="col-auto">
                    <a href="#" class="btn btn-primary mx-3">Lanjut</a>
                </div>
            </div>
        </div>
        <script src="js/cart.js"></script>
        <script src="js/carisampah.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.min.js"></script>
</body>