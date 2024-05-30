<?php

class Gudang_model
{
    private $table = 'gudang_penyimpanan';
    // private $id = 'id_gudang';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllGudang()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getGudangById($id_gudang)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_gudang = :id_gudang');
        $this->db->bind('id_gudang', $id_gudang);
        return $this->db->single();
    }
}