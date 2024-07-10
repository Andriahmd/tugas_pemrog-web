<?php
include '../koneksi.php';
include 'navbar.php';

// Cek level user
session_start();

// Cek apakah id ada di URL
if (isset($_GET['id_user'])) {
    $id_user = $_GET['id_user'];

    // Query untuk mengambil data pesanan berdasarkan ID
    $query = "SELECT * FROM penjualan WHERE id_user = '$id_user'";
    $result = mysqli_query($koneksi, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);
    } else {
        echo "Data pesanan tidak ditemukan.";
        exit();
    }
} else {
    echo "ID tidak ditemukan.";
    exit();
}

// Cek apakah form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_user = $_POST['id_user'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $pesanan = $_POST['pesanan'];
    $status_pesanan = $_POST['status_pesanan'];
    $tgl_pemesanan = $_POST['tgl_pemesanan'];
    $tgl_pengambilan = $_POST['tgl_pengambilan'];
    $total_pesanan = $_POST['total_pesanan'];
    $harga = $_POST['harga'];

    // Update query
    $update_query = "UPDATE penjualan SET 
                     nama = '$nama', 
                     email = '$email', 
                     pesanan = '$pesanan', 
                     status_pesanan = '$status_pesanan', 
                     tgl_pemesanan = '$tgl_pemesanan', 
                     tgl_pengambilan = '$tgl_pengambilan', 
                     total_pesanan = '$total_pesanan', 
                     harga = '$harga' 
                     WHERE id_user = '$id_user'";

    $update_result = mysqli_query($koneksi, $update_query);

    if ($update_result) {
        header("Location: pesanan.php?pesan=edit");
        exit();
    } else {
        echo "Gagal memperbarui data pesanan.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <?php Navbar::addCSS(); ?>
    <style>
    .container {
        background-color: white;
        padding: 1rem;
        border-radius: 1rem;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        max-width: 1000px;

    }

    .form-label {
        font-weight: bold;
    }
    </style>
</head>

<body class="bg-gray-100">
    <div class="flex">
        <div class="main-content flex-grow p-4 ml-64">


            <div class="container mt-5">
                <h2 class="text-center mb-4-2x1">Edit Pesanan</h2>
                <form action="" method="POST" class="mx-auto">
                    <input type="hidden" name="id_user" value="<?php echo $data['id_user']; ?>">

                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama:</label>
                        <input type="text" id="nama" name="nama" class="form-control"
                            value="<?php echo $data['nama']; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" id="email" name="email" class="form-control"
                            value="<?php echo $data['email']; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="pesanan" class="form-label">Pesanan:</label>
                        <input type="text" id="pesanan" name="pesanan" class="form-control"
                            value="<?php echo $data['pesanan']; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="status_pesanan" class="form-label">Status Pesanan:</label>
                        <input type="text" id="status_pesanan" name="status_pesanan" class="form-control"
                            value="<?php echo $data['status_pesanan']; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="tgl_pemesanan" class="form-label">Tanggal Pemesanan:</label>
                        <input type="date" id="tgl_pemesanan" name="tgl_pemesanan" class="form-control"
                            value="<?php echo $data['tgl_pemesanan']; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="tgl_pengambilan" class="form-label">Tanggal Pengambilan:</label>
                        <input type="date" id="tgl_pengambilan" name="tgl_pengambilan" class="form-control"
                            value="<?php echo $data['tgl_pengambilan']; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="total_pesanan" class="form-label">Total Pesanan:</label>
                        <input type="text" id="total_pesanan" name="total_pesanan" class="form-control"
                            value="<?php echo $data['total_pesanan']; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga:</label>
                        <input type="text" id="harga" name="harga" class="form-control"
                            value="<?php echo $data['harga']; ?>" required>
                    </div>

                    <div class="text-center">
                        <input type="submit" value="Perbarui Pesanan" class="btn btn-primary w-100 py-2">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>