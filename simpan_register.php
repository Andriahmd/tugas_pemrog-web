<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $nohp = $_POST['no_hp'];
    $password = $_POST['sandi'];
    $confirm_password = $_POST['sandiulang'];

    // Periksa apakah password cocok dengan konfirmasi password
    if ($password === $confirm_password) {
        // Hash password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Periksa apakah nama sudah ada
        $stmt = $koneksi->prepare("SELECT COUNT(*) FROM user WHERE nama = ?");
        $stmt->bind_param("s", $nama);
        $stmt->execute();
        $stmt->bind_result($count);
        $stmt->fetch();
        $stmt->close();

        if ($count > 0) {
            echo "Nama sudah terdaftar. Gunakan nama lain.";
        } else {
            // Persiapkan dan jalankan query untuk memasukkan data pengguna
            $stmt = $koneksi->prepare("INSERT INTO user (nama, email, username, sandi, no_hp) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss", $nama, $email, $username, $hashed_password, $nohp);

            if ($stmt->execute()) {
                // Pendaftaran berhasil, redirect ke halaman login
                header("Location: login.php?pesan=daftar_sukses");
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