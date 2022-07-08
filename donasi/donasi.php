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
}

if (isset($_POST["pesan"])) {
  if (donasi($_POST) > 0 ) {
    echo "<script>
        alert('Donasi Berhasil Diajukan!');
        window.location.replace('histori.php');
    </script>";
  } else {
    echo mysqli_error($conn);
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
    <title>Donasi Panti Asuhan Balai Yatim Hj.Maryam Kalibeber</title>
    <style>
        .btn {
            text-decoration: none;
            padding: 10px;
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
        #content {
            width: 55%;
        }
        aside {
            width: 45%;
        }
        .alert {
            margin: 10px 0;
            font-size: 0.9rem;
            background-color: #FCC663;
            padding: 10px;
            border: 1px solid darkorange;
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
                <li><a href="histori.php">Histori Donasi Saya</a></li>
                <li><a href="profile.php">Profile</a></li>
                <li><a href="logout.php" class="btn" style="border-bottom: none;">Logout</a></li>
            </ul>
        </nav>
        <div class="jumbotron">
            <h3>Donasi Panti Asuhan Balai Yatim Hj.Maryam Kalibeber <i class="fab fa-accusoft"></i></h3>
        </div>
    </header>

    <main>
            <div class="card">
                <form action="" method="post" enctype="multipart/form-data">
                 <input type="hidden" id="username" name="username" value="<?= $username; ?>" required>
                 <input type="hidden" id="status" name="status" value="Menunggu Verifikasi Admin" required>
                    <center><h4>Formulir Pengajuan Donasi</h4></center>
                    <div class="alert">Pastikan semua data yang anda isi sudah benar, sebelum klik tombol ajukan.</div>
                    <br>
                    <div class="jarak">
                         <label for="nominal">Nominal Donasi</label>
                         <input type="number" id="nominal" name="nominal" placeholder="Masukkan Nominal Donasi" required>
                    </div>
                    <div class="jarak">
                         <label for="gambar">Bukti Pembayaran</label>
                         <input type="file" id="gambar" name="gambar"required>
                    </div>
                    <button type="submit" name="pesan" class="btn" style="width: 100%;background-color: green;">Ajukan</button>
                </form>
            </div>
            <a href="index.php">
            <div class="card">
                <center><p>Kembali ke Beranda</p></center>
            </div>
            </a>
           
    </main>

    <footer>
        <p>&#169 Donasi Panti Asuhan Balai Yatim Hj.Maryam Kalibeber 2021</p>
    </footer>
</body>
</html>