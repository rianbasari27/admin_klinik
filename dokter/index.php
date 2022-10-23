<?php
require '../function/dokter.php';

$list_dokter = query(
    'SELECT dokter.dokter_id, dokter.nama_dokter, poli.nama_poli from dokter 
    JOIN poli ON dokter.poli_id = poli.poli_id 
    ORDER BY dokter.dokter_id DESC'
);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>List Dokter</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container mt-3">
        <h2>LIST Dokter</h2><br>
        <a href='../index.php' class='btn btn-warning'>
            < Back</a><br><br>
                <p><a href='create.php' class='btn btn-info btn-sm'>Add New</a></p>
                <table class='table table-striped'>
                    <tr class='table-success'>
                        <th>No.</th>
                        <th>Nama Dokter</th>
                        <th>Poli</th>
                        <th>Action</th>
                    </tr>
                    <?php $i = 1; ?>
                    <?php foreach ($list_dokter as $row) : ?>
                        <input type="hidden" value="<?= $row['dokter_id'] ?>">
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $row['nama_dokter']; ?></td>
                            <td><?= $row['nama_poli']; ?></td>
                            <td>
                                <a href='update.php?status=edit&dokter_id=<?= $row['dokter_id']; ?>' class='btn btn-success btn-sm'>Edit</a>
                                <a href='delete.php?dokter_id=<?= $row['dokter_id']; ?>' class='btn btn-danger btn-sm' onclick="return confirm('Anda yakin ingin menghapus data ini?');">Delete</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </table>
    </div>
</body>

</html>