<?php 

class Home extends Controller {
    public function index() {
        $data['populer'] = $this->model('Product_model')->getPopuler();
        $data['baru'] = $this->model('Product_model')->getNewProduk();
        $this->view('templates/header', $data);
        $this->view('templates/navbar');
        $this->view('home/index', $data);
        $this->view('templates/footer');
        $this->view('templates/script');
    }
}