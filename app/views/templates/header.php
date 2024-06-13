<?php
$role = isset( $_SESSION[ 'role' ] ) ? $_SESSION[ 'role' ] : null;
?>

<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>
        <?=$data[ 'judul' ]; ?>
    </title>
    <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css'>
    <link rel='stylesheet' href='<?= BASEURL; ?>/assets/css/style.css'>
    <script src='https://code.jquery.com/jquery-3.6.0.min.js'></script>
</head>

<body class="<?= isset($data['body']) ? $data['body'] : ''; ?>">
    <nav class='navbar navbar-expand-lg navbar-dark navbar-custom'>
        <a class='navbar-brand' href='<?= BASEURL; ?>/dashboard'>PAGARI</a>
        <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarNav'
            aria-controls='navbarNav' aria-expanded='false' aria-label='Toggle navigation'>
            <span class='navbar-toggler-icon'></span>
        </button>
        <div class='collapse navbar-collapse justify-content-end' id='navbarNav'>
            <ul class='navbar-nav'>
                <?php if ( $role == 3 ):?>
                <li class='nav-item'>
                    <a class='nav-link text-white' href='<?= BASEURL; ?>/panen'>Hasil Panen</a>
                </li>
                <?php endif;?>
                <?php if ( $role == 2 ):?>
                <li class='nav-item'>
                    <a class='nav-link text-white' href='<?= BASEURL; ?>/verifikasi/index'>Verifikasi</a>
                </li>
                <?php endif;?>
                <?php if ( $role == 1 ):?>
                <li class='nav-item'>
                    <a class='nav-link text-white' href='<?= BASEURL; ?>/gudang'>Gudang Penyimpanan</a>
                </li>
                <?php endif;?>
                <li class='nav-item'>
                    <a class='nav-link text-white' href='<?= BASEURL; ?>/auth'>Logout</a>
                </li>
            </ul>
        </div>
    </nav>