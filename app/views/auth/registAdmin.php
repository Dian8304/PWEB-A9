<div class="row">
    <div class="col-lg-6">
        <?php Flasher::flash(); ?>
    </div>
</div>
<main class="d-flex justify-content-center align-items-center w-100 min-vh-100 bg-color text-dark font-sans">
    <div class="shadow bg-reg rounded-lg">
        <div class="text-center">
            <h2 class="font-weight-bold" style="font-size: 24px;">REGISTER</h2>
        </div>
        <hr class="mb-3">
        <form action="<?= BASEURL; ?>/auth/adminRegisterProcess" method="post">
            <input type="hidden" name="actor" value="2">
            <div class="form-group">
                <label for="username" class="mb-1">Username</label>
                <input type="text" id="username" class="form-control" placeholder="Masukkan username Anda" name="username" required>
            </div>
            <div class="form-group">
                <label for="nama" class="mb-1">Nama</label>
                <input type="text" id="nama" class="form-control" placeholder="Masukkan nama Anda" name="nama" required>
            </div>
            <div class="form-group">
                <label for="no_telepon" class="mb-1">Nomor Telepon</label>
                <input type="number" id="no_telepon" class="form-control" placeholder="Masukkan nomor telepon Anda" name="no_telepon" required>
            </div>
            <div class="form-group">
                <label for="password" class="mb-1">Password</label>
                <input type="password" id="password" class="form-control" placeholder="Masukkan password Anda" name="password" required>
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary btn-block" style="background-color: #8EBD40; border: none;">Daftar Akun</button>
            </div>
        </form>
        <div class="mt-3 text-center" style="font-size: 13px;">
            <span>Sudah memiliki akun? <a href="<?= BASEURL; ?>/auth/login" class="text-primary font-weight-normal">Masuk</a></span>
        </div>
    </div>
</main>