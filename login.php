<?php 
session_start();
require 'functions.php';

// cek session

if (isset($_SESSION["admin"])) {
    header("Location: admin");
    exit;
} if (isset($_SESSION["user"])) {
    header("Location: index.php");
    exit;
}


 if (isset($_POST["login"])) {
  
  $username = $_POST["username"];
  $password = $_POST["password"];

  $admin = query("SELECT * FROM admin");
  foreach ($admin as $a) {}

  
  if ($username == $a["username"]) {
    $result = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username'");


  if (mysqli_num_rows($result) === 1 ) {
    

    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row["password"])) {

            // set session

            $_SESSION["login"] = true;
            $_SESSION["admin"] = true;
            $_SESSION["username"] = $username;

      header("Location: admin");
      exit;
    }

  } 

} else {
  $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");


  if (mysqli_num_rows($result) === 1 ) {
    

    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row["password"])) {


            $_SESSION["login"] = true;
            $_SESSION["user"] = true;
            $_SESSION["username"] = $username;

      header("Location: index.php");
      exit;
    }
  }
}

echo "<script>
        alert('Username/Password Salah!');
        window.location.href='login.php';
    </script>";
  
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">
    <title>Panti Asuhan Balai Yatim Hj.Maryam Kalibeber</title>
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
    </style>
</head>
    <main>
        <div id="content">
            <h2 class="judul">Login</h2>
            <article class="card">
                <form action="" method="post">
                    <div class="jarak">
                         <label for="username">Username</label>
                         <input type="text" id="username" name="username" placeholder="Masukkan Username" required>
                    </div>
                    <div class="jarak">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" placeholder="Masukkan Password" required>
                    </div>
                    <button type="submit" name="login" class="btn" style="width: 100%;">Login</button>
                </form>
            </article>

            
        </div>
    </main>
</body>
</html>