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
        <h1>E-Cetring Website</h1>
        <p>Makan enak nggak perlu capek</p>
    </div>

    <!-- Best Seller Section -->
    <div class="container my-5">
        <h2 class="text-center mb-4">Best Seller in this Month</h2>
        <div class="row justify-content-center">
            <?php
            $no = 1;
            $data = mysqli_query($koneksi, "SELECT * FROM makanan");
            while ($d = mysqli_fetch_array($data)) {
            ?>
            <div class="col-md-4 mb-3">
                <div class="card">
                    <img src="img/<?php echo $d['foto']; ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $d['nama_menu']; ?></h5>
                        <p class="card-text">
                            <?php echo $d['keterangan'] . "<br>"; ?>
                            <?php echo "Porsi: " . $d['porsi'] . "<br>"; ?>
                            <?php echo "Harga: Rp " . number_format($d['harga'], 2, ',', '.'); ?>
                        </p>
                        <a href="#" class="btn btn-primary">Contact</a>
                    </div>
                </div>
            </div>
            <?php
            }
            ?>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer bg-dark text-light py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h5>Warung Pakde</h5>
                    <p>Angkringan adalah sebuah website yang menawarkan pengalaman menikmati makanan enak di restoran
                        favoritmu.</p>
                    <p>Angkringan@gmail.com</p>
                    <p>+62 89098762</p>
                    <p>Jln.jakut, jakarta timur</p>
                </div>
                <div class="col-md-3">
                    <h5>Mitra</h5>
                    <ul class="list-unstyled">
                        <li>Gojek</li>
                        <li>Grab</li>
                        <li>Paypal</li>
                        <li>Affilation</li>
                        <li>FAQs</li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5>Our Services</h5>
                    <ul class="list-unstyled">
                        <li>Online Order Food</li>
                        <li>Free Ongkir</li>
                        <li>Cash on Delivery</li>
                        <li>Wishlist</li>
                        <li>Discount</li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5>Our Newsletter</h5>
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
</body>

</html>