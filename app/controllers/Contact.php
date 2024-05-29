<?php 

class Contact extends Controller {
    public function index() {
        $this->view('templates/header');
        $this->view('templates/navbar');
        $this->view('contact/index');
        $this->view('templates/footer');
        $this->view('templates/script');
    }
    public function msg() {
        if (!isset($_POST)) {
            header('Location:'.BASEURL);
            exit;
        }
        if ($this->model('Contact_model')->sendMessage($_POST) > 0 ){
            Flasher::setFlash('Terima kasih', ' telah mengirim pesan', '', '/contact');
            header('Location:'.BASEURL.'/contact');
            exit;
        } elseif (is_string($this->model('Contact_model')->sendMessage($_POST))) {
            Flasher::setFlash('', $this->model('Contact_model')->addUser($_POST), 'gagal', '/register');
            header('Location:'.BASEURL.'/register');
            exit;
        } else {
            Flasher::setFlash('GAGAL', ' mengirim pesan', 'gagal', '/contact');
            header('Location:'.BASEURL.'/contact');
            exit;
        }
    }
    public function unset() {
        unset($_SESSION['flash']);
        header('Location:'.BASEURL.'/contact');
        exit;
    }
}