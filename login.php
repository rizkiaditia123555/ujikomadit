<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
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
            background-color: rgba(255, 255, 255, 0.5); 
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
            text-align: center; 
            width: 400px; 
        }
        h1 {
            color: #fd7e14;
                              
            margin-bottom: 20px; 
        }
        table {
            width: 100%;
        }
        td {
            padding: 10px;
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 12px; /* Padding lebih besar */
            border: 2px solid #fd7e14; /* Border hijau */
            border-radius: 5px;
            font-size: 16px; /* Ukuran font */
        }
        input[type="submit"] {
            background-color: #fd7e14; /* Warna tombol hijau */
            color: white;
            border: none;
            border-radius: 5px;
            padding: 12px;
            font-size: 16px; /* Ukuran font */
            cursor: pointer;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #45a049; /* Warna lebih gelap saat hover */
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
        <h1> Login</h1>
        <form action="proses_login.php" method="post">
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
                    <td></td>
                    <td><input type="submit" value="Login"></td>
                </tr>
            </table>
        </form>
        <div class="register-link">
            Belum punya akun? <a href="register.php">Silahkan registrasi</a>
        </div>
    </div>
</body>
</html>
