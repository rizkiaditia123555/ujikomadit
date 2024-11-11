<?php
include "koneksi.php";
session_start();

// Aktifkan error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Pastikan variabel username dan password diambil dari $_POST
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password']; 

    // Amankan query dengan menggunakan prepared statements
    $stmt = mysqli_prepare($conn, "SELECT * FROM user WHERE username = ? AND password = ?");
    mysqli_stmt_bind_param($stmt, 'ss', $username, $password);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    $cek = mysqli_num_rows($result);

    if ($cek == 1) {
        $data = mysqli_fetch_array($result);
        $_SESSION['userid'] = $data['userid'];
        $_SESSION['namalengkap'] = $data['namalengkap'];
        echo "Login successful. Redirecting to index...";
        header("location:index.php");
        exit(); // Pastikan untuk exit setelah header redirect
    } else {
        echo "Login failed. Redirecting back to login...";
        header("location:login.php");
        exit();
    }
} else {
    // Jika username atau password tidak dikirim
    echo "Username or password not set. Redirecting back to login...";
    header("location:login.php");
    exit();
}
?>
