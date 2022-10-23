<?php
require '../function/pasien.php';

$pasien_id = $_GET['pasien_id'];

if (delete_listpasien($pasien_id) > 0) {
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
