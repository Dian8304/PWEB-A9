<?php

class Auth extends Controller{
    public function index(){
        $data['judul'] = 'PAGARI';
        $data['body'] = 'landp-body';
        $this->view('templates/header', $data);
        $this->view('auth/landing', $data);
        $this->view('templates/footer');
    }
    public function login(){
        $data['judul'] = 'Login';
        $data['body'] = 'login';
        $this->view('templates/header', $data);
        $this->view('auth/login', $data);
        $this->view('templates/footer');
    }
    public function registSebagai(){
        $data['judul'] = 'Regist Sebagai';
        $data['body'] = 'reg-sbg';
        $this->view('templates/header', $data);
        $this->view('auth/registSebagai', $data);
        $this->view('templates/footer');
    }
    public function registPekebun(){
        $data['judul'] = 'Register Sebagai Pekebun';
        $data['body'] = 'regist';
        $this->view('templates/header', $data);
        $this->view('auth/registPekebun', $data);
        $this->view('templates/footer');
    }
    public function registAdmin(){
        $data['judul'] = 'Register Sebagai Admin Gudang';
        $data['body'] = 'regist';
        $this->view('templates/header', $data);
        $this->view('auth/registAdmin', $data);
        $this->view('templates/footer');
    }
    public function adminRegisterProcess(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'username' => trim($_POST['username']),
                'password' => trim($_POST['password']),
                'role_id_role' => 2,
                'nama_admin' => trim($_POST['nama']),
                'no_telepon' => trim($_POST['no_telepon'])
            ];

            if ($this->model('Auth_model')->register($data)) {
                $user = $this->model('Auth_model')->getUserByUsername($data['username']);
                $data['users_id_user'] = $user['id_user'];
                $this->model('Auth_model')->registAdmin($data);
                header('Location: ' . BASEURL . '/auth/login');
                Flasher::setFlash('Berhasil', 'didaftarkan', 'success');
            } else {
                header('Location: ' . BASEURL . '/auth/registAdmin');
                Flasher::setFlash('Gagal', 'didaftarkan', 'danger');
            }
        } else {
            $this->view('auth/registAdmin');
        }
    }
    public function pekebunRegisterProcess(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'username' => trim($_POST['username']),
                'password' => trim($_POST['password']),
                'role_id_role' => 3,
                'nama_pekebun' => trim($_POST['nama']),
                'no_telepon' => trim($_POST['no_telepon'])
            ];

            if ($this->model('Auth_model')->register($data)) {
                $user = $this->model('Auth_model')->getUserByUsername($data['username']);
                $data['users_id_user'] = $user['id_user'];
                $this->model('Auth_model')->registPekebun($data);
                Flasher::setFlash('Berhasil', 'didaftarkan', 'success');
                header('Location: ' . BASEURL . '/auth/login');
            } else {
                Flasher::setFlash('Gagal', 'didaftarkan', 'danger');
                header('Location: ' . BASEURL . '/auth/registPekebun');
            }
        } else {
            $this->view('auth/registPekebun');
        }
    }
    public function loginProcess() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = trim($_POST['username']);
            $password = trim($_POST['password']);

            $user = $this->model('Auth_model')->getUserByUsername($username);

            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id_user'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['role_id_role'];
                header('Location: ' . BASEURL . '/dashboard');
                exit();
            } else {
                Flasher::setFlash('Login', 'gagal', 'danger');
                header('Location: ' . BASEURL . '/auth/login');
                exit();
            }
        } else {
            $this->view('auth/login');
        }
    }
    public function logout() {
        unset($_SESSION['user_id']);
        unset($_SESSION['username']);
        unset($_SESSION['role']);
        session_destroy();
        header('Location: ' . BASEURL . '/auth/login');
    }
}