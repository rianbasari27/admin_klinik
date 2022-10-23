<?php
require '../function/dokter.php';

$dokter_id = $_GET['dokter_id'];

$dokter = query("SELECT * FROM dokter WHERE dokter_id = '$dokter_id'")[0];

if (isset($_POST['submit'])) {
    if (edit_listdokter($_POST) > 0) {
        echo "
			<script>
				alert('Data berhasil diubah!');
				document.location.href = 'index.php';
			</script>";
    } else {
        echo "
			<script>
				alert('Data gagal diubah!');
				document.location.href = 'index.php';
			</script>";
    }
}

$query = mysqli_query($conn, "SELECT * FROM dokter WHERE dokter_id = '$dokter_id'");
while ($h = mysqli_fetch_array($query)) {
    $poli_id = $h['poli_id'];
}

if ($_GET["status"] == "clear") {
    $dokter['nama_dokter'] = "";
    $poli_id = "";
}

$option_poli = "<option value='' style='display:none'>- Pilih poli -</option>";
$q = mysqli_query($conn, "SELECT * FROM poli ORDER BY nama_poli");
while ($h = mysqli_fetch_array($q)) {
    $option_poli = $option_poli . "<option value=$h[poli_id] " . ($poli_id == $h['poli_id'] ? 'selected' : '') . ">$h[nama_poli]</option>";
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Data Dokter</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <div class="container mt-3">
        <h2>EDIT DATA DOKTER</h2><br>
        <a href='index.php?' class='btn btn-warning'>
            < Back</a><br><br>
                <form action="" method="post">
                    <table>
                        <input type="hidden" name="dokter_id" value="<?= $dokter['dokter_id']; ?>">
                        <tr>
                            <td><label for="nama_dokter">Nama Dokter</label></td>
                            <td>:</td>
                            <td><input type="text" class="form-control" id="nama_dokter" name="nama_dokter" value='<?= $dokter['nama_dokter']; ?>' required></td>
                        </tr>
                        <tr>
                            <td><label for="poli_id">Nama Poli</label></td>
                            <td>:</td>
                            <td><select class="form-select" name="poli_id" id="poli_id" value=<?php echo $poli_id; ?>><?php echo $option_poli; ?></select></td>
                        </tr>
                    </table>
                    <br>
                    <button type="submit" name="submit" class='btn btn-success'>Submit</button>
                    <a href='update.php?status=clear&dokter_id=<?= $dokter_id; ?>' class='btn btn-danger'>Clear</a>
                </form>
    </div>

</body>

</html>