<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include 'koneksi.php';

// membuat variabel untuk menampung data dari form
$id = $_POST['id'];
$nama_menu = $_POST['nama_menu'];
$keterangan = $_POST['keterangan'];
$porsi = $_POST['porsi'];
$harga = $_POST['harga'];
$foto = $_FILES['foto']['name'];

// cek dulu jika ada gambar produk jalankan coding ini
if ($foto != "") {
    $ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg'); // ekstensi file gambar yang bisa diupload
    $x = explode('.', $foto); // memisahkan nama file dengan ekstensi yang diupload
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['foto']['tmp_name'];
    $angka_acak = rand(1, 999);

    // menggabungkan angka acak dengan nama file sebenarnya
    $nama_gambar_baru = $angka_acak . '-' . $foto;
    if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
        // memindah file gambar ke folder img
        if (move_uploaded_file($file_tmp, 'img/' . $nama_gambar_baru)) {
            // jalankan query INSERT untuk menambah data ke database
            $query = "INSERT INTO makanan (id, nama_menu, keterangan, porsi, harga, foto)
                      VALUES ('$id', '$nama_menu', '$keterangan', '$porsi', '$harga', '$nama_gambar_baru')";
            $result = mysqli_query($koneksi, $query);
            // periksa query apakah ada error
            if (!$result) {
                die("Query ini gagal dijalankan: " . mysqli_errno($koneksi) .
                    " - " . mysqli_error($koneksi));
            } else {
                // tampil alert dan akan redirect ke halaman makanan.php
                echo "<script>alert('Data berhasil ditambah.');window.location='./admin/menu_catring.php';</script>";
            }
        } else {
            echo "<script>alert('Gagal mengupload gambar.');window.location='menu_catring.php';</script>";
        }
    } else {
        // jika file ekstensi tidak jpg dan png maka alert ini yang tampil
        echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='menu_catring.php';</script>";
    }
} else {
    $query = "INSERT INTO makanan (id, nama_menu, keterangan, porsi, harga, foto)
              VALUES ('$id', '$nama_menu', '$keterangan', '$porsi', '$harga', null)";
    $result = mysqli_query($koneksi, $query);
    // periksa query apakah ada error
    if (!$result) {
        die("Query gagal dijalankan: " . mysqli_errno($koneksi) .
            " - " . mysqli_error($koneksi));
    } else {
        // tampil alert dan akan redirect ke halaman makanan.php
        echo "<script>alert('Data berhasil ditambah.');window.location='./admin/menu_catring.php';</script>";
    }
}
?>