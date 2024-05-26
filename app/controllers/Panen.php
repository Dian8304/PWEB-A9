<?php

class Panen extends Controller{
    public function index(){
        $data['judul'] = 'Hasil Panen';
        $this->view('templates/header', $data);
        $this->view('panen/index');
        $this->view('templates/footer');
    }
}