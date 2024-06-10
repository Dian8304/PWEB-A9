<?php

class Wilayah extends Controller{
    public function __construct() {
        $this->checkRole([3]);
    }
    public function index(){
        $data['judul'] = 'Wilayah Gudang';
        $this->view('templates/header', $data);
        $this->view('wilayah/index');
        $this->view('templates/footer');
    }
}