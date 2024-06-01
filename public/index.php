<?php
if( !session_id() ) {
    session_start();
}
require_once '../app/init.php';

// Menjalankan kelas App
$app = new App;