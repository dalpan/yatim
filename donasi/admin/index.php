<?php 
require 'functions.php';

  $donasi = mysqli_query($conn, "SELECT * FROM donasi");
  $total_dana = mysqli_query($conn, "SELECT SUM(nominal) AS dana_terkumpul FROM donasi ");
  foreach ($total_dana as $dana) {}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS -->
    <link rel="stylesheet" href="../css/style.css">
    <title>Donasi Panti Asuhan Balai Yatim Hj.Maryam Kalibeber</title>
    <style>
        .btn {
            text-decoration: none;
            padding: 3px 10px;
            background-color: darkred;
        } 
        .blink {
        animation: blinker 0.6s linear infinite;
        color: #1c87c9;
        font-size: 17px;
        font-weight: bold;
        font-family: 'Quicksand', sans-serif;
      }
      @keyframes blinker {
        50% {
          opacity: 0;
        }
      }
      .blink-one {
        animation: blinker-one 1s linear infinite;
      }
      @keyframes blinker-one {
        0% {
          opacity: 0;
        }
      }
      table {
        width: 100%;
        overflow: auto;
      }
      th, td {
        padding: 20px;
        border: 1px solid lightgrey;
      }
      img {
        max-width: 400px;
        cursor: pointer;
      }
    </style>
</head>

<body>
     <header>
        <nav>
            <ul>
                <li><a href="../logout.php" class="btn" style="border-bottom: none;">Logout</a></li>
            </ul>
        </nav>
        <div class="jumbotron">
            <h3>Donasi Panti Asuhan Balai Yatim Hj.Maryam Kalibeber</h3>
        </div>
    </header>

    <main>
         <article class="card">
                <center><h3 style="color:lightseagreen;">Data Donasi</h3></center>
        </article>

        <div id="content">
            <div class="flex">
                <div class="card">
                    <table>
                        <tr>
                            <th>Username</th>
                            <th>Nomimal</th>
                            <th>Status</th>
                            <th>Bukti <br><span style="font-size: 0.6rem;color: red;">*Klik Gambar Untuk Mendownload</span></th>
                            <th>Aksi</th>
                        </tr>
                <?php foreach ($donasi as $p) : ?>
                        <tr>
                            <td><?= $p["username"]; ?></td>
                            <td><?= $p["nominal"]; ?></td>
                            <td><?= $p["status"]; ?></td>
                            <td><a href="../images/<?= $p["bukti"]; ?>" download><img src="../images/<?= $p["bukti"]; ?>" width="100%"></a></td>
                            <td><a href="edit-donasi.php?id=<?= $p["id"]; ?>" class="btn" style="background-color: orange;">Edit</a> <br><br> <a href="hapus-donasi.php?id=<?= $p["id"]; ?>" class="btn">Hapus</a></td>
                        </tr>
                <?php endforeach; ?>
                    </table>
               </div>
            </div>
            
        </div>

        <aside>
            <div class="card">
                <center><p>Total Dana Terkumpul : <b><span class="blink blink-one"><?= $dana["dana_terkumpul"]; ?></span></b></p></center>
            </div>
        </aside>
           
    </main>

    <footer>
        <p>&#169 Donasi Panti Asuhan Balai Yatim Hj.Maryam Kalibeber 2021</p>
    </footer>

</body>
</html>