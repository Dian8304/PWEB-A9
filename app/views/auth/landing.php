<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Welcome to PAGARI</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="/PWEB-A9/public/assets/css/style.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class='landp-body'>
        <div class="button-container">
                <a href="<?= BASEURL; ?>/auth/login" class="btn btn-danger rounded-xl">Login</a>
                <a href="<?= BASEURL; ?>/auth/registSebagai" class="btn btn-danger">Register</a>
        </div>
        <h1 class="h1L" style="font-size: 75px;"><b>PAGARI</b></h1>
        <h2 class="h2L" style="font-size: 25px;"><b>Sistem Informasi Hasil Panen Buah Naga Kebun Gading Asri</b></h2>
        <?php if(isset($_COOKIE['firstVisit'])): ?>
                <p class="alert alert-info">Welcome back! Your last visit was on: <?= date("Y-m-d H:i:s", $_COOKIE['firstVisit']); ?></p>
        <?php else: ?>
                <p class="alert alert-info">Welcome! This is your first visit.</p>
        <?php endif; ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="<?= BASEURL; ?>/assets/js/script.js"></script>
</html>