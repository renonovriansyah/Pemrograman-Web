<?php // View: Hapus Buku ?>

<?= $this->extend('admin/template'); ?>

<?= $this->section('main'); ?>
<h2 class="mb-5">Hapus Buku</h2>

<div class="w-50">
    <p>Apakah Anda yakin ingin menghapus buku berikut?</p>
    <ul>
        <li><strong>Judul:</strong> <?= $buku['judul']; ?></li>
        <li><strong>Pengarang:</strong> <?= $buku['pengarang']; ?></li>
        <li><strong>Penerbit:</strong> <?= $buku['penerbit']; ?></li>
        <li><strong>Tahun:</strong> <?= $buku['tahun']; ?></li>
        <li><strong>Harga:</strong> <?= $buku['harga']; ?></li>
    </ul>

    <form action="<?= base_url('admin/daftar-buku/hapus/' . $buku['id_buku']) ?>" method="POST">
        <?= csrf_field(); ?>
        <a href="<?= base_url('admin/daftar-buku'); ?>" class="btn btn-secondary">Batal</a>
        <button type="submit" class="btn btn-danger">Hapus</button>
    </form>
</div>

<?= $this->endSection(); ?>
