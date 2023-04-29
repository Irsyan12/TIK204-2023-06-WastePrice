<?php
include 'homeheader.php'
    ?>
  </header>
  <main class="container mt-5 pt-5">
    <h1>Ubah Profil</h1>
    <form>
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username" name="username" value="john.doe">
      </div>
      <div class="mb-3">
        <label for="no_telp" class="form-label">Nomor Telepon</label>
        <input type="tel" class="form-control" id="no_telp" name="no_telp" value="08123456789">
      </div>
      <hr>
      <div class="mb-3">
        <label for="kata_sandi_lama" class="form-label">Kata Sandi Lama</label>
        <input type="password" class="form-control" id="kata_sandi_lama" name="kata_sandi_lama">
      </div>
      <div class="mb-3">
        <label for="kata_sandi_baru" class="form-label">Kata Sandi Baru</label>
        <input type="password" class="form-control" id="kata_sandi_baru" name="kata_sandi_baru">
      </div>
      <div class="mb-3">
        <label for="ulang_kata_sandi_baru" class="form-label">
        </label>
      </div>
    </form>
  </main>
</body>
</html>


