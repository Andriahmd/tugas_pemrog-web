<?php
include 'koneksi.php';?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Cetring Website</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Tailwind CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">

    <!-- FontAwesome for star icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="./css/index.css">

    <style>
    .card-img-top {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }

    .card {
        height: 100%;
    }

    .card-body {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }
    </style>
</head>

<body>
    <?php include 'navbar.php'; ?>

    <!-- Hero Section -->
    <div class="hero-section text-center py-5 bg-light">
        <h1 class="text-4xl font-bold">E-Cetring Website</h1>
        <p class="text-xl">Makan enak nggak perlu capek</p>
    </div>

    <!-- Best Seller Section -->
    <div class="container my-5">
        <h2 class="text-center mb-4 text-3xl font-semibold">Best Seller in this Month</h2>
        <div class="row justify-content-center">
            <?php
            $no = 1;
            $data = mysqli_query($koneksi, "SELECT * FROM makanan");
            while ($d = mysqli_fetch_array($data)) {
            ?>
            <div class="col-md-4 mb-3">
                <div class="card shadow-lg">
                    <img src="img/<?php echo htmlspecialchars($d['foto']); ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-xl font-semibold"><?php echo htmlspecialchars($d['nama_menu']); ?>
                        </h5>
                        <p class="card-text">
                            <?php echo htmlspecialchars($d['keterangan']) . "<br>"; ?>
                            <?php echo "Porsi: " . htmlspecialchars($d['porsi']) . "<br>"; ?>
                            <?php echo "Harga: Rp " . number_format($d['harga'], 2, ',', '.'); ?>
                        </p>
                        <button class="btn btn-outline-success" onclick="location.href='order_user.php'">Order
                            Now</button>
                    </div>
                </div>
            </div>
            <?php
            }
            ?>
        </div>
    </div>

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
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

    <!-- Tailwind CSS JS (Optional, for Tailwind CLI) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.js"></script>
</body>

</html>