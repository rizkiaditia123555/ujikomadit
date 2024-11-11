<?php
include "koneksi.php";
session_start();

// Cek jika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $fotoid = $_POST['fotoid'];
    $judulfoto = $_POST['judulfoto'];
    $deskripsifoto = $_POST['deskripsifoto'];
    $albumid = $_POST['albumid'];

    // Jika ada file gambar yang diupload
    if ($_FILES['lokasifile']['name'] != "") {
        $rand = rand();
        $ekstensi = array('png', 'jpg', 'jpeg', 'gif');
        $filename = $_FILES['lokasifile']['name'];
        $ukuran = $_FILES['lokasifile']['size'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);

        // Validasi ekstensi dan ukuran file
        if (in_array($ext, $ekstensi) && $ukuran < 104407000) {
            $xx = $rand . '_' . $filename;
            move_uploaded_file($_FILES['lokasifile']['tmp_name'], 'gambar/' . $xx);

            // Update foto dengan file baru
            $query = "UPDATE foto SET judulfoto='$judulfoto', deskripsifoto='$deskripsifoto', lokasifile='$xx', albumid='$albumid' WHERE fotoid='$fotoid'";
            if (mysqli_query($conn, $query)) {
                header("location:foto.php");
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        } else {
            echo "File upload failed or invalid file type/size!";
        }
    } else {
        // Jika tidak ada gambar yang diupload, hanya update informasi lainnya
        $query = "UPDATE foto SET judulfoto='$judulfoto', deskripsifoto='$deskripsifoto', albumid='$albumid' WHERE fotoid='$fotoid'";
        if (mysqli_query($conn, $query)) {
            header("location:foto.php");
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}
?>
