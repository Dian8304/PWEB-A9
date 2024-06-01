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
    public function tambah()
    {
        if( $this->model('Gudang_model')->tambahDataGudang($_POST) > 0) {
            Flasher::setFlash('berhasil','ditambahkan','success');
            header('Location: ' . BASEURL . '/gudang');
            exit;
        } else {
            Flasher::setFlash('gagal','ditambahkan','danger');
            header('Location: ' . BASEURL . '/gudang');
            exit;
        }
    }
    public function hapus($id_gudang)
    {
        if( $this->model('Gudang_model')->hapusDataGudang($id_gudang) > 0) {
            Flasher::setFlash('berhasil','dihapus','success');
            header('Location: ' . BASEURL . '/gudang');
            exit;
        } else {
            Flasher::setFlash('gagal','dihapus','danger');
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
            Flasher::setFlash('berhasil','diubah','success');
            header('Location: ' . BASEURL . '/gudang');
            exit;
        } else {
            Flasher::setFlash('gagal','diubah','danger');
            header('Location: ' . BASEURL . '/gudang');
            exit;
        }
    }
}