<?php

$products = [
    [
        "nama"     => "Laptop Productivity",
        "kategori" => "Laptop",
        "harga"    => 8500000,
        "stok"     => 3
    ],
    [
        "nama"     => "Monitor 24 Inch",
        "kategori" => "Monitor",
        "harga"    => 1800000,
        "stok"     => 4
    ],
    [
        "nama"     => "Mechanical Keyboard",
        "kategori" => "Accessories",
        "harga"    => 750000,
        "stok"     => 7
    ],
    [
        "nama"     => "Wireless Mouse",
        "kategori" => "Accessories",
        "harga"    => 250000,
        "stok"     => 0 =-=
    ],
    [
        "nama"     => "USB-C Hub Multiport",
        "kategori" => "Accessories",
        "harga"    => 350000,
        "stok"     => 12
    ],
    [
        "nama"     => "External SSD 1TB",
        "kategori" => "Storage",
        "harga"    => 1400000,
        "stok"     => 0
    ]
];


function formatRupiah($angka) {
    return "Rp" . number_format($angka, 0, ',', '.');
}


$totalProduk = count($products);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cia Store - Simple Tech Store</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    
    <header class="header">
        <nav class="navbar">
            <a href="#" class="logo">Cia Store</a>
            <ul class="nav-links">
                <li><a href="#">Home</a></li>
                <li><a href="#products">Products</a></li>
                <li><a href="#about">About</a></li>
            </ul>
        </nav>
    </header>

    <main class="container">
 
        <section class="hero">
            <h1>Simple Tech Store.</h1>
            <p>Temukan berbagai perangkat dan aksesoris teknologi untuk kebutuhanmu.</p>
            <a href="#products" class="btn-hero">Lihat Produk</a>
        </section>

    
        <section id="products" class="catalog-section">
            <div class="catalog-header">
                <div>
                    <span class="sub-title">OUR PRODUCTS</span>
                    <h2>Katalog Produk</h2>
                </div>
             
                <div class="product-count">
                    Total Produk: <strong><?= $totalProduk; ?></strong>
                </div>
            </div>

     
            <div class="product-grid">
                <?php foreach ($products as $item): ?>
                    <?php 
                     
                        $isAvailable = $item['stok'] > 0;
                        
                        
                        $hasDiscount = $item['harga'] >= 1000000;
                        $finalPrice = $hasDiscount ? $item['harga'] * 0.90 : $item['harga'];
                    ?>
                    <article class="product-card <?= !$isAvailable ? 'out-of-stock-card' : ''; ?>">
                        <div class="card-header">
                            <span class="category-badge">
                                <?= strtoupper($item['kategori']); ?>
                                <?= $hasDiscount ? ' &bull; DISKON 10%' : ''; ?>
                            </span>
                            <span class="status-badge <?= $isAvailable ? 'available' : 'unavailable'; ?>">
                                <?= $isAvailable ? 'Tersedia' : 'Stok Habis'; ?>
                            </span>
                        </div>

                        <h3 class="product-title"><?= htmlspecialchars($item['nama']); ?></h3>
                        
                        <div class="price-container">
                            <?php if ($hasDiscount): ?>
                                <span class="old-price"><?= formatRupiah($item['harga']); ?></span>
                                <span class="current-price discount"><?= formatRupiah($finalPrice); ?></span>
                            <?php else: ?>
                                <span class="current-price"><?= formatRupiah($item['harga']); ?></span>
                            <?php endif; ?>
                        </div>

                        <p class="stock-info">Stok: <strong><?= $item['stok']; ?></strong></p>

                      
                        <div class="card-action">
                            <?php if ($isAvailable): ?>
                                <button type="button" class="btn-buy">Beli Sekarang</button>
                            <?php else: ?>
                                <button type="button" class="btn-buy disabled" disabled>Stok Habis</button>
                            <?php endif; ?>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </section>
    </main>


    <footer id="about" class="footer">
        <p>&copy; <?= date("Y"); ?> Cia Store. All rights reserved.</p>
    </footer>

</body>
</html>