<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Menu Makanan</title>
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="container mx-auto p-6">
        <h2 class="text-2xl font-bold mb-6">Tambah Menu Makanan</h2>
        <form action="../store.php" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded shadow-md">
            <div class="mb-4">
                <label for="id" class="block text-gray-700">ID</label>
                <input type="text" name="id" id="id" class="form-control" required>
            </div>
            <div class="mb-4">
                <label for="nama_menu" class="block text-gray-700">Nama Menu</label>
                <input type="text" name="nama_menu" id="nama_menu" class="form-control" required>
            </div>
            <div class="mb-4">
                <label for="keterangan" class="block text-gray-700">Keterangan</label>
                <textarea name="keterangan" id="keterangan" class="form-control" required></textarea>
            </div>
            <div class="mb-4">
                <label for="porsi" class="block text-gray-700">Porsi</label>
                <input type="number" name="porsi" id="porsi" class="form-control" required>
            </div>
            <div class="mb-4">
                <label for="harga" class="block text-gray-700">Harga</label>
                <input type="number" name="harga" id="harga" class="form-control" required>
            </div>
            <div class="mb-4">
                <label for="foto" class="block text-gray-700">Foto</label>
                <input type="file" name="foto" id="foto" class="form-control">
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Tambah Menu</button>
            </div>
        </form>
    </div>
    <!-- Bootstrap 5.3 JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>