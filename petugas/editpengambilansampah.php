<!DOCTYPE html>
<html>
<head>
	<title>Edit Pengambilan Sampah</title>
	<!-- Link ke file CSS Bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<!-- Link ke file CSS custom -->
<style>
    body {
	background-color: #f8f9fa;
	font-family: 'Open Sans', sans-serif;
}

.container {
	margin-top: 50px;
}

h1 {
	margin-bottom: 30px;
}

.btn-primary {
	background-color: #007bff;
	border-color: #007bff;
}

.btn

</style>
</head>
<body>
	<div class="container">
		<h1>Edit Pengambilan Sampah</h1>
		<form>
			<div class="form-group">
				<label for="riwayat">Riwayat Pengambilan:</label>
				<textarea class="form-control" id="riwayat" rows="3"></textarea>
			</div>
			<div class="form-group">
				<label for="alamat">Alamat Penjemputan:</label>
				<input type="text" class="form-control" id="alamat">
			</div>
			<div class="form-group">
				<label for="deskripsi">Deskripsi Sampah:</label>
				<textarea class="form-control" id="deskripsi" rows="3"></textarea>
			</div>
			<div class="form-group">
				<label for="waktu">Waktu Pengambilan:</label>
				<input type="datetime-local" class="form-control" id="waktu">
			</div>
			<button type="submit" class="btn btn-primary">Simpan</button>
		</form>
	</div>

	<!-- Link ke file JS Bootstrap -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
