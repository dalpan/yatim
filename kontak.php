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
                <li><a href="index.php">Beranda</a></li>
                <li><a href="donasi">Donasi Sekarang!</a></li>
                <li><a href="kontak.php">Kontak Kami</a></li>
                <li><a href="login.php">Login Admin</a></li>
            </ul>
        </nav>
        <div class="jumbotron">
            <h3>Panti Asuhan Balai Yatim Hj.Maryam Kalibeber</h3>
            <blink><p>Hubungi Kami</p></blink>
        </div>
    </header>

    <main>
        <article class="card">
            <center>
                <h3>Kontak Kami</h3>
                <p>Whatsapp : <a href="https://wa.me/6282324798180" style="color: green;">+62 823-2479-8180</a></p>
                <br>
                <h3>Alamat</h3>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15829.104739549242!2d109.89669931598357!3d-7.322842997993538!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e700ba509be7409%3A0x62cbc6c710a71bd5!2sKampung%20Mekarsari%20Wonosobo!5e0!3m2!1sid!2sid!4v1644148534507!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </center>
        </article>


    </main>
    
    <footer>
        <p>&#169 Panti Asuhan Balai Yatim Hj.Maryam Kalibeber 2021</p>
    </footer>
</body>
</html>