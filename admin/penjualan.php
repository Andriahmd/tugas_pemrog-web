<?php
include '../koneksi.php';
include 'navbar.php';


// Cek level user
session_start();


$navbarItems = [
    ['label' => 'Dashboard', 'link' => 'dashboard.php', 'active' => false],
    ['label' => 'Pesanan', 'link' => '#', 'active' => true],
    ['label' => 'Paket Ketring', 'link' => 'menu_catring.php', 'active' => false],
    ['label' => 'Status Pembayaran', 'link' => '#', 'active' => false],
    ['label' => 'Sign Out', 'link' => '#', 'active' => false],
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
                    <input type="text" class="form-control" placeholder="Search here...">
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
                                <th class="table-light">Status Pemesanan</th>
                                <th class="table-light">Tanggal Pesanan</th>
                                <th class="table-light">Tanggal Pengambilan</th>
                                <th class="table-light">Aksi</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $data = mysqli_query($koneksi, "SELECT * FROM penjualan");
                            while ($d = mysqli_fetch_array($data)) {
                            ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $d['nama']; ?></td>
                                <td><?php echo $d['email']; ?></td>
                                <td><?php echo $d['pesanan']; ?></td>
                                <td><?php echo $d['status_pesanan']; ?></td>
                                <td><?php echo $d['tgl_pemesanan']; ?></td>
                                <td><?php echo $d['tgl_pengambilan']; ?></td>
                                <td>
                                    <a href="hapus_mhs.php?id=<?php echo $d['id_user']; ?>"
                                        class="btn btn-danger btn-sm">Hapus</a>
                                    <a href="edit_mhs.php?id=<?php echo $d['id_user']; ?>"
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