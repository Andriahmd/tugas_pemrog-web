<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - E-Cetring </title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
    body {
        background-image: url(./img/food.jpg);
        background-size: cover;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
        font-family: Arial, sans-serif;
    }

    .login-container {
        background: rgba(255, 255, 255, 0.9);
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0px 0px 10px 0px #000;
        text-align: center;
        max-width: 400px;
        width: 90%;
    }

    .login-container img {
        width: 250px;
        height: 250px;
        margin-bottom: 20px;
    }

    .login-container h2 {
        margin-bottom: 20px;
    }

    .login-container input[type="text"],
    .login-container input[type="password"],
    .login-container input[type="submit"] {
        width: 100%;
        padding: 10px;
        margin: 10px 0;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
    }

    .login-container input[type="submit"] {
        background-color: #007BFF;
        color: white;
        font-size: 16px;
        cursor: pointer;
    }

    .login-container input[type="submit"]:hover {
        background-color: #0056b3;
    }

    .login-container a {
        color: #007BFF;
        text-decoration: none;
    }

    .login-container a:hover {
        text-decoration: underline;
    }

    @media screen and (max-width: 600px) {
        .login-container {
            padding: 10px;
        }
    }
    </style>
</head>

<body>
    <div class="login-container">
        <h2>HALAMAN LOGIN</h2>
        <img src="./img/logo.png" alt="Admin Icon">
        <?php  
        if(isset($_GET['pesan'])){ 
            if($_GET['pesan'] == "gagalpas"){ 
                echo "<div class='alert alert-danger'>Login gagal! password salah!</div>"; 
            }else if($_GET['pesan'] == "gagaluname"){ 
                echo "<div class='alert alert-danger'>Login gagal! username tidak ditemukan!</div>"; 
            }else if($_GET['pesan'] == "logout"){ 
                echo "<div class='alert alert-success'>Anda telah berhasil logout</div>"; 
            }else if($_GET['pesan'] == "belum_login"){ 
                echo "<div class='alert alert-warning'>Anda harus login untuk mengakses halaman admin</div>"; 
            } 
        } 
        ?>
        <form method="post" action="cek_login.php">
            <div class="form-group">
                <input type="text" class="form-control" name="username" placeholder="Username" required>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="sandi" placeholder="Password" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>

        </form>
        <a href="register.php" class="register-link">Not registered? Create an account</a>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>