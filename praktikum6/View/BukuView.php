<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  </head>
  <body>
    
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Daftar Buku</h1>
                <div class="my-3">
                    <button data-bs-toggle="modal" data-bs-target="#tambahmodal" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Tambah</button>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Judul</th>
                            <th scope="col">Pengarang</th>
                            <th scope="col">Penerbit</th>
                            <th scope="col">Tahun</th>
                            <th scope="col">Ubah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($daftar_buku as $buku):?>
                        <tr>
                            <td><?= $buku->getId(); ?></td>
                            <td><?= $buku->getJudul(); ?></td>
                            <td><?= $buku->getPengarang(); ?></td>
                            <td><?= $buku->getPenerbit(); ?></td>
                            <td><?= $buku->getTahun(); ?></td>
                            <td>
                                <a href="/index.php/edit?id_buku=<?= $buku->getId(); ?>" class="btn btn-sm btn-success">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>
                                <button data-bs-toggle="modal" data-bs-target="#hapusModal" data-bs-id="<?= $buku->getId(); ?>" data-bs-judul="<?= $buku->getJudul(); ?>" class="btn btn-sm btn-danger">
                                    <i class="bi bi-trash"></i> Hapus
                                </button>
                            </td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
<!-- Modal Tambah -->
<div class="modal fade" id="tambahmodal" tabindex="-1" aria-labelledby="tambahmodalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <form id="formtambah" action="/index.php/simpan" method="POST">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="tambahmodalLabel">Tambah Buku</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="mb-3">
                <label for="judul">Judul</label>
                <input type="text" name="judul" id="judul" class="form-control">
            </div>
            <div class="mb-3">
                <label for="pengarang">Pengarang</label>
                <input type="text" name="pengarang" id="pengarang" class="form-control">
            </div>
            <div class="mb-3">
                <label for="penerbit">Penerbit</label>
                <input type="text" name="penerbit" id="penerbit" class="form-control">
            </div>
            <div class="mb-3">
                <label for="tahun">Tahun</label>
                <input type="text" name="tahun" id="tahun" class="form-control">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary"><i class="bi bi-floppy"></i> Simpan</button>
        </div>
        </form>
    </div>
  </div>
</div>

<!-- Modal Hapus -->
<div class="modal fade" id="hapusModal" tabindex="-1" aria-labelledby="hapusmodalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="hapusmodalLabel">Konfirmasi Hapus</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/index.php/hapus" id="formhapus" method="POST">
            <input type="hidden" name="id_buku" id="id_buku">
        </form>
        <p>Apakah Anda yakin ingin menghapus data <span id="judul-buku"></span> tersebut?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" form="formhapus" class="btn btn-danger">Hapus</button>
      </div>
    </div>
  </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script>
    const hapusmodal = document.getElementById('hapusmodal')
if (hapusmodal) {
  hapusmodal.addEventListener('show.bs.modal', event => {
    // Button that triggered the modal
    const button = event.relatedTarget
    // Extract info from data-bs-* attributes
    const id = button.getAttribute('data-bs-id')
    const judul = button.getAttribute('data-bs-judul')
    // If necessary, you could initiate an Ajax request here
    // and then do the updating in a callback.

    // Update the modal's content.
    const text_id = hapusmodal.querySelector('#id_buku')
    const text_judul = hapusmodal.querySelector('#judul-buku')

    text_id.value = id;
    text_judul.textContent = judul;
  })
}
  </script>
</body>
</html>