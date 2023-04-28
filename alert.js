function passwordSalah() {
    Swal.fire(
        'Ooops...',
        'Username dan Password Salah',
        'error'
    )
}

function daftarBerhasil() {
    Swal.fire(
        'Berhasil',
        'Silahkan Login',
        'success'
    )
}

function konfirmasiLogout() {
    Swal.fire({
        title: 'Yakin Ingin Keluar?',
        text: "Anda akan keluar dari halaman ini",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#0A0A33',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Keluar!'
    }).then((result) => {
        if (result.isConfirmed) {
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'auth/logout.php');
            xhr.send();
            Swal.fire(
                'Terimakasih',
                'Anda berhasil keluar',
                'success'
            ).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'login.php'; // Redirect ke halaman login setelah logout berhasil
                }
            });
        }
    })
}