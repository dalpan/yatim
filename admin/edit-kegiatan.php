<?php 
require 'functions.php';


$id = $_GET["id"];
$kegiatan = query("SELECT * FROM kegiatan WHERE id = $id")[0];

if (isset($_POST["submit"])) {

  if (ubahkegiatan($_POST) > 0 ) {
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
            <h2 class="judul">Ubah Kegiatan</h2>
            <article class="card" style="margin: 100px 0;">
                <form action="" method="post" enctype="multipart/form-data">
                 <input type="hidden" id="id" name="id" value="<?= $kegiatan['id']; ?>">
                    <div class="jarak">
                         <label for="nama_kegiatan">nama_kegiatan</label>
                         <input type="text" id="nama_kegiatan" name="nama_kegiatan" value="<?= $kegiatan["nama_kegiatan"]; ?>" required>
                    </div>
                     <div class="jarak">
                         <label for="waktu">waktu</label>
                         <input type="time" id="waktu" name="waktu" value="<?= $kegiatan["waktu"]; ?>" required>
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