<?php

class Cart_model {
    private $db;
    private $table = 'tbl_keranjang';
    public function __construct() {
        $this->db = new Database;
    }
    public function getAllKeranjang($username) {
        $query = "SELECT * FROM $this->table WHERE username = :username";
        $this->db->query($query);
        $this->db->bind('username', $username);
        return $this->db->all();
    }
    public function addCart($data) {
        $this->db->query("SELECT * FROM $this->table WHERE idproduk = :idproduk AND username = :username");
        $this->db->bind('idproduk', $data['idproduk']);
        $this->db->bind('username', $data['username']);
        $result = $this->db->single();

        if ($result) {
            return "Produk sudah di dalam keranjang";
        } else {
            $this->db->query("INSERT INTO $this->table (username, idproduk) VALUES (:username, :idproduk)");
            $this->db->bind('username', $data['username']);
            $this->db->bind('idproduk', $data['idproduk']);
            $this->db->execute();
            return $this->db->rowCount();
        }
    }
    public function deleteCart($data) {
        $this->db->query("DELETE FROM $this->table WHERE idproduk = :idproduk AND username = :username");
        $this->db->bind('idproduk', $data['idproduk']);
        $this->db->bind('username', $data['username']);
        $this->db->execute();
        return $this->db->rowCount();
    }    
}
