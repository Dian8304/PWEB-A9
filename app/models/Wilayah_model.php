<?php

class Wilayah_model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllWilayah()
    {
        $this->db->query('SELECT * FROM wilayah_kebun');
        return $this->db->resultSet();
    }

    public function getWilayahById($id_wilayah)
    {
        $this->db->query('SELECT * FROM wilayah_kebun WHERE id_wilayah = :id_wilayah');
        $this->db->bind('id_wilayah', $id_wilayah);
        return $this->db->single();
    }

    public function tambahDataWilayah($data)
    {
        $query = "INSERT INTO wilayah_kebun (nama_wilayah, luas, lokasi, operator_id_opr)
                VALUES (:nama_wilayah, :luas, :lokasi, :operator_id_opr)";
        $this->db->query($query);
        $this->db->bind('nama_wilayah', $data['nama_wilayah']);
        $this->db->bind('luas', $data['luas']);
        $this->db->bind('lokasi', $data['lokasi']);
        $this->db->bind('operator_id_opr', $data['operator_id_opr']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataWilayah($id_wilayah)
    {
        $query = "DELETE FROM wilayah_kebun WHERE id_wilayah = :id_wilayah";
        $this->db->query($query);
        $this->db->bind('id_wilayah', $id_wilayah);

        $this->db->execute();

        return $this->db->rowCount();
    }
    
    public function ubahDataWilayah($data)
    {
        $query = "UPDATE wilayah_kebun SET
                    nama_wilayah = :nama_wilayah,
                    luas = :luas,
                    lokasi = :lokasi,
                    operator_id_opr = :operator_id_opr
                WHERE id_wilayah = :id_wilayah";
        $this->db->query($query);
        $this->db->bind('id_wilayah', $data['id_wilayah']);
        $this->db->bind('nama_wilayah', $data['nama_wilayah']);
        $this->db->bind('luas', $data['luas']);
        $this->db->bind('lokasi', $data['lokasi']);
        $this->db->bind('operator_id_opr', $data['operator_id_opr']);

        $this->db->execute();

        return $this->db->rowCount();
    }
}