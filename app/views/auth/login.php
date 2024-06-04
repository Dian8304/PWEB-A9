<main class="d-flex justify-content-center align-items-center w-100 min-vh-100 bg-color text-dark font-sans">
    <div class=" p-5 shadow bg-white rounded-lg">
        <?php Flasher::flash(); ?>
        <div class="text-center">
            <h2 class="font-weight-bold" style="font-size: 24px;">LOGIN</h2>
        </div>
        <hr class="mb-3"> 
        <form method="POST" action="<?= BASEURL; ?>/auth/loginProcess">
            <div class="form-group">
                <label for="username" class="mb-1">Username</label>
                <input type="text" id="username" class="form-control" placeholder="Masukkan username Anda" name="username" required>
            </div>
            <div class="form-group">
                <label for="password" class="mb-1">Password</label>
                <input type="password" id="password" class="form-control" placeholder="Masukkan password Anda" name="password" required>
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary btn-block" style="background-color: #8EBD40; border: none;">Login</button>
            </div>
        </form>
        <div class="mt-4 text-center" style="font-size: 13px;">
            <span>Belum memiliki akun? <a href="<?= BASEURL; ?>/auth/registSebagai" class="text-decoration-none text-primary font-weight-normal">Daftar</a></span>
        </div>
    </div>
</main>