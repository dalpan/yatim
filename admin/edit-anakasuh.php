<?php 
require 'functions.php';


$id = $_GET["id"];
$anakasuh = query("SELECT * FROM anak_asuh WHERE id = $id")[0];

if (isset($_POST["submit"])) {

  if (ubahanakasuh($_POST) > 0 ) {
    echo "
      <script>
        alert('Kegiatan Berhasil Diubah!');
        window.location.href='index.php';
      </script>
    ";
  } else {
    echo "
      <script>
        alert('Kegiatan Gagal Diubah!');
        
      </script>
    ";
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
            padding: 3px 10px;
            background-color: darkred;
        }
        #content {
            width: 100%;
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
        <div class="jumbotron">
            <h3>Donasi Panti Asuhan Balai Yatim Hj.Maryam Kalibeber</h3>
        </div>
    </header>

   <main>
        <div id="content">
            <h2 class="judul">Ubah Data Anak Asuh</h2>
            <article class="card" style="margin: 100px 0;">
                <form action="" method="post" enctype="multipart/form-data">
                 <input type="hidden" id="id" name="id" value="<?= $anakasuh['id']; ?>">
                    <div class="jarak">
                         <label for="nama">nama</label>
                         <input type="text" id="nama" name="nama" value="<?= $anakasuh["nama"]; ?>" required>
                    </div>
                     <div class="jarak">
                         <label for="ttl">ttl</label>
                         <input type="date" id="ttl" name="ttl" value="<?= $anakasuh["ttl"]; ?>" required>
                    </div>
                    <div class="jarak">
                         <label for="jenis_kelamin">Jenis Kelamin</label>
                         <select id="jenis_kelamin" name="jenis_kelamin" required>
                            <option value="<?= $anakasuh["jenis_kelamin"]; ?>" hidden><?= $anakasuh["jenis_kelamin"]; ?></option>
                            <option value="Laki Laki">Laki Laki</option>
                            <option value="Perempuan">Perempuan</option>
                         </select>
                    </div>
                    <div class="jarak">
                         <label for="jenjang_sekolah">Jenjang Sekolah</label>
                         <select id="jenjang_sekolah" name="jenjang_sekolah" required>
                            <option value="<?= $anakasuh["jenjang_sekolah"]; ?>" hidden><?= $anakasuh["jenjang_sekolah"]; ?></option>
                            <option value="SD">SD</option>
                            <option value="SMP">SMP</option>
                            <option value="SMA / MA / SMK">SMA / MA / SMK</option>
                            <option value="S1">S1</option>
                            <option value="S2">S2</option>
                            <option value="S3">S3</option>
                         </select>
                    </div>
                    <button type="submit" name="submit" class="btn" style="width: 100%;background-color: lightseagreen;padding: 10px;">Ubah</button>
                </form>
            </article>
        </div>
    </main>
    

    <footer>
        <p>&#169 Donasi Panti Asuhan Balai Yatim Hj.Maryam Kalibeber 2021</p>
    </footer>

</body>
</html>