<?php 
require 'functions.php';
$id = $_GET["id"];
if (hapusanakasuh($id) > 0 ) {
	echo "
		<script>
			alert('Anak Asuh berhasil dihapus!');
			document.location.href = 'index.php';
		</script>
	";
    } else {
	echo "
		<script>
			alert('Anak Asuh gagal dihapus!');
			document.location.href = 'index.php';
		</script>
	";
	}
 ?>