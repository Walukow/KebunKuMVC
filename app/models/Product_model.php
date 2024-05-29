<?php

class Product_model {
    private $db;
    private $table = 'tbl_produk';
    public function __construct() {
        $this->db = new Database;
    }
    public function getPopuler() {
        $this->db->query("SELECT idproduk, SUM(jumlah) AS total_jumlah FROM tbl_riwayat GROUP BY idproduk ORDER BY total_jumlah DESC LIMIT 1");
        $this->db->execute(); 
        $sub = $this->db->single();
        $id = $sub['idproduk'];

        $this->db->query("SELECT * FROM $this->table WHERE id = $id");
        return $this->db->single();
    }
    public function getNewProduk() {
        $this->db->query("SELECT * FROM $this->table ORDER BY id DESC LIMIT 2");
        return $this->db->all();
    }
    public function getAllProduk() {
        $this->db->query("SELECT * FROM $this->table");
        return $this->db->all();
    }
    public function getProduk($id) {
        $this->db->query("SELECT * FROM $this->table WHERE id = :id");
        $this->db->bind('id', $id);
        return $this->db->single();
    }        
    public function getReadyProduk($id) {
        $this->db->query("SELECT * FROM $this->table WHERE id = :id AND stock > 0");
        $this->db->bind('id', $id);
        return $this->db->single();
    }
    public function addProduk($data) {
        if (empty($data['nama'])) {
            return "Nama diperlukan";
        }
        
        if (empty($data['email'])) {
            return "Email diperlukan";
        }
        
        if (empty($data['pesan'])) {
            return "Pesan diperlukan";
        }

        $this->db->query("INSERT INTO $this->table VALUES ('', :nama, :email, :pesan)");
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('pesan', $data['pesan']);
        $this->db->execute();
        return $this->db->rowCount();
    }
}