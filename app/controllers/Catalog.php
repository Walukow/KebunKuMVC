<?php

class Catalog extends Controller {
    public function index() {
        $data['produk'] = $this->model('Product_model')->getAllProduk();
        $data['from'] = '/catalog';
        $this->view('templates/header');
        $this->view('templates/navbar');
        $this->view('catalog/index', $data);
        $this->view('templates/link');
        $this->view('templates/footer');
        $this->view('templates/script');
    }
    public function unset() {
        unset($_SESSION['flash']);
        header('Location:'.BASEURL.'/catalog');
        exit;
    }
}