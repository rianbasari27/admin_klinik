<?php
require '../function/berobat.php';

$no_transaksi = $_GET['no_transaksi'];

if (delete_listberobat($no_transaksi) > 0) {
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
