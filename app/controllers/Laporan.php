<?php

class Gudang extends Controller{
    public function index(){
        $data['judul'] = 'Laporan';
        $this->view('templates/header', $data);
        $this->view('laporan/index');
        $this->view('templates/footer');
    }
}