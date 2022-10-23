<?php
require '../function/poli.php';

$poli_id = $_GET['poli_id'];

$poli = query("SELECT * FROM poli WHERE poli_id = '$poli_id'")[0];

if (isset($_POST['submit'])) {
    if (edit_listpoli($_POST) > 0) {
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

if ($_GET["status"] == "clear") {
    $poli['nama_poli'] = "";
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Data Poli</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <div class="container mt-3">
        <h2>EDIT DATA POLI</h2><br>
        <a href='index.php?' class='btn btn-warning'>
            < Back</a><br><br>
                <form action="" method="post">
                    <table>
                        <input type="hidden" name="poli_id" value="<?= $poli['poli_id']; ?>">
                        <tr>
                            <td><label for="nama_poli">Nama Poli</label></td>
                            <td>:</td>
                            <td><input type="text" class="form-control" id="nama_poli" name="nama_poli" value='<?= $poli['nama_poli']; ?>'></td>
                        </tr>
                    </table>
                    <br>
                    <button type="submit" name="submit" class='btn btn-success'>Submit</button>
                    <a href='update.php?status=clear&poli_id=<?= $poli_id; ?>' class='btn btn-danger'>Clear</a>
                </form>
    </div>

</body>

</html>