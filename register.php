<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Registrasi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('https://wallpapers.com/images/hd/pixel-landscape-a6ubt54igmwrr9q0.jpg'); 
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-container {
            background-color: rgba(255, 255, 255, 0.7); /* Transparan */
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
            text-align: center; /* Memusatkan teks */
            width: 400px; /* Lebar form */
        }
        h1 {
            color: #fd7e14; /* Warna judul */
            margin-bottom: 20px; /* Jarak bawah judul */
        }
        table {
            width: 100%;
            border-collapse: collapse; /* Menghilangkan jarak antara border */
        }
        td {
            padding: 10px;
        }
        input[type="text"],
        input[type="password"],
        input[type="email"] {
            width: 100%;
            padding: 12px; /* Padding lebih besar */
            border: 2px solid #fd7e14; /* Border warna */
            border-radius: 5px;
            font-size: 16px; /* Ukuran font */
            margin-bottom: 15px; /* Jarak bawah input */
        }
        input[type="submit"] {
            background-color: #fd7e14; /* Warna tombol */
            color: white;
            border: none;
            border-radius: 5px;
            padding: 12px;
            font-size: 16px; /* Ukuran font */
            cursor: pointer;
            transition: background-color 0.3s;
            width: 100%; /* Tombol lebar penuh */
        }
        input[type="submit"]:hover {
            background-color: #e76c00; /* Warna lebih gelap saat hover */
        }
        .register-link {
            margin-top: 15px; /* Jarak antara tombol dan tautan */
            color: #333;
            font-size: 14px; /* Ukuran font */
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>Registrasi</h1>
        <form action="proses_registrasi.php" method="post">
            <table>
                <tr>
                    <td>Username</td>
                    <td><input type="text" name="username" required></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password" required></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="email" name="email" required></td>
                </tr>
                <tr>
                    <td>Nama Lengkap</td>
                    <td><input type="text" name="namalengkap" required></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td><input type="text" name="alamat" required></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Register"></td>
                </tr>
            </table>
        </form>
        <div class="register-link">
            Sudah punya akun? <a href="login.php">Silahkan login</a>
        </div>
    </div>
</body>
</html>
