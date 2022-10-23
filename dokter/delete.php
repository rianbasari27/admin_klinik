<?php
require '../function/dokter.php';

$dokter_id = $_GET['dokter_id'];

if (delete_listdokter($dokter_id) > 0) {
    echo "
		<script>
			alert('Data berhasil dihapus!');
			document.location.href = 'index.php';
		</script>";
} else {
    echo "
		<script>
			alert('Data gagal dihapus!');
			document.location.href = 'index.php';
		</script>";
}
