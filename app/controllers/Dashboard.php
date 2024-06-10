<?php

class Dashboard extends Controller{
    public function index() {
        $data['judul'] = 'Dashboard';
        $data['total_panen'] = $this->model('Panen_model')->getPanenCount();
        $data['rejected_panen'] = $this->model('Panen_model')->getRejectedPanenCount();
        $data['accepted_panen'] = $this->model('Panen_model')->getAcceptedPanenCount();
        $this->view('templates/header', $data); // data jududl dikirim ke folder teplates class header
        $this->view('dashboard/index', $data); // data berupa nama dikirim ke file index di view
        $this->view('templates/footer'); // class view ni menyimpan ke arah folder view
    }
}