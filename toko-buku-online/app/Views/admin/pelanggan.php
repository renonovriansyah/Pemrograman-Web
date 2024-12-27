<?= $this->extend('admin/template'); ?>

<?= $this->section('main'); ?>
<h2 class="mb-4">Pelanggan</h2>
<div class="mb-5">
<a href="<?= base_url('admin/pelanggan/tambah'); ?>" class="btn btn-primary mb-3">Tambah Pelanggan</a>
    <table class="table table-stripped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">No. Hp</th>
                <th scope="col">Alamat</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($pelanggan) && is_array($pelanggan)): ?>
                <?php foreach ($pelanggan as $index => $p): ?>
                    <tr>
                        <th scope="row"><?= $index + 1; ?></th>
                        <td><?= esc($p['nama']); ?></td>
                        <td><?= esc($p['telepon']); ?></td>
                        <td><?= esc($p['alamat']); ?></td>
                        <td>
                            <a href="<?= base_url('admin/pelanggan/hapus/' . $p['id_pelanggan']) ?>" 
                               class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" class="text-center">Tidak ada data pelanggan.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection(); ?>
