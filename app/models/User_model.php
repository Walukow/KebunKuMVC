<?php

class User_model {
    private $db;
    private $table = 'tbl_user';
    public function __construct() {
    $this->db = new Database;
    }
    public function getUser($username) {
        $this->db->query("SELECT * FROM $this->table WHERE nama = :nama");
        $this->db->bind('nama', $username);
        return $this->db->single();
    }
    public function addUser($data) {
        $username = strtolower(htmlspecialchars(stripslashes($data['username'])));
        $alamat = htmlspecialchars(stripslashes($data['alamat']));
        $nohp = htmlspecialchars(stripslashes($data['nohp']));
        $password = $data['password'];
        $password2 = $data['password2'];
        
        if (empty($username)) {
            return "Username diperlukan";
        } elseif (!preg_match('/^[a-zA-Z0-9_]+$/', $username)) {
            return "Username tidak valid";
        } elseif (strlen($username) > 15) {
            return "Username terlalu panjang";
        }
    
        $this->db->query("SELECT * FROM $this->table WHERE nama = :username");
        $this->db->bind('username', $username);
        $this->db->execute();
        if ($this->db->rowCount() > 0) {
            return "Username sudah ada";
        }
    
        if (empty($alamat)) {
            return "Alamat diperlukan";
        } elseif (strlen($alamat) > 255) {
            return "Alamat terlalu panjang";
        }
        
        if (empty($nohp)) {
            return "No HP diperlukan";
        } elseif (strlen($nohp) < 9 || strlen($nohp) > 13) {
            return "No HP tidak valid";
        }
        
        if (empty($password)) {
            return "Password diperlukan";
        } elseif (strlen($password) < 8) {
            return "Password minimal 8 karakter";
        } elseif ($password !== $password2) {
            return "Password tidak cocok";
        }
        
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
        $this->db->query("INSERT INTO $this->table (nama, alamat, nohp, password) VALUES (:username, :alamat, :nohp, :password)");
        $this->db->bind('username', $username);
        $this->db->bind('alamat', $alamat);
        $this->db->bind('nohp', $nohp);
        $this->db->bind('password', $hashedPassword);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function login($data) {
        $username = strtolower(stripslashes($data["username"]));
        $password = $data["password"];
        
        $this->db->query("SELECT * FROM $this->table WHERE nama = :username");
        $this->db->bind('username', $username);
        $result = $this->db->single();

        if ($result) {
            if (password_verify($password, $result['password'])) {
                return $result; 
            } else {
                return "Password tidak valid";
            }
        } else {
            return "Username tidak ditemukan";
        }
    }
}
