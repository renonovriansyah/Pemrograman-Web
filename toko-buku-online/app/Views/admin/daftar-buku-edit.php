<?= $this->extend('admin/template'); ?>

<?= $this->section('main'); ?>
<h2 class="mb-5">Edit Buku</h2>

<div class="w-50">
    <form action="<?= base_url('admin/daftar-buku/update/' . $buku['id_buku']); ?>" method="POST" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        
        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" name="judul" id="judul" class="form-control" value="<?= esc($buku['judul']); ?>" required>
        </div>
        
        <div class="mb-3">
            <label for="pengarang" class="form-label">Pengarang</label>
            <input type="text" name="pengarang" id="pengarang" class="form-control" value="<?= esc($buku['pengarang']); ?>" required>
        </div>
        
        <div class="mb-3">
            <label for="penerbit" class="form-label">Penerbit</label>
            <input type="text" name="penerbit" id="penerbit" class="form-control" value="<?= esc($buku['penerbit']); ?>" required>
        </div>
        
        <div class="mb-3">
            <label for="tahun" class="form-label">Tahun</label>
            <input type="number" name="tahun" id="tahun" class="form-control" value="<?= esc($buku['tahun']); ?>" required>
        </div>
        
        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" name="harga" id="harga" class="form-control" value="<?= esc($buku['harga']); ?>" required>
        </div>
        
        <div class="mb-3">
            <label for="cover" class="form-label">Cover Buku</label>
            <input type="file" name="cover" id="cover" class="form-control">
            <?php if (!empty($buku['cover'])): ?>
                <small>File saat ini: <?= esc($buku['cover']); ?></small>
            <?php endif; ?>
        </div>

        <a href="<?= base_url('admin/daftar-buku'); ?>" class="btn btn-secondary">Batal</a>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>

<?= $this->endSection(); ?>
