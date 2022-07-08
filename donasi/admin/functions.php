<?php 
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "db_donasi");

function query($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	};
	return $rows;
};


function hapusdonasi($id) {
	global $conn;
	mysqli_query($conn, "DELETE FROM donasi WHERE id = $id");

	return mysqli_affected_rows($conn);
}

function ubahdata($data) {
    global $conn;
     
    $id = $data["id"];
    $status =  $data["status"];

    $query = "UPDATE donasi SET 
                status = '$status'
              WHERE id = $id
            ";
            
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}