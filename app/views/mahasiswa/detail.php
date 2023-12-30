<div class="container mt-5">

    <div class="card" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title"><?= $data['mhs']['nama_kopi']; ?></h5>
        <h6 class="card-subtitle mb-2 text-body-secondary"><?= $data['mhs']['harga_kopi']; ?></h6>
        <p class="card-text"><?= $data['mhs']['deskripsi']; ?></p>
        <p class="card-text"><?= $data['mhs']['gambar_kopi']; ?></p>
        <a href="<?= BASEURL; ?>/mahasiswa" class="card-link">Kembali</a>
    </div>
    </div>



</div>