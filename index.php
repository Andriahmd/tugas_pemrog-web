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
        position: relative;
    }

    .badge-position {
        position: absolute;
        top: 10px;
        left: 10px;
        background-color: #00c853;
        color: white;
        padding: 5px;
        border-radius: 5px;
        font-size: 12px;
    }

    .reviews-badge {
        position: absolute;
        bottom: 10px;
        right: 10px;
        background-color: rgba(0, 0, 0, 0.6);
        color: white;
        padding: 5px;
        border-radius: 5px;
        font-size: 12px;
    }

    .card {
        height: 100%;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .card-body {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        padding: 15px;
    }

    .card-title {
        margin-bottom: 0.5rem;
    }

    .card-text {
        margin-bottom: 1rem;
    }

    .btn-order {
        color: #00c853;
        border-color: #00c853;
    }

    .btn-order:hover {
        background-color: #00c853;
        color: white;
    }

    .star-rating {
        color: #ffc107;
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
$max_display = 3; // Maximum number of items to display
$displayed_count = 0;

while ($d = mysqli_fetch_array($data)) {
    if ($displayed_count >= $max_display) {
        break; // Exit the loop if the displayed count reaches the maximum
    }

    $rating = 4.5; // Example rating value
    $fullStars = floor($rating);
    $halfStars = ceil($rating - $fullStars);
    $emptyStars = 5 - $fullStars - $halfStars;
    $displayed_count++;
?>
            <div class="col-md-4 mb-3">
                <div class="card shadow-lg">
                    <div class="position-relative">
                        <img src="img/<?php echo htmlspecialchars($d['foto']); ?>" class="card-img-top" alt="...">
                        <div class="badge-position">150m</div>
                        <div class="reviews-badge">367 REVIEWS</div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-xl font-semibold"><?php echo htmlspecialchars($d['nama_menu']); ?>
                        </h5>
                        <p class="card-text">
                            <?php echo htmlspecialchars($d['keterangan']) . "<br>"; ?>
                            <?php echo "Porsi: " . htmlspecialchars($d['porsi']) . "<br>"; ?>
                            <?php echo "Harga: Rp " . number_format($d['harga'], 2, ',', '.'); ?>
                        </p>
                        <div class="star-rating mb-2">
                            <?php
                    for ($i = 0; $i < $fullStars; $i++) {
                        echo '<i class="fas fa-star"></i>';
                    }
                    for ($i = 0; $i < $halfStars; $i++) {
                        echo '<i class="fas fa-star-half-alt"></i>';
                    }
                    for ($i = 0; $i < $emptyStars; $i++) {
                        echo '<i class="far fa-star"></i>';
                    }
                    ?>
                        </div>
                        <button class="btn btn-outline-success btn-order" onclick="location.href='order_user.php'">Order
                            Now</button>
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