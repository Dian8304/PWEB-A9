<?php

class Auth extends Controller{
    public function index(){
        $this->view('auth/landing');
    }
    public function login(){
        $this->view('auth/login');
    }
    public function registSebagai(){
        $this->view('auth/registSebagai');
    }
    public function registPekebun(){
        $this->view('auth/registPekebun');
    }
    public function registAdmin(){
        $this->view('auth/registAdmin');
    }
    public function registOperator(){
        $this->view('auth/registOperator');
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
                Flasher::setFlash('Akun anda berhasil', 'didaftarkan', 'success');
            } else {
                header('Location: ' . BASEURL . '/auth/registAdmin');
                Flasher::setFlash('Akun anda gagal', 'didaftarkan', 'danger');
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
                Flasher::setFlash('Akun anda berhasil', 'didaftarkan', 'success');
                header('Location: ' . BASEURL . '/auth/login');
            } else {
                Flasher::setFlash('Akun anda gagal', 'didaftarkan', 'danger');
                header('Location: ' . BASEURL . '/auth/registPekebun');
            }
        } else {
            $this->view('auth/registPekebun');
        }
    }
    public function oprRegisterProcess(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'username' => trim($_POST['username']),
                'password' => trim($_POST['password']),
                'role_id_role' => 1,
                'nama_opr' => trim($_POST['nama']),
                'no_telepon' => trim($_POST['no_telepon'])
            ];

            if ($this->model('Auth_model')->register($data)) {
                $user = $this->model('Auth_model')->getUserByUsername($data['username']);
                $data['users_id_user'] = $user['id_user'];
                $this->model('Auth_model')->registOperator($data);
                Flasher::setFlash('Akun anda berhasil', 'didaftarkan', 'success');
                header('Location: ' . BASEURL . '/auth/login');
            } else {
                Flasher::setFlash('Akun anda gagal', 'didaftarkan', 'danger');
                header('Location: ' . BASEURL . '/auth/registOperator');
            }
        } else {
            $this->view('auth/registOperator');
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
        $_SESSION = array();
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }
        session_destroy();
        header('Location: ' . BASEURL . '/auth/login');
        exit();
    }
}