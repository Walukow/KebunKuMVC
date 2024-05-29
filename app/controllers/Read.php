<?php

class Read extends Controller {
    public function index() {
        if (!isset($_SESSION['login']['admin'])) {
            header('Location:'.BASEURL);
            exit;
        } 

        $data['produk'] = $this->model('Product_model')->getAllProduk();

        $this->view('templates/header');
        $this->view('/dashbord/read/index', $data);
        $this->view('templates/script');
    }
    public function delete($id) {
        
    }
    public function unset() {
        unset($_SESSION['flash']);
        header('Location:'.BASEURL.'/alogin');
        exit;
    }
}