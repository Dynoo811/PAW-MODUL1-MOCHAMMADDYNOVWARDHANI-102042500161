<?php

$products = [
    [
        'nama' => 'MacBook Air 13" M2 (8-Core CPU / 8-Core GPU / 256GB)',
        'kategori' => 'MACBOOK AIR',
        'harga' => 15999000,
        'stok' => 10,
        'gambar' => 'https://images.unsplash.com/photo-1611186871348-b1ce696e52c9?q=80&w=600&auto=format&fit=crop'
    ],
    [
        'nama' => 'MacBook Air 15" M3 (8-Core CPU / 10-Core GPU / 512GB)',
        'kategori' => 'MACBOOK AIR',
        'harga' => 21499000,
        'stok' => 5,
        'gambar' => 'https://images.unsplash.com/photo-1517336714731-489689fd1ca8?q=80&w=600&auto=format&fit=crop'
    ],
    [
        'nama' => 'MacBook Pro 14" M3 (8-Core CPU / 10-Core GPU / 512GB)',
        'kategori' => 'MACBOOK PRO',
        'harga' => 25999000,
        'stok' => 8,
        'gambar' => 'https://images.unsplash.com/photo-1541807084-5c52b6b3adef?q=80&w=600&auto=format&fit=crop'
    ],
    [
        'nama' => 'MacBook Pro 14" M3 Pro (11-Core CPU / 14-Core GPU / 18GB)',
        'kategori' => 'MACBOOK PRO',
        'harga' => 32999000,
        'stok' => 3,
        'gambar' => 'https://images.unsplash.com/photo-1629131726692-1accd0c53ce0?q=80&w=600&auto=format&fit=crop'
    ],
    [
        'nama' => 'MacBook Pro 16" M3 Pro (12-Core CPU / 18-Core GPU / 36GB)',
        'kategori' => 'MACBOOK PRO',
        'harga' => 44999000,
        'stok' => 2,
        'gambar' => 'https://images.unsplash.com/photo-1517336714731-489689fd1ca8?q=80&w=600&auto=format&fit=crop'
    ],
    [
        'nama' => 'MacBook Pro 16" M3 Max (16-Core CPU / 40-Core GPU / 48GB)',
        'kategori' => 'MACBOOK PRO',
        'harga' => 59999000,
        'stok' => 0,
        'gambar' => 'https://images.unsplash.com/photo-1611186871348-b1ce696e52c9?q=80&w=600&auto=format&fit=crop'
    ]
];


$total_produk = count($products);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nino Store - Apple MacBook Series</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    
    <header>
        <div class="logo">Nino Store</div>
        <nav>
            <a href="#">Home</a>
            <a href="#katalog">MacBook Lineup</a>
            <a href="#">Specs</a>
            <a href="#">Support</a>
        </nav>
    </header>

    <div class="container">
        
        <section class="hero">
            <span>NINO STORE</span>
            <h1>MacBook</h1>
            <p>Performa luar biasa, daya tahan baterai sepanjang hari, dan desain ultra tipis. Temukan MacBook idamanmu.</p>
            <a href="#katalog" class="btn-hero">Eksplorasi Model</a>
        </section>

        
        <div class="catalog-header" id="katalog">
            <div class="title-group">
                <span>LINEUP SELECTION</span>
                <h2>Pilih MacBook Anda</h2>
            </div>
            <div class="total-badge">
                Total Varian: <?php echo $total_produk; ?>
            </div>
        </div>

        
        <div class="product-grid">
            <?php foreach ($products as $product): ?>
                <?php
                    $harga_normal = $product['harga'];
                    $diskon_persen = 0;
                    $harga_akhir = $harga_normal;

                    
                    if ($harga_normal >= 30000000) {
                        $diskon_persen = 10;
                        $harga_akhir = $harga_normal - ($harga_normal * ($diskon_persen / 100));
                    }

                    
                    $is_available = $product['stok'] > 0;
                ?>

                <div class="card">
                    <div>
                        
                        <div class="card-image-wrapper">
                            <img src="<?php echo $product['gambar']; ?>" alt="<?php echo $product['nama']; ?>" class="product-img">
                        </div>

                        <div class="card-header">
                            <span><?php echo $product['kategori']; ?></span>
                            <?php if ($diskon_persen > 0): ?>
                                <span class="discount-tag">HEMAT <?php echo $diskon_persen; ?>%</span>
                            <?php endif; ?>
                        </div>

                        <div class="card-title"><?php echo $product['nama']; ?></div>

                        <div class="price-section">
                            <?php if ($diskon_persen > 0): ?>
                                <div class="original-price">Rp<?php echo number_format($harga_normal, 0, ',', '.'); ?></div>
                            <?php endif; ?>
                            <div class="final-price">Rp<?php echo number_format($harga_akhir, 0, ',', '.'); ?></div>
                        </div>
                    </div>

                    <div>
                        <div class="stock-section">
                            <span>Stok: <?php echo $product['stok']; ?> unit</span>
                            <?php if ($is_available): ?>
                                <span class="badge-tersedia">Tersedia</span>
                            <?php else: ?>
                                <span class="badge-habis">Stok Habis</span>
                            <?php endif; ?>
                        </div>

                        <?php if ($is_available): ?>
                            <button class="btn-buy">Beli Sekarang</button>
                        <?php else: ?>
                            <button class="btn-buy" disabled>Stok Habis</button>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    
    <footer>
        &copy; <?php echo date('Y'); ?> Nino Store. All rights reserved. Apple & MacBook are trademarks of Apple Inc.
    </footer>

</body>
</html>