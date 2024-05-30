<div class="container">
    <div class="card" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title"><?= $data['gudang']['nama_gudang']; ?></h5>
        <h6 class="card-subtitle mb-2 text-body-secondary"><?= $data['gudang']['kapasitas']; ?></h6>
        <p class="card-text"><?= $data['gudang']['lokasi']; ?></p>
        <a href="<?= BASEURL; ?>/gudang" class="card-link">
            <span class="badge text-bg-primary">Kembali</span>
        </a>
    </div>
    </div>
</div>