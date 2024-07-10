<?php
include '../koneksi.php';
include 'navbar.php';

// Cek level user
session_start();

// Cek apakah id ada di URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk mengambil data makanan berdasarkan ID
    $query = "SELECT id, nama_menu, keterangan, porsi, harga, foto FROM makanan WHERE id = '$id'";
    $result = mysqli_query($koneksi, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);
    } else {
        echo "Data makanan tidak ditemukan.";
        exit();
    }
} else {
    echo "ID tidak ditemukan.";
    exit();
}

// Cek apakah form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nama_menu = $_POST['nama_menu'];
    $keterangan = $_POST['keterangan'];
    $porsi = $_POST['porsi'];
    $harga = $_POST['harga'];
    $foto = $_FILES['foto']['name'];
    $foto_tmp = $_FILES['foto']['tmp_name'];

    // Upload file foto jika ada
    if (!empty($foto_tmp)) {
        move_uploaded_file($foto_tmp, "../uploads/$foto");
    } else {
        $foto = $data['foto']; // Gunakan foto lama jika tidak ada upload baru
    }

    // Update query
    $update_query = "UPDATE makanan SET 
                     nama_menu = '$nama_menu', 
                     keterangan = '$keterangan', 
                     porsi = '$porsi', 
                     harga = '$harga', 
                     foto = '$foto' 
                     WHERE id = '$id'";

    $update_result = mysqli_query($koneksi, $update_query);

    if ($update_result) {
        header("Location: menu_catring.php?pesan=edit");
        exit();
    } else {
        echo "Gagal memperbarui data makanan.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Menu Makanan</title>
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <?php Navbar::addCSS(); ?>
</head>

<body class="bg-gray-100">
    <div class="container mx-auto p-6">
        <h2 class="text-2xl font-bold mb-6">Edit Menu Makanan</h2>
        <form action="" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded shadow-md">
            <input type="hidden" name="id" value="<?php echo $data['id']; ?>">

            <div class="mb-4">
                <label for="nama_menu" class="block text-gray-700">Nama Menu</label>
                <input type="text" name="nama_menu" id="nama_menu" class="form-control"
                    value="<?php echo $data['nama_menu']; ?>" required>
            </div>

            <div class="mb-4">
                <label for="keterangan" class="block text-gray-700">Keterangan</label>
                <textarea name="keterangan" id="keterangan" class="form-control"
                    required><?php echo $data['keterangan']; ?></textarea>
            </div>

            <div class="mb-4">
                <label for="porsi" class="block text-gray-700">Porsi</label>
                <input type="text" name="porsi" id="porsi" class="form-control" value="<?php echo $data['porsi']; ?>"
                    required>
            </div>

            <div class="mb-4">
                <label for="harga" class="block text-gray-700">Harga</label>
                <input type="number" name="harga" id="harga" class="form-control" value="<?php echo $data['harga']; ?>"
                    required>
            </div>

            <div class="mb-4">
                <label for="foto" class="block text-gray-700">Foto</label>
                <input type="file" name="foto" id="foto" class="form-control">
                <?php if ($data['foto']): ?>
                <img src="../img/<?php echo $data['foto']; ?>" alt="Foto Menu" class="mt-2" width="100">
                <?php endif; ?>
            </div>

            <div>
                <button type="submit" class="btn btn-primary">Perbarui Menu</button>
            </div>
        </form>
    </div>
    <!-- Bootstrap 5.3 JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>