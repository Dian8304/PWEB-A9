<?php Flasher::flash(); ?>
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
    <h2 class="m-1">Gedung Penyimpanan</h2>
    <button type="button" class="btn btn-primary tombolTambahData" data-toggle="modal" data-target="#formModal">Tambah</button>
    </div>
    <div>
        <table class="table">
            <thead >
                <tr class="kop">
                    <th>Nama Gudang</th>
                    <th>Kapasitas</th>
                    <th>Lokasi</th>
                    <th>Admin Gudang</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach( $data['gudang'] as $gudang ) : ?>
                <tr class="isitabel">
                    <td>
                        <?= $gudang['nama_gudang']; ?>
                    </td>
                    <td>
                        <?= $gudang['kapasitas']; ?>
                    </td>
                    <td>
                        <?= $gudang['lokasi']; ?>
                    </td>
                    <td>
                        <?= $gudang['nama_admin']; ?>
                    </td>
                    <td>
                        <a href="<?= BASEURL; ?>/gudang/ubah/<?= $gudang['id_gudang']; ?>"
                            class="btn btn-danger btn-sm btntabelubhadm tampilModalUbah"
                            data-toggle="modal" data-target="#formModal"
                            data-id="<?= $gudang['id_gudang']; ?>">Ubah
                        </a>
                        <a href="<?= BASEURL; ?>/gudang/hapus/<?= $gudang['id_gudang']; ?>"
                            class="btn btn-danger btn-sm btntabelhpsadm tampilModalUbah"
                            onclick="return confirm('Yakin untuk menghapus data?')">Hapus
                        </a>                  
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title tombolTambahData" id="formModalLabel">Tambah Data Gudang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>/gudang/tambah" method="post">
                    <input type="hidden" id="id_gudang" name="id_gudang">
                    <div class="form-group">
                        <label for="nama_gudang" class="mb-1">Nama Gudang</label>
                        <input type="text" class="form-control" id="nama_gudang" name="nama_gudang" required>
                    </div>
                    <div class="form-group">
                        <label for="kapasitas" class="mb-1">Kapasitas</label>
                        <input type="number" class="form-control" id="kapasitas" name="kapasitas" required>
                    </div>
                    <div class="form-group">
                        <label for="lokasi" class="mb-1">Lokasi</label>
                        <input type="text" class="form-control" id="lokasi" name="lokasi" required>
                    </div>
                    <input type="hidden" id="operator_id_opr" name="operator_id_opr" value="1">
                    <div class="form-group">
                        <label for="admin_gudang_id_admin" class="mb-1">Admin Gudang</label>
                        <select class="form-control" id="admin_gudang_id_admin" name="admin_gudang_id_admin" required>
                            <?php foreach ($data['admin'] as $admin): ?>
                                <option value="<?= $admin['id_admin']; ?>"><?= $admin['nama_admin']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Tambah Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>