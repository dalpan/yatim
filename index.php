<?php 
session_start();

if (isset($_SESSION["admin"])) {
  echo "<script>
         window.location.replace('admin');
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
    <link rel="stylesheet" href="css/style.css">
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
        td:hover,th:hover {
            transition: 0.5s;
            transform: scale(0.9);
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
          table {
            width: 1005;
          }
    </style>
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="donasi">Donasi Sekarang!</a></li>
                <li><a href="kontak.php">Kontak Kami</a></li>
                <li><a href="login.php">Login Admin</a></li>
            </ul>
        </nav>
        <div class="jumbotron">
            <h3>Panti Asuhan Balai Yatim Hj.Maryam Kalibeber</h3>
            <blink><p>Selamat Datang</p></blink>
        </div>
    </header>

    <main>
         <article class="card">
                <marquee><h3 style="color:lightseagreen;">Selamat Datang di Panti Asuhan Balai Yatim Hj.Maryam Kalibeber</h3></marquee>
        </article>

        <article class="card">
            <center>
                <h3>Profile Panti Asuhan</h3>
                <table>
                    <tr>
                        <th>Nama Panti Asuhan</th>
                        <th>Berdiri Sejak</th>
                        <th>Alamat</th>
                    </tr>
                    <tr>
                        <td>Panti Asuhan Balai Yatim Hj.Maryam Kalibeber</td>
                        <td>Tahun 2004</td>
                        <td>kampung Mekarsari RT/RW 01/13 Kalibeber, Kecamatan Mojotengah, Kabupateb Wonosobo.</td>
                    </tr>
                </table>
            </center>
        </article>
        <br>
        <h3 align="center">Data Kegiatan</h3>
        <article style="overflow-y: auto;">
            <center>
                
                <br>
                <div style="display: flex;">
                    <?php foreach ($kegiatan as $data_kegiatan) : ?>
                    <div class="card2" style="flex-grow: 1;padding: 10px 20px;margin: 0 20px;">
                
                        <img src="images/<?= $data_kegiatan["foto"]; ?>" width="250px">
                        <p>Nama Kegiatan : <b><?= $data_kegiatan["nama_kegiatan"]; ?></b></p>
                        <p>Waktu : <b><?= $data_kegiatan["waktu"]; ?></b></p>
                    </br>
                    </div>
                     <?php endforeach; ?>
                </div>
            </center>
            <br>
        </article>
        <br><br>

        <article class="card">
            <center>
                <h3>Data Anak Asuh</h3>
                <table>
                    <tr>
                        <th>Nama Lengkap</th>
                        <th>TTL</th>
                        <th>Jenis Kelamin</th>
                        <th>Jenjang Sekolah</th>
                    </tr>
                <?php foreach($anakasuh as $data_anakasuh) : ?>
                    <tr>
                        <td><?= $data_anakasuh["nama"]; ?></td>
                        <td><?= $data_anakasuh["ttl"]; ?></td>
                        <td><?= $data_anakasuh["jenis_kelamin"]; ?></td>
                        <td><?= $data_anakasuh["jenjang_sekolah"]; ?></td>
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