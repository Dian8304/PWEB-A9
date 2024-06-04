<nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
    <a class="navbar-brand" href="<?= BASEURL; ?>">PAGARI</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link text-white" href="<?= BASEURL; ?>/panen">Hasil Panen</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="<?= BASEURL; ?>/auth">Logout</a>
        </li>
        </ul>
    </div>
</nav>
<div class="row">
    <div class="col-lg-6">
        <?php Flasher::flash(); ?>
    </div>
</div>  
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="m-1">Hasil Panen</h2>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Tambah</button>
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
                            <button type="button" class="btn btn-danger btn-sm btntabelubah" data-toggle="modal" data-target="#exampleModal">Ubah</button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="formModalLabel">Tambah Data Hasil Panen</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="<?= BASEURL; ?>/panen/tambah" method="post">
                <div class="form-group">
                    <label for="id_panen" class="mb-1">ID Panen</label>
                    <input type="number" class="form-control" id="id_panen" name="id_panen">
                </div>
                <div class="form-group">
                    <label for="tanggal" class="mb-1">Tanggal Panen</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal">
                </div>
                <div class="form-group">
                    <label for="jumlah" class="mb-1">Jumlah (Kg)</label>
                    <input type="number" class="form-control" id="jumlah" name="jumlah">
                </div>
                <!-- BISA DISESUAIKAN DENGAN PEKEBUN YANG LOGIN SAAT ITU -->
                <div class="form-group">
                    <label for="pekebun" class="mb-1">Pekebun</label>
                    <select class="form-control" id="pekebun" name="pekebun_id_pekebun">
                        <?php foreach ($data['pekebun'] as $pekebun): ?>
                            <option value="<?= $pekebun['id_pekebun']; ?>"><?= $pekebun['nama_pekebun']; ?></option>
                        <?php endforeach; ?>
                    </select>                
                </div>
                <div class="form-group">
                    <label for="namajenisbuah" class="mb-1">Jenis Buah</label>
                    <select class="form-control" id="namajenisbuah" name="jenis_buah_naga_id_jenis">
                        <?php foreach ($data['jenisBuah'] as $jenis): ?>
                            <option value="<?= $jenis['id_jenis']; ?>"><?= $jenis['nama_jenis']; ?></option>
                        <?php endforeach; ?>
                    </select>                
                </div>
                <div class="form-group">
                    <label for="namaWilayah" class="mb-1">Wilayah</label>
                    <select class="form-control" id="namaWilayah" name="wilayah_kebun_id_wilayah">
                        <?php foreach ($data['wilayah'] as $wilayah): ?>
                            <option value="<?= $wilayah['id_wilayah']; ?>"><?= $wilayah['nama_wilayah']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <input type="hidden" id="verif" name="verif_id_opsi" value="3">
                <div class="form-group">
                    <label for="namaGudang" class="mb-1">Nama Gudang</label>
                    <select class="form-control" id="namaGudang" name="gudang_penyimpanan_id_gudang">
                        <?php foreach ($data['gudang'] as $gudang): ?>
                            <option value="<?= $gudang['id_gudang']; ?>"><?= $gudang['nama_gudang']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>