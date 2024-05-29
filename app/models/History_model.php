<?php

class History_model {
    private $db;
    private $table = 'tbl_riwayat';
    public function __construct() {
        $this->db = new Database;
    }
    public function getAllRiwayat($username, $awal_data, $data_perhalaman) {
        $this->db->query("SELECT * FROM $this->table WHERE username = :username ORDER BY tanggal DESC LIMIT :awal_data, :data_perhalaman");
        $this->db->bind('username', $username);
        $this->db->bind('awal_data', $awal_data, PDO::PARAM_INT);
        $this->db->bind('data_perhalaman', $data_perhalaman, PDO::PARAM_INT);
        return $this->db->all();
    }
    public function countRiwayat($username) {
        $this->db->query("SELECT COUNT(*) AS count FROM $this->table WHERE username = :username");
        $this->db->bind('username', $username);
        $result = $this->db->single();
        return $result['count'];
    }
    public function getRiwayat($id) {
        $this->db->query("SELECT * FROM $this->table WHERE idproduk = :id");
        $this->db->bind('id', $id);
        return $this->db->single();
    }
    public function buy($data, $username) {
        
        for ($i = 0; $i < count($data["idproduk"]); $i++) {
            $idproduk = intval($data["idproduk"][$i]);
            $jumlah = intval($data["jumlah"][$i]);
            $tanggal = $data["tanggal"][$i];
            $stock = intval($data["stock"][$i]) - $jumlah;

            $this->db->query("INSERT INTO tbl_riwayat (username, idproduk, jumlah, tanggal) VALUES (:username, :idproduk, :jumlah, :tanggal)");
            $this->db->bind(':username', $username);
            $this->db->bind(':idproduk', $idproduk);
            $this->db->bind(':jumlah', $jumlah);
            $this->db->bind(':tanggal', $tanggal);
            $this->db->execute();

            $this->db->query("UPDATE tbl_produk SET stock = :stock WHERE id = :idproduk");
            $this->db->bind(':stock', $stock);
            $this->db->bind(':idproduk', $idproduk);
            $this->db->execute();

            $this->db->query("DELETE FROM tbl_keranjang WHERE idproduk = :idproduk AND username = :username");
            $this->db->bind(':idproduk', $idproduk);
            $this->db->bind(':username', $username);
            $this->db->execute();
        }

        return $this->db->rowCount();
    }
}