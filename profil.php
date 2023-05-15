<?php
include 'homeheader.php';
session_start();
if (!isset($_SESSION['session_username'])) {
    header('location:login');
    exit();
}
?>
<div class="container mt-5 pt-5">
    <div class="d-flex flex-column align-items-center">
        <?php if (isset($_SESSION['kata_sandi_lama_salah'])): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-triangle-fill"></i> <strong>Gagal</strong>
                <?php echo $_SESSION['kata_sandi_lama_salah'] ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
            unset($_SESSION['kata_sandi_lama_salah']);
        endif;
        ?>
        <?php if (isset($_SESSION['update_berhasil'])): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle"></i> <strong>Berhasil</strong>
                <?php echo $_SESSION['update_berhasil'] ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
            unset($_SESSION['update_berhasil']);
        endif;
        ?>
        <div class="text-center">
            <img src="https://via.placeholder.com/150" alt="Foto Profil" class="img-fluid rounded-circle mb-3">
            <h2>
                <?php echo ucfirst($_SESSION['session_username']); ?>
            </h2>
            <h6>
                No Telepon:
                <?php echo $_SESSION['session_no_telepon'] ?>
            </h6>
        </div>
        <div class="text-center mt-5 d-flex flex-column">
            <a href="ubahprofil" class="btn mt-3" draggable="false"><i class="bi bi-key"></i> Ubah
                Profil</a>

            <a href="bantuan" class=" btn mt-2" draggable="false"><i class="bi bi-question-circle"></i> Bantuan</a>

            <a href="sk" class="btn mt-2" draggable="false">Syarat dan Ketentuan</a>


            <!-- Tombol Logout -->
            <a href="#" class="btn btn-danger text-white mt-5" onclick="konfirmasiLogout()" draggable="false">Log
                Out</a>
        </div>
    </div>
</div>
<!-- Menghubungkan JavaScript -->
<script src="js/alert.js"></script>
<script src="alert/sweetalert2.all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
    integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
    integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ"
    crossorigin="anonymous"></script>

<script>
    <?php if (isset($_SESSION['update_berhasil'])):
        ?>
        const passwordAlert = document.getElementById('password-allert');
        passwordAlert.classList.remove('d-none');
        Swal.fire(
            'Berhasil!',
            'Profil anda berhasil diperbarui',
            'success'
        )
        <?php
        unset($_SESSION['update_berhasil']);
    endif;
    ?>
</script>
</body>

</html>