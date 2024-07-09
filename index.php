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
</head>

<body>
    <?php include 'navbar.php'; ?>

    <!-- Hero Section -->
    <div class="hero-section">
        <h1>E-Cetring Website</h1>
        <p>Makan enak nggak perlu capek</p>
    </div>

    <!-- Best Seller Section -->
    <div class="container best-seller-section">
        <h2>Best Seller in this Month</h2>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="./img/paket 1.jpeg" class="card-img-top" alt="Paket Promo 1"
                        onclick="location.href='pembelian.php'">
                    <div class="card-body text-center">
                        <h5 class="card-title">Paket Promo 1</h5>
                        <p class="card-text">2 ayam + nasi + free minuman pink lava</p>
                        <div class="rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                            <span>4.0</span>
                        </div>
                        <p class="card-text">Rp.45000.00</p>
                        <button class="btn btn-outline-success" onclick="location.href='pembelian.php'">Order
                            Now</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="./img/paket2.jpeg" class="card-img-top" alt="Double Cheeseburger"
                        onclick="location.href='promo2.php'">
                    <div class="card-body text-center">
                        <h5 class="card-title">Double Cheeseburger</h5>
                        <p class="card-text">In delicious double cheese burger is good</p>
                        <div class="rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            <i class="far fa-star"></i>
                            <span>3.5</span>
                        </div>
                        <p class="card-text">Rp.70000.00</p>
                        <button class="btn btn-outline-success" onclick="location.href='promo2.php'">Order Now</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="./img/paket 3.jpeg" class="card-img-top" alt="Chicken Katsu"
                        onclick="location.href='promo3.php'">
                    <div class="card-body text-center">
                        <h5 class="card-title">Chicken Katsu</h5>
                        <p class="card-text">ayam tepung dengan bumbu special</p>
                        <div class="rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <span>5.0</span>
                        </div>
                        <p class="card-text">Rp.50000.00</p>
                        <button class="btn btn-outline-success" onclick="location.href='promo3.php'">Order Now</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>