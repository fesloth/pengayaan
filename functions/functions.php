<?php
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "pengayaan");

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function register($data)
{
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    // Cek apakah username sudah terdaftar
    $result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");

    if (mysqli_num_rows($result) > 0) {
        echo "<script>
            alert('Username sudah terdaftar!');
        </script>";

        return false;
    }

    if ($password !== $password2) {
        echo "<script>
            alert('Konfirmasi password tidak sesuai');
        </script>";

        return false;
    }

    // Enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // Tambahkan user baru ke database
    $query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
