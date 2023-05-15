<?php
include '../auth/koneksi.php';
include 'homeheader.php'
	?>

<div class="container mt-5 pt-5">
	<h3 class="text-center">Edit Pengambilan Sampah</h3>

	<?php
	$id_penjualan = $_GET['id'];

	// Query untuk mendapatkan data dari tb_penjualan_item
	$query = "SELECT * FROM tb_penjualan_item WHERE penjualan_id = '$id_penjualan'";
	$result = mysqli_query($conn, $query);

	// Query untuk mendapatkan data dari tb_penjualan
	$query_penjualan = "SELECT * FROM tb_penjualan WHERE id = '$id_penjualan'";
	$result_penjualan = mysqli_query($conn, $query_penjualan);
	$data_penjualan = mysqli_fetch_assoc($result_penjualan);

	$id_masyarakat = $data_penjualan['id_masyarakat'];

	// Query untuk mendapatkan username masyarakat
	$query_masyarakat = "SELECT username FROM tb_masyarakat WHERE id_masyarakat = '$id_masyarakat'";
	$result_masyarakat = mysqli_query($conn, $query_masyarakat);
	$data_masyarakat = mysqli_fetch_assoc($result_masyarakat);
	$username_masyarakat = $data_masyarakat['username'];

	?>
	<div class="container mt-5">
		<div class="transaksisaya">
			<form action="#" method="post">
				<table class="table table-bordered table-striped">
					<thead class="thead-dark">
						<tr>
							<th>Jenis Sampah</th>
							<th>Jumlah/kg</th>
							<th>Subtotal</th>
						</tr>
					</thead>
					<tbody>
						<?php while ($data = mysqli_fetch_assoc($result)) { ?>
							<tr>
								<td>
									<?php echo $data['jenis_sampah']; ?>
								</td>
								<td>
									<input class="form-control" type="text" name="jumlah"
										value="<?php echo $data['jumlah']; ?>">

								</td>
								<td class="d-flex flex-row">
									Rp. <input type="text" class="ms-2 form-control" name="subtotal"
										value="<?php echo number_format($data['subtotal'], 0, ',', '.'); ?>">

								</td>
							</tr>
						<?php } ?>


						<?php

						if ($data_penjualan['total_harga'] == null) {
							header('location: daftarpengambilan');
						}
						?>
						<tr>
							<td colspan="2" class="text-right font-weight-bold">Total Harga :</td>
							<input type="hidden" value="<?php $data_penjualan['id'] ?> " name="id">
							<td class="d-flex flex-row">
								Rp. <input type="text" class="ms-2 form-control" name="total_harga"
									value="<?php echo number_format($data_penjualan['total_harga'], 0, ',', '.'); ?>">
							</td>
						</tr>
					</tbody>
				</table>
				<button type="submit" class="btn text-white ms-auto"
					style="border:0; background-color:#0A0A33; border-radius: 10px;">Simpan</button>
			</form>



		</div>

		<!-- Link ke file JS Bootstrap -->
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
			integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
			crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
			integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
			crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
			integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
			crossorigin="anonymous"></script>
		</body>

		</html>