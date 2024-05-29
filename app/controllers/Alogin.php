<?php

class Alogin extends Controller {
    
    public function index() {
        if (isset($_SESSION['login']['admin'])) {        
            header('Location:'.BASEURL);
            exit;
        }
        $this->view('templates/header');
        $this->view('/dashbord/login/index');
        $this->view('templates/script');
    }
    public function verif() {
        if (isset($_SESSION['login']['admin']) || !isset($_POST)) {        
            header('Location:'.BASEURL);
            exit;
        }
        if ($this->model('Admin_model')->login($_POST) == 0) {
            Flasher::setFlash('GAGAL', ' untuk login', 'gagal', '/alogin');
            header('Location:'.BASEURL.'/alogin');
            exit;
        } else {
            $_SESSION['login'] = [
                'admin' => 1
            ];
            Flasher::setFlash('Berhasil', ' untuk login', '', '/read');
            header('Location:'.BASEURL.'/read');
            exit;
        }
    }
    public function unset() {
        unset($_SESSION['flash']);
        header('Location:'.BASEURL.'/alogin');
        exit;
    }
}