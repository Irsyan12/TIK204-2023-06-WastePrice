<!doctype html>
<?php
include 'auth/koneksi.php';
session_start();
if (isset($_COOKIE['cookie_username']) && isset($_COOKIE['cookie_password'])) {
    $cookie_username = $_COOKIE['cookie_username'];
    $cookie_password = $_COOKIE['cookie_password'];

    $query = mysqli_query($conn, "SELECT * from tb_masyarakat where username = '$cookie_username' and password = '$cookie_password' ");
    $result = mysqli_fetch_assoc($query);
    if ($result['password'] == $cookie_password) {
        $_SESSION['session_username'] = $cookie_username;
        $_SESSION['session_password'] = $cookie_password;
    }

}

include 'header.php';

?>

<div class="container">

    <?php if (isset($_SESSION['formkosong'])):
        ?>
        <div class="alert alert-danger mt-4 alert-dismissible fade show" role="alert">

            <?php
            echo $_SESSION['formkosong'];
            ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        <?php
        session_destroy();
    endif;
    ?>

    <div class="text-center">
        <img src="asset/Logo.svg" draggable="false" width="105" class="py-5">
        <h2>Masuk</h2>

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

            <button type="submit" class="btn-submit m-5"> Submit</button>
            <div class="col-sm-12 pt-1 regist mt-5 text-center">
                <p>Belum Punya Akun? <a href="daftar">Daftar Disini</a></p>
            </div>

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