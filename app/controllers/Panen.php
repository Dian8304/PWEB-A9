<?php

class Panen extends Controller{
    public function __construct() {
        $this->checkRole([3]);
    }
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
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'tanggal' => trim($_POST['tanggal']),
                'jumlah' => trim($_POST['jumlah']),
                'pekebun_id_pekebun' => trim($_POST['pekebun_id_pekebun']),
                'jenis_buah_naga_id_jenis' => trim($_POST['jenis_buah_naga_id_jenis']),
                'wilayah_kebun_id_wilayah' => trim($_POST['wilayah_kebun_id_wilayah']),
                'gudang_penyimpanan_id_gudang' => trim($_POST['gudang_penyimpanan_id_gudang'])
            ];

            if(empty($data['tanggal']) || empty($data['jumlah']) || empty($data['pekebun_id_pekebun']) || empty($data['jenis_buah_naga_id_jenis']) || empty($data['wilayah_kebun_id_wilayah']) || empty($data['gudang_penyimpanan_id_gudang'])){
                Flasher::setFlash('Seluruh data harus', 'diisi', 'danger');
                header('Location: ' . BASEURL . '/panen');
                exit(); 
            }

            if( $this->model('Panen_model')->tambahDataPanen($_POST) > 0) {
                Flasher::setFlash('Berhasil','menambahkan data panen','success');
                header('Location: ' . BASEURL . '/panen');
                exit;
            } else {
                Flasher::setFlash('Gagal','menambahkan data panen','danger');
                header('Location: ' . BASEURL . '/panen');
                exit;
            }
        } else {
            $this->view('panen');
        }
    }
    public function getubah()
    {
        echo json_encode($this->model('Panen_model')->getPanenById($_POST['id']));
    }
    public function ubah()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'tanggal' => trim($_POST['tanggal']),
                'jumlah' => trim($_POST['jumlah']),
                'pekebun_id_pekebun' => trim($_POST['pekebun_id_pekebun']),
                'jenis_buah_naga_id_jenis' => trim($_POST['jenis_buah_naga_id_jenis']),
                'wilayah_kebun_id_wilayah' => trim($_POST['wilayah_kebun_id_wilayah']),
                'gudang_penyimpanan_id_gudang' => trim($_POST['gudang_penyimpanan_id_gudang'])
            ];

            if(empty($data['tanggal']) || empty($data['jumlah']) || empty($data['pekebun_id_pekebun']) || empty($data['jenis_buah_naga_id_jenis']) || empty($data['wilayah_kebun_id_wilayah']) || empty($data['gudang_penyimpanan_id_gudang'])){
                Flasher::setFlash('Seluruh data harus', 'diisi', 'danger');
                header('Location: ' . BASEURL . '/panen');
                exit(); 
            }

            if( $this->model('Panen_model')->ubahDataPanen($_POST) > 0) {
                Flasher::setFlash('Berhasil','mengubah data panen','success');
                header('Location: ' . BASEURL . '/panen');
                exit;
            } else {
                Flasher::setFlash('Gagal','mengubah data panen','danger');
                header('Location: ' . BASEURL . '/panen');
                exit;
            }
        } else {
            $this->view('panen');
        }
    }
}