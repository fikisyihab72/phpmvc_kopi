<div class="container mt-3">

    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::flash(); ?>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-lg-6">
            <button type="button" class="btn btn-primary tombolTambahData" data-bs-toggle="modal" data-bs-target="#formModal">
                Tambah Data Kopi
            </button>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <form action="<?= BASEURL; ?>/mahasiswa/cari" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari kopi..." name="keyword" id="keyword" autocomplete="off">
                    <button class="btn btn-primary" type="submit" id="tombolCari">Cari</button>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">

            <h3>Daftar Kopi</h3>
            <ul class="list-group">
                <?php foreach ($data['mhs'] as $mhs) : ?>
                    <li class="list-group-item">
                        <?= $mhs['nama_kopi']; ?>
                        <a href="<?= BASEURL; ?>/mahasiswa/hapus/<?= $mhs['id_kopi']; ?>" class="badge text-bg-danger float-end p-2" onclick="return confirm('Anda yakin ingin hapus data?');">Hapus</a>
                        <a href="<?= BASEURL; ?>/mahasiswa/update/<?= $mhs['id_kopi']; ?>" class="badge text-bg-success float-end p-2 me-2 tampilModalUpdate" data-bs-toggle="modal" data-bs-target="#formModal" data-id_kopi="<?= $mhs['id_kopi']; ?>">Update</a>
                        <a href="<?= BASEURL; ?>/mahasiswa/detail/<?= $mhs['id_kopi']; ?>" class="badge text-bg-primary float-end p-2 me-2">Detail</a>
                        
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>

    </div>

</div>

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="judulModal">Tambah Data Kopi</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
        <form action="<?= BASEURL; ?>/mahasiswa/tambah" method="post" enctype='multipart/form-data'>
            <input type="hidden" name="id_kopi" id="id_kopi" >
            <div class="mb-3">
                <label for="nama_kopi" class="form-label">Nama Kopi</label>
                <input type="text" class="form-control" id="nama_kopi" name="nama_kopi" placeholder="Masukkan nama...">
            </div>

            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Deskripsi...">
            </div>

            <div class="mb-3">
                <label for="harga_kopi" class="form-label">Harga Kopi</label>
                <input type="number" class="form-control" id="harga_kopi" name="harga_kopi" placeholder="Masukkan angka...">
            </div>

            <div class="mb-3">
                <!-- <label for="gambar_kopi" class="form-label">Gambar Kopi</label> -->
                <label for="gambar_kopi" class="form-label">Unggah Gambar</label>
                <input class="form-control" type="file" id="gambar_kopi" name="gambar_kopi" accept="image/*">
            </div>
            <div class="mb-3">
                <img id="image-preview" src="" alt="Image Preview">
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Tambah Data</button>
        </form>
      </div>
    </div>
  </div>
</div>
