<?= $this->extend('admin/template'); ?>

<?= $this->section('main'); ?>
<h2 class="mb-5">Transaksi</h2>

<div class="">
    <table class="table table-stripped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Pelanggan</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Total</th>
                <th scope="col">Status</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($transaksi)): ?>
                <?php foreach ($transaksi as $index => $item): ?>
                    <tr>
                        <th scope="row"><?= $index + 1; ?></th>
                        <td><?= esc($item['id_pelanggan']); // Ubah ini jika Anda ingin nama pelanggan ?></td>
                        <td><?= date('d M Y H:i', strtotime($item['tanggal'])); ?> WIB</td>
                        <td>Rp.<?= number_format($item['total'], 0, ',', '.'); ?></td>
                        <td>
                            <span class="badge 
                                <?= $item['status'] === 'Pending' ? 'bg-warning' : 'bg-success'; ?>">
                                <?= esc($item['status']); ?>
                            </span>
                        </td>
                        <td>
                            <a href="<?= base_url('admin/transaksi/ubahstatus/' . $item['id_transaksi']); ?>" class="btn btn-success">Ubah Status</a>
                            <a href="<?= base_url('admin/transaksi/hapus/' . $item['id_transaksi']); ?>" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6" class="text-center">Tidak ada transaksi tersedia.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection(); ?>
