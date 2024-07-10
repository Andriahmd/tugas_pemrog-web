<?php
include 'koneksi.php';?>
<?php include 'navbar.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pesanan</title>

    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
        background-color: #f8f9fa;
        font-family: Arial, sans-serif;
    }


    .container-menu h2 {

        font-weight: bold;
        font-family: 'Times New Roman',
            Times,
            serif;
        font-size: 1.5rem;
    }

    .container-menu {
        background: rgba(255, 255, 255, 0.9);
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0px 0px 10px 0px #000;
        max-width: 500px;
        margin: 50px auto;
        padding: 30px;
    }

    .form-label {
        font-weight: bold;
    }

    .container-menu button {
        width: 98%;
        padding: 10px;
        background-color: #28a745;
        border: none;
        color: white;
        border-radius: 5px;
        cursor: pointer;
    }

    .container-menu button:hover {
        background-color: #218838;
    }
    </style>

</head>

<body>
    <div class="container-menu">
        <h2 class="text-center mb-4">Tambah Pesanan</h2>
        <form action="./admin/tambah_pesanan.php" method="POST" enctype="multipart/form-data" class="mx-auto max-w-lg">
            <!-- <div class="mb-3">
                <label for="id_user" class="form-label">ID User:</label>
                <input type="text" id="id_user" name="id_user" class="form-control" required>
            </div> -->

            <div class="mb-3">
                <label for="nama" class="form-label">Nama:</label>
                <input type="text" id="nama" name="nama" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="pesanan" class="form-label">Paket Catering:</label>
                <select id="pesanan" name="pesanan" class="form-control" required onchange="updateHarga()">
                    <option value="">Pilih Paket Catering</option>
                    <option value="paket1" data-harga="25000">Paket 1</option>
                    <option value="paket2" data-harga="65000">Paket 2</option>
                    <option value="paket3" data-harga="55000">Paket 3</option>
                    <option value="paket4" data-harga="30000">Paket 4</option>

                </select>
            </div>

            <div class="mb-3">
                <label for="total_pesanan" class="form-label">Porsi Pesanan:</label>
                <input type="number" id="total_pesanan" name="total_pesanan" class="form-control" required
                    oninput="updateTotalBayar()">
            </div>

            <div class="mb-3">
                <label for="harga" class="form-label">Harga:</label>
                <input type="text" id="harga" name="harga" class="form-control" readonly>
            </div>

            <div class="mb-3">
                <label for="total_bayar" class="form-label">Total Bayar:</label>
                <input type="text" id="total_bayar" name="total_bayar" class="form-control" readonly>
            </div>

            <div class="mb-3">
                <label for="tgl_pemesanan" class="form-label">Tanggal Pemesanan:</label>
                <input type="date" id="tgl_pemesanan" name="tgl_pemesanan" class="form-control" required>
            </div>

            <div class="text-center">
                <input type="submit" value="Tambah Pesanan" class="btn btn-primary">
            </div>
        </form>
    </div>

    <!-- JavaScript untuk update harga dan total bayar secara otomatis -->
    <script>
    function updateHarga() {
        var select = document.getElementById('pesanan');
        var hargaInput = document.getElementById('harga');
        var selectedOption = select.options[select.selectedIndex];
        var harga = selectedOption.getAttribute('data-harga');
        hargaInput.value = harga;
        updateTotalBayar();
    }

    function updateTotalBayar() {
        var harga = document.getElementById('harga').value;
        var porsi = document.getElementById('total_pesanan').value;
        var totalBayarInput = document.getElementById('total_bayar');
        var totalBayar = harga * porsi;
        totalBayarInput.value = totalBayar;
    }
    </script>
    <!-- Footer -->
    <div class="footer bg-dark text-light py-4">
        <div class="container footer">
            <div class="row">
                <div class="col-md-3">
                    <h5 class="text-xl font-bold">Warung Pakde</h5>
                    <p>Warung pakde merupan salah satu rumah makan yang telah berkerja sama untuk membuat system
                        e-cetring dimana system ini sangat berguna untuk membantu proses pemesana cetring untuk acara
                        besar dan acara lainnya
                    </p>
                    <p>+62 89098762</p>
                    <p>Jln.cokro aminoto, bengkalis,riau</p>
                </div>
                <div class="col-md-3">
                    <h5 class="text-xl font-bold">Mitra</h5>
                    <ul class="list-unstyled">
                        <li>Gojek</li>
                        <li>Grab</li>
                        <li>Paypal</li>
                        <li>Affilation</li>
                        <li>FAQs</li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5 class="text-xl font-bold">Our Services</h5>
                    <ul class="list-unstyled">
                        <li>Online Order Catring</li>
                        <li>Free Ongkir</li>
                        <li>Wishlist</li>
                        <li>Discount</li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5 class="text-xl font-bold">Our Newsletter</h5>
                    <form>
                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Name">
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control" placeholder="Email">
                        </div>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>