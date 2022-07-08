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

     $donasi = mysqli_query($conn, "SELECT * FROM donasi WHERE username = '$username'"); 

  }

$total_donasi = mysqli_num_rows($donasi);

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">
    <title>Donasi Panti Asuhan Balai Yatim Hj.Maryam Kalibeber</title>
    <style>
        .btn {
            text-decoration: none;
            padding: 5px 10px;
            background-color: red;
        }
        .flex {
            display: flex;
            flex-direction: column;
        }
        .btn-beli {
            text-decoration: none;
            padding: 5px 10px;
            background-color: green;
        }
        .harga {
            padding: 5px;
            border-radius: 5px;
            color: green;
            background-color: #90DE90;
        }
    </style>
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Beranda</a></li>
                <li><a href="donasi.php">Donasi Sekarang!</a></li>
                <li><a href="profile.php">Profile</a></li>
                <li><a href="logout.php" class="btn" style="border-bottom: none;">Logout</a></li>
            </ul>
        </nav>
        <div class="jumbotron">
            <h3>Donasi Panti Asuhan Balai Yatim Hj.Maryam Kalibeber <i class="fab fa-accusoft"></i></h3>
        </div>
    </header>

    <main>
         <article class="card">
                <center><h3 style="color:lightseagreen;">Histori Donasi Saya</h3></center>
        </article>

        <div id="content">
            <?php foreach ($donasi as $cf) : ?>
            <div class="flex">
                <div class="card">
                      <p>Nominal : <b><?= $cf["nominal"]; ?></b></p>
                      <p>Status : <b style="color: lightseagreen;"><?= $cf["status"]; ?></b></p>
               </div>
            </div>
            <?php endforeach; ?>
        </div>

        <aside>
            <div class="card">
                <center><p>Jumlah Saya Ber-donasi : <b><span style="color: #lightseagreen;"><?= $total_donasi; ?></span></b></p></center>
            </div>
        </aside>
           
    </main>

    <footer>
        <p>&#169 Donasi Panti Asuhan Balai Yatim Hj.Maryam Kalibeber <i class="fab fa-accusoft"></i> 2021</p>
    </footer>
</body>
</html>