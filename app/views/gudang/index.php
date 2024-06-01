<div class="container-xl">

    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::flash(); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-5">
            <button type="button" class="btn btn-primary tombolTambahData" data-bs-toggle="modal" data-bs-target="#formModal">
                Tambah Data
            </button>
            <h3>Daftar Gudang</h3>
            <ul class="list-group">
                    <?php foreach( $data['gudang'] as $gudang ) : ?>
                        <li class="list-group-item">
                            <?= $gudang['nama_gudang']; ?>
                            <a href="<?= BASEURL; ?>/gudang/hapus/<?= $gudang['id_gudang']; ?>"
                                class="badge text-bg-danger float-end ms-1 link-underline link-underline-opacity-0"
                                onclick="return confirm('Yakin untuk menghapus data?')">
                                hapus
                            </a>
                            <a href="<?= BASEURL; ?>/gudang/ubah/<?= $gudang['id_gudang']; ?>"
                                class="badge text-bg-warning float-end ms-1 link-underline link-underline-opacity-0 tampilModalUbah"
                                data-bs-toggle="modal" data-bs-target="#formModal" data-id="<?= $gudang['id_gudang']; ?>">
                                ubah
                            </a>
                            <a href="<?= BASEURL; ?>/gudang/detail/<?= $gudang['id_gudang']; ?>"
                                class="badge text-bg-primary float-end ms-1 link-underline link-underline-opacity-0">
                                detail
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
        </div>
    </div>
</div>
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 tombolTambahData" id="formModalLabel">Tambah Data Gudang</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>/gudang/tambah" method="post">
                    <div class="mb-3">
                        <label for="id_gudang" class="form-label">ID Gudang</label>
                        <input type="number" class="form-control" id="id_gudang" name="id_gudang">
                    </div>
                    <div class="mb-3">
                        <label for="nama_gudang" class="form-label">Nama Gudang</label>
                        <input type="text" class="form-control" id="nama_gudang" name="nama_gudang">
                    </div>
                    <div class="mb-3">
                        <label for="kapasitas" class="form-label">Kapasitas</label>
                        <input type="number" class="form-control" id="kapasitas" name="kapasitas">
                    </div>
                    <div class="mb-3">
                        <label for="lokasi" class="form-label">Lokasi</label>
                        <input type="text" class="form-control" id="lokasi" name="lokasi">
                    </div>
                    <div class="mb-3">
                        <label for="operator_id_opr" class="form-label">Operaor</label>
                        <select class="form-select" id="operator_id_opr" name="operator_id_opr">
                            <option value="1">Aldi Nugroho</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="admin_gudang_id_admin" class="form-label">Admin Gudang</label>
                        <select class="form-select" id="admin_gudang_id_admin" name="admin_gudang_id_admin">
                            <option value="1">Laras Syifa</option>
                            <option value="2">Laila Marlina</option>
                            <option value="3">Mario Lagi</option>
                            <option value="4">Nadhief</option>
                            <option value="5">Rara Romlah</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Tambah Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>