<?php

class Auth_model {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getUserByUsername($username) {
        $this->db->query('SELECT * FROM users WHERE username = :username');
        $this->db->bind('username', $username);
        return $this->db->single();
    }

    public function register($data) {
        $this->db->query('INSERT INTO users (username, password, role_id_role) VALUES (:username, :password, :role_id_role)');
        $this->db->bind('username', $data['username']);
        $this->db->bind('password', password_hash($data['password'], PASSWORD_DEFAULT)); // Hash the password
        $this->db->bind('role_id_role', $data['role_id_role']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function registPekebun($data) {
        $this->db->query('INSERT INTO pekebun (nama_pekebun, no_telepon, users_id_user) VALUES (:nama_pekebun, :no_telepon, :users_id_user)');
        $this->db->bind('nama_pekebun', $data['nama_pekebun']);
        $this->db->bind('no_telepon', $data['no_telepon']);
        $this->db->bind('users_id_user', $data['users_id_user']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function registAdmin($data) {
        $this->db->query('INSERT INTO admin_gudang (nama_admin, no_telepon, users_id_user) VALUES (:nama_admin, :no_telepon, :users_id_user)');
        $this->db->bind('nama_admin', $data['nama_admin']);
        $this->db->bind('no_telepon', $data['no_telepon']);
        $this->db->bind('users_id_user', $data['users_id_user']);
        $this->db->execute();
        return $this->db->rowCount();
    }
}
