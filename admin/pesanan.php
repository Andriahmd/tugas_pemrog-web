<?php
include '../koneksi.php';
include 'navbar.php';

// Cek level user
session_start();

$navbarItems = [
    ['label' => 'Dashboard', 'link' => 'dashboard.php', 'active' => false],
    ['label' => 'Pesanan', 'link' => '#', 'active' => true],
    ['label' => 'Paket Ketring', 'link' => 'menu_catring.php', 'active' => false],
    ['label' => 'Sign Out', 'link' => 'index.php', 'active' => false],
];

$navbar = new Navbar($navbarItems);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <?php Navbar::addCSS(); ?>
</head>

<body class="bg-gray-100">
    <div class="flex">
        <?php $navbar->render(); ?>

        <div class="main-content flex-grow p-4 ml-64">
            <header class="flex justify-between items-center pb-3 mb-4 border-b border-gray-300">
                <div class="search-container w-1/2">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Pencarian</label>
                    <form action="pesanan.php" method="get" class="flex">
                        <input type="text" name="cari"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <input type="submit" value="Cari"
                            class="ml-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    </form>
                </div>
                <div class="user-info flex items-center">
                    <span>Eng (US)</span>
                    <img src="avatar.png" alt="User Avatar" class="rounded-full ml-2 w-10 h-10">
                    <span class="ml-2">Adam</span>
                </div>
            </header>
            <div class="dashboard-content">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div class="col-span-1 mb-3">
                        <div class="card text-center h-100 p-4 bg-white rounded-lg shadow hover:shadow-lg">
                            <div class="card-body">
                                <h3 class="text-2xl">$20k</h3>
                                <p>Total Pemasukan</p>
                                <span class="text-green-500">+8% from yesterday</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-1 mb-3">
                        <div class="card text-center h-100 p-4 bg-white rounded-lg shadow hover:shadow-lg">
                            <div class="card-body">
                                <h3 class="text-2xl">300 Paket</h3>
                                <p>Total Pesanan</p>
                                <span class="text-green-500">+15% from yesterday</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-1 mb-3">
                        <div class="card text-center h-100 p-4 bg-white rounded-lg shadow hover:shadow-lg">
                            <div class="card-body">
                                <h3 class="text-2xl">5</h3>
                                <p>Antrian Pesanan</p>
                                <span class="text-green-500">+1.2% from yesterday</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-1 mb-3">
                        <div class="card text-center h-100 p-4 bg-white rounded-lg shadow hover:shadow-lg">
                            <div class="card-body">
                                <h3 class="text-2xl">8</h3>
                                <p>Pelanggan Baru</p>
                                <span class="text-green-500">0.5% from yesterday</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive bg-white rounded-lg shadow p-4 mt-4">
                    <table class="table table-bordered w-full text-left">
                        <thead>
                            <tr>
                                <th class="table-light">No</th>
                                <th class="table-light">Nama</th>
                                <th class="table-light">Email</th>
                                <th class="table-light">Pesanan</th>
                                <th class="table-light">Total Bayar</th>
                                <th class="table-light">Status Pemesanan</th>
                                <th class="table-light">Tanggal Pesanan</th>
                                <th class="table-light">Tanggal Pengambilan</th>
                                <th class="table-light">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            if (isset($_GET['cari'])) {
                                $cari = mysqli_real_escape_string($koneksi, $_GET['cari']);
                                $query = "SELECT * FROM penjualan WHERE nama LIKE '%$cari%' OR pesanan LIKE '%$cari%' OR harga LIKE '%$cari%'";
                            } else {
                                $query = "SELECT * FROM penjualan";
                            }

                            $data = mysqli_query($koneksi, $query);

                            if (mysqli_num_rows($data) > 0) {
                                while ($d = mysqli_fetch_array($data)) {
                            ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo htmlspecialchars($d['nama']); ?></td>
                                <td><?php echo htmlspecialchars($d['email']); ?></td>
                                <td><?php echo htmlspecialchars($d['pesanan']); ?></td>
                                <td><?php echo htmlspecialchars($d['harga']); ?></td>
                                <td><?php echo htmlspecialchars($d['status_pesanan']); ?></td>
                                <td><?php echo htmlspecialchars($d['tgl_pemesanan']); ?></td>
                                <td><?php echo htmlspecialchars($d['tgl_pengambilan']); ?></td>
                                <td>
                                    <a href="hapus.php?id_user=<?php echo htmlspecialchars($d['id_user']); ?>"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                        Hapus
                                    </a>
                                    <a href="edit_pesanan.php?id_user=<?php echo htmlspecialchars($d['id_user']); ?>"
                                        class="btn btn-info btn-sm">Edit</a>
                                </td>
                            </tr>
                            <?php 
                                }
                            } else {
                                echo '<tr><td colspan="9" class="text-center">Tidak ada data ditemukan</td></tr>';
                            }
                            ?>
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