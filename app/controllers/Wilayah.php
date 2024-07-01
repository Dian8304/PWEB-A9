<?php

class Wilayah extends Controller{
    public function __construct() {
        $this->checkRole([1]);
    }
    public function index(){
        $data['judul'] = 'Wilayah Kebun';
        $data['wilayah'] = $this->model('Wilayah_model')->getAllWilayah();
        $this->view('templates/header', $data);
        $this->view('wilayah/index', $data);
        $this->view('templates/footer');
    }
    public function tambah()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'nama_wilayah' => trim($_POST['nama_wilayah']),
                'luas' => trim($_POST['luas']),
                'lokasi' => trim($_POST['lokasi']),
                'operator_id_opr' => trim($_POST['operator_id_opr']),
            ];

            if(empty($data['nama_wilayah']) || empty($data['luas']) || empty($data['lokasi'])){
                Flasher::setFlash('Seluruh data harus', 'diisi', 'danger');
                header('Location: ' . BASEURL . '/wilayah');
                exit(); 
            }

            if( $this->model('Wilayah_model')->tambahDataWilayah($_POST) > 0) {
                Flasher::setFlash('Data wilayah berhasil','ditambahkan','success');
                header('Location: ' . BASEURL . '/wilayah');
                exit;
            } else {
                Flasher::setFlash('Data wilayah gagal','ditambahkan','danger');
                header('Location: ' . BASEURL . '/wilayah');
                exit;
            }
        } else {
            $this->view('wilayah');
        }
    }
    public function hapus()
    {
        if( $this->model('Wilayah_model')->hapusDataWilayah($_GET['id']) > 0) {
            Flasher::setFlash('Data wilayah berhasil','dihapus','success');
            header('Location: ' . BASEURL . '/wilayah');
            exit;
        } else {
            Flasher::setFlash('Data wilayah gagal','dihapus','danger');
            header('Location: ' . BASEURL . '/wilayah');
            exit;
        }
    }
    public function getubah()
    {
        echo json_encode($this->model('Wilayah_model')->getWilayahById($_POST['id']));
    }
    public function ubah()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            var_dump($_POST);
            $data = [
                'nama_wilayah' => trim($_POST['nama_wilayah']),
                'luas' => trim($_POST['luas']),
                'lokasi' => trim($_POST['lokasi']),
                'operator_id_opr' => trim($_POST['operator_id_opr']),
            ];

            if(empty($data['nama_wilayah']) || empty($data['luas']) || empty($data['lokasi'])){
                Flasher::setFlash('Seluruh data harus', 'diisi', 'danger');
                header('Location: ' . BASEURL . '/wilayah');
                exit(); 
            }

            if( $this->model('Wilayah_model')->ubahDataWilayah($_POST) > 0) {
                Flasher::setFlash('Data wilayah berhasil','diubah','success');
                header('Location: ' . BASEURL . '/wilayah');
                exit;
            } else {
                Flasher::setFlash('Data wilayah gagal','diubah','danger');
                header('Location: ' . BASEURL . '/wilayah');
                exit;
            }
        } else {
            $this->view('wilayah');
        }
    }
}