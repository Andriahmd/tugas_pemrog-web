<?php
include '../koneksi.php';

// Membuat variabel untuk menampung data dari form
// $id_user = $_POST['id_user'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$pesanan = $_POST['pesanan'];
$harga = $_POST['harga'];
$status_pesanan = 'diproses'; // Set default status
$tgl_pemesanan = $_POST['tgl_pemesanan'];
$total_pesanan = $_POST['total_pesanan'];

// Menghitung tanggal pengambilan (7 hari setelah tanggal pemesanan)
$tgl_pengambilan = date('Y-m-d', strtotime($tgl_pemesanan . ' + 7 days'));

// Jalankan query INSERT untuk menambah data ke database
$query = "INSERT INTO penjualan (nama, email, pesanan, harga, status_pesanan, tgl_pemesanan, tgl_pengambilan, total_pesanan)
          VALUES ('$nama', '$email', '$pesanan', '$harga', '$status_pesanan', '$tgl_pemesanan', '$tgl_pengambilan', '$total_pesanan')";
$result = mysqli_query($koneksi, $query);

// Periksa query apakah ada error
if (!$result) {
    die("Query ini gagal dijalankan: " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
} else {
    // Tampil alert dan akan redirect ke halaman penjualan.php
    echo "<script>alert('Data berhasil ditambah.');window.location='../index.php';</script>";
}
?>