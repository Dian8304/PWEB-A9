<?php

class Gudang extends Controller{
    public function index(){
        $data['judul'] = 'Gudang';
        $this->view('templates/header', $data);
        $this->view('gudang/index');
        $this->view('templates/footer');
    }
}