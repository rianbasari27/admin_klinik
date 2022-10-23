<?php
require '../function/pasien.php';

$list_pasien = query(
    'SELECT 
    pasien_id,
    nama_pasien,
    tanggal_lahir,
    jenis_kelamin,
    alamat
    FROM
    pasien
    ORDER BY pasien_id DESC'
);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>List Data Pasien</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container mt-3">
        <h2>LIST PASIEN</h2><br>
        <a href='../index.php' class='btn btn-warning'>
            < Back</a><br><br>
                <p><a href='create.php' class='btn btn-info btn-sm'>Add New</a></p>
                <table class='table table-striped'>
                    <tr class='table-success'>
                        <th>No.</th>
                        <th>Nama Pasien</th>
                        <th>Tanggal Lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>Action</th>
                    </tr>
                    <?php $i = 1; ?>
                    <?php foreach ($list_pasien as $row) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $row['nama_pasien']; ?></td>
                            <td><?= $row['tanggal_lahir']; ?></td>
                            <td><?= $row['jenis_kelamin']; ?></td>
                            <td><?= $row['alamat']; ?></td>
                            <td>
                                <a href='update.php?status=edit&pasien_id=<?= $row['pasien_id']; ?>' class='btn btn-success btn-sm'>Edit</a>
                                <a href='delete.php?pasien_id=<?= $row['pasien_id']; ?>' class='btn btn-danger btn-sm' onclick="return confirm('Anda yakin ingin menghapus data ini?');">Delete</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </table>
    </div>
</body>

</html>