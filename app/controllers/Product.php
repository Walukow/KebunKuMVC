<?php

class Product extends Controller {
    public function index($id) {
        $data['produk'] = $this->model('Product_model')->getAllProduk();
        $data['barang'] = $this->model('Product_model')->getProduk($id);
        $this->view('templates/header');
        $this->view('templates/navbar');
        $this->view('product/index', $data);
        $this->view('catalog/index', $data);
        $this->view('templates/link');
        $this->view('templates/footer');
        $this->view('templates/script');
    }
    public function add($id) {
        $data = [
            'idproduk' => $id,
            'username' => $_SESSION['login']['username']
        ];
        $model = $this->model('Cart_model');
        if (is_string($model->addCart($data))) {
            Flasher::setFlash('', $model->addCart($data), 'gagal', '/cart');
            header('Location:'.BASEURL.'/cart');
            exit;
        } else if ($model->addCart($data) == 0) {
            Flasher::setFlash('GAGAL', ' menambah produk ke dalam keranjang', 'gagal', '/cart');
            header('Location:'.BASEURL.'/cart');
            exit;
        } else {
            Flasher::setFlash('Berhasil', ' menambah produk ke dalam keranjang', '', '/cart');
            header('Location:'.BASEURL.'/cart');
            exit;
        }
    }
    public function delete($id) {
        $data = [
            'idproduk' => $id,
            'username' => $_SESSION['login']['username']
        ];
        $model = $this->model('Cart_model');
        if (is_string($model->deleteCart($data))) {
            Flasher::setFlash('', $model->deleteCart($data), 'gagal', '/cart');
            header('Location:'.BASEURL.'/cart');
            exit;
        } else if ($model->deleteCart($data) == 0) {
            Flasher::setFlash('GAGAL', ' menghapus produk ke dalam keranjang', 'gagal', '/cart');
            header('Location:'.BASEURL.'/cart');
            exit;
        } else {
            Flasher::setFlash('Berhasil', ' menghapus produk ke dalam keranjang', '', '/cart');
            header('Location:'.BASEURL.'/cart');
            exit;
        }
    }
}