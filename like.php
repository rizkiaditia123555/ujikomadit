<?php
    include "koneksi.php";
    session_start();

    if(!isset($_SESSION['userid'])){
        //HARUS LOGIN DULU
        header("location:index.php");
    }else{
        $fotoid=$_GET['fotoid'];
        $userid=$_SESSION['userid'];
        //TANDA UDH LIKE APA BLM

        $sql=mysqli_query($conn,"select * from likefoto where fotoid='$fotoid' and userid='$userid'");

        if(mysqli_num_rows($sql)==1){
            //TNDA YANG UDH LIKE
            header("location:index.php");
        }else{
            $tanggallike=date("Y-m-d");
            mysqli_query($conn,"insert into likefoto values('','$fotoid','$userid','$tanggallike')");
            header("location:index.php");
        }
    }

    
?>