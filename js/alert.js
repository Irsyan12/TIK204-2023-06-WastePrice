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
        text: "Anda akan diminta memasukkan username dan password kembali",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#0A0A33',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Keluar!',
        CancelButtonText: 'Batal'
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
                    window.location.href = 'login'; // Redirect ke halaman login setelah logout berhasil
                }
            });
        }
    })
}

function tentangAplikasi() {
    Swal.fire(
        'Tentang Aplikasi',
        'Aplikasi Waste Price ini yaitu aplikasi Jual Sampah yang berguna untuk meningkatkan efisiensi dalam pengelolaan sampah, karena harga yang tepat dapat mendorong masyarakat untuk memilah sampah dengan baik dan menghasilkan sampah yang berkualitas tinggi.',
        'question'
    )
}


function ubahProfil() {
    // Tampilkan konfirmasi
    Swal.fire({
        title: 'Simpan Perubahan?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#0A0A33',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Simpan!',
        CancelButtonText: 'Batal',
    }).then((result) => {
        if (result.isConfirmed) {
            // Submit form dengan method POST
            document.getElementById("form-ubah-profil").method = "POST";
            document.getElementById("form-ubah-profil").action = "auth/ubah_profil_proses.php";
            document.getElementById("form-ubah-profil").submit();

        }
    })
}

function jualSampahBerhasil() {
    Swal.fire(
        'Berhasil!',
        'Silahkan tunggu konfirmasi oleh petugas dahulu.',
        'success'
    )
}

function batalJualBerhasil() {
    Swal.fire(
        'Berhasil!',
        'Penjualan anda dibatalkan',
        'success'
    )
}
