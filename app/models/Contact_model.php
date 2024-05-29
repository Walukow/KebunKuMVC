<?php 

class Contact_model {
    private $db;
    private $table = 'tbl_pesan';
    public function __construct() {
        $this->db = new Database;
    }
    public function sendMessage($data) {
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