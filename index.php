<?php

// Syahla Nur Azizah
// XI PPLG B

// isset adalah fungsi pengecekan suatu variable
// if (isset($_POST['login'])) {
//   $username = $_POST['username'];
//   $password = $_POST['password'];
//   if ($username == 'userlsp' && $password == 'smkfarmasibjm') {
//     header('Location: views/dashboard.php');
//   } else {
//     echo '<script>
//     alert("Username atau password anda salah!");
//     </script>';
//   }
// }

require 'functions/functions.php';

if (isset($_POST["login"])) {
  $username = $_POST["username"];
  $password = $_POST["password"];

  $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

  // cek username
  if (mysqli_num_rows($result) === 1) {
    // cek password
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row["password"])) {
      echo "<script>
        alert('Selamat Datang, " . $row["username"] . "! Anda berhasil login.');
        window.location.href = 'views/dashboard.php';
    </script>";
      exit;
    }
  }

  $error = true;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Form Login</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Patrick+Hand&display=swap" />
  <link rel="stylesheet" href="src/login.css">
</head>

<body>
  <div class="container">
    <div class="image"><img style="border-radius: 100%;" width="215" height="210" src="assets/cat.jpg" /></div>
    <p>
      SELAMAT DATANG DI LAUNDRY <br />
      SMK FARMASI BANJARMASIN
    </p>
    <form action="" method="POST">
      <?php if (isset($error)) : ?>
        <p style="color: red; font-style:italic;">username/password salah</p>
      <?php endif; ?>
      <div class="form-group">
        <input type="text" id="username" placeholder="username" name="username" required />
      </div>
      <div class="form-group">
        <input type="password" placeholder="password" id="password" name="password" required />
      </div>
      <button name="register"><a href="page/register.php">Register</a></button>
      <button id="login" name="login">Login</button>
    </form>
  </div>
</body>

</html>