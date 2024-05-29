<?php 

class Login extends Controller {
    public function index() {
        if (isset($_SESSION['login']['username'])) {        
            header('Location:'.BASEURL);
            exit;
            
        }
        $this->view('templates/header');
        $this->view('login/index');
        $this->view('templates/script');
    }
    public function verif() {
        if (!isset($_POST)) {
            header('Location:'.BASEURL);
            exit;
        }
        $model = $this->model('User_model');
        if (is_string($model->login($_POST))) {
            Flasher::setFlash('', $model->login($_POST), 'gagal', '/login');
            header('Location:'.BASEURL.'/login');
            exit;
        } else if ($model->login($_POST) === 0) {
            Flasher::setFlash('GAGAL', ' untuk login', 'gagal', '/login');
            header('Location:'.BASEURL.'/login');
            exit;
        } else {
            $_SESSION['login'] = [
                'username' => strtolower($_POST['username'])
            ];
            Flasher::setFlash('Terima kasih', ' telah login', '', '/catalog');
            header('Location:'.BASEURL.'/catalog');
            exit;
        }
    }
    public function unset() {
        unset($_SESSION['flash']);
        header('Location:'.BASEURL.'/login');
        exit;
    }
}