<?php
require '../function/poli.php';

$list_poli = query(
    'SELECT * FROM poli
    ORDER BY poli_id DESC'
);

if (isset($_POST['submit'])) {

    if (add_listpoli($_POST) > 0) {
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

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>List Poli</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container mt-3">
        <h2>LIST POLI</h2><br>
        <a href='../index.php' class='btn btn-warning'>
            < Back</a><br><br>
                <form action="" method="post" class="mb-5">
                    <table>
                        <tr>
                            <td><input type="text" class="form-control" name="nama_poli" id="nama_poli" placeholder="Tambah Poli" required></td>
                            <td><button type="submit" name="submit" class='btn btn-success'>Tambah</button></td>
                            <td><a href='index.php' class='btn btn-danger'>Clear</a></td>
                        </tr>
                    </table>
                </form>
                <table class='table table-striped'>
                    <tr class='table-success'>
                        <th>No.</th>
                        <th>Nama Poli</th>
                        <th>Action</th>
                    </tr>
                    <?php $i = 1; ?>
                    <?php foreach ($list_poli as $row) : ?>
                        <input type="hidden" value="<?= $row['poli_id'] ?>">
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $row['nama_poli']; ?></td>
                            <td>
                                <a href='update.php?status=edit&poli_id=<?= $row['poli_id']; ?>' class='btn btn-success btn-sm'>Edit</a>
                                <a href='delete.php?poli_id=<?= $row['poli_id']; ?>' class='btn btn-danger btn-sm' onclick="return confirm('Anda yakin ingin menghapus data ini?');">Delete</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </table>
    </div>
</body>

</html>