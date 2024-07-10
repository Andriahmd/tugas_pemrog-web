<?php
include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['sandi'];
    $confirm_password = $_POST['sandiulang'];

    // Periksa apakah password cocok dengan konfirmasi password
    if ($password === $confirm_password) {
        // Hash password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Periksa apakah username sudah ada
        $stmt = $koneksi->prepare("SELECT COUNT(*) FROM admin WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->bind_result($count);
        $stmt->fetch();
        $stmt->close();

        if ($count > 0) {
            echo "Username sudah terdaftar. Gunakan username lain.";
        } else {
            // Persiapkan dan jalankan query untuk memasukkan data admin
            $stmt = $koneksi->prepare("INSERT INTO admin (username, email, sandi) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $username, $email, $hashed_password);

            if ($stmt->execute()) {
                // Pendaftaran berhasil, redirect ke halaman login
                header("Location: index.php?pesan=daftar_sukses");
                exit();
            } else {
                echo "Terjadi kesalahan: " . $stmt->error;
            }
            $stmt->close();
        }
    } else {
        echo "Password dan konfirmasi password tidak cocok!";
    }

    // Tutup koneksi
    $koneksi->close();
} else {
    echo "Metode permintaan tidak valid.";
}
?>