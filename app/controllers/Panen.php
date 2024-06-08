<?php

class Panen extends Controller{
    public function index(){
        $data['judul'] = 'Hasil Panen';
        $data['panen'] = $this->model('Panen_model')->getAllPanen();
        $data['jenisBuah'] = $this->model('Panen_model')->getAllJenisBuah();
        $data['wilayah'] = $this->model('Panen_model')->getAllWilayah();
        $data['gudang'] = $this->model('Panen_model')->getAllGudang();
        $data['pekebun'] = $this->model('Panen_model')->getAllPekebun();
        $this->view('templates/header', $data);
        $this->view('panen/index', $data);
        $this->view('templates/footer');
    }
    public function tambah()
    {
        if( $this->model('Panen_model')->tambahDataPanen($_POST) > 0) {
            Flasher::setFlash('Berhasil','menambahkan data panen','success');
            header('Location: ' . BASEURL . '/panen');
            exit;
        } else {
            Flasher::setFlash('Gagal','menambahkan data panen','danger');
            header('Location: ' . BASEURL . '/panen');
            exit;
        }
    }
    public function getubah()
    {
        echo json_encode($this->model('Panen_model')->getPanenById($_POST['id']));
    }
    public function ubah()
    {
        if( $this->model('Panen_model')->ubahDataPanen($_POST) > 0) {
            Flasher::setFlash('Berhasil','mengubah data panen','success');
            header('Location: ' . BASEURL . '/panen');
            exit;
        } else {
            Flasher::setFlash('Gagal','mengubah data panen','danger');
            header('Location: ' . BASEURL . '/panen');
            exit;
        }
    }
}