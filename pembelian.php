<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Richeese Factory</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/pesan.css">

    <!-- FontAwesome for star icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <?php include 'navbar.php'; ?>
    <div class="container">
        <div class="header">

            <h1>Website E-Cetring</h1>
            <p>Menyediakan berbagai jenis pilihan cetring</p>
            <p>Min Rp. 30,000 &bull; 60-80 min &bull; 5.0</p>
        </div>

        <div class="main row">
            <div class="col-md-8 order-card">

                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="./img/paket 1.jpeg" class="img-fluid rounded-start" alt="Paket Promo 1">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h2>POPULAR ORDERS Delicious hot food!</h2>
                                <h5 class="card-title">Paket Promo 1</h5>
                                <p class="card-text">2 ayam + nasi + free minuman pink lava</p>
                                <p class="card-text"><strong>Rp. 45,000.00</strong></p>
                                <form method="post" action="">
                                    <label for="quantity">Jumlah Porsi :</label>
                                    <input type="number" id="quantity" name="quantity" value="1" min="1">
                                    <input type="hidden" name="price" value="45000">
                                    <button type="submit" name="add_to_cart" class="btn btn-success">Add to
                                        Cart</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 shopping-cart">
                <h2>Your Shopping Cart</h2>
                <?php
                $total = 0;
                if (isset($_POST['add_to_cart'])) {
                    $quantity = intval($_POST['quantity']);
                    $price = intval($_POST['price']);
                    $total = $quantity * $price;
                }
                ?>
                <p>TOTAL</p>
                <p class="total-amount">Rp. <?php echo number_format($total, 2, ',', '.'); ?></p>
                <p>Free Shipping</p>
                <button type="button" class="btn btn-success">Checkout</button>
            </div>
        </div>
    </div>

    <div class="footer">
        <div class="footer-container">
            <div class="col-md-3">
                <h5>Warung Pakde</h5>
                <p>Angkringan adalah sebuah website yang menawarkan pengalaman menikmati makanan enak di restoran
                    favoritmu.</p>
                <p>Email: angkringan@gmail.com</p>
                <p>Phone: +62 89098762</p>
                <p>Alamat: Jln. Jakut, Jakarta Timur</p>
            </div>
            <div class="col-md-3">
                <h5>Mitra</h5>
                <ul class="list-unstyled">
                    <li>Gojek</li>
                    <li>Grab</li>
                    <li>Paypal</li>
                    <li>Affiliation</li>
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
            <div class="col-md-3 newsletter-form">
                <h5>Our Newsletter</h5>
                <form>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="name" placeholder="Name">
                    </div>
                    <div class="mb-3">
                        <input type="email" class="form-control" name="email" placeholder="Email">
                    </div>
                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>