<?php Flasher::flash(); ?> 
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="m-1">Verifikasi Hasil Panen</h2>
        <button type="button" class="btn btn-primary tombolTambahDataPanen" data-toggle="modal" data-target="#formPanen">Tambah</button>
    </div>
    <div>
        <table class="table">
            <thead >
                <tr class="kop">
                    <th>Tanggal Panen</th>
                    <th>Jumlah (kg)</th>
                    <th>Jenis Buah</th>
                    <th>Wilayah</th>
                    <th>Nama Gudang</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach( $data['panen'] as $panen ) : ?>
                <tr class="isitabel">
                    <td>
                        <?= $panen['tanggal']; ?>
                    </td>
                    <td>
                        <?= $panen['jumlah']; ?>
                    </td>
                    <td>
                        <?= $panen['nama_jenis']; ?>
                    </td>
                    <td>
                        <?= $panen['nama_wilayah']; ?>
                    </td>
                    <td>
                        <?= $panen['nama_gudang']; ?>
                    </td>
                    <td>
                        <a href="<?= BASEURL; ?>/verifikasi/setuju/<?= $panen['id_panen']; ?>"
                            class="btn btn-danger btn-sm btntabelse7" data-id="<?= $panen['id_panen']; ?>">
                            Setujui
                        </a>
                        <a href="<?= BASEURL; ?>/verifikasi/tolak/<?= $panen['id_panen']; ?>"
                            class="btn btn-danger btn-sm btntabelX" data-id="<?= $panen['id_panen']; ?>">
                            Tolak
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>