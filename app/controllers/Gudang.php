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
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'nama_gudang' => trim($_POST['nama_gudang']),
                'kapasitas' => trim($_POST['kapasitas']),
                'lokasi' => trim($_POST['lokasi']),
                'admin_gudang_id_admin' => trim($_POST['admin_gudang_id_admin'])
            ];

            if(empty($data['nama_gudang']) || empty($data['kapasitas']) || empty($data['lokasi']) || empty($data['admin_gudang_id_admin'])){
                Flasher::setFlash('Seluruh data harus', 'diisi', 'danger');
                header('Location: ' . BASEURL . '/gudang');
                exit(); 
            }

            if( $this->model('Gudang_model')->tambahDataGudang($_POST) > 0) {
                Flasher::setFlash('Data gudang berhasil','ditambahkan','success');
                header('Location: ' . BASEURL . '/gudang');
                exit;
            } else {
                Flasher::setFlash('Data gudang gagal','ditambahkan','danger');
                header('Location: ' . BASEURL . '/gudang');
                exit;
            }
        } else {
            $this->view('gudang');
        }
    }
    public function hapus()
    {
        if( $this->model('Gudang_model')->hapusDataGudang($_GET['id']) > 0) {
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
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'nama_gudang' => trim($_POST['nama_gudang']),
                'kapasitas' => trim($_POST['kapasitas']),
                'lokasi' => trim($_POST['lokasi']),
                'admin_gudang_id_admin' => trim($_POST['admin_gudang_id_admin'])
            ];

            if(empty($data['nama_gudang']) || empty($data['kapasitas']) || empty($data['lokasi']) || empty($data['admin_gudang_id_admin'])){
                Flasher::setFlash('Seluruh data harus', 'diisi', 'danger');
                header('Location: ' . BASEURL . '/gudang');
                exit(); 
            }

            if( $this->model('Gudang_model')->ubahDataGudang($_POST) > 0) {
                Flasher::setFlash('Data gudang berhasil','diubah','success');
                header('Location: ' . BASEURL . '/gudang');
                exit;
            } else {
                Flasher::setFlash('Data gudang gagal','diubah','danger');
                header('Location: ' . BASEURL . '/gudang');
                exit;
            }
        } else {
            $this->view('gudang');
        }
    }
}