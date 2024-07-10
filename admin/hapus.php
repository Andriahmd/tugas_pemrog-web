<?php
include '../koneksi.php';


$id_user = $_GET['id_user'];
    // Query untuk menghapus data penjualan berdasarkan ID
    $query = "DELETE FROM penjualan WHERE id_user = '$id_user'"; 
    $result = mysqli_query($koneksi, $query);
    header("location:pesanan.php?pesan=hapus");


?>