<!doctype html>

<?php
session_start();
?>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@200&family=Montserrat:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <title>Waste Price</title>
    <link rel="icon" href="asset/Logo.png" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">


    <script>
        function validateForm() {
            var password = document.forms["form_daftar"]["password"].value;
            var confirm_password = document.forms["form_daftar"]["confirm_password"].value;

            if (password != confirm_password) {
                const passwordAlert = document.getElementById('password-allert');
                passwordAlert.classList.remove('d-none');
                // alert("Konfirmasi password tidak sama. Silakan coba lagi.");
                return false;
            }
        }




    </script>
</head>

<body>
    <nav class="navbar bg-body-tertiary">
        <div class="container ">
            <a class="navbar-brand " href="index.php">
                <img src="asset/Logo.svg" alt="Waste Price" draggable="false" width="48.81" height="41">
                Waste Price
            </a>
        </div>
    </nav>

    <div class="container">
        <div class="text-center">
            <h2 class="py-5">Buat Akun</h2>

        </div>
        <div class="d-flex justify-content-center">
            <form name="form_daftar" method="POST" action="auth/proses.php" onsubmit="return validateForm()">
                <div class="form-group my-3">
                    <label for="username" class="label-username">Nama Pengguna</label>
                    <input type="text" class="form-control username" id="username" placeholder="" name="username"
                        required />
                </div>

                <div class="form-group mb-3">
                    <label for="telephone" class="label-telephone">Telephone</label>
                    <input type="text" class="form-control telephone" id="telephone" name="no_telepon" required />
                </div>

                <div class="form-group my-3">
                    <div class="pw">
                        <label for="password" class="label-password">Kata Sandi</label>
                        <input type="password" class="form-control password" id="password" name="password" required />
                    </div>
                </div>

                <div class="form-group mb-3">
                    <div class="pw">
                        <label for="password" class="label-confirm_password">Ulangi Kata Sandi</label>
                        <input type="password" class="form-control confirm_password" id="confirm_password"
                            name="confirm_password" required />
                        <p class="text-danger d-none mt-1" id="password-allert">Pasword tidak sama</p>
                    </div>

                </div>

                <div class="syarat">
                    <label>
                        <input type="checkbox" name="agree" required>
                        Saya setuju dengan <a href="#">syarat dan ketentuan</a>.
                    </label>
                </div>
                <button type="submit" class="btn-submit m-5">Submit</button>
            </form>

        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>

    <script src="script.js">
    </script>

</body>

</html>