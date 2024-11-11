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
        
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <style>
.bi {
    font-size: 48px; /* Change this value for size */
    color: white; /* Set color to white */
}

            </style>
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
        <h4>Gallery</h4>
        <i class="bi bi-images"></i>
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

         <!-- Bootstrap core JS-->
         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
