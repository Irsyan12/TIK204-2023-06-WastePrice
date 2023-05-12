<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ubah Profil</title>
  <!-- Menghubungkan dengan file CSS Bootstrap -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css">
</head>

<body>
  <div class="container mt-5">
    <h2>Ubah Profil</h2>
    <form>
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username" placeholder="Masukkan username">
      </div>
      <div class="mb-3">
        <label for="phone" class="form-label">Nomor Telepon</label>
        <input type="tel" class="form-control" id="phone" placeholder="Masukkan nomor telepon">
      </div>
      <div class="mb-3">
        <label for="oldPassword" class="form-label">Kata Sandi Lama</label>
        <input type="password" class="form-control" id="oldPassword" placeholder="Masukkan kata sandi lama">
      </div>
      <div class="mb-3">
        <label for="newPassword" class="form-label">Kata Sandi Baru</label>
        <input type="password" class="form-control" id="newPassword" placeholder="Masukkan kata sandi baru">
      </div>
      <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
  </div>

  <!-- Menghubungkan dengan file JavaScript Bootstrap -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.bundle.min.js"></script>
</body>

</html>
