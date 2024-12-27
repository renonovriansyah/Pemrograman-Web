<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <header class="bg-secondary text-white py-3">
        <div class="container text-center">
            <h1 class="h3">Daftar Buku</h1>
        </div>
    </header>

    <main class="container my-5">
        <div class="table-responsive">
            <table class="table table-striped align-middle">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Judul Buku</th>
                        <th scope="col">Pengarang</th>
                        <th scope="col">Penerbit</th>
                        <th scope="col">Tahun</th>
                        <th scope="col">Cover</th>
                        <th scope="col">Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($books as $buku): ?>
                        <tr>
                            <th scope="row"><?= $buku['id_buku'] ?></th>
                            <td><?= esc($buku['judul']) ?></td>
                            <td><?= esc($buku['pengarang']) ?></td>
                            <td><?= esc($buku['penerbit']) ?></td>
                            <td><?= esc($buku['tahun']) ?></td>
                            <td>
                                <?php if (!empty($buku['cover'])): ?>
                                    <img src="<?= base_url('uploads/' . $buku['cover']) ?>" 
                                         alt="Cover buku <?= esc($buku['judul']) ?>" 
                                         class="img-thumbnail" style="width: 50px; height: auto;">
                                <?php else: ?>
                                    <span>Cover tidak tersedia</span>
                                <?php endif; ?>
                            </td>
                            <td>Rp <?= number_format($buku['harga'], 0, ',', '.') ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </main>

    <footer class="bg-dark text-white text-center py-3">
        <p class="mb-0">Copyright 2024. Toko Buku M. Reno Novriansyah. All Rights Reserved.</p>
    </footer>
</body>
</html>
