<?php
require '../function/pasien.php';

if (isset($_POST['submit'])) {

	if (add_listpasien($_POST) > 0) {
		echo "
			<script>
				alert('Data berhasil ditambahkan!');
				document.location.href = 'index.php';
			</script>";
	} else {
		echo "
			<script>
				alert('Data gagal ditambahkan!');
			</script>";
	}
}

$option_tanggal = "<option value='' style='display:none'>- Pilih Tanggal -</option>";
for ($i = 1; $i <= 31; $i++) {
	$option_tanggal = $option_tanggal . "<option value=$i>$i</option>";
}

$bulan = [
	"", "Januari", "Februari", "Maret",
	"April", "Mei", "Juni", "Juli", "Agustus",
	"September", "Oktober", "November", "Desember"
];
$option_bulan = "<option value='' style='display:none'>- Pilih Bulan -</option>";
for ($i = 1; $i <= 12; $i++) {
	$option_bulan = $option_bulan . "<option value=$i>$bulan[$i]</option>";
}

$option_jnskelamin = "<option value='' style='display:none'>- Pilih Jenis Kelamin -</option>";
$jenis_kelamin = ["Laki-laki", "Perempuan"];
foreach ($jenis_kelamin as $jns) {
	$option_jnskelamin = $option_jnskelamin . "<option value=$jns>$jns</option>";
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Add Data Pasien</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

	<div class="container mt-3">
		<h2>DATA PASIEN BARU</h2><br>
		<a href='index.php' class='btn btn-warning'>
			< Back</a><br><br>
				<form action="" method="post">
					<table>
						<tr>
							<td><label for="nama_pasien">Nama Pasien</label></td>
							<td>:</td>
							<td colspan=3><input type="text" class="form-control" name="nama_pasien" id="nama_pasien" required></td>
						</tr>
						<tr>
							<td><label for="tanggal">Tanggal Lahir</label></td>
							<td>:</td>
							<td>
								<table>
									<tr>
										<td><select class="form-select" name="tanggal" id="tanggal"><?php echo $option_tanggal ?></select></td>
										<td><select class="form-select" name="bulan"><?php echo $option_bulan ?></select></td>
										<td><input type="number" class="form-control" name="tahun"></td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td><label for="jenis_kelamin">Jenis Kelamin</label></td>
							<td>:</td>
							<td><select class="form-select" name="jenis_kelamin" id="jenis_kelamin"><?php echo $option_jnskelamin ?></select></td>
						</tr>
						<tr>
							<td><label for="alamat">Alamat</label></td>
							<td>:</td>
							<td><input type="text" class="form-control" name="alamat" id="alamat" required></td>
						</tr>
					</table>
					<br>
					<button type="submit" name="submit" class='btn btn-success'>Submit</button>
					<a href='create.php' class='btn btn-danger'>Clear</a>
				</form>
	</div>

</body>

</html>