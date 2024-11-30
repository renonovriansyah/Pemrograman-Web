<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Toko Buku Online</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="<?=base_url() ?>css/style.css">
  </head>
  <body>

    <div class="container">
        <div class="row mb-5">
            <div class="col-12 text-end">
                <a href="<?=base_url() ?>chart" class="btn btn-info">Keranjang belanja <span class="badge text-bg-warning">4</span></a>
            </div>
        </div>
        <div class="row welcome-section mb-5">
          <div class="col-6">
                <h1>Selamat datang di toko online</h1>
                <p>Kami menyediakan buku-buku dari berbagai penerbit </p>
                <a href="#" class="btn btn-success">Lihat Produk</a>
          </div>
          <div class="col-6">
            <h1>Temukan buku favorit anda</h1>
            <Form action="">
            <div class="mb-3">
                <input type="text" class="form-control" placeholder="Judul buku">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" placeholder="Pengarang">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" placeholder="Penerbit">
            </div>
            <div class="mb-3">
            <button class="btn btn-primary">Cari</button>
          </div>  
        </form>
        </div>
    </div>

    <h2>Buku Best Seller</h2>
    <div class="row mb-5 g-3">
        <div class="col-3">
            <div class="card">
                <img src="<?=base_url() ?>images/buku1.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Setiap Pebisnis Harus Punya Buku Ini</h5>
                  <p class="card-text">85,000,-</p>
                  <a href="#" class="btn btn-primary">Add to chart</a>
                </div>
              </div>
        </div>
        <div class="col-3">
            <div class="card">
                <img src="<?=base_url() ?>images/buku1.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Setiap Pebisnis Harus Punya Buku Ini</h5>
                  <p class="card-text">85,000,-</p>
                  <a href="#" class="btn btn-primary">Add to chart</a>
                </div>
              </div>
        </div>
        <div class="col-3">
            <div class="card">
                <img src="<?=base_url() ?>images/buku1.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Setiap Pebisnis Harus Punya Buku Ini</h5>
                  <p class="card-text">85,000,-</p>
                  <a href="#" class="btn btn-primary">Add to chart</a>
                </div>
              </div>
        </div>
        <div class="col-3">
            <div class="card">
                <img src="<?=base_url() ?>images/buku1.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Setiap Pebisnis Harus Punya Buku Ini</h5>
                  <p class="card-text">85,000,-</p>
                  <a href="#" class="btn btn-primary">Add to chart</a>
                </div>
              </div>
        </div>
        <div class="col-3">
            <div class="card">
                <img src="<?=base_url() ?>images/buku1.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Setiap Pebisnis Harus Punya Buku Ini</h5>
                  <p class="card-text">85,000,-</p>
                  <a href="#" class="btn btn-primary">Add to chart</a>
                </div>
              </div>
        </div>
        <div class="col-3">
            <div class="card">
                <img src="<?=base_url() ?>images/buku1.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Setiap Pebisnis Harus Punya Buku Ini</h5>
                  <p class="card-text">85,000,-</p>
                  <a href="#" class="btn btn-primary">Add to chart</a>
                </div>
              </div>
        </div>
        <div class="col-3">
            <div class="card">
                <img src="<?=base_url() ?>images/buku1.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Setiap Pebisnis Harus Punya Buku Ini</h5>
                  <p class="card-text">85,000,-</p>
                  <a href="#" class="btn btn-primary">Add to chart</a>
                </div>
              </div>
        </div>
        <div class="col-3">
            <div class="card">
                <img src="<?=base_url() ?>images/buku1.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Setiap Pebisnis Harus Punya Buku Ini</h5>
                  <p class="card-text">85,000,-</p>
                  <a href="#" class="btn btn-primary">Add to chart</a>
                </div>
              </div>
        </div>
    </div>

    <footer class="footer py-3">
        <div class="Container ">
        Copyright 2024. Toko buku online kelas B. All Rights reserved
        </div> 
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>