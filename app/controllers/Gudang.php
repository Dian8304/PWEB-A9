<?php

class Gudang extends Controller{
    public function index(){
        $data['judul'] = 'Gudang';
        $data['gudang'] = $this->model('Gudang_model')->getAllGudang();
        $this->view('templates/header', $data);
        $this->view('gudang/index', $data);
        $this->view('templates/footer');
    }
    public function detail($id_gudang){
        $data['judul'] = 'Detail Gudang';
        $data['gudang'] = $this->model('Gudang_model')->getGudangById($id_gudang);
        $this->view('templates/header', $data);
        $this->view('gudang/detail', $data);
        $this->view('templates/footer');
    }
}