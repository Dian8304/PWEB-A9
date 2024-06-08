<?php Flasher::flash(); ?> 
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="m-1">Hasil Panen</h2>
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
                            <a href="<?= BASEURL; ?>/panen/ubah/<?= $panen['id_panen']; ?>"
                                class="btn btn-danger btn-sm btntabelubah tampilModalUbahPanen"
                                data-toggle="modal" data-target="#formPanen" data-id="<?= $panen['id_panen']; ?>">
                                Ubah
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="modal fade" id="formPanen" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formPanenLabel">Tambah Data Hasil Panen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>/panen/tambah" method="post">
                    <input type="hidden" id="id_panen" name="id_panen">
                    <div class="form-group">
                        <label for="tanggal" class="mb-1">Tanggal Panen</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                    </div>
                    <div class="form-group">
                        <label for="jumlah" class="mb-1">Jumlah (Kg)</label>
                        <input type="number" class="form-control" id="jumlah" name="jumlah" required>
                    </div>
                    <div class="form-group">
                        <label for="pekebun_id_pekebun" class="mb-1">Pekebun</label>
                        <select class="form-control" id="pekebun_id_pekebun" name="pekebun_id_pekebun" required>
                            <?php foreach ($data['pekebun'] as $pekebun): ?>
                                <option value="<?= $pekebun['id_pekebun']; ?>"><?= $pekebun['nama_pekebun']; ?></option>
                            <?php endforeach; ?>
                        </select>                
                    </div>
                    <div class="form-group">
                        <label for="jenis_buah_naga_id_jenis" class="mb-1">Jenis Buah</label>
                        <select class="form-control" id="jenis_buah_naga_id_jenis" name="jenis_buah_naga_id_jenis" required>
                            <?php foreach ($data['jenisBuah'] as $jenis): ?>
                                <option value="<?= $jenis['id_jenis']; ?>"><?= $jenis['nama_jenis']; ?></option>
                            <?php endforeach; ?>
                        </select>                
                    </div>
                    <div class="form-group">
                        <label for="wilayah_kebun_id_wilayah" class="mb-1">Wilayah</label>
                        <select class="form-control" id="wilayah_kebun_id_wilayah" name="wilayah_kebun_id_wilayah" required>
                            <?php foreach ($data['wilayah'] as $wilayah): ?>
                                <option value="<?= $wilayah['id_wilayah']; ?>"><?= $wilayah['nama_wilayah']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <input type="hidden" id="verif" name="verif_id_opsi" value="3">
                    <div class="form-group">
                        <label for="gudang_penyimpanan_id_gudang" class="mb-1">Nama Gudang</label>
                        <select class="form-control" id="gudang_penyimpanan_id_gudang" name="gudang_penyimpanan_id_gudang" required>
                            <?php foreach ($data['gudang'] as $gudang): ?>
                                <option value="<?= $gudang['id_gudang']; ?>"><?= $gudang['nama_gudang']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>