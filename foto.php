<?php
session_start();
if (!isset($_SESSION['userid'])) {
    header("location:login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Resume - Start Bootstrap Theme</title>
    
    <!-- Font Awesome icons (free version) -->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap) -->
    <link href="css/styles.css" rel="stylesheet" />
    <style>
    body {
        padding-top: 56px; /* For spacing at the top of the page */
    }
    .card {
        margin-bottom: 20px; /* Space between cards */
    }
    img {
        max-width: 100%; /* Responsive images */
        height: auto;
    }
    .action-links a {
        margin-right: 10px; /* Space between links */
        text-decoration: none;
        color: #007bff; /* Link color */
    }
    .action-links a:hover {
        text-decoration: underline; /* Underline on hover */
    }
    .form-container {
        margin: 20px;
        padding: 20px;
        background-color: #f8f9fa; /* Light background for the form */
        border-radius: 5px; /* Rounded corners */
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Shadow for depth */
    }
</style>
</head>
<body id="page-top">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">
            <h4>SELAMAT DATANG <b><?=$_SESSION['namalengkap']?></b></h4>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav">
                
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php">HOME</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="album.php">ALBUM</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="foto.php">FOTO</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="logout.php">LOGOUT</a></li>
            </ul>
        </div>
    </nav>

    <div class="container form-container mt-4">
        <h2>Tambah Foto</h2>
        <form action="tambah_foto.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="judulfoto" class="form-label">Judul</label>
                <input type="text" class="form-control" name="judulfoto" id="judulfoto" required>
            </div>
            <div class="mb-3">
                <label for="deskripsifoto" class="form-label">Deskripsi</label>
                <input type="text" class="form-control" name="deskripsifoto" id="deskripsifoto" required>
            </div>
            <div class="mb-3">
                <label for="lokasifile" class="form-label">Lokasi File</label>
                <input type="file" class="form-control" name="lokasifile" id="lokasifile" required>
            </div>
            <div class="mb-3">
                <label for="albumid" class="form-label">Album</label>
                <select name="albumid" class="form-select" required>
                <?php
                    include "koneksi.php";
                    $userid = $_SESSION['userid'];
                    $sql = mysqli_query($conn, "SELECT * FROM album WHERE userid='$userid'");
                    while ($data = mysqli_fetch_array($sql)) {
                ?>
                        <option value="<?=$data['albumid']?>"><?=$data['namaalbum']?></option>
                <?php
                    }
                ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
    </div>

    <div class="container mt-4">
        <div class="row">
            <?php
                include "koneksi.php";
                $userid = $_SESSION['userid'];
                $sql = mysqli_query($conn, "SELECT * FROM foto, album WHERE foto.userid='$userid' AND foto.albumid=album.albumid");
                while ($data = mysqli_fetch_array($sql)) {
            ?>
                <div class="col-md-4">
                    <div class="card">
                        <img src="gambar/<?=$data['lokasifile']?>" class="card-img-top" alt="Foto">
                        <div class="card-body">
                            <h5 class="card-title"><?=$data['judulfoto']?></h5>
                            <p class="card-text"><?=$data['deskripsifoto']?></p>
                            <p class="card-text"><small class="text-muted">Tanggal Unggah: <?=$data['tanggalunggah']?></small></p>
                            <p class="card-text">Album: <?=$data['namaalbum']?></p>
                            <p class="card-text">Disukai: 
                                <?php
                                    $fotoid = $data['fotoid'];
                                    $sql2 = mysqli_query($conn, "SELECT * FROM likefoto WHERE fotoid='$fotoid'");
                                    echo mysqli_num_rows($sql2);
                                ?>
                            </p>
                            <div class="action-links">
                                <a href="hapus_foto.php?fotoid=<?=$data['fotoid']?>">Hapus</a>
                                <a href="edit_foto.php?fotoid=<?=$data['fotoid']?>">Edit</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
                }
            ?>
        </div>
    </div>

    <!-- Bootstrap core JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS -->
    <script src="js/scripts.js"></script>
</body>
</html>
