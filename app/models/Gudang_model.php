<?php

class Gudang_model
{
    // private $table = 'gudang_penyimpanan';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllGudang()
    {
        $this->db->query('SELECT * FROM gudang_penyimpanan');
        return $this->db->resultSet();
    }

    public function getGudangById($id_gudang)
    {
        $this->db->query('SELECT * FROM gudang_penyimpanan WHERE id_gudang = :id_gudang');
        $this->db->bind('id_gudang', $id_gudang);
        return $this->db->single();
    }

    public function tambahDataGudang($data)
    {
        $query = "INSERT INTO gudang_penyimpanan VALUES (:id_gudang, :nama_gudang, :kapasitas, :lokasi, :operator_id_opr, :admin_gudang_id_admin)";
        $this->db->query($query);
        $this->db->bind('id_gudang', $data['id_gudang']);
        $this->db->bind('nama_gudang', $data['nama_gudang']);
        $this->db->bind('kapasitas', $data['kapasitas']);
        $this->db->bind('lokasi', $data['lokasi']);
        $this->db->bind('operator_id_opr', $data['operator_id_opr']);
        $this->db->bind('admin_gudang_id_admin', $data['admin_gudang_id_admin']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataGudang($id_gudang)
    {
        $query = "DELETE FROM gudang_penyimpanan WHERE id_gudang = :id_gudang";
        $this->db->query($query);
        $this->db->bind('id_gudang', $id_gudang);

        $this->db->execute();

        return $this->db->rowCount();
    }
    
    public function ubahDataGudang($data)
    {
        $query = "UPDATE gudang_penyimpanan SET
                    nama_gudang = :nama_gudang,
                    kapasitas = :kapasitas,
                    lokasi = :lokasi,
                    operator_id_opr = :operator_id_opr,
                    admin_gudang_id_admin = :admin_gudang_id_admin
                WHERE id_gudang = :id_gudang";
        $this->db->query($query);
        $this->db->bind('id_gudang', $data['id_gudang']);
        $this->db->bind('nama_gudang', $data['nama_gudang']);
        $this->db->bind('kapasitas', $data['kapasitas']);
        $this->db->bind('lokasi', $data['lokasi']);
        $this->db->bind('operator_id_opr', $data['operator_id_opr']);
        $this->db->bind('admin_gudang_id_admin', $data['admin_gudang_id_admin']);

        $this->db->execute();

        return $this->db->rowCount();
    }
}