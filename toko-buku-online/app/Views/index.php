<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Toko Buku Online</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="<?=base_url() ?>css/style.css">
    <style>
      /* Menambahkan style untuk footer fixed */
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
      /* Menambahkan padding bawah pada body agar tidak tertutup footer */
      body {
        padding-bottom: 60px; /* Sesuaikan dengan tinggi footer */
      }
    </style>
  </head>
  <body>
    <header class="bg-secondary text-white py-3">
      <div class="container d-flex justify-content-between align-items-center">
        <h1 class="h3 mb-0">Toko Buku Online</h1>
        <div>
          <a href="<?= base_url() ?>logout" class="btn btn-light me-2">Logout</a>
          <a href="<?= base_url() ?>chart" class="btn btn-warning">
            Keranjang Belanja <span class="badge bg-danger"><?= count($items ?? []) ?></span>
          </a>
        </div>
      </div>
    </header>

    <main class="container my-5">
      <div class="row welcome-section align-items-center mb-5">
        <div class="col-md-6">
          <h2>Selamat datang di toko online</h2>
          <p>Kami menyediakan buku-buku dari berbagai penerbit. Temukan koleksi terbaik kami sekarang!</p>
          <a href="<?= base_url('lihat-produk') ?>" class="btn btn-success">Lihat Produk</a>
        </div>
        <div class="col-md-6">
          <h2>Cari Buku Favorit Anda</h2>
          <form action="" method="get">
            <div class="mb-3">
              <input type="text" class="form-control" name="judul" placeholder="Judul buku">
            </div>
            <div class="mb-3">
              <input type="text" class="form-control" name="pengarang" placeholder="Pengarang">
            </div>
            <div class="mb-3">
              <input type="text" class="form-control" name="penerbit" placeholder="Penerbit">
            </div>
            <button type="submit" class="btn btn-primary">Cari</button>
          </form>
        </div>
      </div>

      <section>
    <h2 class="mb-4">Best Seller</h2>
    <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4">
        <?php if (!empty($books)): ?>
            <?php foreach ($books as $buku): ?>
                <div class="col">
                    <div class="card h-100">
                        <img src="<?= base_url('file-image/' . $buku['cover']) ?>" class="card-img-top" alt="Cover Buku">
                        <div class="card-body">
                            <h5 class="card-title"><?= esc($buku['judul']) ?></h5>
                            <p class="card-text">Rp <?= number_format($buku['harga'], 0, ',', '.') ?>,-</p>
                            <form action="<?= base_url('admin/addToChart/' . $buku['id_buku']) ?>" method="post">
                                <?= csrf_field() ?>
                                <button type="submit" class="btn btn-primary">Add to Cart</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="text-center">Tidak ada buku yang ditemukan.</p>
        <?php endif; ?>
    </div>
</section>
    </main>

    <footer>
      <div class="container">
        <p class="mb-0">Copyright 2024. Toko Buku M. Reno Novriansyah. All Rights Reserved.</p>
      </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
