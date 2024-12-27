<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Keranjang Belanja - Toko Buku Online</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url() ?>css/style.css">
    <style>
      footer {
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
        background-color: #343a40;
        color: white;
        text-align: center;
        padding: 10px 0;
        z-index: 10;
      }
      body {
        padding-bottom: 60px; /* Menambahkan ruang bawah untuk footer */
      }
    </style>
  </head>
  <body>
    <div class="container mt-0">
      <!-- Header Keranjang Belanja -->
      <div class="row mb-3 bg-primary-subtle p-3 rounded">
        <div class="col">
          <h1 class="mb-0">Keranjang Belanja</h1>
        </div>
      </div>

      <!-- Keranjang Belanja Button -->
      <div class="row mb-4">
        <div class="col text-end">
          <a href="chart" class="btn btn-secondary">
            Keranjang Belanja
            <span class="badge text-bg-warning"><?= count($items ?? []) ?></span>
          </a>
        </div>
      </div>

      <!-- Daftar Buku di Keranjang -->
      <div class="row mb-4">
        <?php if (!empty($items)): ?>
          <?php foreach ($items as $index => $item): ?>
            <div class="col-12 mb-3">
              <div class="row p-3 bg-warning-subtle rounded g-3">
                <div class="col-4">
                  <img src="<?= base_url('file-images/' . $item['cover']) ?>" alt="<?= esc($item['judul']) ?>" class="img-fluid">
                </div>
                <div class="col-4 d-flex flex-column justify-content-center">
                  <h5><?= esc($item['judul']) ?></h5>
                  <p>Rp <?= number_format($item['harga'], 0, ',', '.') ?>,-</p>
                </div>
                <div class="col-1 d-flex flex-column justify-content-center ms-3">
                  <span><?= esc($item['jumlah']) ?></span>
                </div>
                <div class="col-2 d-flex flex-column justify-content-center">
                  <a href="<?= base_url('admin/chart/delete/' . $index) ?>" class="btn btn-danger">Hapus</a>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        <?php else: ?>
          <div class="col-12 text-center">
            <p>Keranjang belanja kosong.</p>
          </div>
        <?php endif; ?>
      </div>

      <!-- Total Harga dan Tombol -->
      <div class="row d-flex justify-content-end mb-5">
        <div class="col-auto">
          <h2>Total: Rp. <?= number_format($total ?? 0, 0, ',', '.') ?>,-</h2>
        </div>
        <div class="col-12 mt-3">
          <a href="<?= base_url() ?>" class="btn btn-secondary">Belanja Kembali</a>
          <a href="<?= base_url('checkout') ?>" class="btn btn-primary">Checkout</a>
        </div>
      </div>
    </div>

    <footer>
      <div class="container">
        <p class="mb-0">Copyright 2024. Toko Buku M. Reno Novriansyah. All Rights Reserved.</p>
      </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
