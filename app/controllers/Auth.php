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
    public function registsbg(){
        $data['judul'] = 'Regist Sebagai';
        $data['body'] = 'reg-sbg';
        $this->view('templates/header', $data);
        $this->view('auth/regist-sbg', $data);
        $this->view('templates/footer');
    }
    public function regist(){
        $data['judul'] = 'Register';
        $data['body'] = 'regist';
        $this->view('templates/header', $data);
        $this->view('auth/regist', $data);
        $this->view('templates/footer');
    }
}