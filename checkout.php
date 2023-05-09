<?php
session_start();
include 'homeheader.php';
if (isset($_POST['cart'])) {
    $cart = json_decode($_POST['cart'], true);
    $_SESSION['cartItems'] = $cart;
}

?>
<div class="container my-5 pt-5">
    <h1 class="text-center mb-5">Checkout</h1>
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Jenis Sampah</th>
                <th>Harga Sampah/Kg</th>
                <th>Jumlah</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <form action="auth/jual.php" method="post">
            <tbody>
                <?php
                $totalHarga = 0;
                $no = 1;
                foreach ($_SESSION['cartItems'] as $item):
                    ?>
                    <tr>
                        <td>
                            <?php echo $no; ?>
                        </td>
                        <td>
                            <?= $item['jenis_sampah'] ?>
                        </td>
                        <td>
                            Rp
                            <?= number_format($item["harga_sampah"], 0, ',', '.') ?>
                        </td>
                        <td>
                            <?= $item['jumlah'] ?>
                        </td>
                        <td>
                            Rp
                            <?= number_format($item["subtotal"], 0, ',', '.') ?>
                        </td>
                    </tr>
                    <?php $totalHarga += number_format($item["subtotal"], 0, ',', '.');
                    $no++ ?>
                    <?php $_SESSION['totalHarga'] = $totalHarga;
                endforeach; ?>
                <tr>
                    <td colspan="4" class="text-end fw-bold">Total Pendapatan :</td>
                    <td>Rp.
                        <?= $totalHarga ?>00
                    </td>
                </tr>
            </tbody>
    </table>

    <div class="container mt-4">
        <div class="row justify-content-center mb-3">
            <div class="col-md-8">
                <div class="form-group">
                    <label for="alamat">Alamat Penjemputan</label>
                    <textarea class="form-control" id="alamat" name="alamat" required
                        style="border: 0.5px solid #B8B8B8; height: 100px;"></textarea>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="form-group">
                    <label for="deskripsi">Deskripsi Sampah</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi" required
                        style="border: 0.5px solid #B8B8B8; height: 100px;"></textarea>
                </div>
            </div>
        </div>
        <div class="row justify-content-end">
            <div class="col-md-3 col-sm-2 mt-3">
                <button type="submit" class="btn text-white px-4" style="background-color: #0A0A33;">Jual</button>
            </div>
        </div>
    </div>
    </form>


    <?php
    echo '<pre>';
    print_r($_SESSION['cartItems']);
    echo '</pre>';
    ?>

</div>

<!-- Bootstrap 5 JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"
    integrity="sha512-xgAta/3pTHxtJkU0sc6UK5Nf2gR6M+14/Z07JYMOIlGymzq3pIPxU5DdeU6dwLu/w6sklQosR1gOHnGPyvH9Xw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>