<?php 
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "db_panti");

function query($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	};
	return $rows;
};

function kegiatan($data) {
	global $conn;

	$nama_kegiatan = mysqli_real_escape_string($conn, $data["nama_kegiatan"]);
	$waktu = mysqli_real_escape_string($conn, $data["waktu"]);
	
	$gambar = upload();

	// Masukkan Data ke Database
	mysqli_query($conn, "INSERT INTO kegiatan VALUES('', '$nama_kegiatan',  '$waktu', '$gambar')");
	return mysqli_affected_rows($conn);
}

function anakasuh($data) {
	global $conn;

	$nama = mysqli_real_escape_string($conn, $data["nama"]);
	$ttl = mysqli_real_escape_string($conn, $data["ttl"]);
	$jenis_kelamin = mysqli_real_escape_string($conn, $data["jenis_kelamin"]);
	$jenjang_sekolah = mysqli_real_escape_string($conn, $data["jenjang_sekolah"]);
	

	// Masukkan Data ke Database
	mysqli_query($conn, "INSERT INTO anak_asuh VALUES('', '$nama',  '$ttl', '$jenis_kelamin', '$jenjang_sekolah')");
	return mysqli_affected_rows($conn);
}

function hapuskegiatan($id) {
	global $conn;
	mysqli_query($conn, "DELETE FROM kegiatan WHERE id = $id");

	return mysqli_affected_rows($conn);
}

function hapusanakasuh($id) {
	global $conn;
	mysqli_query($conn, "DELETE FROM anak_asuh WHERE id = $id");

	return mysqli_affected_rows($conn);
}

function ubahkegiatan($data) {
    global $conn;
     
    $id = $data["id"];
    $nama_kegiatan =  $data["nama_kegiatan"];
    $waktu =  $data["waktu"];

    $query = "UPDATE kegiatan SET 
                nama_kegiatan = '$nama_kegiatan',
                waktu = '$waktu'
              WHERE id = $id
            ";
            
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function ubahanakasuh($data) {
    global $conn;
     
    $id = $data["id"];
    $nama =  $data["nama"];
    $ttl =  $data["ttl"];
    $jenis_kelamin =  $data["jenis_kelamin"];
    $jenjang_sekolah =  $data["jenjang_sekolah"];

    $query = "UPDATE anak_asuh SET 
                nama = '$nama',
                ttl = '$ttl',
                jenis_kelamin = '$jenis_kelamin',
                jenjang_sekolah = '$jenjang_sekolah'
              WHERE id = $id
            ";
            
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function upload() {
	$namaFile = $_FILES['gambar']['name'];
	$ukuranFile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpName = $_FILES['gambar']['tmp_name'];


    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    // generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;
    move_uploaded_file($tmpName, '../images/' . $namaFileBaru);

    return $namaFileBaru;
}
