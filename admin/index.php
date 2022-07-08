<?php 
session_start();

if (!isset($_SESSION["admin"])) {
  echo "<script>
         window.location.replace('../login.php');
       </script>";
  exit;
}
require 'functions.php';

$kegiatan = mysqli_query($conn, "SELECT * FROM kegiatan");
$anakasuh = mysqli_query($conn, "SELECT * FROM anak_asuh");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS -->
    <link rel="stylesheet" href="../css/style.css">
    <!-- Icon dari Fontawesome -->
    <script src="https://kit.fontawesome.com/348c676099.js" crossorigin="anonymous"></script>
    <title>Panti Asuhan Balai Yatim Hj.Maryam Kalibeber</title>
    <style>
        .btn {
            text-decoration: none;
            padding: 5px 10px;
            background-color: red;
        } 
        th,td {
            padding: 10px;
            box-shadow: 2px 2px 10px lightgrey;
            cursor: pointer;
            transition: 0.5s;
        }
        blink {
          -webkit-animation: 1s linear infinite kedip; /* for Safari 4.0 - 8.0 */
          animation: 1s linear infinite kedip;
        }
        /* for Safari 4.0 - 8.0 */
        @-webkit-keyframes kedip { 
          0% {
            visibility: hidden;
          }
          50% {
            visibility: hidden;
          }
          100% {
            visibility: visible;
          }
        }
        @keyframes kedip {
          0% {
            visibility: hidden;
          }
          50% {
            visibility: hidden;
          }
          100% {
            visibility: visible;
          }
    </style>
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="tambah_kegiatan.php">Tambah Kegiatan</a></li>
                <li><a href="tambah_anakasuh.php">Tambah Anak Asuh</a></li>
                <li><a href="../logout.php">Logout</a></li>
            </ul>
        </nav>
        <div class="jumbotron">
            <h3>Panti Asuhan Balai Yatim Hj.Maryam Kalibeber</h3>
            <blink><p>Selamat Datang Admin</p></blink>
        </div>
    </header>

    <main>

        <article class="card">
            <center>
                <h3>Data Kegiatan</h3>
                <table>
                    <tr>
                        <th>Nama Kegiatan</th>
                        <th>Waktu</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                    </tr>
                <?php foreach ($kegiatan as $data_kegiatan) : ?>
                    <tr>
                        <td><?= $data_kegiatan["nama_kegiatan"]; ?></td>
                        <td><?= $data_kegiatan["waktu"]; ?></td>
                        <td><img src="../images/<?= $data_kegiatan["foto"]; ?>" width="450px" style="background-size: cover;"></td>
                        <td><a href="edit-kegiatan.php?id=<?= $data_kegiatan["id"]; ?>" class='btn' style="color: white;background-color: orange">Edit</a> &nbsp;
                            <a href="hapus-kegiatan.php?id=<?= $data_kegiatan["id"]; ?>" class='btn' style="color: white;">Hapus</a></td>
                    </tr>
                <?php endforeach; ?>
                </table>
            </center>
        </article>

        <article class="card">
            <center>
                <h3>Data Anak Asuh</h3>
                <table>
                    <tr>
                        <th>Nama Lengkap</th>
                        <th>TTL</th>
                        <th>Jenis Kelamin</th>
                        <th>Jenjang Sekolah</th>
                        <th>Aksi</th>
                    </tr>
                <?php foreach($anakasuh as $data_anakasuh) : ?>
                    <tr>
                        <td><?= $data_anakasuh["nama"]; ?></td>
                        <td><?= $data_anakasuh["ttl"]; ?></td>
                        <td><?= $data_anakasuh["jenis_kelamin"]; ?></td>
                        <td><?= $data_anakasuh["jenjang_sekolah"]; ?></td>
                        <td><a href="edit-anakasuh.php?id=<?= $data_anakasuh["id"]; ?>" class='btn' style="color: white;background-color: orange">Edit</a> &nbsp;
                            <a href="hapus-anakasuh.php?id=<?= $data_anakasuh["id"]; ?>" class='btn' style="color: white;">Hapus</a></td>
                    </tr>
                <?php endforeach; ?>
                </table>
            </center>
        </article>

    </main>
    
    <footer>
        <p>&#169 Panti Asuhan Balai Yatim Hj.Maryam Kalibeber 2021</p>
    </footer>
</body>
</html>