<?php
require '../function/pasien.php';

$pasien_id = $_GET['pasien_id'];

$pasien = query("SELECT * FROM pasien WHERE pasien_id = '$pasien_id'")[0];

if (isset($_POST['submit'])) {
	if (edit_listpasien($_POST) > 0) {
		echo "
			<script>
				alert('Data berhasil diubah!');
				document.location.href = 'index.php';
			</script>";
	} else {
		echo "
			<script>
				alert('Data gagal diubah!');
			</script>";
	}
}

$query = mysqli_query($conn, "SELECT * FROM pasien WHERE pasien_id = '$pasien_id'");
while ($h = mysqli_fetch_array($query)) {
	$pasien_id = $h['pasien_id'];
	$tanggal = explode("-", $h['tanggal_lahir']); // 1945/08/17 => [1945, 8, 17]
	$jenis_kelamin = $h['jenis_kelamin'];
	$alamat = $h['alamat'];
}


if ($_GET["status"] == "clear") {
	$nama_pasien = $alamat = $jenis_kelamin = "";
	$tanggal = ["", "", ""];
}

$option_jnskelamin = "<option value='' style='display:none'>- Pilih Jenis Kelamin -</option>";
$jns_kelamin = ["Laki-laki", "Perempuan"];
foreach ($jns_kelamin as $jns) {
	$option_jnskelamin = $option_jnskelamin . "<option value=$jns " . ($jns == $jenis_kelamin ? 'selected' : '') . "  >$jns</option>";
}


$option_tanggal = "<option value='' style='display:none'>- Pilih Tanggal -</option>";
for ($i = 1; $i <= 31; $i++) {
	$option_tanggal = $option_tanggal . "<option value=$i " . ($tanggal[2] == $i ? 'selected' : '') . ">$i</option>";
}

$bulan = [
	"", "Januari", "Februari", "Maret", "April",
	"Mei", "Juni", "Juli", "Agustus", "September",
	"Oktober", "November", "Desember"
];
$option_bulan = "<option value='' style='display:none'>- Pilih Bulan -</option>";
for ($i = 1; $i <= 12; $i++) {
	$option_bulan = $option_bulan . "<option value=$i " . ($tanggal[1] == $i ? 'selected' : '') . ">$bulan[$i]</option>";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Edit Data Berobat</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

	<div class="container mt-3">
		<h2>EDIT DATA PASIEN</h2><br>
		<a href='index.php?' class='btn btn-warning'>
			< Back</a><br><br>
				<form action="" method="post">
					<table>
						<input type="hidden" name="pasien_id" value="<?= $pasien['pasien_id']; ?>">
						<tr>
							<td><label for="nama_pasien">Nama Pasien</label></td>
							<td>:</td>
							<td><input type="text" class="form-control" id="nama_pasien" name="nama_pasien" value='<?= $pasien['nama_pasien']; ?>' required></td>
						</tr>
						<tr>
							<td><label for="tanggal">Tanggal Lahir</label></td>
							<td>:</td>
							<td>
								<table>
									<tr>
										<td><select class="form-select" name="tanggal" id="tanggal"><?php echo $option_tanggal; ?></select></td>
										<td><select class="form-select" name="bulan"><?php echo $option_bulan; ?></select></td>
										<td><input type="number" class="form-control pull-left" name="tahun" value=<?php echo $tanggal[0]; ?>></td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td><label for="jenis_kelamin">Jenis Kelamin</label></td>
							<td>:</td>
							<td><select class="form-select" name="jenis_kelamin" id="jenis_kelamin" value=<?php echo $jenis_kelamin; ?>><?php echo $option_jnskelamin; ?></select></td>
						</tr>
						<tr>
							<td><label for="alamat">Alamat</label></td>
							<td>:</td>
							<td><input type="text" class="form-control" id="alamat" name="alamat" value='<?= $pasien['alamat']; ?>' required></td>
						</tr>
					</table>
					<br>
					<button type="submit" name="submit" class='btn btn-success'>Submit</button>
					<a href='update.php?status=clear&no_transaksi=<?= $no_transaksi; ?>' class='btn btn-danger'>Clear</a>
				</form>
	</div>

</body>

</html>