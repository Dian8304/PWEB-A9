<?php

class Gudang_model
{
    private $dbh; //database handler
    private $stmt;

    public function __construct()
    {
        // data cource name
        $dsn = 'mysql:host=localhost;dbname=dbpagari';

        try {
            $this->dbh = new PDO($dsn, 'root', '');
        } catch(PDOExeption $e) {
            die($e->getMessage());
        }
    }

    public function getAllGudang()
    {
        $this->stmt = $this->dbh->prepare('SELECT * FROM gudang_penyimpanan');
        $this->stmt->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}