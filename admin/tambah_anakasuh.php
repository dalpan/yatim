<?php 
session_start();

if (!isset($_SESSION["admin"])) {
  echo "<script>
         window.location.replace('../login.php');
       </script>";
  exit;
}
require 'functions.php';

if (isset($_POST["pesan"])) {
  if (anakasuh($_POST) > 0 ) {
    echo "<script>
        alert('Anak Asuh Berhasil Ditambah!');
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
                    <center><h4>Form Input Anak Asuh</h4></center>
                    <div class="alert">Pastikan semua data yang anda isi sudah benar, sebelum klik tombol input.</div>
                    <br>
                    <div class="jarak">
                         <label for="nama">Nama Lengkap</label>
                         <input type="text" id="nama" name="nama" placeholder="Masukkan Nama Lengkap" required>
                    </div>
                    <div class="jarak">
                         <label for="ttl">TTL</label>
                         <input type="date" id="ttl" name="ttl" required>
                    </div>
                    <div class="jarak">
                         <label for="jenis_kelamin">Jenis Kelamin</label>
                         <select id="jenis_kelamin" name="jenis_kelamin" required>
                            <option value="" hidden>-Pilih Jenis Kelamin-</option>
                            <option value="Laki Laki">Laki Laki</option>
                            <option value="Perempuan">Perempuan</option>
                         </select>
                    </div>
                    <div class="jarak">
                         <label for="jenjang_sekolah">Jenjang Sekolah</label>
                         <select id="jenjang_sekolah" name="jenjang_sekolah" required>
                            <option value="" hidden>-Pilih Jenjang Sekolah-</option>
                            <option value="SD">SD</option>
                            <option value="SMP">SMP</option>
                            <option value="SMA / MA / SMK">SMA / MA / SMK</option>
                            <option value="S1">S1</option>
                            <option value="S2">S2</option>
                            <option value="S3">S3</option>
                         </select>
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