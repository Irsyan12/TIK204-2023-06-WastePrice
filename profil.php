<?php
include 'homeheader.php';
session_start();
if (!isset($_SESSION['session_username'])) {
    header('location:login.php');
    exit();
}
?>
<div class="container mt-5 pt-5">
    <div class="d-flex flex-column align-items-center">
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

            <a href="#" class="btn mt-2" draggable="false">Syarat dan Ketentuan</a>

            <a href="#" class="btn btn-danger text-white mt-5" onclick="konfirmasiLogout()" draggable="false">Log
                Out</a>
        </div>
    </div>
</div>
<script src="js/alert.js"></script>
<script src="alert/sweetalert2.all.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4Yf"></script>
<script>
    <?php if (isset($_SESSION['update_berhasil'])):
        ?>
        const passwordAlert = document.getElementById('password-allert');
        passwordAlert.classList.remove('d-none');
        Swal.fire(
            'Berhasil!',
            'Profil anda berhasil diperbarui',
            'success'
        <?php
        unset($_SESSION['update_berhasil']);
    endif;
    ?>
</script>
</body>

</html>