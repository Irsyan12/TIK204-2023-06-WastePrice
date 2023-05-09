<?php
session_start();
include 'header.php';
?>

<div class="container">
    <div class="text-center">
        <img src="../asset/Logo.svg" draggable="false" width="105" class="py-5">
        <h2>Masuk Petugas</h2>

    </div>
    <div class="d-flex justify-content-center">
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
            <div class="ingat-saya">
                <label>
                    <input id="login-remember" type="checkbox" name="ingatsaya" value="1"> Ingat Saya
                </label>
            </div>
            <button type="submit" class="btn-submit m-5"> Submit</button>

        </form>

    </div>
</div>



<script src="../js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
    integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
    integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ"
    crossorigin="anonymous"></script>
</body>

</html>