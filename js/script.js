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