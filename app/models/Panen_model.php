<?php

class Panen_model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllPanen()
    {
        $this->db->query('
            SELECT hasil_panen.id_panen, hasil_panen.tanggal, hasil_panen.jumlah, 
                jenis_buah_naga.nama_jenis as nama_jenis, 
                wilayah_kebun.nama_wilayah as nama_wilayah, 
                gudang_penyimpanan.nama_gudang as nama_gudang
            FROM hasil_panen
            JOIN jenis_buah_naga ON hasil_panen.jenis_buah_naga_id_jenis = jenis_buah_naga.id_jenis
            JOIN wilayah_kebun ON hasil_panen.wilayah_kebun_id_wilayah = wilayah_kebun.id_wilayah
            JOIN gudang_penyimpanan ON hasil_panen.gudang_penyimpanan_id_gudang = gudang_penyimpanan.id_gudang
            ');
        return $this->db->resultSet();
    }

    public function getAllJenisBuah() {
        $this->db->query('SELECT * FROM jenis_buah_naga');
        return $this->db->resultSet();
    }

    public function getAllWilayah() {
        $this->db->query('SELECT * FROM wilayah_kebun');
        return $this->db->resultSet();
    }

    public function getAllGudang() {
        $this->db->query('SELECT * FROM gudang_penyimpanan');
        return $this->db->resultSet();
    }

    public function getAllPekebun() {
        $this->db->query('SELECT * FROM pekebun');
        return $this->db->resultSet();
    }

    public function tambahDataPanen($data)
    {
        $query = "INSERT INTO hasil_panen (id_panen, tanggal, jumlah, pekebun_id_pekebun, jenis_buah_naga_id_jenis, wilayah_kebun_id_wilayah, verif_id_opsi, gudang_penyimpanan_id_gudang)
                VALUES (:id_panen, :tanggal, :jumlah, :pekebun_id_pekebun, :jenis_buah_naga_id_jenis, :wilayah_kebun_id_wilayah, :verif_id_opsi, :gudang_penyimpanan_id_gudang)";
        $this->db->query($query);
        $this->db->bind('id_panen', $data['id_panen']);
        $this->db->bind('tanggal', $data['tanggal']);
        $this->db->bind('jumlah', $data['jumlah']);
        // BISA DISESUAIKAN DENGAN PEKEBUN YANG LOGIN SAAT ITU
        $this->db->bind('pekebun_id_pekebun', $data['pekebun_id_pekebun']);
        $this->db->bind('jenis_buah_naga_id_jenis', $data['jenis_buah_naga_id_jenis']);
        $this->db->bind('wilayah_kebun_id_wilayah', $data['wilayah_kebun_id_wilayah']);
        $this->db->bind('verif_id_opsi', $data['verif_id_opsi']);
        $this->db->bind('gudang_penyimpanan_id_gudang', $data['gudang_penyimpanan_id_gudang']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function ubahDataPanen()
    {

    }
}