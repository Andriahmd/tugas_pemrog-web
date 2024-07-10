<?php
include '../koneksi.php';
include 'navbar.php';

// Cek level user

$navbarItems = [
    ['label' => 'Dashboard', 'link' => 'dashboard.php', 'active' => false],
    ['label' => 'Pesanan', 'link' => 'pesanan.php', 'active' => false],
    ['label' => 'Paket Ketring', 'link' => 'menu_catring.php', 'active' => true],
    ['label' => 'Sign Out', 'link' => 'index.php', 'active' => false],
];

$navbar = new Navbar($navbarItems);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>CRUD PHP dan MYSQLi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <?php Navbar::addCSS(); ?>
</head>

<body class="bg-gray-100">

    <div class="flex">
        <?php $navbar->render(); ?>

        <div class="main-content flex-grow p-4 ml-64">
            <div class="container mx-auto">
                <a href="tambah_menu.php"
                    class="btn btn-primary mb-3 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">TAMBAHKAN
                    MENU MAKANAN</a>
                <br>
                <br>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Pencarian</label>
                    <form action="menu_catring.php" method="get" class="flex">
                        <input type="text" name="cari"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <input type="submit" value="Cari"
                            class="ml-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    </form>
                </div>
                <br>
                <div class="table-responsive bg-white rounded-lg shadow p-4 mt-4">
                    <table class="table-auto w-full text-left">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">No</th>
                                <th class="px-4 py-2">ID Makanan</th>
                                <th class="px-4 py-2">Nama Makanan</th>
                                <th class="px-4 py-2">Keterangan</th>
                                <th class="px-4 py-2">Porsi</th>
                                <th class="px-4 py-2">Harga</th>
                                <th class="px-4 py-2">Foto Makanan</th>
                                <th class="px-4 py-2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            if (isset($_GET['cari'])) {
                                $cari = $_GET['cari'];
                                $data = mysqli_query($koneksi, "SELECT * FROM makanan WHERE nama_menu LIKE '%$cari%' OR porsi LIKE '%$cari%' OR harga LIKE '%$cari%'");
                            } else {
                                $data = mysqli_query($koneksi, "SELECT * FROM makanan");
                            }

                            while ($d = mysqli_fetch_array($data)) {
                            ?>
                            <tr>
                                <td class="border px-4 py-2"><?php echo $no++; ?></td>
                                <td class="border px-4 py-2"><?php echo $d['id']; ?></td>
                                <td class="border px-4 py-2"><?php echo $d['nama_menu']; ?></td>
                                <td class="border px-4 py-2"><?php echo $d['keterangan']; ?></td>
                                <td class="border px-4 py-2"><?php echo $d['porsi']; ?></td>
                                <td class="border px-4 py-2"><?php echo $d['harga']; ?></td>
                                <td class="border px-4 py-2">
                                    <img src="../img/<?php echo $d['foto']; ?>" class="img-thumbnail" alt="..."
                                        style="width: 100px; height: 100px;">

                                </td>
                                <td class="border px-4 py-2">
                                    <a href="hapus_menu.php?id=<?php echo $d['id']; ?>" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                        Hapus
                                    </a><br>
                                    <a href="edit_makanan.php?id=<?php echo $d['id']; ?>"
                                        class="btn btn-info btn-sm">Edit</a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="./js/dashboard.js"></script>
</body>

</html>