<?= $this->extend('admin/template'); ?>

<?= $this->section('main'); ?>
<h2 class="mb-4">Daftar Buku</h2>

<?php if (session('sukses')): ?>
    <div class="alert alert-success">
        <strong>Berhasil!</strong> <?= session('sukses'); ?>
    </div>
<?php endif; ?>

<?php if (session('error')): ?>
    <div class="alert alert-danger">
        <strong>Gagal!</strong> <?= session('error'); ?>
    </div>
<?php endif; ?>

<div class="mb-3">
    <a href="<?= base_url('admin/daftar-buku/tambah') ?>" class="btn btn-primary">
        <i class="bi bi-plus-lg"></i> Tambah Buku
    </a>
</div>

<div class="table-responsive mb-4">
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
                <th scope="col">Aksi</th>
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
                    <td>
                        <a href="<?= base_url('admin/daftar-buku/edit/') . $buku['id_buku'] ?>" 
                           class="btn btn-success btn-sm mb-1">
                            <i class="bi bi-pencil-square"></i> Edit
                        </a>
                        <a href="<?= base_url('admin/daftar-buku/hapus/') . $buku['id_buku'] ?>" 
                           class="btn btn-danger btn-sm mb-1" 
                           onclick="return confirm('Apakah Anda yakin ingin menghapus buku ini?')">
                            <i class="bi bi-trash"></i> Hapus
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection(); ?>
