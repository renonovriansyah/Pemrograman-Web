<?= $this->extend('admin/template'); ?>

<?= $this->section('main'); ?>
<h2 class="mb-5">Tambah Pelanggan</h2>

<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger"><?= session()->getFlashdata('error'); ?></div>
<?php endif; ?>

<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
<?php endif; ?>

<form action="<?= base_url('admin/pelanggan/tambah') ?>" method="POST">
    <?= csrf_field(); ?>
    
    <div class="mb-3">
        <label for="nama" class="form-label">Nama Pelanggan</label>
        <input type="text" class="form-control" id="nama" name="nama" value="<?= old('nama'); ?>" required>
        <?php if (isset($errors['nama'])): ?>
            <div class="text-danger"><?= $errors['nama']; ?></div>
        <?php endif; ?>
    </div>

    <div class="mb-3">
        <label for="telepon" class="form-label">Nomor Telepon</label>
        <input type="text" class="form-control" id="telepon" name="telepon" value="<?= old('telepon'); ?>" required>
        <?php if (isset($errors['telepon'])): ?>
            <div class="text-danger"><?= $errors['telepon']; ?></div>
        <?php endif; ?>
    </div>

    <div class="mb-3">
        <label for="alamat" class="form-label">Alamat</label>
        <textarea class="form-control" id="alamat" name="alamat" required><?= old('alamat'); ?></textarea>
        <?php if (isset($errors['alamat'])): ?>
            <div class="text-danger"><?= $errors['alamat']; ?></div>
        <?php endif; ?>
    </div>

    <button type="submit" class="btn btn-primary">Tambah Pelanggan</button>
    <a href="<?= base_url('admin/pelanggan'); ?>" class="btn btn-secondary">Batal</a>
</form>

<?= $this->endSection(); ?>
