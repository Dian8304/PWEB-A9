<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In to PAGARI</title>
    <link rel='icon' href='<?= BASEURL; ?>/assets/image/favicon.ico'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= BASEURL; ?>/assets/css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class='login'>
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
</body>
</html>