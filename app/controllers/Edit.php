<?php 

class Edit extends Controller {
    public function index($id) {
        if (!isset($_SESSION['login']['admin'])) {
            header('Location:'.BASEURL);
            exit;
        } 
        $data['produk'] = $this->model('Product_model')->getProduk($id);
        
        $this->view('templates/header');
        $this->view('/dashbord/edit/index', $data);
        $this->view('templates/script');
    }
}