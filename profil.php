<?php
include 'homeheader.php'
    ?>
<div class="container mt-5 pt-5">
    <div class="row">
        <div class="col-md-4 text-center">
            <img src="https://via.placeholder.com/150" alt="Foto Profil" class="img-fluid rounded-circle mb-3">
            <h4>Nama Pengguna</h4>
            <a href="ubahprofil.php" class="btn btn-primary">Ubah Profil</a>
        </div>
        <div class="col-md-8">
            <h2>Bantuan</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed faucibus turpis ut metus pellentesque,
                at convallis massa posuere. Quisque auctor, velit vel ultrices finibus, enim odio venenatis urna, in
                malesuada enim turpis sit amet justo. Integer commodo lacus leo, eu tincidunt urna accumsan eget.
                Vivamus vestibulum eros vitae sapien tempor, quis consectetur turpis commodo. Praesent egestas, enim
                a pellentesque malesuada, nulla urna tincidunt risus, at tincidunt eros nunc eget arcu.</p>
            <h2>Syarat dan Ketentuan</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed faucibus turpis ut metus pellentesque,
                at convallis massa posuere. Quisque auctor, velit vel ultrices finibus, enim odio venenatis urna, in
                malesuada enim turpis sit amet justo. Integer commodo lacus leo, eu tincidunt urna accumsan eget.
                Vivamus vestibulum eros vitae sapien tempor, quis consectetur turpis commodo. Praesent egestas, enim
                a pellentesque malesuada, nulla urna tincidunt risus, at tincidunt eros nunc eget arcu.</p>
            <a class="btn btn-danger text-white" onclick="konfirmasiLogout()">Log Out</a>
        </div>
    </div>
</div>
<!-- Load library jQuery and Bootstrap JavaScript -->
<script src="alert.js"></script>
<script src="alert/sweetalert2.all.min.js"></script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4Yf"></script>
</body>

</html>