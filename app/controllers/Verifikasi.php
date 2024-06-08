<?php

class Verifikasi extends Controller{
    public function index(){
        $data['judul'] = 'Verifikasi Hasil Panen';
        $data['panen'] = $this->model('Panen_model')->getPanenByVerif(3);
        $data['jenisBuah'] = $this->model('Panen_model')->getAllJenisBuah();
        $data['wilayah'] = $this->model('Panen_model')->getAllWilayah();
        $data['gudang'] = $this->model('Panen_model')->getAllGudang();
        $data['pekebun'] = $this->model('Panen_model')->getAllPekebun();
        $this->view('templates/header', $data);
        $this->view('verifikasi/index', $data);
        $this->view('templates/footer');
    }
    public function setujui()
    {
        if( $this->model('Panen_model')->verifSetujuiHasilPanen($_POST) > 0) {
            Flasher::setFlash('Data hasil panen','berhasil disetujui','success');
            header('Location: ' . BASEURL . '/verifikasi');
            exit;
        } else {
            Flasher::setFlash('Data hasil panen','gagal disetujui','danger');
            header('Location: ' . BASEURL . '/verifikasi');
            exit;
        }
    }
    public function tolak()
    {
        if( $this->model('Panen_model')->verifTolakHasilPanen($_POST) > 0) {
            Flasher::setFlash('Data hasil panen','berhasil ditolak','success');
            header('Location: ' . BASEURL . '/verifikasi');
            exit;
        } else {
            Flasher::setFlash('Data hasil panen','gagal ditolak','danger');
            header('Location: ' . BASEURL . '/verifikasi');
            exit;
        }
    }
}