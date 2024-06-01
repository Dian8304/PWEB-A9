<main class="d-flex justify-content-center align-items-center w-100 min-vh-100 bg-color text-dark font-sans">
    <div class="shadow bg-reg rounded-lg">
        <div class="text-center">
            <h2 class="font-weight-bold" style="font-size: 24px;">REGISTER</h2>
        </div>
        <hr class="mb-3">
        <form>
            <div class="form-group">
                <label for="username" class="mb-1">Username</label>
                <input type="text" id="username" class="form-control" placeholder="Masukkan username Anda">
            </div>
            <div class="form-group">
                <label for="nomorhp" class="mb-1">Nomor Telepon</label>
                <input type="number" id="nomorhp" class="form-control" placeholder="Masukkan nomor telepon Anda">
            </div>
            <div class="form-group">
                <label class="mb-1">Email</label>
                <input type="email" id="Email" class="form-control" placeholder="Masukkan email Anda">
            </div>
            <div class="form-group">
                <label for="password" class="mb-1">Password</label>
                <input type="password" id="password" class="form-control" placeholder="Masukkan password Anda">
            </div>
            <div class="form-group">
                <label for="password" class="mb-1">Konfirmasi Password</label>
                <input type="password" id="password" class="form-control" placeholder="Masukkan ulang password Anda" style="margin-bottom: 9%;">
            </div>
            <div class="mt-1 mb-3 text-center" style="font-size: 13px;">
                <span>Sudah memiliki akun? <a href="<?= BASEURL; ?>/auth/login" class="text-primary font-weight-normal">Masuk</a></span>
            </div>
            <div class="d-flex justify-content-center">
                <a href="<?= BASEURL; ?>/auth/login" class="btn btn-primary btn-block" style="background-color: #8EBD40; border: none;">Daftar Akun</a>
            </div>
        </form>
    </div>
</main>