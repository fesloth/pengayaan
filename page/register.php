<?php

require '../functions/functions.php';
// ketika tombol button register ditekan

if (isset($_POST["register"])) {
    if (register($_POST) > 0) {
        echo "<script>
      alert('User baru berhasil ditambahkan!');
    </script>";
    } else {
        echo mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Registrasi</title>
    <link rel="stylesheet" href="../src/register.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Patrick+Hand&display=swap" />
</head>

<body>
    <div class="container">
        <div class="image"><img src="../assets/cat.jpg" alt="Cat Image"></div>
        <div class="title">Halaman Registrasi</div>
        <form action="" method="POST">
            <div class="form-group">
                <input type="text" id="username" placeholder="Username" name="username" required>
            </div>
            <div class="form-group">
                <input type="password" placeholder="Password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <input type="password" placeholder="Confirm Password" id="password2" name="password2" required>
            </div>
            <button type="submit" name="register">Register</button>
            <div class="text">
                <p>
                    Sudah memiliki akun? <a href="../index.php">Login di sini</a>
                </p>
            </div>
        </form>
    </div>
</body>

</html>