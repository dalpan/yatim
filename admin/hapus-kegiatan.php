<?php 
require 'functions.php';
$id = $_GET["id"];
if (hapuskegiatan($id) > 0 ) {
	echo "
		<script>
			alert('Kegiatan berhasil dihapus!');
			document.location.href = 'index.php';
		</script>
	";
    } else {
	echo "
		<script>
			alert('Kegiatan gagal dihapus!');
			document.location.href = 'index.php';
		</script>
	";
	}
 ?>