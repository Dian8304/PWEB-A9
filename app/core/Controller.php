<?php

// Kelas utama dari folder controllers
class Controller {
    public function __construct() {
        if (!isset($_COOKIE['firstVisit'])) {
            setcookie('firstVisit', time(), time() + (86400 * 30), "/");
        }
    }
    // Untuk mengarahkan ke folder views
    public function view($view, $data = []) {
        require_once '../app/views/' . $view . '.php';
    }

    // Untuk mengarahkan ke folder models
    public function model($model) {
        require_once '../app/models/' . $model . '.php';
        return new $model;
    }

    public function checkRole($roles) {
        if (!isset($_SESSION['role']) || !in_array($_SESSION['role'], $roles)) {
            Flasher::setFlash('Akses Ditolak!', 'Anda tidak memiliki izin mengakses halaman ini.', 'danger');
            header('Location: ' . BASEURL . '/auth/logout');
            exit();
        }
    }
}