<?php

class Gudang extends Controller{
    public function __construct() {
        $this->checkRole([1]);
    }
    public function index(){
        $data['judul'] = 'Gudang';
        $data['gudang'] = $this->model('Gudang_model')->getAllGudang();
        $data['admin'] = $this->model('Gudang_model')->getAllAdminGudang();
        $this->view('templates/header', $data);
        $this->view('gudang/index', $data);
        $this->view('templates/footer');
    }
    public function tambah()
    {
        if( $this->model('Gudang_model')->tambahDataGudang($_POST) > 0) {
            Flasher::setFlash('Data gudang berhasil','ditambahkan','success');
            header('Location: ' . BASEURL . '/gudang');
            exit;
        } else {
            Flasher::setFlash('Data gudang gagal','ditambahkan','danger');
            header('Location: ' . BASEURL . '/gudang');
            exit;
        }
    }
    public function hapus($id_gudang)
    {
        if( $this->model('Gudang_model')->hapusDataGudang($id_gudang) > 0) {
            Flasher::setFlash('Data gudang berhasil','dihapus','success');
            header('Location: ' . BASEURL . '/gudang');
            exit;
        } else {
            Flasher::setFlash('Data gudang gagal','dihapus','danger');
            header('Location: ' . BASEURL . '/gudang');
            exit;
        }
    }
    public function getubah()
    {
        echo json_encode($this->model('Gudang_model')->getGudangById($_POST['id']));
    }
    public function ubah()
    {
        if( $this->model('Gudang_model')->ubahDataGudang($_POST) > 0) {
            Flasher::setFlash('Data gudang berhasil','diubah','success');
            header('Location: ' . BASEURL . '/gudang');
            exit;
        } else {
            Flasher::setFlash('Data gudang gagal','diubah','danger');
            header('Location: ' . BASEURL . '/gudang');
            exit;
        }
    }
}