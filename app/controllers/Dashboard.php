<?php

class Dashboard extends Controller{
    public function index() {
        $data['judul'] = 'Home';
        $data['nama'] = '';
        $this->view('templates/header', $data); // data jududl dikirim ke folder teplates class header
        $this->view('dashboard/index', $data); // data berupa nama dikirim ke file index di view
        $this->view('templates/footer'); // class view ni menyimpan ke arah folder view
    }
}