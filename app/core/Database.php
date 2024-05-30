<?php

// class untuk wrapper database
class Database {
    // data config
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $db_name = DB_NAME;

    // variabel untuk koneksi
    private $dbh;
    private $stmt;

    // construct
    public function __construct()
    {
        // data cource name
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db_name;

        $option = [
            PDO::ATTR_PERSISTENT => true, //optimasi koneksi ke database tetap stabil
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        try {
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $option);
        } catch(PDOExeption $e) {
            die($e->getMessage());
        }
    }

    // function untuk menjalankan query
    public function query($query)
    {
        $this->stmt = $this->dbh->prepare($query);
    }

    // function binding query
    public function bind($param, $value, $type = null)
    {
        // pengecekan tipe data oleh program
        if( is_null($type) ) {
            switch( true ) {
                // cek tipe data integer
                case is_int($value) :
                    $type = PDO::PARAM_INT;
                    break;
                // cek tipe data boolean
                case is_bool($value) :
                    $type = PDO::PARAM_BOOL;
                    break;
                // cek tipe data null
                case is_null($value) :
                    $type = PDO::PARAM_NULL;
                    break;
                // default tipe data string
                default :
                    $type = PDO::PARAM_STR;
            }
        }
        // menggabungkan hasil pengecekan tipe data
        $this->stmt->bindValue($param, $value, $type);
    }

    // eksekusi query
    public function execute()
    {
        $this->stmt->execute();
    }

    // jika menginginkan hasil yang banyak dari query
    public function resultSet()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // jika menginginkan hanya 1 data dari query
    public function single()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    // hitung berapa baris yang berubah dalam tabel 
    public function rowCount()
    {
        return $this->stmt->rowCount();
    }
}