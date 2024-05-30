<div class="container-xl">
    <div class="row">
        <div class="col-3">
            <h3>Daftar Gudang</h3>
            <ul class="list-group">
                    <?php foreach( $data['gudang'] as $gudang ) : ?>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <?= $gudang['nama_gudang']; ?>
                            <a href="<?= BASEURL; ?>/gudang/detail/<?= $gudang['id_gudang']; ?>">
                                <span class="badge text-bg-primary">detail</span>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
        </div>
    </div>
</div>