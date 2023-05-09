<?php
include 'homeheader.php';
session_start();
if (!isset($_SESSION['session_username'])) {
  header('location:login');
  exit();
}
?>
<div class="container mt-5 pt-5 ">
  <h1 class="text-center my-3">Ubah Profil</h1>
  <div class="d-flex justify-content-center">

    <form method="POST" action="auth/ubah_profil_proses.php" id="form-ubah-profil">
      <div class="form-group my-1 pt-4">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username" name="username_baru"
          value="<?php echo $_SESSION['session_username']; ?>">
        <p class="text-danger mt-1 d-none" id="username-allert">username sudah digunakan</p>
      </div>

      <div class="form-group mb-3 mt-3">
        <label for="no_telp" class="form-label">Nomor Telepon</label>
        <input type="tel" class="form-control mb-3" id="telephone" name="no_telepon"
          value="<?php echo $_SESSION['session_no_telepon'] ?>">
      </div>

      <hr>

      <div class="form-group mb-3 mt-3">
        <label for="kata_sandi_lama" class="form-label">Kata Sandi Lama</label>
        <input type="password" class="form-control" id="kata_sandi_lama" name="kata_sandi_lama">
        <p class="text-danger mt-1 d-none" id="password-allert">Kata Sandi lama Salah!</p>
      </div>
      <div class="form-group mb-3">
        <label for="kata_sandi_baru" class="form-label">Kata Sandi Baru</label>
        <input type="password" class="form-control" id="kata_sandi_baru" name="kata_sandi_baru">
      </div>
      <div class="form-group mb-3">
        <label for="ulang_kata_sandi_baru" class="form-label">
        </label>
      </div>
      <button type="button" class="btn-submit mx-5 mt-2" onclick="ubahProfil()">Simpan</button>
    </form>
  </div>
</div>
</body>
<script src=" js/alert.js"></script>
<script src="alert/sweetalert2.all.min.js"></script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
  integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4Yf"></script>
<script>


  <?php if (isset($_SESSION['username_sudah_dipakai'])):
    ?>
    const usernameAlert = document.getElementById('username-allert');
    usernameAlert.classList.remove('d-none');
    <?php
    unset($_SESSION['username_sudah_dipakai']);
  endif;
  ?>

  <?php if (isset($_SESSION['kata_sandi_lama_salah'])):
    ?>
    const passwordAlert = document.getElementById('password-allert');
    passwordAlert.classList.remove('d-none');
    <?php
    unset($_SESSION['kata_sandi_lama_salah']);
  endif;
  ?>
</script>