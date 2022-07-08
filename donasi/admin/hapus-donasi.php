<?php 
require 'functions.php';
$id = $_GET["id"];
if (hapusdonasi($id) > 0 ) {
	echo "
		<script>
			alert('Donasi berhasil dihapus!');
			document.location.href = 'index.php';
		</script>
	";
    } else {
	echo "
		<script>
			alert('Donasi gagal dihapus!');
			document.location.href = 'index.php';
		</script>
	";
	}
 ?>