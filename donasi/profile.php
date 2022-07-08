<?php 
session_start();

if (isset($_SESSION["admin"])) {
  echo "<script>
         window.location.replace('admin');
       </script>";
  exit;
}
if (!isset($_SESSION['user'])) {
   echo "<script>
         window.location.replace('login.php');
       </script>";
  exit;
}
require 'functions.php';

    if (isset($_SESSION['username'])) {
     $username = $_SESSION['username'];

      $total = mysqli_query($conn, "SELECT SUM(nominal) AS total_donasi FROM donasi WHERE username = '$username'"); 

      $jumlah = mysqli_query($conn, "SELECT * FROM donasi WHERE username = '$username'");
      $jumlah_donasi = mysqli_num_rows($jumlah);

      foreach ($total as $data) {}

     $query = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'"); 
     foreach ($query as $cf) {}

     if($query->num_rows > 0) {
      $nama = $cf['nama'];
      }
  }
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
    <title>Donasi Panti Asuhan Balai Yatim Hj.Maryam Kalibeber</title>
    <style>
        .btn {
            text-decoration: none;
            padding: 5px 10px;
            background-color: red;
        } 
    </style>
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Beranda</a></li>
                <li><a href="donasi.php">Donasi Sekarang!</a></li>
                <li><a href="histori.php">Histori Donasi Saya</a></li>
                <li><a href="logout.php" class="btn" style="border-bottom: none;">Logout</a></li>
            </ul>
        </nav>
        <div class="jumbotron">
            <h3>Donasi Panti Asuhan Balai Yatim Hj.Maryam Kalibeber</h3>
            <p>Lihat Profile Anda,
            </p>
        </div>
    </header>

    <main>
        <center><h2>Profile</h2></center>
         <article class="card" style="margin: 50px 0;">
                <center>
                    <h3>Nama Lengkap : <?= $nama; ?></h3>
                    <p>Total Donasi Saya : <b><span style="color: royalblue ;"><?= $data["total_donasi"]; ?></span></b></p>
                    <p>Jumlah Saya Ber-Donasi : <b><span style="color: royalblue ;"><?= $jumlah_donasi; ?> Kali</span></b> </p>
                </center>
        </article>
    </main>
    

    <footer>
        <p>&#169 Donasi Panti Asuhan Balai Yatim Hj.Maryam Kalibeber 2021</p>
    </footer>
</body>
</html>