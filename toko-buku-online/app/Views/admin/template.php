<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?? 'Admin Toko Buku Online' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url() ?>css/style.css">
    <style>
      /* Sidebar styling */
      .sidebar {
        background-color: #343a40;
        color: white;
        position: fixed;
        top: 0;
        left: 0;
        width: 250px; /* Menetapkan lebar sidebar tetap */
        height: 100vh; /* Sidebar akan penuh tinggi layar */
        padding-top: 20px;
        border-radius: 0;
      }
      .sidebar .nav-link {
        color: #ccc;
        border-bottom: 1px solid #444;
      }
      .sidebar .nav-link:hover {
        background-color: #495057;
        color: white;
      }
      .sidebar h4 {
        color: #fff;
        font-size: 1.5rem;
      }
      .main-content {
        margin-left: 250px; /* Menyesuaikan ruang agar tidak tertutup oleh sidebar */
        padding-top: 20px;
      }
      .footer {
        background-color: #343a40;
        color: #ccc;
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        text-align: center;
        padding: 10px 0;
      }
      .footer a {
        color: #ccc;
        text-decoration: none;
      }
      .footer a:hover {
        text-decoration: underline;
      }
      .logout-btn {
        background-color: #dc3545;
        color: white;
        font-size: 1.1rem;
      }
      .logout-btn:hover {
        background-color: #c82333;
      }
    </style>
  </head>
  <body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-12 col-md-2 sidebar">
                <h4 class="text-center mb-4"><?= $header ?? 'Admin' ?></h4>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2">
                        <a href="<?= base_url('admin/dashboard') ?>" class="nav-link">Dashboard</a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="<?= base_url('admin/daftar-buku') ?>" class="nav-link">Daftar Buku</a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="<?= base_url('admin/transaksi') ?>" class="nav-link">Transaksi</a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="<?= base_url('admin/pelanggan') ?>" class="nav-link">Pelanggan</a>
                    </li>
                </ul>
                <a href="<?= base_url('logout') ?>" class="btn logout-btn mt-4 w-100">Logout</a>
            </div>

            <!-- Main Content -->
            <div class="col-12 col-md-10 p-4 main-content">
                <?= $this->renderSection('main') ?>
            </div>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <?= $footer ?? 'Copyright 2024. Toko Buku M. Reno Novriansyah. All Rights Reserved.' ?>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
