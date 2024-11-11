<?php
    session_start();
    if(!isset($_SESSION['userid'])){
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
       
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
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

        <div class="container mt-5">
        <form action="tambah_komentar.php" method="post" class="mb-4">
            <?php
            include "koneksi.php";
            $fotoid = $_GET['fotoid'];
            $sql = mysqli_query($conn, "SELECT * FROM foto WHERE fotoid='$fotoid'");
            while ($data = mysqli_fetch_array($sql)) {
            ?>
                <input type="hidden" name="fotoid" value="<?=$data['fotoid']?>">
                <div class="mb-3">
                    <label class="form-label">Judul</label>
                    <input type="text" class="form-control" name="judulfoto" value="<?=$data['judulfoto']?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <input type="text" class="form-control" name="deskripsifoto" value="<?=$data['deskripsifoto']?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Foto</label>
                    <img src="gambar/<?=$data['lokasifile']?>" class="img-fluid" alt="Foto">
                </div>
                <div class="mb-3">
                    <label class="form-label">Komentar</label>
                    <input type="text" class="form-control" name="isikomentar" required>
                </div>
                <button type="submit" class="btn btn-primary">Tambah</button>
            <?php
            }
            ?>
        </form>

        <h3>Daftar Komentar</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Komentar</th>
                    <th>Tanggal</th>
                    
                </tr>
            </thead>
            <tbody>
    <?php
    $userid = $_SESSION['userid'];
    $sql = mysqli_query($conn, "SELECT * FROM komentarfoto, user WHERE komentarfoto.userid=user.userid AND komentarfoto.fotoid='$fotoid'");
    while ($data = mysqli_fetch_array($sql)) {
    ?>
        <tr>
            <td><?=$data['komentarid']?></td>
            <td><?=$data['namalengkap']?></td>
            <td><?=$data['isikomentar']?></td>
            <td><?=$data['tanggalkomentar']?></td>
        </tr>
    <?php
    }
    ?>
</tbody>

        </table>
    </div>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>