<div>
    <div>
        <div>
            <h3>Daftar Gudang</h3>
            <?php foreach( $data['gudang'] as $gudang ) : ?>
                <ul>
                    <li><?= $gudang['nama_gudang']; ?></li>
                    <li><?= $gudang['kapasitas']; ?></li>
                    <li><?= $gudang['lokasi']; ?></li>
                </ul>
            <?php endforeach; ?>
        </div>
    </div>
</div>