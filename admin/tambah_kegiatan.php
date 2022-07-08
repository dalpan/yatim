<?php 
session_start();

if (!isset($_SESSION["admin"])) {
  echo "<script>
         window.location.replace('login.php');
       </script>";
  exit;
}
require 'functions.php';

if (isset($_POST["pesan"])) {
  if (kegiatan($_POST) > 0 ) {
    echo "<script>
        alert('Kegiatan Berhasil Ditambah!');
        window.location.replace('index.php');
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
    <link rel="stylesheet" href="../css/style.css">
    <title>Panti Asuhan Balai Yatim Hj.Maryam Kalibeber</title>
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
                <li><a href="tambah_anakasuh.php">Tambah Anak Asuh</a></li>
                <li><a href="../logout.php">Logout</a></li>
            </ul>
        </nav>
        <div class="jumbotron">
            <h3>Panti Asuhan Balai Yatim Hj.Maryam Kalibeber <i class="fab fa-accusoft"></i></h3>
        </div>
    </header>

    <main>
            <div class="card">
                <form action="" method="post" enctype="multipart/form-data">
                    <center><h4>Form Input Kegiatan</h4></center>
                    <div class="alert">Pastikan semua data yang anda isi sudah benar, sebelum klik tombol input.</div>
                    <br>
                    <div class="jarak">
                         <label for="nama_kegiatan">Nama Kegiatan</label>
                         <input type="text" id="nama_kegiatan" name="nama_kegiatan" placeholder="Masukkan Nama Kegiatan" required>
                    </div>
                    <div class="jarak">
                         <label for="waktu">Waktu Kegiatan</label><br><br>
                         <input type="time" id="waktu" name="waktu" placeholder="Masukkan Waktu Kegiatan" required>
                    </div>
                    <div class="jarak">
                         <label for="gambar">Foto Kegiatan</label>
                         <input type="file" id="gambar" name="gambar"required>
                    </div>
                    <button type="submit" name="pesan" class="btn" style="width: 100%;background-color: green;">Input</button>
                </form>
            </div>
            <a href="index.php">
            <div class="card">
                <center><p>Kembali ke Beranda</p></center>
            </div>
            </a>
           
    </main>

    <footer>
        <p>&#169 Panti Asuhan Balai Yatim Hj.Maryam Kalibeber 2021</p>
    </footer>
</body>
</html>