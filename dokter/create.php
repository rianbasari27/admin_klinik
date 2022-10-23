<?php
require '../function/dokter.php';

if (isset($_POST['submit'])) {

    if (add_listdokter($_POST) > 0) {
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

$option_poli = "<option value='' style='display:none'>- Pilih Poli -</option>";
$q = mysqli_query($conn, "SELECT * FROM poli ORDER BY nama_poli");
while ($h = mysqli_fetch_array($q)) {
    $option_poli = $option_poli . "<option value=$h[poli_id]>$h[nama_poli]</option>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add Data Dokter</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <div class="container mt-3">
        <h2>DATA DOKTER BARU</h2><br>
        <a href='index.php' class='btn btn-warning'>
            < Back</a><br><br>
                <form action="" method="post">
                    <table>
                        <tr>
                            <td><label for="nama_dokter">Nama Dokter</label></td>
                            <td>:</td>
                            <td colspan=3><input type="text" class="form-control" name="nama_dokter" id="nama_dokter" required></td>
                        </tr>
                        <tr>
                            <td><label for="poli_id">Poli</label></td>
                            <td>:</td>
                            <td><select class="form-select" name="poli_id" id="poli_id"><?php echo $option_poli ?></select></td>
                        </tr>
                    </table>
                    <br>
                    <button type="submit" name="submit" class='btn btn-success'>Submit</button>
                    <a href='create.php' class='btn btn-danger'>Clear</a>
                </form>
    </div>

</body>

</html>