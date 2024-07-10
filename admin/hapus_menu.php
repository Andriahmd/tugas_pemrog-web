<?php
include '../koneksi.php';


$id = $_GET['id'];
    // Query untuk menghapus data makanan berdasarkan ID
    $query = "DELETE FROM makanan WHERE id = '$id'"; 
    $result = mysqli_query($koneksi, $query);
    header("location:menu_catring.php?pesan=hapus");


?>