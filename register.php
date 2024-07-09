<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Catering</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <style>
    body {
        background-color: #f8f9fa;
        font-family: Arial, sans-serif;
    }


    .register-container h2 {

        font-weight: bold;
        font-family: 'Times New Roman',
            Times,
            serif;
        font-size: 1.5rem;
    }

    .register-container {
        background: rgba(255, 255, 255, 0.9);
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0px 0px 10px 0px #000;
        max-width: 1000px;
        margin: 50px auto;
        padding: 30px;
    }

    .form-label {
        font-weight: bold;
    }

    .register-container button {
        width: 98%;
        padding: 10px;
        background-color: #28a745;
        border: none;
        color: white;
        border-radius: 5px;
        cursor: pointer;
    }

    .register-container button:hover {
        background-color: #218838;
    }
    </style>
</head>

<body>
    <?php include 'navbar.php'; ?>

    <div class="register-container">
        <h2 class="text-center mb-4">Register Catering</h2>
        <form method="post" action="simpan_register.php">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="no_hp" class="form-label">No Hp</label>
                    <input type="text" class="form-control" id="no_hp" name="no_hp" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="sandi" class="form-label">Password</label>
                    <input type="password" class="form-control" id="sandi" name="sandi" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="sandiulang" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="sandiulang" name="sandiulang" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary w-70">Submit</button>
        </form>

    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>