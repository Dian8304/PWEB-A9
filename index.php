<?php
// // Enable error reporting
error_reporting( E_ALL );

// // Display errors on screen
ini_set( 'display_errors', 1 );

date_default_timezone_set( 'Asia/Jakarta' );
require_once 'app/init.php';

// Menjalankan kelas App
$app = new App;