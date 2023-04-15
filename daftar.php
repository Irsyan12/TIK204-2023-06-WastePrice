<!doctype html>

<?php
session_start();
include 'header.php';
?>

<div class="container">
    <div class="text-center">
        <h2 class="py-5">Buat Akun</h2>

    </div>
    <div class="d-flex justify-content-center">
        <form name="form_daftar" method="POST" action="auth/proses.php" onsubmit="return validateForm()">
            <div class="form-group my-3">
                <label for="username" class="label-username">Nama Pengguna</label>
                <input type="text" class="form-control username" id="username"
                    value="<?php echo isset($username_value) ? $username_value : ''; ?>" placeholder="" name=" username"
                    required />
                <p class="text-danger d-none mt-1" id="username-allert">Username Sudah Digunakan</p>

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
                    <p class="text-danger d-none mt-1" id="password-allert">Kata Sandi Tidak Sama</p>
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
<script>
    function validateForm() {
        var password = document.forms["form_daftar"]["password"].value;
        var confirm_password = document.forms["form_daftar"]["confirm_password"].value;

        if (password != confirm_password) {
            const passwordAlert = document.getElementById('password-allert');
            passwordAlert.classList.remove('d-none');
            return false;
        }
    }



    <?php if (isset($_SESSION['username_sudah_ada'])):
        ?>
        const usernameAlert = document.getElementById('username-allert');
        usernameAlert.classList.remove('d-none');

        <?php
        session_destroy();
    endif;
    ?>
</script>

</body>

</html>