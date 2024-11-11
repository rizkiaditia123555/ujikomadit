<?php
include "koneksi.php";
session_start();

if (!isset($_SESSION['userid'])) {
    // HRUS LOGIN
    header("location:index.php");
} else {
    $fotoid = $_GET['fotoid'];
    $userid = $_SESSION['userid'];

    // Cek apakah user sudah pernah like foto ini
    $sql = mysqli_query($conn, "SELECT * FROM likefoto WHERE fotoid='$fotoid' AND userid='$userid'");

    if (mysqli_num_rows($sql) == 1) {
        // User sudah pernah like foto ini, maka hapus like-nya
        mysqli_query($conn, "DELETE FROM likefoto WHERE fotoid='$fotoid' AND userid='$userid'");
    }

    header("location:index.php");
}
?>
