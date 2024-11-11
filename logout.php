<?php
// logout.php
session_start();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Logout</title>
    <style>
        /* CSS untuk tampilan modal dan lainnya */
        body {
            font-family: Arial, sans-serif;
        }

        /* Modal Container */
        .modal {
            display: none; /* Modal tidak ditampilkan pada awalnya */
            position: fixed;
            z-index: 1; /* Di atas semua konten */
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4); /* Latar belakang transparan */
            padding-top: 100px;
        }

        /* Modal Content */
        .modal-content {
            background-color: #fff;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 30%;
            text-align: center;
            border-radius: 10px;
        }

        /* Close Button */
        .close {
            color: #aaa;
            font-size: 28px;
            font-weight: bold;
            position: absolute;
            top: 10px;
            right: 20px;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        /* Button Styling */
        button {
            padding: 10px 20px;
            margin: 10px;
            font-size: 16px;
            cursor: pointer;
            border: none;
            border-radius: 5px;
            background-color: #4CAF50;
            color: white;
        }

        button:hover {
            background-color: #45a049;
        }

        button:focus {
            outline: none;
        }

        /* Optional: Style the "No" button with a different color */
        button:nth-child(2) {
            background-color: #f44336;
        }

        button:nth-child(2):hover {
            background-color: #e02f1b;
        }
    </style>
    <script>
       
        function logout() {
            window.location.href = "login.php";  
        }

       
        function cancelLogout() {
            window.history.back();  
        }

        // Fungsi untuk menampilkan modal
        window.onload = function() {
            document.getElementById('logoutModal').style.display = 'block'; 
        }
    </script>
</head>
<body>

    <!-- Modal Konfirmasi Logout -->
    <div id="logoutModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="cancelLogout()">&times;</span>
            <h2>Apakah Anda yakin ingin logout?</h2>
            <button onclick="logout()">Ya, Logout</button>
            <button onclick="cancelLogout()">Tidak, Kembali</button>
        </div>
    </div>

</body>
</html>
