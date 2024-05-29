<?php 

class Create extends Controller {
    public function index() {
        if (!isset($_SESSION['login']['admin'])) {
            header('Location:'.BASEURL);
            exit;
        } 

        $this->view('templates/header');
        $this->view('/dashbord/create/index');
        $this->view('templates/script');
    }
    public function add() {
        if (!isset($_POST)) {
            header('Location:'.BASEURL);
            exit;
        }
    }
}