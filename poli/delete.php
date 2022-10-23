<?php
require '../function/poli.php';

$poli_id = $_GET['poli_id'];

if (delete_listpoli($poli_id) > 0) {
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
