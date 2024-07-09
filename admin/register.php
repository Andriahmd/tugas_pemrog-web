<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrator Login</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f7f7f7;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }

    .login-container {
        background-color: #ffffff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        text-align: center;
        width: 300px;
    }

    .login-container h1 {
        font-size: 24px;
        margin-bottom: 20px;
    }

    .login-container img {
        width: 100px;
        height: 100px;
        margin-bottom: 20px;
    }

    .login-container input {
        width: 90%;
        padding: 10px;
        margin: 10px 0;
        border: 1px solid #ddd;
        border-radius: 5px;
    }

    .login-container button {
        width: 98%;
        padding: 10px;
        background-color: #28a745;
        border: none;
        color: white;
        border-radius: 5px;
        cursor: pointer;
    }

    .login-container button:hover {
        background-color: #218838;
    }

    .login-container .register-link {
        margin-top: 10px;
        display: block;
        color: #007bff;
        text-decoration: none;
    }

    .login-container .register-link:hover {
        text-decoration: underline;
    }
    </style>
</head>

<body>
    <div class="login-container">
        <h1>Administrator</h1>
        <p>Login To Dashboard</p>
        <img src="../img/admin.png" alt="Admin Icon">

        <form method="post" action="cek_login.php">
            <div class="form-group">
                <input type="text" class="form-control" name="username" placeholder="Username" required>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="email" placeholder="email" required>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="sandi" placeholder="password" required>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="sandi" placeholder="Confirm Password" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
        <a href="register.php" class="register-link">Not registered? Create an account</a>
    </div>
</body>

</html>