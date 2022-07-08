<?php 
require 'functions.php';

if (isset($_POST["register"])) {
  if (registrasi($_POST) > 0 ) {
    echo "<script>
        alert('Registrasi Berhasil!');
        window.location.href='login.php';
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
        #content {
            width: 100%;
            padding: 0 350px;
        }
        @media screen and (max-width: 1000px) {
            #content {
                padding: 0 10px;
            }
        }
        .alert {
            margin: 10px 0;
            font-size: 0.9rem;
            background-color: #FCC663;
            padding: 10px;
            border: 1px solid darkorange;
        }
    </style>
</head>

<body>
    <main>
        <div id="content">
            <h2 class="judul">Registrasi Akun</h2>
            <article class="card">
                <form action="" method="post">
                    <div class="jarak">
                         <label for="username">Username <span style="color: red;">*</span></label>
                         <input type="text" id="username" name="username" placeholder="Masukkan Username" required>
                    </div>
                    <div class="jarak">
                        <label for="password">Password <span style="color: red;">*</span></label>
                        <input type="password" id="password" name="password" placeholder="Masukkan Password" required>
                    </div>
                    <div class="jarak">
                         <label for="nama">Nama Lengkap <span style="color: red;">*</span></label>
                         <input type="text" id="nama" name="nama" placeholder="Masukkan Nama Lengkap" required>
                    </div>
                    <button type="submit" name="register" class="btn" style="width: 100%;">Registrasi</button>
                </form>
                <br>
                <center>Sudah mempunyai akun? <a href="login.php">Login Disini</a></center>
            </article>

            
        </div>
    </main>
</body>
</html>