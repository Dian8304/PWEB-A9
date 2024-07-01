<?php Flasher::flash(); ?>
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
    <h2 class="m-1">Wilayah Kebun</h2>
    <button type="button" class="btn btn-primary tombolTambahDataWilayah" data-toggle="modal" data-target="#formWilayah">Tambah</button>
    </div>
    <div>
        <table class="table">
            <thead >
                <tr class="kop">
                    <th>Nama Wilayah</th>
                    <th>Luas (m²)</th>
                    <th>Lokasi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach( $data['wilayah'] as $wilayah ) : ?>
                <tr class="isitabel">
                    <td>
                        <?= $wilayah['nama_wilayah']; ?>
                    </td>
                    <td>
                        <?= $wilayah['luas']; ?>
                    </td>
                    <td>
                        <?= $wilayah['lokasi']; ?>
                    </td>
                    <td>
                        <a href="<?= BASEURL; ?>/wilayah/ubah/"
                            class="btn btn-danger btn-sm btntabelubhadm tampilModalUbahWilayah"
                            data-toggle="modal" data-target="#formWilayah"
                            data-id="<?= $wilayah['id_wilayah']; ?>">Ubah
                        </a>
                        <a href="<?= BASEURL; ?>/wilayah/hapus?id=<?= $wilayah['id_wilayah']; ?>"
                            class="btn btn-danger btn-sm btntabelhpsadm "
                            onclick="return confirm('Yakin untuk menghapus data?')">Hapus
                        </a>                  
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<div class="modal fade" id="formWilayah" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formWilayahLabel">Tambah Data Wilayah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>/wilayah/tambah" method="post">
                    <input type="hidden" id="id_wilayah" name="id_wilayah">
                    <div class="form-group">
                        <label for="nama_wilayah" class="mb-1">Nama Wilayah</label>
                        <input type="text" class="form-control" id="nama_wilayah" name="nama_wilayah" required>
                    </div>
                    <div class="form-group">
                        <label for="luas" class="mb-1">Luas</label>
                        <input type="number" class="form-control" id="luas" name="luas" required>
                    </div>
                    <div class="form-group">
                        <label for="lokasi" class="mb-1">Lokasi</label>
                        <input type="text" class="form-control" id="lokasi" name="lokasi" required>
                    </div>
                    <input type="hidden" id="operator_id_opr" name="operator_id_opr" value="2">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>