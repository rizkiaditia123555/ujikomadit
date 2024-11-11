<?php
session_start();
if (!isset($_SESSION['userid'])) {
?>
    
<?php
} else {
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
            .card {
                margin-bottom: 20px;
            }
            .card img {
                max-width: 100%; /* Membatasi ukuran gambar */
                height: auto;
            }
            .action-links a {
                margin-right: 10px; /* Jarak antar tautan */
                text-decoration: none;
                color: #007bff; /* Warna tautan */
            }
            .action-links a:hover {
                text-decoration: underline; /* Garis bawah saat hover */
            }
        </style>
    </head>
    <body id="page-top">
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
            <a class="navbar-brand js-scroll-trigger" href="#page-top">
                <h4>SELAMAT DATANG <b><?=$_SESSION['namalengkap']?></b></h4>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
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
            <div class="row">
                <?php
                include "koneksi.php";
                $sql = mysqli_query($conn, "SELECT * FROM foto, user WHERE foto.userid = user.userid");
                while ($data = mysqli_fetch_array($sql)) {
                ?>
                    <div class="col-md-4">
                        <div class="card">
                            <img src="gambar/<?=$data['lokasifile']?>" class="card-img-top" alt="Foto">
                            <div class="card-body">
                                <h5 class="card-title"><?=$data['judulfoto']?></h5>
                                <p class="card-text"><?=$data['deskripsifoto']?></p>
                                <p class="card-text"><small class="text-muted">Tanggal Unggah: <?=$data['tanggalunggah']?></small></p>
                                <p class="card-text"><strong>Uploader:</strong> <?=$data['namalengkap']?></p>
                                <p class="card-text"><strong>Jumlah Like:</strong>
                                    <?php
                                    $fotoid = $data['fotoid'];
                                    $sql2 = mysqli_query($conn, "SELECT * FROM likefoto WHERE fotoid = '$fotoid'");
                                    echo mysqli_num_rows($sql2);
                                    ?>
                                </p>
                               
                            
                            
                            </p>
                                <div class="action-links">
                                    <?php
                                    // Cek apakah pengguna sudah like foto ini
                                    $userid = $_SESSION['userid'];
                                    $likeCheck = mysqli_query($conn, "SELECT * FROM likefoto WHERE fotoid='$fotoid' AND userid='$userid'");
                                    if (mysqli_num_rows($likeCheck) > 0) {
                                        // Jika sudah like, tampilkan link unlike
                                        echo '<a href="unlike.php?fotoid=' . $fotoid . '"><i class="fas fa-thumbs-down"></i> Unlike</a>';
                                    } else {
                                        // Jika belum like, tampilkan link like
                                        echo '<a href="like.php?fotoid=' . $fotoid . '"><i class="fas fa-thumbs-up"></i> Like</a>';
                                    }
                                    ?>
                                    <a href="komentar.php?fotoid=<?=$data['fotoid']?>"><i class="fas fa-comment"></i> Comment</a>
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
<?php
}
?>
