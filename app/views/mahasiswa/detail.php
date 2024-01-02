<div class="container mt-5">
    <h3>Detail kopi:</h3>
    <div class="card" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title"><?= $data['mhs']['nama_kopi']; ?></h5>
        <h6 class="card-subtitle mb-2 text-body-secondary"><?= $data['mhs']['harga_kopi']; ?></h6>
        <p class="card-text"><?= $data['mhs']['deskripsi']; ?></p>
        <img src="<?= "../../".$data['mhs']['gambar_kopi']; ?>" style="border: 1px solid #000; max-width:250px; max-height:250px;">
        <br>
        <button type="button" class="btn btn-outline-info" onclick="location.href = '<?= BASEURL; ?>/mahasiswa';">Kembali</button>
    </div>
    </div>



</div>