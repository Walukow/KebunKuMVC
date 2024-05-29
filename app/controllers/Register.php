<?php 

class Register extends Controller {
    public function index() {
        if (isset($_SESSION['login']['username'])) {        
            header('Location:'.BASEURL);
            exit;
            
        }
        $this->view('templates/header');
        $this->view('register/index');
        $this->view('templates/script');
    }
    public function add() {
        if (!isset($_POST)) {
            header('Location:'.BASEURL);
            exit;
        }
        $model = $this->model('User_model');
        if (is_string($model->addUser($_POST))) {
            Flasher::setFlash('', $model->addUser($_POST), 'gagal', '/register');
            header('Location:'.BASEURL.'/register');
            exit;
        } elseif ($model->addUser($_POST) == 0 ){
            Flasher::setFlash('GAGAL', ' registrasi', 'gagal', '/register');
            header('Location:'.BASEURL.'/register');
            exit;
        } else {
            Flasher::setFlash('Terima kasih', ' telah registrasi', '', '/login');
            header('Location:'.BASEURL.'/login');
            exit;
        }
    }
    public function unset() {
        unset($_SESSION['flash']);
        header('Location:'.BASEURL.'/register');
        exit;
    }
}