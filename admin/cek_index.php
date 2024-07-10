<?php
session_start();

include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['sandi'];
    $stmt = $koneksi->prepare("SELECT id_admin, sandi FROM admin WHERE username=?");
    if ($stmt === false) {
        die("Error preparing statement: " . $koneksi->error);
    }

    $stmt->bind_param("s", $username);
    $stmt->execute();
    $query = "SELECT * FROM admin WHERE username = '$username'";
    $result = $stmt->get_result();
    
    

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Debugging
        error_log("Hashed password from database: " . $row['sandi']);
        error_log("Entered password: " . $password);

        if (password_verify($password, $row['sandi'])) {
            $_SESSION['id_admin'] = $id_admin;
            $_SESSION['username'] = $username;
            $_SESSION['status'] = "login";

            // Redirect to menu.php after successful login
            header("Location: dashboard.php");
            exit();
        } else {
            // Password verification failed
            error_log("Password verification failed!");
            header("Location: index.php?pesan=gagalpas");
            exit();
        }
    } else {
        // Username not found
        error_log("Username not found: " . $username);
        header("Location: login.php?pesan=gagaluname");
        exit();
    }

    $stmt->close();
}

$koneksi->close();
?>